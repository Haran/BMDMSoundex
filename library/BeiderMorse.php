<?php
/*
 * Copyright Alexander Beider and Stephen P. Morse, 2008
 * Copyright Olegs Capligins, 2013-2016
 *
 * This is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * It is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public
 * License for more details.
 *
 * You should have received a copy of the GNU General Public License.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace dautkom\bmdm\library;


/**
 * @package dautkom\bmdm\library
 */
class BeiderMorse extends Core
{

    /**
     * general, sephardic or ashkenazic mode
     * @var string
     */
    private $type;

    /**
     * Language library location
     * @var string
     */
    private $langDir;

    /**
     * Array of languages
     * @var array
     */
    private $languages;

    /**
     * Array of language indexes
     *
     * Prior to refactoring every language was represented
     * by integer, stored in a variable of corresponding language name
     *
     * @var array
     */
    private $indexes;

    /**
     * Sum of language indexes minus 'any'
     * @var int
     */
    private $all;

    /**
     * Generic language rules from {$this->type}/rules.php
     * @var array
     */
    private $languageRules;

    /**
     * Rules data for all languages
     * @var array
     */
    private $rules;

    /**
     * Approx data for all languages
     * @var array
     */
    private $approx;

    /**
     * Approx common data for all languages
     * @var array
     */
    private $approxCommon;

    /**
     * Runtime directory
     * @var string
     */
    private $runtime;


    /**
     * BeiderMorse constructor.
     * Loads rules for supported languages.
     * <p>Valid types: 'gen', 'sep', 'ash'</p>
     *
     * @param string $type general, ashkenazic or sephardic language type
     */
    public function __construct($type)
    {

        $this->type    = $type;
        $this->runtime = __DIR__."/../runtime";
        $this->langDir = __DIR__."/bm/languages/{$this->type}";

        // Get language directory list
        foreach ((new \DirectoryIterator($this->langDir)) as $item) {
            if( $item->isDir() && !$item->isDot() ) {
                $this->languages[] = $item->getBasename();
            }
        }

        // Language indexes
        foreach ($this->languages as $key => $language) {
            $this->indexes[$language] = pow(2, $key);
        }

        // Sum of indexes minus 'any'
        $this->all = array_sum($this->indexes) - 1;

        // Build language recognition rules and phonetics system
        $this->buildLanguageRules();
        $this->buildApproxCommon();
        $this->buildPhonetics();

    }


    /**
     * Retrieve language code
     * <p></p>
     * USAGE:
     *     $obj->set('foo')->bm->getLanguageCode();
     *     $obj->bm->getLanguageCode('bar');
     *
     * @param  string $input [optional] alternative input string
     * @return int
     */
    public function getLanguageCode($input = null)
    {

        $input  = empty($input) ? self::$input : $this->prepareString($input);
        $count  = count($this->languageRules);
        $remain = $this->all;

        for($i=0; $i<$count; $i++) {

            list($letters, $languages, $accept) = $this->languageRules[$i];

            if( preg_match($letters, $input) ) {

                if( $accept ) {
                    $remain &= $languages;
                }
                else {
                    $remain &= (~$languages) % ($this->all + 1);
                }

            }

        }

        if( $remain == 0 ) {
            $remain = 1;
        }

        return $remain;

    }


    /**
     * Retrieve possible language names for input string
     * <p></p>
     * USAGE:
     *     $obj->set('foo')->getLanguageNames()
     *
     * @return array
     */
    public function getLanguageNames()
    {

        $result = [];
        $code   = $this->getLanguageCode();

        if(is_null($code)) {
            return $result;
        }

        foreach($this->indexes AS $lang=>$id ) {
            if(($code & $id) > 0) {
                $result[] = $lang;
            }
        }

        return empty($result) ? ['any'] : $result;

    }


    /**
     * Retrieve list of supported languages, excluding 'any'
     *
     * @return array
     */
    public function getLanguages()
    {
        return array_slice($this->languages, 1);
    }


    /**
     * Retrieve two-dimensional array of Beider-Morse phonetic keys:
     * <p></p>
     *     array(
     *         [(int)word number] => array(
     *              [0] => (string)phonetic key
     *              [1] => (string)phonetic key
     *              .....
     *         ),
     *         ...
     *     )
     *
     * @return array
     */
    public function soundex()
    {

        $phonetic = $this->getPhonetic(self::$input);

        if(empty($phonetic)) {
            return [];
        }

        $phonetic = explode('-', $phonetic);
        $result   = array();

        foreach($phonetic as $word) {

            $word = $this->expand($word);
            $word = explode('|', $word);
            $word = array_filter($word);

            if(!empty($word)) {
                $result[] = $word;
            }

        }

        return $result;

    }


    /**
     * Retrieve list of languages from given internal code. The code
     * is a sum of language internal values, represented by sum of
     * powers of two.
     *
     * @param  int $code
     * @return array
     */
    public function getLanguagesFromCode($code)
    {

        $result = [];

        if ($code > 0 && $code < $this->all) {

            foreach ($this->indexes as $language => $index) {
                if ($index & $code) {
                    $result[] = $language;
                }
            }

        }

        return $result;

    }


    /**
     * Retrieve language internal code from its' name.
     * If no language can be found by given name, NULL will be returned
     *
     * @param  string $name
     * @return int|null
     */
    public function getLanguageCodeFromName($name)
    {
        return array_key_exists($name, $this->indexes) ? $this->indexes[$name] : null;
    }


    /**
     * Retrieve string of phonetic keys
     *
     * @param  string $input       [optional] alternative input string (instead of set via BMDM::set())
     * @param  int    $languageArg [optional] language code for string recognized as multiple languages
     * @return string
     */
    private function getPhonetic($input = null, $languageArg = null)
    {

        $concat      = false;
        $finalRules1 = $this->approxCommon;
        $input       = empty($input) ? self::$input : $this->prepareString($input);
        $languageArg = empty($languageArg) ? $this->getLanguageCode() : $languageArg;
        $rules       = $this->rules[$this->getLanguageIndexFromCode($languageArg)];
        $finalRules2 = $this->approx[$this->getLanguageIndexFromCode($languageArg)];

        // both discard and concatenate certain words if at the start of the name
        if( $this->type == 'gen' ) {

            $list  = ['da', 'dal', 'de', 'del', 'dela', 'de la', 'della', 'des', 'di', 'do', 'dos', 'du', 'van', 'von'];
            $clist = count($list);

            for( $j = 0; $j < count($clist); $j++ ) {

                $prefix       = "$list[$j] ";
                $prefixLength = strlen($prefix);

                // check for words from list
                if (substr($input, 0, $prefixLength) == $prefix) {

                    $remainder = substr($input, $prefixLength);
                    $combined  = $list[$j] . $remainder;

                    return $this->redoLanguage($remainder) . '-' . $this->redoLanguage($combined);

                }
                // check for d'
                elseif (substr($input, 0, 2) == "d'") {

                    $remainder = substr($input, 2);
                    $combined  = "d$remainder";

                    return $this->redoLanguage($remainder) . '-' . $this->redoLanguage($combined);

                }

            }

        }

        $words  = explode(' ', $input);
        $cwords = count($words);
        $words2 = [];

        // Sephardic
        if( $this->type == 'sep' ) {

            // for each word in the name, delete portions of word preceding apostrophe
            // ex: d'avila d'aguilar --> avila aguilar
            // also discard certain words in the name

            $list  = ['al', 'el', 'da', 'dal', 'de', 'del', 'dela', 'de la', 'della', 'des', 'di', 'do', 'dos', 'du', 'van', 'von'];
            $clist = count($list);

            for ($i = 0; $i < $cwords; $i++) {

                $parts  = explode("'", $words[$i]);  // create array of each part between apostrophes
                $word   = $parts[count($parts) - 1]; // take the last part only
                $inlist = false;

                // discard certain words in the name
                for ($j = 0; $j < $clist; $j++) {
                    if ($word == $list[$j]) {
                        $inlist = true;
                        break;
                    }
                }
                if (!$inlist) {
                    // discard certain words
                    $words2[count($words2)] = $word;
                }

            }

        }

        // Ashkenazic
        elseif ($this->type == 'ash') {

            // discard certain words if at the start of the name
            $list  = ['bar', 'ben', 'da', 'de', 'van', 'von'];
            $clist = count($list);

            // process each word in the name
            for ($i = 0; $i < $cwords; $i++) {

                $word   = $words[$i];
                $inlist = false;

                // at first word of a multi-word name
                if ($i == 0 && $cwords > 1) {

                    // discard certain words in the name
                    for ($j = 0; $j < $clist; $j++) {
                        if ($word == $list[$j]) {
                            $inlist = true;
                            break;
                        }
                    }

                }
                if (!$inlist) {
                    $words2[count($words2)] = $word;
                }
            }

        }

        // General
        else {
            $words2 = $words;
        }


        // concatenate the separate words of a multi-word name (normally used for exact matches)
        if ($concat) {
            $input = implode(' ', $words2);
        }
        // not a multi-word name
        else if (count($words2) == 1) {
            $input = $words2[0];
        }
        // encode each word in a multi-word name separately (normally used for approx matches)
        else {

            $result = '';

            for ($i = 0; $i < count($words2); $i++) {
                $word    = $words2[$i];
                $result .= '-' . $this->redoLanguage($word);
            }

            // strip off the leading dash
            return substr($result, 1);

        }

        $inputLength   = strlen($input);
        $patternPos    = 0;
        $lcontextPos   = 1;
        $rcontextPos   = 2;
        $phoneticPos   = 3;
        $languagePos   = 4;
        $logicalPos    = 5;
        $phonetic      = '';
        $fileName      = '';
        $patternLength = 0;

        // last item is name of the file
        if (count($rules[count($rules) - 1]) == 1) {

            // last item is name of the file
            $fileName = array_pop($rules);
            $fileName = $fileName[0];

        }

        // Debug section
        {

            // Phonetic alphabet mapping info
            $dbg = 'Char codes =';

            for ($i = 0; $i < strlen($input); $i++) {
                // 1-byte character
                if (ord($input[$i]) < 128 + 64) {
                    $dbg .= ' [#' . dechex(ord($input[$i])) . ']' . $input[$i];
                } // 2-byte character
                else if (ord($input[$i]) < 128 + 64 + 32) {
                    $dbg .= ' [#' . dechex(ord($input[$i])) . dechex(ord($input[$i + 1])) . ']' . substr($input, $i, 2);
                    $i++;
                } // 3-byte character
                else if (ord($input[$i]) < 128 + 64 + 32 + 16) {
                    $dbg .= ' [#' . dechex(ord($input[$i])) . dechex(ord($input[$i + 1])) . dechex(ord($input[$i + 2])) . ']' . substr($input, $i, 3);
                    $i += 2;
                } // 4-byte character
                else if (ord($input[$i]) < 128 + 64 + 32 + 16 + 8) {
                    $dbg .= ' [#' . dechex(ord($input[$i])) . dechex(ord($input[$i + 1])) . dechex(ord($input[$i + 2])) . dechex(ord($input[$i + 3])) . ']' . substr($input, $i, 4);
                    $i += 3;
                } // 5-byte character
                else if (ord($input[$i]) < 128 + 64 + 32 + 16 + 8) {
                    $dbg .= ' [#' . dechex(ord($input[$i])) . dechex(ord($input[$i + 1])) . dechex(ord($input[$i + 2])) . dechex(ord($input[$i + 3])) . dechex(ord($input[$i + 4])) . ']' . substr($input, $i, 5);
                    $i += 4;
                } // 6-byte character
                else if (ord($input[$i]) < 128 + 64 + 32 + 16 + 8 + 4) {
                    $dbg .= ' [#' . dechex(ord($input[$i])) . dechex(ord($input[$i + 1])) . dechex(ord($input[$i + 2])) . dechex(ord($input[$i + 3])) . dechex(ord($input[$i + 4])) . dechex(ord($input[$i + 5])) . ']' . substr($input, $i, 5);
                    $i += 5;
                }
            }

            $this->dbg("Applying language rules from '$fileName' to '$input' using language code '$languageArg'", 'debug');
            $this->dbg($dbg, 'debug');

        }

        for ($i = 0; $i < $inputLength;) {

            $found = false;

            for ($r = 0; $r < count($rules); $r++) {

                $rule          = $rules[$r];
                $pattern       = $rule[$patternPos];
                $patternLength = strlen($pattern);
                $lcontext      = $rule[$lcontextPos];
                $rcontext      = $rule[$rcontextPos];

                // check to see if next sequence in input matches the string in the rule
                if ($patternLength > $inputLength - $i || substr($input, $i, $patternLength) != $pattern) {
                    // no match
                    continue;
                }

                $right = "/^$rcontext/";
                $left  = "/$lcontext$/";

                // check that right context is satisfied
                if ($rcontext != '') {
                    if (!preg_match($right, substr($input, $i + $patternLength))) {
                        continue;
                    }
                }

                // check that left context is satisfied
                if ($lcontext != '') {
                    if (!preg_match($left, substr($input, 0, $i))) {
                        continue;
                    }
                }

                // check to see if languageArg is one of the allowable ones (used only with "any" rules)
                if (($languageArg != '1') && ($languagePos < count($rule))) {

                    $language = $rule[$languagePos]; // the required language(s) for this rule to apply
                    $logical  = $rule[$logicalPos];  // do we require ALL or ANY of the required languages

                    if ($logical == 'ALL') {
                        // check to see if languageArg contains all the required languages
                        if (($languageArg & $language) != $language) {
                            continue;
                        }
                    }
                    // any
                    else {
                        // check to see if languageArg contains at least one required language
                        if (($languageArg & $language) == 0) {
                            continue;
                        }
                    }
                }

                // check for incompatible attributes
                $candidate = $this->applyRuleIfCompatible($phonetic, $rule[$phoneticPos], $languageArg);

                if ($candidate === false) {
                    $this->dbg("Rejecting rule #$r because of incompatible attributes: [pattern='$pattern', context='$lcontext', rcontext='$rcontext', subst='{$rule[$phoneticPos]}', result='$phonetic']", 'debug');
                    continue;
                }

                $phonetic = $candidate;

                $this->dbg("Applying rule #$r [pattern='$pattern', lcontext='$lcontext', rcontext='$rcontext', subst='{$rule[$phoneticPos]}', result='$phonetic']", 'debug');

                $found = true;
                break;

            }

            // character in name that is not in table -- e.g., space
            if( !$found ) {
                $this->dbg('Not found: ' . substr($input, $i, 1), 'debug');
                $patternLength = 1;
            }

            $i += $patternLength;

        }

        $this->dbg("After language rules: '$phonetic'", 'debug');

        // Apply common rules
        $phonetic = $this->applyFinalRules($phonetic, $finalRules1, $languageArg, false);

        // Apply lang specific rules
        $phonetic = $this->applyFinalRules($phonetic, $finalRules2, $languageArg, true);

        return $phonetic;

    }


    /**
     * Retrieve language index by it's code from $this->languages array
     *
     * @param  int $code language code
     * @return int
     */
    private function getLanguageIndexFromCode($code)
    {

        // code out of range
        if ($code < 0 || $code > pow(2, count($this->languages)-1)) {
            return 0;
        }

        $log    = log($code, 2);
        $result = floor($log);

        // choice was more than one language, so use "any"
        if ($result != $log) {
            $result = $this->getLanguageIndexFromName('any');
        }

        return intval($result);

    }


    /**
     * Retrieve language index by it's name from $this->languages array
     *
     * @param  string $langName language caption
     * @return int
     */
    private function getLanguageIndexFromName($langName)
    {

        $lcount = count($this->languages);

        for ($i = 0; $i < $lcount; $i++) {
            if ($this->languages[$i] == $langName) {
                return $i;
            }
        }

        // name not found
        return 0;

    }


    /** @noinspection PhpUnusedPrivateMethodInspection
     *  Retrieve language verbose name by it's index in $this->languages array
     *
     *  @param  int $index element index in $this->languages array
     *  @return string|null
     */
    private function getLanguageNameFromIndex($index)
    {
        return array_key_exists($index, $this->languages) ? $this->languages[$index] : null;
    }


    /**
     * @param  string $phonetic    part of phonetic string
     * @param  array  $finalRules  rules array
     * @param  int    $languageArg language code
     * @param  bool   $strip       flag for normalizing language attributes
     * @return string
     */
    private function applyFinalRules($phonetic, $finalRules, $languageArg, $strip)
    {

        // optimization to save time
        if ($finalRules == '' || count($finalRules) == 0) {
            return $phonetic;
        }

        // format of $rules array
        $patternPos    = 0;
        $lcontextPos   = 1;
        $rcontextPos   = 2;
        $phoneticPos   = 3;
        $languagePos   = 4;
        $logicalPos    = 5;
        $fileName      = '';
        $patternLength = 0;

        // expand the result
        $phonetic      = $this->expand($phonetic);
        $phoneticArray = explode('|', $phonetic);
        $ph_count      = count($phoneticArray);

        // last item is name of the file
        if (count($finalRules[count($finalRules) - 1]) == 1) {
            $fileName = array_pop($finalRules);
            $fileName = $fileName[0];
        }

        $fin_count = count($finalRules);

        for ($k = 0; $k < $ph_count; $k++) {


            $this->dbg("Applying final rules from ($fileName) to $phonetic", 'debug');

            $phonetic  = $phoneticArray[$k];
            $phonetic2 = '';
            $phoneticx = $this->normalizeLanguageAttributes($phonetic, true);

            for ($i = 0; $i < strlen($phonetic);) {

                $found = false;

                // skip over language attribute
                if (substr($phonetic, $i, 1) == '[') {

                    $attribStart = $i;
                    $i++;

                    while (true) {
                        if (substr($phonetic, $i++, 1) == ']') {
                            $attribEnd  = $i;
                            $phonetic2 .= substr($phonetic, $attribStart, $attribEnd - $attribStart);
                            break;
                        }
                    }

                    continue;

                }

                for ($r = 0; $r < $fin_count; $r++) {

                    $rule          = $finalRules[$r];
                    $pattern       = $rule[$patternPos];
                    $patternLength = strlen($pattern);
                    $lcontext      = $rule[$lcontextPos];
                    $rcontext      = $rule[$rcontextPos];
                    $right         = "/^$rcontext/";
                    $left          = "/$lcontext$/";

                    // check to see if next sequence in $phonetic matches the string in the rule
                    if ($patternLength > strlen($phoneticx) - $i || substr($phoneticx, $i, $patternLength) != $pattern) { // no match
                        continue;
                    }

                    // check that right context is satisfied
                    if ($rcontext != '') {
                        if (!preg_match($right, substr($phoneticx, $i + $patternLength))) {
                            continue;
                        }
                    }

                    // check that left context is satisfied
                    if ($lcontext != '') {
                        if (!preg_match($left, substr($phoneticx, 0, $i))) {
                            continue;
                        }
                    }

                    // check to see if rule applies to languageArg (used only with "any" rules)
                    if (($languageArg != '1') && ($languagePos < count($rule))) {

                        // the required language(s) for this rule to apply
                        $language = $rule[$languagePos];

                        // do we require ALL or ANY of the required languages
                        $logical  = $rule[$logicalPos];

                        // check to see if languageArg contains all the required languages
                        if ($logical == 'ALL') {
                            if (($languageArg & $language) != $language) {
                                continue;
                            }
                        }
                        // any
                        else {
                            // check to see if languageArg contains at least one required language
                            if (($languageArg & $language) == 0) {
                                continue;
                            }
                        }
                    }

                    // check for incompatible attributes
                    $candidate = $this->applyRuleIfCompatible($phonetic2, $rule[$phoneticPos], $languageArg);

                    if ($candidate === false) {
                        $this->dbg("rejecting rule #$r because of incompatible attributes", 'debug');
                        continue;
                    }

                    $phonetic2 = $candidate;

                    $this->dbg("  after applying final rule #$r to phonetic item #$k at position $i: $phonetic2 pattern=$pattern lcontext=$lcontext rcontext=$rcontext subst=" . $rule[$phoneticPos], 'debug');

                    $found = true;
                    break;

                }

                // character in name for which there is no subsitution in the table
                if (!$found) {

                    $patternLength = 1;
                    $phonetic2    .= substr($phonetic, $i, 1);

                    $this->dbg("  no rules match for phonetic item $k at position $i: $phonetic2", 'fff');

                }

                $i += $patternLength;

            }

            $phoneticArray[$k] = $this->expand($phonetic2);

        }

        $phonetic = join('|', $phoneticArray);

        if ($strip) {
            $phonetic = $this->normalizeLanguageAttributes($phonetic, true);
        }

        if (strpos($phonetic, '|') !== false) {
            $phonetic = '(' . $this->removeDuplicateAlternates($phonetic) . ')';
        }

        return $phonetic;

    }


    /**
     * Phonetic keys deduplication
     * 
     * @param  string $phonetic almost-ready string of phonetic keys
     * @return string
     */
    private function removeDuplicateAlternates($phonetic)
    {

        $altString = $phonetic;
        $altArray  = explode('|', $altString);
        $result    = '|';
        $altcount  = 0;
        $aacount   = count($altArray);

        for ($i = 0; $i < $aacount; $i++) {

            $alt = $altArray[$i];

            if (strpos($result, "|$alt|") === false) {
                $result .= "$alt|";
                $altcount++;
            }

        }

        // remove leading and trailing |
        return substr($result, 1, strlen($result) - 2);

    }


    /**
     * Tests for compatible language rules.
     * To do so, apply the rule, expand the results, and detect alternatives with incompatible attributes,
     * then drop each alternative that has incompatible attributes and keep those that are compatible
     * if there are no compatible alternatives left, return false otherwise return the compatible alternatives.
     *
     * @param  string $phonetic
     * @param  string $target
     * @param  string $languageArg
     * @return string
     */
    private function applyRuleIfCompatible($phonetic, $target, $languageArg)
    {

        $candidate = $phonetic . $target;

        // no attributes so we need test no further
        if (strpos($candidate, '[') === false) {
            return $candidate;
        }

        // expand the result, converting incompatible attributes to [0]
        $candidate      = $this->expand($candidate);
        $candidateArray = explode('|', $candidate);

        // drop each alternative that has incompatible attributes
        $candidate = '';
        $found     = false;
        $candCount = count($candidateArray);

        for ($i = 0; $i < $candCount; $i++) {

            $thisCandidate = $candidateArray[$i];

            if ($languageArg != '1') {
                $thisCandidate = $this->normalizeLanguageAttributes($thisCandidate . "[$languageArg]", false);
            }

            if ($thisCandidate != '[0]') {

                $found = true;

                if ($candidate != '') {
                    $candidate .= '|';
                }

                $candidate .= $thisCandidate;

            }

        }

        // return false if no compatible alternatives remain
        if (!$found) {
            return false;
        }

        // return the result of applying the rule
        if (strpos($candidate, '|') !== false) {
            $candidate = "($candidate)";
        }

        return $candidate;

    }


    /**
     * @throws \Exception
     * @param  string $text
     * @param  bool $strip
     * @return string
     */
    private function normalizeLanguageAttributes($text, $strip)
    {
        
        $uninitialized = -1; // all 1's
        $attrib        = $uninitialized;

        while (($bracketStart = strpos($text, '[')) !== false) {
            
            $bracketEnd = strpos($text, ']', $bracketStart);
            
            if ($bracketEnd === false) {
                throw new \Exception("No closing square bracket: text=($text) strip=($strip)");
            }
            
            $attrib &= substr($text, $bracketStart + 1, $bracketEnd - ($bracketStart + 1));
            $text    = substr($text, 0, $bracketStart) . substr($text, $bracketEnd + 1);
            
        }
        
        if ($attrib == $uninitialized || $strip) {
            return $text;
        } 
        else if ($attrib == 0) {
            // means that the attributes were incompatible and there is no alternative here
            return '[0]';
        } 
        else {
            return $text . '[' . $attrib . ']';
        }
        
    }


    /**
     * Phonetic string expanding
     * 
     * @param  string $phonetic
     * @return string
     */
    private function expand($phonetic)
    {

        $altStart = strpos($phonetic, '(');

        if ($altStart === false) {
            return $this->normalizeLanguageAttributes($phonetic, false);
        }

        $prefix    = substr($phonetic, 0, $altStart);
        $altStart++; // get past the (
        $altEnd    = strpos($phonetic, ')', $altStart);
        $altString = substr($phonetic, $altStart, $altEnd - $altStart);
        $altEnd++; // get past the )
        $suffix    = substr($phonetic, $altEnd);
        $altArray  = explode('|', $altString);
        $result    = '';
        $altCount  = count($altArray);

        for ($i = 0; $i < $altCount; $i++) {
            $alt       = $altArray[$i];
            $alternate = $this->expand("{$prefix}{$alt}{$suffix}");

            if ($alternate != '' && $alternate != '[0]') {
                if ($result != '') {
                    $result .= '|';
                }
                $result .= $alternate;
            }

        }

        return $result;

    }


    /**
     * @param  string $input
     * @return string
     */
    private function redoLanguage($input)
    {
        return $this->getPhonetic($input, $this->getLanguageCode($input));
    }


    /**
     * Build approx common rules
     *
     * @return void
     */
    private function buildApproxCommon()
    {

        if( self::$cache && $this->readRuntime('approxCommon') ) {
            return;
        }

        // Path to common rules
        $commonDir = __DIR__."/bm/common/{$this->type}";

        /** @noinspection PhpIncludeInspection */ $exactApproxCommon  = require "$commonDir/exactApprox.php";
        /** @noinspection PhpIncludeInspection */ $approxCommon       = require "$commonDir/approx.php";
        /** Build approx common ruleset        */ $this->approxCommon = array_merge($exactApproxCommon, $approxCommon);

        $this->writeRuntime('approxCommon');

    }


    /**
     * Build phonetics system, processing rules and approx rules
     *
     * @return void
     */
    private function buildPhonetics()
    {

        if( self::$cache && $this->readRuntime('approx') && $this->readRuntime('rules') ) {
            return;
        }

        // Count of supported languages
        $lang_count = count($this->languages);

        // Build phonetic system from specific language rules
        for($i = 0; $i < $lang_count; $i++) {

            /** This one goes for require() instead of require_once() because some rules include other lang files */
            /** @noinspection PhpIncludeInspection */ $r = require("$this->langDir/" . $this->languages[$i] . '/rules.php');
            /** @noinspection PhpIncludeInspection */ $a = require("$this->langDir/" . $this->languages[$i] . '/approx.php');

            array_walk($r, [$this, 'processRules']);
            array_walk($a, [$this, 'processRules']);

            $this->rules[$i]  = array_values(array_filter($r));
            $this->approx[$i] = array_values(array_filter($a));

        }

        $this->writeRuntime('rules');
        $this->writeRuntime('approx');

    }


    /**
     * Include language recognition rules and process language tags to corresponding language codes (indexes)
     *
     * @return void
     */
    private function buildLanguageRules()
    {

        if( self::$cache && $this->readRuntime('languageRules') ) {
            return;
        }

        $lang_count = count($this->languages);
        $rules      = [0 => [], 1 => []];
        $result     = [];

        // Build phonetic system from specific language rules
        for($i = 0; $i < $lang_count; $i++) {

            // No recognition rules for 'any'
            if($this->languages[$i] == 'any') continue;

            /** This one goes for require() instead of require_once() because some rules include other lang files */
            /** @noinspection PhpIncludeInspection */ $ruleset = require("$this->langDir/{$this->languages[$i]}/recognition.php");

            foreach ($ruleset as $state => $data) {

                foreach ($data as $regex) {

                    if( array_key_exists($regex, $rules[$state]) ) {
                        $rules[$state][$regex] += $this->indexes[$this->languages[$i]];
                    }
                    else {
                        $rules[$state][$regex] = $this->indexes[$this->languages[$i]];
                    }

                }

            }

        }

        foreach ($rules as $state => $set) {
            foreach ($set as $rule => $lang) {
                $result[] = [$rule, $lang, (bool)$state];
            }
        }

        $this->languageRules = $result;
        $this->writeRuntime('languageRules');

    }


    /**
     * Process rules replacing %language% by it's indexes and skipping unsupported languages.
     * Language is considered as unsupported if rule mentions it but folder for it doesn't exist
     *
     * @param array $rule
     * @return array|null
     */
    private function processRules(&$rule)
    {

        $match = [];

        // Find if rule contains %language% and capturing language names between [%...%] one group per each [..] occurence
        if( array_key_exists(3, $rule) &&  preg_match_all('/\[(%[\w%\+]+\%)]/', $rule[3], $match)) {

            // Loop through [%...%] matches
            foreach ($match[1] as $langs) {

                $found = [];
                $sum   = 0;

                // Find and capture language names between %...%
                if( preg_match_all('/\%(\w+)\%/im', $langs, $found) ) {

                    foreach ($found[1] as $lang) {
                        if( array_key_exists($lang, $this->indexes) ) {
                            $sum += $this->indexes[$lang];
                        }
                    }

                }

                // If unsupported language found and $sum remained 0, assign 'any' language to the rule
                $rule[3] = ($sum > 0) ? str_replace($langs, $sum, $rule[3]) : str_replace($langs, '1', $rule[3]);

            }

        }

        return $rule;

    }


    /**
     * Read cached serialized data by given filename, unserializes it and sets corresponding property
     *
     * @param  string $key
     * @return bool
     */
    private function readRuntime($key)
    {

        $file = "$this->runtime/{$this->type}.$key.data";

        if( file_exists($file) ) {
            $this->{$key} = unserialize(file_get_contents($file));
            return true;
        }

        return false;

    }


    /**
     * Writes ruleset data to cache in runtime directory
     *
     * @param  string $key
     * @return void
     */
    private function writeRuntime($key)
    {

        $wr = is_writable($this->runtime);

        if(self::$cache && $wr) {
            file_put_contents("$this->runtime/{$this->type}.$key.data", serialize($this->{$key}), LOCK_EX);
        }
        elseif(!$wr) {
            $this->dbg("Runtime directory $this->runtime is not writable", 'warning');
        }

    }

}

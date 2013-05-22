<?php
/*
 * Copyright Olegs Capligins, 2013
 *
 * This file is fork of BMPM (Beider-Morse Phonetic Matching System)
 * Copyright: Stephen P. Morse, 2005.
 * Website:   http://stevemorse.org/phoneticinfo.htm
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
 */
require_once __DIR__.'/../DaitchMokotoff' . DIRECTORY_SEPARATOR . 'DMSoundex.php';

class BMSoundex extends Phonetic implements iBeiderMorse
{

    private $all;
    private $lang;
    private $rules;
    private $approx;
    private $languages;
    private $langRules;
    private $approxCommon;
    private $exactApproxCommon;


    /**
     * Empty constructor because parent constructor has private access
     */
    public function __construct()
    {

        // Supported languages list
        require(self::$type.DIRECTORY_SEPARATOR.'languages.php');

        // Language indexes
        foreach ($this->languages as $key=>$language) {
            $this->lang[$language] = pow(2, $key);
        }

        // Index sum minus 'any'
        $this->all = array_sum($this->lang) - 1;

        // Common rules included
        require(self::$type.DIRECTORY_SEPARATOR.'langRules.php');                                # $this->langRules
        require(self::$type.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'exactApprox.php'); # $this->exactApproxCommon
        require(self::$type.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'approx.php');      # $this->approxCommon

        $this->approxCommon = array_merge($this->exactApproxCommon, $this->approxCommon);

        // Language rules inclusion
        for($i=0; $i<count($this->languages); $i++) {
            require(self::$type.DIRECTORY_SEPARATOR.$this->languages[$i].DIRECTORY_SEPARATOR.'rules.php');  # $this->rules
            require(self::$type.DIRECTORY_SEPARATOR.$this->languages[$i].DIRECTORY_SEPARATOR.'approx.php'); # $this->approx
        }

    }


    /**
     * Retrieve an array of supported languages and it's internal codes.
     *
     * @return array
     */
    public function getLanguages()
    {
        return $this->lang;
    }


    /**
     * Retrieve language code.
     * The code could be value in $this->lang[] array which means exact match for language.
     * Or if there's no exact match the code is the sum if corresponding array keys.
     *
     * EXAMPLE:
     *     $phonetic->BMSoundex->getLanguageCode('Grzegoz');  // 8192   it corresponds to 'Polish'
     *     $phonetic->BMSoundex->getLanguageCode('Alexana');  // 258784 it corresponds to 'Spanish, Russian, Romanian, Portuguese, Polish, Italian, Greek Latin, German, French, English'
     *     $phonetic->BMSoundex->getLanguageCode('Эй hello'); // 1      it corresponds to 'any'
     *
     * EXAMPLE:
     *     To retrieve possible languages in a human-readable format, use getPossibleLanguages() method
     *     $phonetic->BMSoundex->getPossibleLanguages('Grzegoz'); // Array ( [0] => polish )
     *
     * @param string $input
     * @return int|null
     */
    public function getLanguageCode($input)
    {

        $input     = trim(mb_strtolower($input, 'UTF-8'));
        $remaining = $this->all;

        if(empty($input)) {
            return null;
        }

        for ($i = 0; $i < count($this->langRules); $i++) {

            list($letters, $languages, $accept) = $this->langRules[$i];

            if (preg_match($letters, $input)) {
                if ($accept) {
                    $remaining &= $languages;
                }
                else {
                    $remaining &= (~$languages) % ($this->all + 1);
                }
            }

        }

        return ($remaining == 0) ? 1 : $remaining;

    }


    /**
     * Retrieve an array of possible languages for given string
     *
     * EXAMPLE:
     *     To retrieve possible languages in a human-readable format, use getPossibleLanguages() method
     *     $phonetic->BMSoundex()->getPossibleLanguages('Grzegoz'); // Array ( [0] => polish )
     *
     * NOTE:
     *     If no matches could be found Array ( [0] => any ) will be returned
     *
     * @param $input
     * @return array|null
     */
    public function getPossibleLanguages($input)
    {

        $result = array();
        $code   = $this->getLanguageCode($input);

        if(is_null($code)) {
            return null;
        }

        foreach($this->lang AS $lang=>$id ){
            if(( $code & $id ) > 0){
                $result[] = $lang;
            }
        }

        return empty($result) ? array('any') : $result;

    }


    /**
     * Retrieve two-dimensional array of Beider-Morse phonetic keys:
     * Array(
     *     [word number] => Array(
     *          [0] => (string)phonetic key
     *          [1] => (string)phonetic key
     *          .....
     *     )
     * )
     *
     * @param $input
     * @return array|null
     */
    public function getPhoneticKeys($input)
    {

        $phonetic = $this->getPhonetic($input);

        if(empty($phonetic)) {
            return null;
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
     * Retrieve two-dimensional array of Daitch-Mokotoff keys which
     * for it's turn are based on Beider-Morse phonetic keys.
     *
     * @param $input
     * @return array|null
     */
    public function getNumericKeys($input)
    {

        $phonetic  = $this->getPhoneticKeys($input);
        $dmsoundex = new DMSoundex();
        $result    = array();

        if(empty($phonetic)) {
            return null;
        }

        // Calculate Daitch-Mokotoff keys
        for($i=0; $i<count($phonetic); $i++) {
            for($j=0; $j<count($phonetic[$i]); $j++) {
                $phonetic[$i][$j] = $dmsoundex->getWordSoundex($phonetic[$i][$j]);
            }
        }

        // Remove duplicated DM-keys
        foreach($phonetic as $el) {
            $result[] = array_unique($el);
        }

        return $result;

    }


    /**
     * Calculate BM-Soundex keys
     *
     * @param string $input
     * @param string $langCode
     * @param bool $concat
     * @return string
     */
    private function getPhonetic($input, $langCode='', $concat=false)
    {

        // Filter input
        $input = mb_strtolower(trim($input), mb_detect_encoding($input));
        $input = trim(str_replace('-', ' ', $input));

        // Assigning vars
        $langCode = (empty($langCode)) ? $this->getLanguageCode($input) : $langCode;
        $rules    = $this->rules[ $this->getLanguageIndexByCode($langCode) ];
        $approx   = $this->approx[ $this->getLanguageIndexByCode($langCode) ];

        // both discard and concatenate certain words if at the start of the name
        if (self::$type != 'ash' && self::$type != 'sep') {

            $list = array('da', 'dal', 'de', 'del', 'dela', 'de la', 'della', 'des', 'di', 'do', 'dos', 'du', 'van', 'von');

            // discard certain words at start of the name, including d'
            for ($j = 0; $j < count($list); $j++) {

                $prefix       = $list[$j] . ' ';
                $prefixLength = strlen($prefix);

                // check for words from list
                if (substr($input, 0, $prefixLength) == $prefix) {

                    $reminder = substr($input, $prefixLength);
                    $combined = $list[$j] . $reminder;

                    return $this->redoLanguage($reminder, $concat) . '-' . $this->redoLanguage($combined, $concat);

                }
                // check for d'
                elseif (substr($input, 0, 2) == "d'") {

                    $reminder = substr($input, 2);
                    $combined = "d$reminder";

                    return $this->redoLanguage($reminder, $concat) . '-' . $this->redoLanguage($combined, $concat);

                }

            }

        }

        $words  = explode(' ', $input);
        $words2 = array();

        // sephardic
        if (self::$type == 'sep') {

            // for each word in the name, delete portions of word preceding apostrophe
            // ex: d'avila d'aguilar --> avila aguilar
            // also discard certain words in the name

            $list = array('al', 'el', 'da', 'dal', 'de', 'del', 'dela', 'de la', 'della', 'des', 'di', 'do', 'dos', 'du', 'van', 'von');

            // note that we can never get a match on "de la" because we are checking single words below
            // this is a bug, but I won't try to fix it now

            // process each word in the name
            for ($i = 0; $i < count($words); $i++) {

                $parts  = explode("'", $words[$i]);   // create array of each part between apostrophes
                $word   = $parts[count($parts) - 1];  // take the last part only
                $inlist = false;

                // discard certain words in the name
                for ($j = 0; $j < count($list); $j++) {
                    if ($word == $list[$j]) {
                        $inlist = true;
                        break;
                    }
                }

                // discard certain words
                if (!$inlist) {
                    $words2[count($words2)] = $word;
                }

            }

        }

        // ashkenazic
        elseif (self::$type == 'ash') {

            // discard certain words if at the start of the name
            $list = array('bar', 'ben', 'da', 'de', 'van', 'von');

            // process each word in the name
            for ($i = 0; $i < count($words); $i++) {

                $word   = $words[$i];
                $inlist = false;

                // at first word of a multi-word name
                if ($i == 0 && count($words) > 1) {

                    // discard certain words in the name
                    for ($j = 0; $j < count($list); $j++) {
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

        // general
        else {
            $words2 = $words;
        }


        // concatenate the separate words of a multi-word name (normally used for exact matches)
        if ($concat) {
            $input = implode(' ' , $words2);
        }
        // not a multi-word name
        elseif (count($words2) == 1) {
            $input = $words2[0];
        }
        // encode each word in a multi-word name separately (normally used for approx matches)
        else {

            $result = '';

            for ($i = 0; $i < count($words2); $i++) {
                $word   = $words2[$i];
                $result.= '-' . $this->redoLanguage($word, $concat);
            }

            // strip off the leading dash
            return substr($result, 1);

        }


        $inputLength = strlen($input);
        $patternPos  = 0;
        $lcontextPos = 1;
        $rcontextPos = 2;
        $phoneticPos = 3;
        $languagePos = 4;
        $logicalPos  = 5;
        $phonetic    = '';

        $fileName = ''; // will be used when debugging
        if (count($rules[count($rules) - 1]) == 1) { // last item is name of the file
            $fileName = array_pop($rules);
            $fileName = $fileName[0];
        }

        if (self::DEBUG) {
            echo "<pre>Applying language rules from '$fileName' to <b>$input</b> using languages <b>$langCode</b>\n\n";
            echo "\tchar codes =";
            for ($i = 0; $i < strlen($input); $i++) {
                echo ' [#' . strtoupper(dechex(ord($input[$i]))) . ']' . $input[$i];
            }
            echo "\n\n";
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
                $left  = "/$lcontext" . '$' . "/";

                // check that right context is satisfied
                if ($rcontext != "") {
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
                if (($langCode != '1') && ($languagePos < count($rule))) {

                    $language = $rule[$languagePos]; // the required language(s) for this rule to apply
                    $logical  = $rule[$logicalPos];  // do we require ALL or ANY of the required languages

                    if ($logical == 'ALL') {

                        // check to see if languageArg contains all the required languages
                        if (($langCode & $language) != $language) {
                            continue;
                        }

                    }
                    // any
                    // check to see if languageArg contains at least one required language
                    elseif(($langCode & $language) == 0) {
                        continue;
                    }

                }

                // check for incompatible attributes
                $candidate = $this->applyRuleIfCompatible($phonetic, $rule[$phoneticPos], $langCode);

                if ($candidate === false) {

                    if (self::DEBUG) {
                        echo "\trejecting rule #$r because of incompatible attributes\n" .
                            "\t\tpattern=$pattern\n" .
                            "\t\tlcontext=$lcontext\n" .
                            "\t\trcontext=$rcontext\n" .
                            "\t\tsubst=" . $rule[$phoneticPos] . "\n" .
                            "\t\tresult=$phonetic\n\n";
                    }

                    continue;

                }

                $phonetic = $candidate;

                if (self::DEBUG) {
                    echo "\tapplying rule #$r\n" .
                        "\t\tpattern=$pattern\n" .
                        "\t\tlcontext=$lcontext\n" .
                        "\t\trcontext=$rcontext\n" .
                        "\t\tsubst=" . $rule[$phoneticPos] . "\n" .
                        "\t\tresult=$phonetic\n\n";
                }

                $found = true;
                break;

            }

            // character in name that is not in table -- e.g., space
            if (!$found) {
                if (self::DEBUG) echo "\t<b>Not found</b>: " . substr($input, $i, 1) . "\n\n";
                $patternLength = 1;
            }

            $i += $patternLength;

        }

        if (self::DEBUG) echo "\n\t<em>After language rules</em>: <b>$phonetic</b>\n\n";

        $phonetic = $this->applyFinalRules($phonetic, $this->approxCommon, $langCode, false); // apply common rules
        $phonetic = $this->applyFinalRules($phonetic, $approx, $langCode, true);              // apply lang specific rules

        if (self::DEBUG) echo "\n\t<em>After final rules</em>: <b>$phonetic</b>\n\n</pre>";

        return $phonetic;

    }


    /**
     * Parsing iterator
     *
     * @param string $input
     * @param string $concat
     * @return string
     */
    private function redoLanguage($input, $concat)
    {
        $languageArg = $this->getLanguageCode($input);
        return $this->getPhonetic($input, $languageArg, $concat);
    }


    /**
     * Tests for compatible language rules.
     * To do so, apply the rule, expand the results, and detect alternatives with incompatible attributes
     * then drop each alternative that has incompatible attributes and keep those that are compatible
     * if there are no compatible alternatives left, return false otherwise return the compatible alternatives
     *
     *
     * @param $phonetic
     * @param $target
     * @param $languageArg
     * @return bool|string
     */
    private function applyRuleIfCompatible($phonetic, $target, $languageArg)
    {

        // apply the rule
        $candidate = $phonetic . $target;

        // no attributes so we need test no further
        if (strpos($candidate, "[") === false) {
            return $candidate;
        }

        // expand the result, converting incompatible attributes to [0]
        $candidate      = $this->expand($candidate);
        $candidateArray = explode("|", $candidate);

        // drop each alternative that has incompatible attributes
        $candidate = '';
        $found     = false;

        for ($i = 0; $i < count($candidateArray); $i++) {

            $thisCandidate = $candidateArray[$i];

            if ($languageArg != "1") {
                $thisCandidate = $this->normalizeLanguageAttributes($thisCandidate . "[$languageArg]", false);
            }

            if ($thisCandidate != "[0]") {

                $found = true;

                if ($candidate != "") {
                    $candidate .= "|";
                }

                $candidate .= $thisCandidate;

            }

        }

        // return false if no compatible alternatives remain
        if (!$found) {
            return false;
        }

        // return the result of applying the rule
        if (strpos($candidate, "|") !== false) {
            $candidate = "($candidate)";
        }

        return $candidate;

    }


    /**
     * Expand brackets
     *
     * @param $phonetic
     * @return string
     */
    private function expand($phonetic)
    {

        $altStart = strpos($phonetic, "(");

        if ($altStart === false) {
            return $this->normalizeLanguageAttributes($phonetic, false);
        }

        $prefix    = substr($phonetic, 0, $altStart);
        $altStart++; // get past the (
        $altEnd    = strpos($phonetic, ")", $altStart);
        $altString = substr($phonetic, $altStart, $altEnd - $altStart);
        $altEnd++; // get past the )

        $suffix   = substr($phonetic, $altEnd);
        $altArray = explode("|", $altString);
        $result   = '';

        for ($i = 0; $i < count($altArray); $i++) {

            $alt       = $altArray[$i];
            $alternate = $this->expand("$prefix$alt$suffix");

            if ($alternate != "" && $alternate != "[0]") {
                if ($result != "") {
                    $result .= "|";
                }
                $result .= $alternate;
            }

        }

        return $result;

    }


    /**
     * This is applied to a single alternative at a time -- not to a parenthisized list,
     * it removes all embedded bracketed attributes, logically-ands them together, and places them at the end.
     *
     * However if strip is true, this can indeed remove embedded bracketed attributes from a parenthesized list
     *
     * @param $text
     * @param $strip
     * @return string
     */
    private function normalizeLanguageAttributes($text, $strip)
    {

        $uninitialized = -1; // all 1's
        $attrib        = $uninitialized;

        while (($bracketStart = strpos($text, "[")) !== false) {

            $bracketEnd = strpos($text, "]", $bracketStart);

            if ($bracketEnd === false) {
                echo "fatal error: no closing square bracket: text=($text) strip=($strip)<br>";
                exit;
            }

            $attrib &= substr($text, $bracketStart + 1, $bracketEnd - ($bracketStart + 1));
            $text    = substr($text, 0, $bracketStart) . substr($text, $bracketEnd + 1);

        }

        if ($attrib == $uninitialized || $strip) {
            return $text;
        }
        elseif ($attrib == 0) {
            return "[0]"; // means that the attributes were incompatible and there is no alternative here
        }
        else {
            return $text . "[" . $attrib . "]";
        }

    }


    /**
     * Approx rules applying
     *
     * @param string $phonetic
     * @param array $rules
     * @param string $languageArg
     * @param bool $strip
     * @return string
     */
    private function applyFinalRules($phonetic, $rules, $languageArg, $strip)
    {

        // optimization to save time
        if ($rules == "" || count($rules) == 0) {
            return $phonetic;
        }

        // format of $rules array
        $patternPos  = 0;
        $lcontextPos = 1;
        $rcontextPos = 2;
        $phoneticPos = 3;
        $languagePos = 4;
        $logicalPos  = 5;

        // expand the result
        $phonetic      = $this->expand($phonetic);
        $phoneticArray = explode("|", $phonetic);

        // will be used when debugging
        $fileName = "";
        if (count($rules[count($rules) - 1]) == 1) {

            // last item is name of the file
            $fileName = array_pop($rules);
            $fileName = $fileName[0];

        }

        for ($k = 0; $k < count($phoneticArray); $k++) {

            $phonetic  = $phoneticArray[$k];
            $phonetic2 = "";
            if (self::DEBUG) echo "\n\tApplying final rules from ($fileName) to $phonetic\n";

            $phoneticx = $this->normalizeLanguageAttributes($phonetic, true);

            for ($i = 0; $i < strlen($phonetic);) {

                $found = false;

                // skip over language attribute
                if (substr($phonetic, $i, 1) == "[") {

                    $attribStart = $i;
                    $i++;

                    while (true) {
                        if (substr($phonetic, $i++, 1) == "]") {
                            $attribEnd = $i;
                            $phonetic2 .= substr($phonetic, $attribStart, $attribEnd - $attribStart);
                            break;
                        }
                    }

                    continue;

                }

                for ($r = 0; $r < count($rules); $r++) {
                    $rule          = $rules[$r];
                    $pattern       = $rule[$patternPos];
                    $patternLength = strlen($pattern);
                    $lcontext      = $rule[$lcontextPos];
                    $rcontext      = $rule[$rcontextPos];

                    $right = "/^$rcontext/";
                    $left  = "/$lcontext" . '$' . "/";

                    // check to see if next sequence in $phonetic matches the string in the rule
                    if ($patternLength > strlen($phoneticx) - $i || substr($phoneticx, $i, $patternLength) != $pattern) { // no match
                        continue;
                    }

                    // check that right context is satisfied
                    if ($rcontext != "") {
                        if (!preg_match($right, substr($phoneticx, $i + $patternLength))) {
                            continue;
                        }
                    }

                    // check that left context is satisfied
                    if ($lcontext != "") {
                        if (!preg_match($left, substr($phoneticx, 0, $i))) {
                            continue;
                        }
                    }

                    // check to see if rule applies to languageArg (used only with "any" rules)
                    if (($languageArg != "1") && ($languagePos < count($rule))) {

                        $language = $rule[$languagePos]; // the required language(s) for this rule to apply
                        $logical  = $rule[$logicalPos];  // do we require ALL or ANY of the required languages

                        if ($logical == "ALL") {

                            // check to see if languageArg contains all the required languages
                            if (($languageArg & $language) != $language) {
                                continue;
                            }

                        }
                        // any
                        else {

                            if (($languageArg & $language) == 0) {
                                // check to see if languageArg contains at least one required language
                                continue;
                            }

                        }

                    }

                    // check for incompatible attributes
                    $candidate = $this->applyRuleIfCompatible($phonetic2, $rule[$phoneticPos], $languageArg);

                    if ($candidate === false) {
                        if (self::DEBUG) echo "\tRejecting rule #$r because of incompatible attributes\n";
                        continue;
                    }

                    $phonetic2 = $candidate;

                    if (self::DEBUG) echo "\t\tAfter applying final rule #$r to phonetic item #$k at position $i: <b>$phonetic2</b> pattern=$pattern lcontext=$lcontext rcontext=$rcontext subst=" . $rule[$phoneticPos] . "\n";
                    $found = true;
                    break;

                }

                if (!$found) { // character in name for which there is no subsitution in the table

                    $phonetic2    .= substr($phonetic, $i, 1);
                    $patternLength = 1;

                    if (self::DEBUG) echo "\t\tNo rules match for phonetic item $k at position $i: <b>$phonetic2</b>\n";

                }

                $i += $patternLength;

            }

            $phoneticArray[$k] = $this->expand($phonetic2);

        }

        $phonetic = implode("|", $phoneticArray);

        if ($strip) {
            $phonetic = $this->normalizeLanguageAttributes($phonetic, true);
        }

        if (strpos($phonetic, "|") !== false) {
            $phonetic = "(" . $this->removeDuplicates($phonetic) . ")";
        }

        return $phonetic;

    }


    /**
     * Remove duplicate keys
     *
     * @param $phonetic
     * @return string
     */
    private function removeDuplicates($phonetic)
    {

        $altString = $phonetic;
        $altArray  = explode("|", $altString);

        $result   = "|";
        $altcount = 0;

        for ($i = 0; $i < count($altArray); $i++) {
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
     * Retrieve language index from $this->language array by $this->getLanguageCode() result code.
     * INT(0) is returned if code not found or if code contains sum of multiple languages
     *
     * EXAMPLE:
     *     $this->getLanguageIndexByCode(338616); // int(0)  // corresponds to multiple languages
     *     $this->getLanguageIndexByCode(1024);   // int(10) // corresponds to 'hebrew'
     *
     * NOTE:
     *    E_USER_WARNING will be throwed if $code is not an integer.
     *
     * @param $code
     * @return float|int|null
     */
    private function getLanguageIndexByCode($code)
    {

        if ($code < 0 || $code > pow(2, count($this->languages) - 1)) { // code out of range
            return 0;
        }

        $log    = log($code, 2);
        $result = floor($log);

        // choice was more than one language, so use "any"
        if ($result != $log) {
            $result = $this->getLanguageIndexByName("any");
        }

        return $result;

    }


    /**
     * Retrieve language index from $this->language array by it's name.
     * NULL is returned if language not found.
     *
     * EXAMPLE:
     *     $this->getLanguageIndexByName( 'any' );       // 0
     *     $this->getLanguageIndexByName( 'russian' );   // 16
     *     $this->getLanguageIndexByName( 'japanese' );  // NULL
     *
     * USED:
     *     Method is used in $type/$language/*.php files for rules array creation
     *
     * @param $name
     * @return null|int
     */
    private function getLanguageIndexByName($name)
    {
        $res = array_search($name, $this->languages);
        return ($res===false) ? null : $res;
    }

}
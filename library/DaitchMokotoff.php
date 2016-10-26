<?php
/*
 * Copyright Stephen P. Morse, 2005
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
class DaitchMokotoff extends Core
{

    /**
     * @var string
     */
    private $firstLetter = 'a';

    /**
     * @var string
     */
    private $lastLetter = 'z';

    /**
     * @var string
     */
    private $vowels = "aeioujy";

    /**
     * @var string
     */
    private $xruleslist = "!rz!ch!ck!c!!j!";

    /**
     * @var array
     */
    private $rules = [];

    /**
     * @var array
     */
    private $xrules = [];


    /**
     * @ignore
     */
    public function __construct()
    {
        $this->rules  = require "dm/rules.php";
        $this->xrules = require "dm/xrules.php";
    }


    /**
     * Split string by spaces and/or basic punctuation marks and return an array of
     * corresponding Daitch-Mokotoff soundex keys.
     * <p></p>
     * <p>EXAMPLES:</p>
     *     $phonetic->DMSoundex->getSoundex('hello world'); // array ( [0]=> "580000" [1]=> "798300" )
     *     $phonetic->DMSoundex->getSoundex('hack');        // array ( [0]=> "550000 545000" )
     *     $phonetic->DMSoundex->getSoundex('Ivan');        // array ( [0]=> "076000" )
     * <p></p>
     * <p>NOTES:</p>
     *     - If method fails, an empty array will be returned
     *     - Non-latin symbols are not supported
     *
     * @param  string $input
     * @return array
     */
    public function soundex($input = null)
    {

        $result = [];
        $input  = empty($input) ? self::$input : $input;
        $input  = preg_replace('/ v | v\. | vel | aka | f | f. | r | r. | false | recte | on zhe /i', '/', $input);
        $input  = trim($input);

        if(empty($input)) {
            return [];
        }

        // append soundex of each individual word
        // use space or comma as token delimiter
        $inputArray = preg_split('/\s+|[,\.;:-]\s*/im', $input);

        for ($i = 0; $i < count($inputArray); $i++) {

            if (strlen($inputArray[$i]) > 0) {

                $subres = $this->process($inputArray[$i]);

                if(!empty($subres)) {
                    $result[] = explode(" ", $subres);
                }

            }

        }

        return $result;

    }


    /**
     * Calculation of D-M Soundex key for input word.
     *
     * @param  string $input
     * @return string
     */
    private function process($input)
    {

        $input     = mb_strtolower($input);
        $remaining = $input;
        $result    = '';

        while (strlen($remaining) > 0) {

            $current_substring = "";
            $remaining_length  = strlen($remaining);

            for ($i = 0; $i < strlen($remaining); $i++) {

                if (($remaining[$i] >= $this->firstLetter && $remaining[$i] <= $this->lastLetter) || $remaining[$i] == '/' || $remaining[$i] == ' ') {

                    if ($remaining[$i] == '/') {
                        $remaining = substr($remaining, $i + 1);
                        break;
                    }
                    else {
                        if ($remaining[$i] != ' ') {
                            $current_substring .= $remaining[$i];
                        }
                    }
                }
                else {
                    if ($remaining[$i] == "(") {
                        $remaining = substr($remaining, $i + 1); // Gary added
                        break;
                    }
                }
            }

            $this->dbg(sprintf("pt1 MyStr='%s', MyStr2='%s', MyStr3='%s'", $input, $current_substring, $remaining), 'debug');

            if ($i == $remaining_length) {
                $remaining = ''; // finished
            }

            $input    = $current_substring;
            $dm       = '';
            $allblank = true;

            for ($k = 0; $k < strlen($input); $k++) {
                if ($input[$k] != ' ') {
                    $allblank = false;
                    break;
                }
            }

            if (!$allblank) {

                $this->dbg(sprintf("pt2 MyStr='%s', MyStr2='%s', MyStr3='%s'\n", $input, $current_substring, $remaining), 'debug');

                $dim_dm2   = 1;
                $dm2       = [];
                $dm2[0]    = "";
                $first     = 1;
                $lastdm    = [];
                $lastdm[0] = "";

                while (strlen($input) > 0) {

                    // loop through the rules
                    for ($rule = 0; $rule < count($this->rules); $rule++) {

                        // match found
                        if (substr($input, 0, strlen($this->rules[$rule][0])) == $this->rules[$rule][0]) {

                            //check for $xrules branch
                            $xr = "!" . $this->rules[$rule][0] . "!";

                            if (strpos($this->xruleslist, $xr) !== false) {

                                $xr = strpos($this->xruleslist, $xr) / 3;

                                for ($dmm = $dim_dm2; $dmm < 2 * $dim_dm2; $dmm++) {
                                    $dm2[$dmm]    = $dm2[$dmm - $dim_dm2];
                                    $lastdm[$dmm] = $lastdm[$dmm - $dim_dm2];
                                }

                                $dim_dm2 = 2 * $dim_dm2;

                            }
                            else {
                                $xr = -1;
                            }

                            $dm = $dm . "_" . $this->rules[$rule][0];

                            if (strlen($input) > strlen($this->rules[$rule][0])) {
                                $input = substr($input, strlen($this->rules[$rule][0]));
                            }
                            else {
                                $input = "";
                            }

                            // If first rule hit
                            if ($first == 1) {

                                $dm2[0]    = $this->rules[$rule][1];
                                $first     = 0;
                                $lastdm[0] = $this->rules[$rule][1];

                                if ($xr >= 0) {
                                    $dm2[1] = $this->xrules[$xr][1];
                                    $lastdm[1] = $this->xrules[$xr][1];
                                }

                            }
                            // If after first rule hit
                            else {

                                $dmnumber = 1;

                                if ($dim_dm2 > 1) {
                                    $dmnumber = $dim_dm2 / 2;
                                }

                                // if 1st position is a vowel
                                if (strlen($input) > 0 && strpos($this->vowels, $input[0]) !== false) {

                                    $this->dbg(sprintf("pt2b vowel: '%s'\n", $input[0]), 'debug');

                                    for ($ii = 0; $ii < $dmnumber; $ii++) {

                                        if ($this->rules[$rule][2] != "999" && $this->rules[$rule][2] != $lastdm[$ii]) {
                                            $lastdm[$ii] = $this->rules[$rule][2];
                                            $dm2[$ii]   .= $this->rules[$rule][2];
                                        }
                                        else if ($this->rules[$rule][3] == 999) {
                                            // reset $lastdm if vowel is encountered but not if adjacent consonants
                                            $lastdm[$ii] = "";
                                        }

                                    }

                                    if ($dim_dm2 > 1) {

                                        for ($ii = $dmnumber; $ii < $dim_dm2; $ii++) {

                                            if ($xr >= 0 && $this->xrules[$xr][2] != "999" && $this->xrules[$xr][2] != $lastdm[$ii]) {
                                                $lastdm[$ii] = $this->xrules[$xr][2];
                                                $dm2[$ii]   .= $this->xrules[$xr][2];
                                            }
                                            else {

                                                if ($xr < 0 && $this->rules[$rule][2] != "999" && $this->rules[$rule][2] != $lastdm[$ii]) {
                                                    $lastdm[$ii] = $this->rules[$rule][2];
                                                    $dm2[$ii]   .= $this->rules[$rule][2];
                                                }
                                                else if ($this->rules[$rule][3] == 999) {
                                                    // reset $lastdm if vowel is encountered but not if adjacent consonants
                                                    $lastdm[$ii] = "";
                                                }

                                            }

                                        }

                                    }

                                    $this->dbg(sprintf("pt2c vowel: '%s'  done\n", $input[0]), 'debug');

                                }

                                // 1st position not a vowel
                                else {

                                    for ($ii = 0; $ii < $dmnumber; $ii++) {

                                        $this->dbg("pt2d lastdm: ".var_export($lastdm, true), 'debug');

                                        if ($this->rules[$rule][3] != "999" && $this->rules[$rule][3] != $lastdm[$ii]) {
                                            $lastdm[$ii] = $this->rules[$rule][3];
                                            $dm2[$ii]   .= $this->rules[$rule][3];
                                        }
                                        else if ($this->rules[$rule][3] == 999) {
                                            // reset $lastdm if vowel is encountered but not if adjacent consonants
                                            $lastdm[$ii] = "";
                                        }

                                    }

                                    if ($dim_dm2 > 1) {

                                        for ($ii = $dmnumber; $ii < $dim_dm2; $ii++) {

                                            $this->dbg("pt2e checking xrules", 'debug');

                                            if ($xr >= 0 && $this->xrules[$xr][3] != "999" && $this->xrules[$xr][3] != $lastdm[$ii]) {
                                                $lastdm[$ii] = $this->xrules[$xr][3];
                                                $dm2[$ii]   .= $this->xrules[$xr][3];
                                            }
                                            else {
                                                if ($xr < 0 && $this->rules[$rule][3] != "999" && $this->rules[$rule][3] != $lastdm[$ii]) {
                                                    $lastdm[$ii] = $this->rules[$rule][3];
                                                    $dm2[$ii]   .= $this->rules[$rule][3];
                                                }
                                                else if ($this->rules[$rule][3] == 999) {
                                                    // reset $lastdm if vowel is encountered but not if adjacent consonants
                                                    $lastdm[$ii] = "";
                                                }
                                            }
                                        }

                                    } // end of dim_dm2 > 1

                                }  // end of not a vowel

                            }

                            // stop looping through rules
                            break;

                        } // end of match found

                    } // end of looping through the rules

                } // end of while (strlen($input)) > 0)

                $this->dbg("pt4 dm2: ".var_export($dm2, true), 'debug');

                $dm = '';

                for ($ii = 0; $ii < $dim_dm2; $ii++) {

                    $dm2[$ii] = substr($dm2[$ii] . "000000", 0, 6);

                    if ($ii == 0 && strpos($dm, $dm2[$ii]) === false && strpos($result, $dm2[$ii]) === false) {
                        $dm = $dm2[$ii];
                    }
                    else {

                        if (strpos($dm, $dm2[$ii]) === false && strpos($result, $dm2[$ii]) === false) {

                            if (strlen($dm) > 0) {
                                $dm = $dm . ' ' . $dm2[$ii];
                            }
                            else {
                                $dm = $dm2[$ii];

                            }

                        }

                    }

                }

                $this->dbg("pt3 - dm3 '" . $result . "' dm '" . $dm, 'debug');

                if (strlen($result) > 0 && strlen($dm) > 0 && strpos($result, $dm) === false) {
                    $result = $result . ' ' . $dm;
                }
                elseif(strlen($dm) > 0) {
                    $result = $dm;
                }

            } // end of if(!$allblank)

        } // end of while

        return $result;

    }

}

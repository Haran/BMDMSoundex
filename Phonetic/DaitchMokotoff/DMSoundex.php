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

class DMSoundex extends Phonetic implements iDaitchMokotoff
{

    private $vowels;
    private $newrules;
    private $xnewrules;
    private $lastLetter;
    private $firstLetter;
    private $xnewruleslist;


    /**
     * Rules linking
     */
    public function __construct()
    {
        require('langRules.php');
    }


    /**
     * Split string by spaces and/or basic punctuation marks and return an array of
     * corresponding Daitch-Mokotoff soundex keys.
     *
     * EXAMPLE:
     *     $phonetic->DMSoundex->getSoundex('hello world'); // array ( [0]=> "580000" [1]=> "798300" )
     *     $phonetic->DMSoundex->getSoundex('hack');        // array ( [0]=> "550000 545000" )
     *     $phonetic->DMSoundex->getSoundex('Ivan');        // array ( [0]=> "076000" )
     *
     * NOTE:
     *     If method fails, NULL will be returned
     *     Non-latin symbols are not supported
     *
     * @param string $input
     * @return array|null
     */
    public function getSoundex($input)
    {

        $result = array();
        $input  = preg_replace('/ v | v\. | vel | aka | f | f. | r | r. | false | recte | on zhe /i', '/', $input);
        $input  = trim($input);

        if(empty($input)) {
            return null;
        }

        // append soundex of each individual word
        // use space or comma as token delimiter
        $inputArray = preg_split('/\s+|[,\.;:-]\s*/im', $input);

        for ($i = 0; $i < count($inputArray); $i++) {

            if (strlen($inputArray[$i]) > 0) {

                $subres = $this->getWordSoundex($inputArray[$i]);

                if(!empty($subres)) {
                    $result[] = $subres;
                }

            }

        }

        return (empty($result)) ? null : $result;

    }


    /**
     * Calculation of D-M Soundex key for input word.
     * Method has public access, for usage in BMSoundex()
     * All external calls should access getSoundex() method even for a single word.
     *
     * @param string $input
     * @return string
     */
    public function getWordSoundex($input)
    {

        $remaining = $input = strtolower($input);
        $result    = '';

        while (strlen($remaining) > 0) {

            $current_substr = '';
            $remain_length  = strlen($remaining);

            for ($i = 0; $i < strlen($remaining); $i++) {

                if (($remaining[$i] >= $this->firstLetter && $remaining[$i] <= $this->lastLetter) || $remaining[$i] == '/' || $remaining[$i] == ' ') {

                    if ($remaining[$i] == '/') {
                        $remaining = substr($remaining, $i + 1);
                        break;
                    }
                    elseif ($remaining[$i] != ' ') {
                        $current_substr .= $remaining[$i];
                    }

                }
                elseif ($remaining[$i] == "(") {
                    $remaining = substr($remaining, $i + 1); // Gary added
                    break;
                }

            }

            if (self::DEBUG) printf("pt1 input='%s', current_substr='%s', remaining='%s'\n", $input, $current_substr, $remaining);

            // finished
            if ($i == $remain_length) {
                $remaining = '';
            }

            $input    = $current_substr;
            $dm       = '';
            $allblank = true;

            for ($k = 0; $k < strlen($input); $k++) {
                if ($input[$k] != ' ') {
                    $allblank = false;
                    break;
                }
            }

            if (!$allblank) {

                if (self::DEBUG) printf("pt2 input='%s', current_substr='%s', remaining='%s'\n", $input, $current_substr, $remaining);

                $dim_dm2   = 1;
                $dm2       = array();
                $dm2[0]    = '';
                $first     = 1;
                $lastdm    = array();
                $lastdm[0] = '';

                while (strlen($input) > 0) {

                    // loop through the rules
                    for ($rule = 0; $rule < count($this->newrules); $rule++) {

                        // match found
                        if (substr($input, 0, strlen($this->newrules[$rule][0])) == $this->newrules[$rule][0]) {

                            //check for $xnewrules branch
                            $xr = "!" . $this->newrules[$rule][0] . "!";
                            if (strpos($this->xnewruleslist, $xr) !== false) {

                                $xr = strpos($this->xnewruleslist, $xr) / 3;

                                for ($dmm = $dim_dm2; $dmm < 2 * $dim_dm2; $dmm++) {
                                    $dm2[$dmm]    = $dm2[$dmm - $dim_dm2];
                                    $lastdm[$dmm] = $lastdm[$dmm - $dim_dm2];
                                }

                                $dim_dm2 = 2 * $dim_dm2;

                            }
                            else {
                                $xr = -1;
                            }

                            $dm = $dm . "_" . $this->newrules[$rule][0];

                            if (strlen($input) > strlen($this->newrules[$rule][0])) {
                                $input = substr($input, strlen($this->newrules[$rule][0]));
                            }
                            else {
                                $input = "";
                            }

                            // If first rule hit
                            if ($first == 1) {

                                $dm2[0]    = $this->newrules[$rule][1];
                                $first     = 0;
                                $lastdm[0] = $this->newrules[$rule][1];

                                if ($xr >= 0) {
                                    $dm2[1]    = $this->xnewrules[$xr][1];
                                    $lastdm[1] = $this->xnewrules[$xr][1];
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

                                    if (self::DEBUG) printf("pt2b vowel: '%s'\n", $input[0]);

                                    for ($ii = 0; $ii < $dmnumber; $ii++) {

                                        if ($this->newrules[$rule][2] != "999" && $this->newrules[$rule][2] != $lastdm[$ii]) {
                                            $lastdm[$ii] = $this->newrules[$rule][2];
                                            $dm2[$ii]   .= $this->newrules[$rule][2];
                                        }
                                        // reset $lastdm if vowel is encountered but not if adjacent consonants
                                        elseif ($this->newrules[$rule][3] == 999) {
                                            $lastdm[$ii] = "";
                                        }

                                    }

                                    if ($dim_dm2 > 1) {
                                        for ($ii = $dmnumber; $ii < $dim_dm2; $ii++) {

                                            if ($xr >= 0 && $this->xnewrules[$xr][2] != "999" && $this->xnewrules[$xr][2] != $lastdm[$ii]) {
                                                $lastdm[$ii] = $this->xnewrules[$xr][2];
                                                $dm2[$ii]   .= $this->xnewrules[$xr][2];
                                            }

                                            else {

                                                if ($xr < 0 && $this->newrules[$rule][2] != "999" && $this->newrules[$rule][2] != $lastdm[$ii]) {
                                                    $lastdm[$ii] = $this->newrules[$rule][2];
                                                    $dm2[$ii]   .= $this->newrules[$rule][2];
                                                }
                                                // reset $lastdm if vowel is encountered but not if adjacent consonants
                                                elseif ($this->newrules[$rule][3] == 999) {
                                                    $lastdm[$ii] = "";
                                                }

                                            }

                                        }
                                    }

                                    if (self::DEBUG) printf("pt2c vowel: '%s'  done\n", $input[0]);

                                }
                                // 1st position not a vowel
                                else {

                                    for ($ii = 0; $ii < $dmnumber; $ii++) {

                                        if (self::DEBUG) echo "pt2d lastdm:\n";
                                        if (self::DEBUG) print_r($lastdm);

                                        if ($this->newrules[$rule][3] != "999" && $this->newrules[$rule][3] != $lastdm[$ii]) {
                                            $lastdm[$ii] = $this->newrules[$rule][3];
                                            $dm2[$ii]   .= $this->newrules[$rule][3];
                                        }
                                        // reset $lastdm if vowel is encountered but not if adjacent consonants
                                        elseif ($this->newrules[$rule][3] == 999) {
                                            $lastdm[$ii] = "";
                                        }

                                    }

                                    if ($dim_dm2 > 1) {

                                        for ($ii = $dmnumber; $ii < $dim_dm2; $ii++) {

                                            if (self::DEBUG) echo "pt2e checking xrules\n";

                                            if ($xr >= 0 && $this->xnewrules[$xr][3] != "999" && $this->xnewrules[$xr][3] != $lastdm[$ii]) {
                                                $lastdm[$ii] = $this->xnewrules[$xr][3];
                                                $dm2[$ii]   .= $this->xnewrules[$xr][3];
                                            }
                                            else {

                                                if ($xr < 0 && $this->newrules[$rule][3] != "999" && $this->newrules[$rule][3] != $lastdm[$ii]) {
                                                    $lastdm[$ii] = $this->newrules[$rule][3];
                                                    $dm2[$ii]   .= $this->newrules[$rule][3];
                                                }
                                                // reset $lastdm if vowel is encountered but not if adjacent consonants
                                                elseif ($this->newrules[$rule][3] == 999) {
                                                    $lastdm[$ii] = "";
                                                }

                                            }

                                        }

                                    } // end of dim_dm2 > 1

                                } // end of not a vowel

                            }

                            // stop looping through rules
                            break;

                        } // end of match found

                        if (self::DEBUG) echo "end of pt2a\n";

                    } // end of looping through the rules

                } // end of while (strlen($input)) > 0)

                if (self::DEBUG) {
                    echo "pt4 dm2:";
                    print_r($dm2);
                }

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
                            } else {
                                $dm = $dm2[$ii];
                            }

                        }

                    }

                }

                if (self::DEBUG) echo "pt3 - dm3 '" . $result . "' dm '" . $dm . "'\n";

                if (strlen($result) > 0 && strlen($dm) > 0 && strpos($result, $dm) === false) {
                    $result = $result . ' ' . $dm;
                }
                elseif (strlen($dm) > 0) {
                    $result = $dm;
                }

            } // end of if (!$allblank)

        } // end of while (strlen($remaining) > 0)

        return $result;

    }

}
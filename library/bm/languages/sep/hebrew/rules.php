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

// Sephardic
$this->rules[ $this->getLanguageIndexByName('hebrew') ] = array(

    array("אי", "", "", "i"),
    array("עי", "", "", "i"),
    array("עו", "", "", "VV"),
    array("או", "", "", "VV"),

    array("ג׳", "", "", "Z"),
    array("ד׳", "", "", "dZ"),

    array("א", "", "", "L"),
    array("ב", "", "", "b"),
    array("ג", "", "", "g"),
    array("ד", "", "", "d"),

    array("ה", "^", "", "1"),
    array("ה", "", "$", "1"),
    array("ה", "", "", ""),

    array("וו", "", "", "V"),
    array("וי", "", "", "WW"),
    array("ו", "", "", "W"),
    array("ז", "", "", "z"),
    array("ח", "", "", "X"),
    array("ט", "", "", "T"),
    array("יי", "", "", "i"),
    array("י", "", "", "i"),
    array("ך", "", "", "X"),
    array("כ", "^", "", "K"),
    array("כ", "", "", "k"),
    array("ל", "", "", "l"),
    array("ם", "", "", "m"),
    array("מ", "", "", "m"),
    array("ן", "", "", "n"),
    array("נ", "", "", "n"),
    array("ס", "", "", "s"),
    array("ע", "", "", "L"),
    array("ף", "", "", "f"),
    array("פ", "", "", "f"),
    array("ץ", "", "", "C"),
    array("צ", "", "", "C"),
    array("ק", "", "", "K"),
    array("ר", "", "", "r"),
    array("ש", "", "", "s"),
    array("ת", "", "", "T"), // Special for Sephardim

    array("ruleshebrew")

);
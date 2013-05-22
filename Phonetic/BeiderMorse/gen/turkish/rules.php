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

$this->rules[ $this->getLanguageIndexByName('turkish') ] = array(

    array("ç","","","tS"),
    array("ğ","","",""), // to show that previous vowel is long
    array("ş","","","S"),
    array("ü","","","Q"),
    array("ö","","","Y"),
    array("ı","","","(e|i|)"), // as "e" in English "label"

    array("a","","","a"),
    array("b","","","b"),
    array("c","","","dZ"),
    array("d","","","d"),
    array("e","","","e"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","i"),
    array("j","","","Z"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","k"),  // foreign words
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("w","","","v"),  // foreign words
    array("x","","","ks"), // foreign words
    array("y","","","j"),
    array("z","","","z"),

    array("turkish")

);
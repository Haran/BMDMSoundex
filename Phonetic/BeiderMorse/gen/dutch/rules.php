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

$this->rules[ $this->getLanguageIndexByName('dutch') ] = array(

    // CONSONANTS
    array("ssj", "", "", "S"),
    array("sj", "", "", "S"),
    array("ch", "", "", "x"),
    array("c", "", "[eiy]", "ts"),
    array("ck", "", "", "k"),        // German
    array("pf", "", "", "(pf|p|f)"), // German
    array("ph", "", "", "(ph|f)"),
    array("qu", "", "", "kv"),
    array("th", "^", "", "t"), // German
    array("th", "", "[äöüaeiou]", "(t|th)"), // German
    array("th", "", "", "t"), // German
    array("ss", "", "", "s"),
    array("h", "[aeiouy]", "", ""),

    // VOWELS
    array("aue", "", "", "aue"),
    array("ou", "", "", "au"),
    array("ie", "", "", "(Q|i)"),
    array("uu", "", "", "(Q|u)"),
    array("ee", "", "", "e"),
    array("eu", "", "", "(Y|Yj)"), // Dutch Y
    array("aa", "", "", "a"),
    array("oo", "", "", "o"),
    array("oe", "", "", "u"),
    array("ij", "", "", "ej"),
    array("ui", "", "", "(Y|uj)"),
    array("ei", "", "", "(ej|aj)"), // Dutch ej

    array("i", "", "[aou]", "j"),
    array("y", "", "[aeou]", "j"),
    array("i", "[aou]", "", "j"),
    array("y", "[aeou]", "", "j"),

    // LATIN ALPHABET
    array("a", "", "", "a"),
    array("b", "", "", "b"),
    array("c", "", "", "k"),
    array("d", "", "", "d"),
    array("e", "", "", "e"),
    array("f", "", "", "f"),
    array("g", "", "", "(g|x)"),
    array("h", "", "", "h"),
    array("i", "", "", "(i|Q)"),
    array("j", "", "", "j"),
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("o", "", "", "o"),
    array("p", "", "", "p"),
    array("q", "", "", "k"),
    array("r", "", "", "r"),
    array("s", "", "", "s"),
    array("t", "", "", "t"),
    array("u", "", "", "(u|Q)"),
    array("v", "", "", "v"),
    array("w", "", "", "(w|v)"),
    array("x", "", "", "ks"),
    array("y", "", "", "i"),
    array("z", "", "", "z"),

    array("rulesdutch")

);
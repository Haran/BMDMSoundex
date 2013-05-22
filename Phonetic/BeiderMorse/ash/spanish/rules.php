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

// Ashkenazic = Argentina
$this->rules[ $this->getLanguageIndexByName('spanish') ] = array(

    // CONSONANTS
    array("ñ", "", "", "(n|nj)"),

    array("ch", "", "", "(tS|dZ)"), // dZ is typical for Argentina
    array("h", "[bdgt]", "", ""), // translit. from Arabic
    array("h", "", "$", ""), // foreign

    array("j", "", "", "x"),
    array("x", "", "", "ks"),
    array("ll", "", "", "(l|Z)"), // Z is typical for Argentina, only Ashkenazic
    array("w", "", "", "v"), // foreign words

    array("v", "", "", "(b|v)"),
    array("b", "", "", "(b|v)"),
    array("m", "", "[bpvf]", "(m|n)"),

    array("c", "", "[ei]", "s"),
    array("c", "", "", "k"),

    array("z", "", "", "(z|s)"), // as "c" befoire "e" or "i", in Spain it is like unvoiced English "th"

    array("gu", "", "[ei]", "(g|gv)"), // "gv" because "u" can actually be "ü"
    array("g", "", "[ei]", "(x|g)"), // "g" only for foreign words

    array("qu", "", "", "k"),
    array("q", "", "", "k"),

    array("uo", "", "", "(vo|o)"),
    array("u", "", "[aei]", "v"),

    array("y", "", "", "(i|j|S|Z)"), // S or Z are peculiar to South America; only Ashkenazic

    // VOWELS
    array("ü", "", "", "v"),
    array("á", "", "", "a"),
    array("é", "", "", "e"),
    array("í", "", "", "i"),
    array("ó", "", "", "o"),
    array("ú", "", "", "u"),

    // TRIVIAL
    array("a", "", "", "a"),
    array("d", "", "", "d"),
    array("e", "", "", "E"), // Only Ashkenazic
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("h", "", "", "h"),
    array("i", "", "", "I"), // Only Ashkenazic
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("o", "", "", "o"),
    array("p", "", "", "p"),
    array("r", "", "", "r"),
    array("s", "", "", "s"),
    array("t", "", "", "t"),
    array("u", "", "", "u"),

    array("rulesspanish")

);
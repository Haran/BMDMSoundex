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

$this->rules[ $this->getLanguageIndexByName('romanian') ] = array(

    array("j", "", "", "Z"),

    array("ce", "", "", "tSe"),
    array("ci", "", "", "(tSi|tS)"),
    array("ch", "", "[ei]", "k"),
    array("ch", "", "", "x"), // foreign
    array("c", "", "", "k"),

    array("gi", "", "", "(dZi|dZ)"),
    array("g", "", "[ei]", "dZ"),
    array("gh", "", "", "g"),

    array("ei", "", "", "aj"),
    array("i", "[aou]", "", "j"),
    array("i", "", "[aeou]", "j"),
    array("ţ", "", "", "ts"),
    array("ş", "", "", "S"),
    array("h", "", "", "(x|h)"),

    array("qu", "", "", "k"),
    array("q", "", "", "k"),
    array("w", "", "", "v"),
    array("x", "", "", "ks"),
    array("y", "", "", "i"),

    array("î", "", "", "i"),
    array("ea", "", "", "ja"),
    array("ă", "", "", "(e|a)"),
    array("aue", "", "", "aue"),

    array("a", "", "", "a"),
    array("b", "", "", "b"),
    array("d", "", "", "d"),
    array("e", "", "", "E"),
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("i", "", "", "I"),
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
    array("v", "", "", "v"),
    array("z", "", "", "z"),

    array("rulesromanian")

);
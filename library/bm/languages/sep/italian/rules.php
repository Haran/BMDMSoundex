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

$this->rules[ $this->getLanguageIndexByName('italian') ] = array(

    array("kh","","","x"), // foreign

    array("gli","","","(l|gli)"),
    array("gn","","[aeou]","(n|nj|gn)"),
    array("gni","","","(ni|gni)"),

    array("gi","","[aeou]","dZ"),
    array("gg","","[ei]","dZ"),
    array("g","","[ei]","dZ"),
    array("h","[bdgt]","","g"), // gh is It; others from Arabic translit

    array("ci","","[aeou]","tS"),
    array("ch","","[ei]","k"),
    array("sc","","[ei]","S"),
    array("cc","","[ei]","tS"),
    array("c","","[ei]","tS"),
    array("s","[aeiou]","[aeiou]","z"),

    array("i","[aeou]","","j"),
    array("i","","[aeou]","j"),
    array("y","[aeou]","","j"), // foreign
    array("y","","[aeou]","j"), // foreign

    array("qu","","","k"),
    array("uo","","","(vo|o)"),
    array("u","","[aei]","v"),

    array("и","","","e"),
    array("й","","","e"),
    array("т","","","o"),
    array("у","","","o"),

    // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","k"),
    array("d","","","d"),
    array("e","","","e"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","i"),
    array("j","","","(Z|dZ|j)"), // foreign
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("w","","","v"),    // foreign
    array("x","","","ks"),    // foreign
    array("y","","","i"),    // foreign
    array("z","","","(ts|dz)"),

    array("rulesitalian")

);
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

$this->rules[ $this->getLanguageIndexByName('hungarian') ] = array(

    // CONSONANTS
    array("sz","","","s"),
    array("zs","","","Z"),
    array("cs","","","tS"),

    array("ay","","","(oj|aj)"),
    array("ai","","","(oj|aj)"),
    array("aj","","","(oj|aj)"),

    array("ei","","","(aj|ej)"), // German element
    array("ey","","","(aj|ej)"), // German element

    array("y","[áo]","","j"),
    array("i","[áo]","","j"),
    array("ee","","","(ej|e)"),
    array("ely","","","(ej|eli)"),
    array("ly","","","(j|li)"),
    array("gy","","[aeouáéóúüöőű]","dj"),
    array("gy","","","(d|gi)"),
    array("ny","","[aeouáéóúüöőű]","nj"),
    array("ny","","","(n|ni)"),
    array("ty","","[aeouáéóúüöőű]","tj"),
    array("ty","","","(t|ti)"),
    array("qu","","","(ku|kv)"),
    array("h","","$",""),

    // SPECIAL VOWELS
    array("á","","","a"),
    array("é","","","e"),
    array("í","","","i"),
    array("ó","","","o"),
    array("ú","","","u"),
    array("ö","","","Y"),
    array("ő","","","Y"),
    array("ü","","","Q"),
    array("ű","","","Q"),

    // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","ts"),
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","I"),
    array("j","","","j"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","(S|s)"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("w","","","v"),
    array("x","","","ks"),
    array("y","","","i"),
    array("z","","","z"),

    array("ruleshungarian")

);
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

// Ashkenazic
$this->rules[ $this->getLanguageIndexByName('french') ] = array(

    // CONSONANTS
    array("kh", "", "", "x"), // foreign
    array("ph", "", "", "f"),

    array("ç", "", "", "s"),
    array("x", "", "", "ks"),
    array("ch", "", "", "S"),
    array("c", "", "[eiyéèê]", "s"),
    array("c", "", "", "k"),
    array("gn", "", "", "(n|gn)"),
    array("g", "", "[eiy]", "Z"),
    array("gue", "", "$", "k"),
    array("gu", "", "[eiy]", "g"),
    //array("aill","","e","aj"), // non Jewish
    //array("ll","","e","(l|j)"), // non Jewish
    array("que", "", "$", "k"),
    array("qu", "", "", "k"),
    array("q", "", "", "k"),
    array("s", "[aeiouyéèê]", "[aeiouyéèê]", "z"),
    array("h", "[bdgt]", "", ""), // translit from Arabic
    array("h", "", "$", ""), // foreign
    array("j", "", "", "Z"),
    array("w", "", "", "v"),
    array("ouh", "", "[aioe]", "(v|uh)"),
    array("ou", "", "[aeio]", "v"),
    array("uo", "", "", "(vo|o)"),
    array("u", "", "[aeio]", "v"),

    // VOWELS
    array("aue", "", "", "aue"),
    array("eau", "", "", "o"),
    //array("au","","","(o|au)"), // non Jewish
    array("ai", "", "", "aj"), // [e] is non Jewish
    array("ay", "", "", "aj"), // [e] is non Jewish
    array("é", "", "", "e"),
    array("ê", "", "", "e"),
    array("è", "", "", "e"),
    array("à", "", "", "a"),
    array("â", "", "", "a"),
    array("où", "", "", "u"),
    array("ou", "", "", "u"),
    array("oi", "", "", "oj"), // [ua] is non Jewish
    array("ei", "", "", "aj"), // [e] is non Jewish
    array("ey", "", "", "aj"), // [e] non Jewish
    //array("eu","","","(e|o)"), // non Jewish
    array("y", "[ou]", "", "j"),
    array("e", "", "$", "(e|)"),
    array("i", "", "[aou]", "j"),
    array("y", "", "[aoeu]", "j"),
    array("y", "", "", "i"),

    // TRIVIAL
    array("a", "", "", "a"),
    array("b", "", "", "b"),
    array("d", "", "", "d"),
    array("e", "", "", "E"), // only Ashkenazic
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("h", "", "", "h"),
    array("i", "", "", "I"), // only Ashkenazic
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

    array("rulesfrench")

);
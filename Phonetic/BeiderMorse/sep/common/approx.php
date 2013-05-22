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

//Sephardic
$this->approxCommon = array(

    array("bens", "^", "", "(binz|s)"),
    array("benS", "^", "", "(binz|s)"),
    array("ben", "^", "", "(bin|)"),

    array("abens", "^", "", "(abinz|binz|s)"),
    array("abenS", "^", "", "(abinz|binz|s)"),
    array("aben", "^", "", "(abin|bin|)"),

    array("els", "^", "", "(ilz|alz|s)"),
    array("elS", "^", "", "(ilz|alz|s)"),
    array("el", "^", "", "(il|al|)"),
    array("als", "^", "", "(alz|s)"),
    array("alS", "^", "", "(alz|s)"),
    array("al", "^", "", "(al|)"),

    //array ("dels", "^", "", "(dilz|s)"),
    //array ("delS", "^", "", "(dilz|s)"),
    array("del", "^", "", "(dil|)"),
    array("dela", "^", "", "(dila|)"),
    //array ("delo", "^", "", "(dila|)"),
    array("da", "^", "", "(da|)"),
    array("de", "^", "", "(di|)"),
    //array ("des", "^", "", "(dis|dAs|)"),
    //array ("di", "^", "", "(di|)"),
    //array ("dos", "^", "", "(das|dus|)"),

    array("oa", "", "", "(va|a|D)"),
    array("oe", "", "", "(vi|D)"),
    array("ae", "", "", "D"),

    /// array ("s", "", "$", "(s|)"), // Attia(s)
    /// array ("C", "", "", "s"),  // "c" could actually be "�"

    array("n", "", "[bp]", "m"),

    array("h", "", "", "(|h|f)"), // sound "h" (absent) can be expressed via /x/, Cojab in Spanish = Kohab ; Hakim = Fakim
    array("x", "", "", "h"),

    // DIPHTHONGS ARE APPROXIMATELY equivalent
    array("aja", "^", "", "(Da|ia)"),
    array("aje", "^", "", "(Di|Da|i|ia)"),
    array("aji", "^", "", "(Di|i)"),
    array("ajo", "^", "", "(Du|Da|iu|ia)"),
    array("aju", "^", "", "(Du|iu)"),

    array("aj", "", "", "D"),
    array("ej", "", "", "D"),
    array("oj", "", "", "D"),
    array("uj", "", "", "D"),
    array("au", "", "", "D"),
    array("eu", "", "", "D"),
    array("ou", "", "", "D"),

    array("a", "^", "", "(a|)"), // Arabic

    array("ja", "^", "", "ia"),
    array("je", "^", "", "i"),
    array("jo", "^", "", "(iu|ia)"),
    array("ju", "^", "", "iu"),

    array("ja", "", "", "a"),
    array("je", "", "", "i"),
    array("ji", "", "", "i"),
    array("jo", "", "", "u"),
    array("ju", "", "", "u"),

    array("j", "", "", "i"),

    // CONSONANTS {z & Z & dZ; s & S} are approximately interchangeable
    array("s", "", "[rmnl]", "z"),
    array("S", "", "[rmnl]", "z"),
    array("s", "[rmnl]", "", "z"),
    array("S", "[rmnl]", "", "z"),

    array("dS", "", "$", "S"),
    array("dZ", "", "$", "S"),
    array("Z", "", "$", "S"),
    array("S", "", "$", "(S|s)"),
    array("z", "", "$", "(S|s)"),

    array("S", "", "", "s"),
    array("dZ", "", "", "z"),
    array("Z", "", "", "z"),

    array("i", "", "$", "(i|)"), // often in Arabic
    array("e", "", "", "i"),

    array("o", "", "$", "(a|u)"),
    array("o", "", "", "u"),

    // special character to deal correctly in Hebrew match
    array("B", "", "", "b"),
    array("V", "", "", "v"),

    // Arabic
    array("p", "^", "", "b"),

    array("exactapproxcommon plus approxcommon")

);
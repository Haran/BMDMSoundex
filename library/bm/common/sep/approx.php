<?php
/*
 * Copyright Alexander Beider and Stephen P. Morse, 2008
 * Copyright Olegs Capligins, 2013-2016
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
 *
 */

return [

    ["bens", "^", "", "(binz|s)"],
    ["benS", "^", "", "(binz|s)"],
    ["ben", "^", "", "(bin|)"],

    ["abens", "^", "", "(abinz|binz|s)"],
    ["abenS", "^", "", "(abinz|binz|s)"],
    ["aben", "^", "", "(abin|bin|)"],

    ["els", "^", "", "(ilz|alz|s)"],
    ["elS", "^", "", "(ilz|alz|s)"],
    ["el", "^", "", "(il|al|)"],
    ["als", "^", "", "(alz|s)"],
    ["alS", "^", "", "(alz|s)"],
    ["al", "^", "", "(al|)"],

    //array ("dels", "^", "", "(dilz|s)"),
    //array ("delS", "^", "", "(dilz|s)"),
    ["del", "^", "", "(dil|)"],
    ["dela", "^", "", "(dila|)"],
    //array ("delo", "^", "", "(dila|)"),
    ["da", "^", "", "(da|)"],
    ["de", "^", "", "(di|)"],
    //array ("des", "^", "", "(dis|dAs|)"),
    //array ("di", "^", "", "(di|)"),
    //array ("dos", "^", "", "(das|dus|)"),

    ["oa","","","(va|a|D)"],
    ["oe","","","(vi|D)"],
    ["ae","","","D"],

    /// array ("s", "", "$", "(s|)"), // Attia(s)
    /// array ("C", "", "", "s"),  // "c" could actually be "ли"

    ["n","","[bp]","m"],

    ["h","","","(|h|f)"], // sound "h" (absent) can be expressed via /x/, Cojab in Spanish = Kohab ; Hakim = Fakim
    ["x","","","h"],

    // DIPHTHONGS ARE APPROXIMATELY equivalent
    ["aja","^","","(Da|ia)"],
    ["aje","^","","(Di|Da|i|ia)"],
    ["aji","^","","(Di|i)"],
    ["ajo","^","","(Du|Da|iu|ia)"],
    ["aju","^","","(Du|iu)"],

    ["aj","","","D"],
    ["ej","","","D"],
    ["oj","","","D"],
    ["uj","","","D"],
    ["au","","","D"],
    ["eu","","","D"],
    ["ou","","","D"],

    ["a", "^", "", "(a|)"],  // Arabic

    ["ja","^","","ia"],
    ["je","^","","i"],
    ["jo","^","","(iu|ia)"],
    ["ju","^","","iu"],

    ["ja","","","a"],
    ["je","","","i"],
    ["ji","","","i"],
    ["jo","","","u"],
    ["ju","","","u"],

    ["j","","","i"],

    // CONSONANTS {z & Z & dZ; s & S} are approximately interchangeable
    ["s", "", "[rmnl]", "z"],
    ["S", "", "[rmnl]", "z"],
    ["s", "[rmnl]", "", "z"],
    ["S", "[rmnl]", "", "z"],

    ["dS", "", "$", "S"],
    ["dZ", "", "$", "S"],
    ["Z", "", "$", "S"],
    ["S", "", "$", "(S|s)"],
    ["z", "", "$", "(S|s)"],

    ["S", "", "", "s"],
    ["dZ", "", "", "z"],
    ["Z", "", "", "z"],

    ["i","","$","(i|)"], // often in Arabic
    ["e", "", "", "i"],

    ["o", "", "$", "(a|u)"],
    ["o", "", "", "u"],

    // special character to deal correctly in Hebrew match
    ["B","","","b"],
    ["V","","","v"],

    // Arabic
    ["p", "^", "", "b"],

    ["exactapproxcommon plus approxcommon"]

];

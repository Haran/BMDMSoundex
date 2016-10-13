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

    // VOWELS
    ["I","","[^aEIeiou]e","(Q|i|D)"], // like in "five"
    ["I", "", "$", "i"],
    ["I", "[aEIeiou]", "", "i"],
    ["I", "", "[^k]$", "i"],
    ["Ik", "[lr]", "$", "(ik|Qk)"],
    ["Ik", "", "$", "ik"],
    ["sIts", "", "$", "(sits|sQts)"],
    ["Its", "", "$", "its"],
    ["I", "", "", "(i|Q)"],

    ["lE","[bdfgkmnprsStvzZ]","","(il|li|lY)"],  // Applebaum < Appelbaum

    ["au","","","(D|a|u)"],
    ["ou","","","(D|o|u)"],
    ["ai","","","(D|a|i)"],
    ["oi","","","(D|o|i)"],
    ["ui","","","(D|u|i)"],

    ["E","D[^aeiEIou]","","(i|)"], // Weinberg, Shaneberg (shaneberg/shejneberg) --> shejnberg
    ["e","D[^aeiEIou]","","(i|)"],

    ["e", "", "", "i"],
    ["E", "", "[fklmnprsStv]$", "i"],
    ["E", "", "ts$", "i"],
    ["E", "[DaoiEuQY]", "", "i"],
    ["E", "", "[aoQY]", "i"],
    ["E", "", "", "(Y|i)"],

    ["a", "", "", "(a|o)"],

    ["approxenglish"]

];

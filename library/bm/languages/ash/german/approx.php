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

    ["I", "", "$", "i"],
    ["I", "[aeiAEIOUouQY]", "", "i"],
    ["I", "", "[^k]$", "i"],
    ["Ik", "[lr]", "$", "(ik|Qk)"],
    ["Ik", "", "$", "ik"],
    ["sIts", "", "$", "(sits|sQts)"],
    ["Its", "", "$", "its"],
    ["I", "", "", "(Q|i)"],

    ["AU","","","(D|a|u)"],
    ["aU","","","(D|a|u)"],
    ["Au","","","(D|a|u)"],
    ["au","","","(D|a|u)"],
    ["ou","","","(D|o|u)"],
    ["OU","","","(D|o|u)"],
    ["oU","","","(D|o|u)"],
    ["Ou","","","(D|o|u)"],
    ["ai","","","(D|a|i)"],
    ["Ai","","","(D|a|i)"],
    ["oi","","","(D|o|i)"],
    ["Oi","","","(D|o|i)"],
    ["ui","","","(D|u|i)"],
    ["Ui","","","(D|u|i)"],

    ["e", "", "", "i"],

    ["E", "", "[fklmnprst]$", "i"],
    ["E", "", "ts$", "i"],
    ["E", "", "$", "i"],
    ["E", "[DaoAOUiuQY]", "", "i"],
    ["E", "", "[aoAOQY]", "i"],
    ["E", "", "", "(Y|i)"],

    ["O", "", "$", "o"],
    ["O", "", "[fklmnprst]$", "o"],
    ["O", "", "ts$", "o"],
    ["O", "[aoAOUeiuQY]", "", "o"],
    ["O", "", "", "(o|Y)"],

    ["a", "", "", "(a|o)"],

    ["A", "", "$", "(a|o)"],
    ["A", "", "[fklmnprst]$", "(a|o)"],
    ["A", "", "ts$", "(a|o)"],
    ["A", "[aoeOUiuQY]", "", "(a|o)"],
    ["A", "", "", "(a|o|Y)"],

    ["U", "", "$", "u"],
    ["U", "[DaoiuUQY]", "", "u"],
    ["U", "", "[^k]$", "u"],
    ["Uk", "[lr]", "$", "(uk|Qk)"],
    ["Uk", "", "$", "uk"],
    ["sUts", "", "$", "(suts|sQts)"],
    ["Uts", "", "$", "uts"],
    ["U", "", "", "(u|Q)"],

    ["approxgerman"]

];

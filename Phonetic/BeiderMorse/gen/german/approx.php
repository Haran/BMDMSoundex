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

$this->approx[ $this->getLanguageIndexByName('german') ] = array(

    array ("I", "", "$", "i"),
    array ("I", "[aeiAEIOUouQY]", "", "i"),
    array ("I", "", "[^k]$", "i"),
    array ("Ik", "[lr]", "$", "(ik|Qk)"),
    array ("Ik", "", "$", "ik"),
    array ("sIts", "", "$", "(sits|sQts)"),
    array ("Its", "", "$", "its"),
    array ("I", "", "", "(Q|i)"),

    array("AU","","","(D|a|u)"),
    array("aU","","","(D|a|u)"),
    array("Au","","","(D|a|u)"),
    array("au","","","(D|a|u)"),
    array("ou","","","(D|o|u)"),
    array("OU","","","(D|o|u)"),
    array("oU","","","(D|o|u)"),
    array("Ou","","","(D|o|u)"),
    array("ai","","","(D|a|i)"),
    array("Ai","","","(D|a|i)"),
    array("oi","","","(D|o|i)"),
    array("Oi","","","(D|o|i)"),
    array("ui","","","(D|u|i)"),
    array("Ui","","","(D|u|i)"),

    array ("e", "", "", "i"),

    array ("E", "", "[fklmnprst]$", "i"),
    array ("E", "", "ts$", "i"),
    array ("E", "", "$", "i"),
    array ("E", "[DaoAOUiuQY]", "", "i"),
    array ("E", "", "[aoAOQY]", "i"),
    array ("E", "", "", "(Y|i)"),

    array ("O", "", "$", "o"),
    array ("O", "", "[fklmnprst]$", "o"),
    array ("O", "", "ts$", "o"),
    array ("O", "[aoAOUeiuQY]", "", "o"),
    array ("O", "", "", "(o|Y)"),

    array ("a", "", "", "(a|o)"),

    array ("A", "", "$", "(a|o)"),
    array ("A", "", "[fklmnprst]$", "(a|o)"),
    array ("A", "", "ts$", "(a|o)"),
    array ("A", "[aoeOUiuQY]", "", "(a|o)"),
    array ("A", "", "", "(a|o|Y)"),

    array ("U", "", "$", "u"),
    array ("U", "[DaoiuUQY]", "", "u"),
    array ("U", "", "[^k]$", "u"),
    array ("Uk", "[lr]", "$", "(uk|Qk)"),
    array ("Uk", "", "$", "uk"),
    array ("sUts", "", "$", "(suts|sQts)"),
    array ("Uts", "", "$", "uts"),
    array ("U", "", "", "(u|Q)"),

    array("approxgerman")

);
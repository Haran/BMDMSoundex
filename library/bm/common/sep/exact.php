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

$exactApproxCommon = require "exactApprox.php";
$exactCommon = [

    ["h","","",""],
    //array("C","","","k"),  // c that can actually be з

    // VOICED - UNVOICED CONSONANTS
    ["s","[^t]","[bgZd]","z"],
    ["Z","","[pfkst]","S"],
    ["Z","","$","S"],
    ["S","","[bgzd]","Z"],
    ["z","","$","s"],

    //special character to deal correctly in Hebrew match
    ["B","","","b"],
    ["V","","","v"],

    ["exactapproxcommon plus exactcommon"]

];

return array_merge($exactApproxCommon, $exactCommon);

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

    ["h","","$",""],

    // VOICED - UNVOICED CONSONANTS
    ["b","","[fktSs]","p"],
    ["b","","p",""],
    ["b","","$","p"],
    ["p","","[vgdZz]","b"],
    ["p","","b",""],

    ["v","","[pktSs]","f"],
    ["v","","f",""],
    ["v","","$","f"],
    ["f","","[vbgdZz]","v"],
    ["f","","v",""],

    ["g","","[pftSs]","k"],
    ["g","","k",""],
    ["g","","$","k"],
    ["k","","[vbdZz]","g"],
    ["k","","g",""],

    ["d","","[pfkSs]","t"],
    ["d","","t",""],
    ["d","","$","t"],
    ["t","","[vbgZz]","d"],
    ["t","","d",""],

    ["s","","dZ",""],
    ["s","","tS",""],

    ["z","","[pfkSt]","s"],
    ["z","","[sSzZ]",""],
    ["s","","[sSzZ]",""],
    ["Z","","[sSzZ]",""],
    ["S","","[sSzZ]",""],

    // SIMPLIFICATION OF CONSONANT CLUSTERS
    ["nm","","","m"],

    // DOUBLE --> SINGLE
    ["ji","^","","i"],

    ["a","","a",""],
    ["b","","b",""],
    ["d","","d",""],
    ["e","","e",""],
    ["f","","f",""],
    ["g","","g",""],
    ["i","","i",""],
    ["k","","k",""],
    ["l","","l",""],
    ["m","","m",""],
    ["n","","n",""],
    ["o","","o",""],
    ["p","","p",""],
    ["r","","r",""],
    ["t","","t",""],
    ["u","","u",""],
    ["v","","v",""],
    ["z","","z",""]

    // do not put name of file here since it always gets merged into another file

];

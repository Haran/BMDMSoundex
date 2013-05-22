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

$this->exactApproxCommon = array(

    array("h", "", "$", ""),

    // VOICED - UNVOICED CONSONANTS
    array("b", "", "[fktSs]", "p"),
    array("b", "", "p", ""),
    array("b", "", "$", "p"),
    array("p", "", "[vgdZz]", "b"), // Ashk: "v" excluded (everythere)
    array("p", "", "b", ""),

    array("v", "", "[pktSs]", "f"),
    array("v", "", "f", ""),
    array("v", "", "$", "f"),
    array("f", "", "[vbgdZz]", "v"),
    array("f", "", "v", ""),

    array("g", "", "[pftSs]", "k"),
    array("g", "", "k", ""),
    array("g", "", "$", "k"),
    array("k", "", "[vbdZz]", "g"),
    array("k", "", "g", ""),

    array("d", "", "[pfkSs]", "t"),
    array("d", "", "t", ""),
    array("d", "", "$", "t"),
    array("t", "", "[vbgZz]", "d"),
    array("t", "", "d", ""),

    array("s", "", "dZ", ""),
    array("s", "", "tS", ""),

    array("z", "", "[pfkSt]", "s"),
    array("z", "", "[sSzZ]", ""),
    array("s", "", "[sSzZ]", ""),
    array("Z", "", "[sSzZ]", ""),
    array("S", "", "[sSzZ]", ""),

    // SIMPLIFICATION OF CONSONANT CLUSTERS
    array("jnm", "", "", "jm"),

    // DOUBLE --> SINGLE
    array("ji", "^", "", "i"),
    array("jI", "^", "", "I"),

    array("a", "", "[aA]", ""),
    array("a", "A", "", ""),
    array("A", "", "A", ""),

    array("b", "", "b", ""),
    array("d", "", "d", ""),
    array("f", "", "f", ""),
    array("g", "", "g", ""),
    array("j", "", "j", ""),
    array("k", "", "k", ""),
    array("l", "", "l", ""),
    array("m", "", "m", ""),
    array("n", "", "n", ""),
    array("p", "", "p", ""),
    array("r", "", "r", ""),
    array("t", "", "t", ""),
    array("v", "", "v", ""),
    array("z", "", "z", "")

    // no filename here since it always gets merged into another file

);
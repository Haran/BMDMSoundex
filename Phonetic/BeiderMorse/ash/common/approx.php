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
$this->approxCommon = array(

    // REGRESSIVE ASSIMILATION OF CONSONANTS
    array("n", "", "[bp]", "m"),

    // PECULIARITY OF "h"
    array("h", "", "", ""),
    array("H", "", "", "(x|)"),

    // POLISH OGONEK IMPOSSIBLE
    array("F", "", "[bdgkpstvzZ]h", "e"),
    array("F", "", "[bdgkpstvzZ]x", "e"),
    array("B", "", "[bdgkpstvzZ]h", "a"),
    array("B", "", "[bdgkpstvzZ]x", "a"),

    // "e" and "i" ARE TO BE OMITTED BEFORE (SYLLABIC) n & l: Halperin=Halpern; Frankel = Frankl, Finkelstein = Finklstein
    array("e", "[bdfgklmnprsStvzZ]", "[ln]$", ""),
    array("i", "[bdfgklmnprsStvzZ]", "[ln]$", ""),
    array("E", "[bdfgklmnprsStvzZ]", "[ln]$", ""),
    array("I", "[bdfgklmnprsStvzZ]", "[ln]$", ""),
    array("F", "[bdfgklmnprsStvzZ]", "[ln]$", ""),
    array("Q", "[bdfgklmnprsStvzZ]", "[ln]$", ""),
    array("Y", "[bdfgklmnprsStvzZ]", "[ln]$", ""),

    array("e", "[bdfgklmnprsStvzZ]", "[ln][bdfgklmnprsStvzZ]", ""),
    array("i", "[bdfgklmnprsStvzZ]", "[ln][bdfgklmnprsStvzZ]", ""),
    array("E", "[bdfgklmnprsStvzZ]", "[ln][bdfgklmnprsStvzZ]", ""),
    array("I", "[bdfgklmnprsStvzZ]", "[ln][bdfgklmnprsStvzZ]", ""),
    array("F", "[bdfgklmnprsStvzZ]", "[ln][bdfgklmnprsStvzZ]", ""),
    array("Q", "[bdfgklmnprsStvzZ]", "[ln][bdfgklmnprsStvzZ]", ""),
    array("Y", "[bdfgklmnprsStvzZ]", "[ln][bdfgklmnprsStvzZ]", ""),

    array("lEs", "", "", "(lEs|lz)"), // Applebaum < Appelbaum (English + blend English-something forms as Finklestein)
    array("lE", "[bdfgkmnprStvzZ]", "", "(lE|l)"), // Applebaum < Appelbaum (English + blend English-something forms as Finklestein)

    // SIMPLIFICATION: (TRIPHTHONGS & DIPHTHONGS) -> ONE GENERIC DIPHTHONG "D"
    array("aue", "", "", "D"),
    array("oue", "", "", "D"),

    array("AvE", "", "", "(D|AvE)"),
    array("Ave", "", "", "(D|Ave)"),
    array("avE", "", "", "(D|avE)"),
    array("ave", "", "", "(D|ave)"),

    array("OvE", "", "", "(D|OvE)"),
    array("Ove", "", "", "(D|Ove)"),
    array("ovE", "", "", "(D|ovE)"),
    array("ove", "", "", "(D|ove)"),

    array("ea", "", "", "(D|ea)"),
    array("EA", "", "", "(D|EA)"),
    array("Ea", "", "", "(D|Ea)"),
    array("eA", "", "", "(D|eA)"),

    array("aji", "", "", "D"),
    array("ajI", "", "", "D"),
    array("aje", "", "", "D"),
    array("ajE", "", "", "D"),

    array("Aji", "", "", "D"),
    array("AjI", "", "", "D"),
    array("Aje", "", "", "D"),
    array("AjE", "", "", "D"),

    array("oji", "", "", "D"),
    array("ojI", "", "", "D"),
    array("oje", "", "", "D"),
    array("ojE", "", "", "D"),

    array("Oji", "", "", "D"),
    array("OjI", "", "", "D"),
    array("Oje", "", "", "D"),
    array("OjE", "", "", "D"),

    array("eji", "", "", "D"),
    array("ejI", "", "", "D"),
    array("eje", "", "", "D"),
    array("ejE", "", "", "D"),

    array("Eji", "", "", "D"),
    array("EjI", "", "", "D"),
    array("Eje", "", "", "D"),
    array("EjE", "", "", "D"),

    array("uji", "", "", "D"),
    array("ujI", "", "", "D"),
    array("uje", "", "", "D"),
    array("ujE", "", "", "D"),

    array("Uji", "", "", "D"),
    array("UjI", "", "", "D"),
    array("Uje", "", "", "D"),
    array("UjE", "", "", "D"),

    array("iji", "", "", "D"),
    array("ijI", "", "", "D"),
    array("ije", "", "", "D"),
    array("ijE", "", "", "D"),

    array("Iji", "", "", "D"),
    array("IjI", "", "", "D"),
    array("Ije", "", "", "D"),
    array("IjE", "", "", "D"),

    array("aja", "", "", "D"),
    array("ajA", "", "", "D"),
    array("ajo", "", "", "D"),
    array("ajO", "", "", "D"),
    array("aju", "", "", "D"),
    array("ajU", "", "", "D"),

    array("Aja", "", "", "D"),
    array("AjA", "", "", "D"),
    array("Ajo", "", "", "D"),
    array("AjO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("oja", "", "", "D"),
    array("ojA", "", "", "D"),
    array("ojo", "", "", "D"),
    array("ojO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("Oja", "", "", "D"),
    array("OjA", "", "", "D"),
    array("Ojo", "", "", "D"),
    array("OjO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("eja", "", "", "D"),
    array("ejA", "", "", "D"),
    array("ejo", "", "", "D"),
    array("ejO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("Eja", "", "", "D"),
    array("EjA", "", "", "D"),
    array("Ejo", "", "", "D"),
    array("EjO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("uja", "", "", "D"),
    array("ujA", "", "", "D"),
    array("ujo", "", "", "D"),
    array("ujO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("Uja", "", "", "D"),
    array("UjA", "", "", "D"),
    array("Ujo", "", "", "D"),
    array("UjO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("ija", "", "", "D"),
    array("ijA", "", "", "D"),
    array("ijo", "", "", "D"),
    array("ijO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("Ija", "", "", "D"),
    array("IjA", "", "", "D"),
    array("Ijo", "", "", "D"),
    array("IjO", "", "", "D"),
    array("Aju", "", "", "D"),
    array("AjU", "", "", "D"),

    array("j", "", "", "i"),

    // lander = lender = länder
    array("lYndEr", "", "$", "lYnder"),
    array("lander", "", "$", "lYnder"),
    array("lAndEr", "", "$", "lYnder"),
    array("lAnder", "", "$", "lYnder"),
    array("landEr", "", "$", "lYnder"),
    array("lender", "", "$", "lYnder"),
    array("lEndEr", "", "$", "lYnder"),
    array("lendEr", "", "$", "lYnder"),
    array("lEnder", "", "$", "lYnder"),

    // CONSONANTS {z & Z; s & S} are approximately interchangeable
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

    array("exactapproxcommon plus approxcommon")

);
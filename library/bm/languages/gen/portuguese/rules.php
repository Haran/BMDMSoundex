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

$this->rules[ $this->getLanguageIndexByName('portuguese') ] = array(

    array("kh","","","x"), // foreign
    array("ch","","","S"),
    array("ss","","","s"),
    array("sc","","[ei]","s"),
    array("sç","","[aou]","s"),
    array("ç","","","s"),
    array("c","","[ei]","s"),
//  array("c","","[aou]","(k|C)"),

    array("s","^","","s"),
    array("s","[aáuiíoóeéêy]","[aáuiíoóeéêy]","z"),
    array("s","","[dglmnrv]","(Z|S)"), // Z is Brazil

    array("z","","$","(Z|s|S)"), // s and S in Brazil
    array("z","","[bdgv]","(Z|z)"), // Z in Brazil
    array("z","","[ptckf]","(s|S|z)"), // s and S in Brazil

    array("gu","","[eiu]","g"),
    array("gu","","[ao]","gv"),
    array("g","","[ei]","Z"),
    array("qu","","[eiu]","k"),
    array("qu","","[ao]","kv"),

    array("uo","","","(vo|o|u)"),
    array("u","","[aei]","v"),

    array("lh","","","l"),
    array("nh","","","nj"),
    array("h","[bdgt]","",""), // translit. from Arabic
    array("h","","$",""), // foreign

    array("ex","","[aáuiíoóeéêy]","(ez|eS|eks)"), // ez in Brazil
    array("ex","","[cs]","e"),

    array("y","[aáuiíoóeéê]","","j"),
    array("y","","[aeiíou]","j"),
    array("m","","[bcdfglnprstv]","(m|n)"), // maybe to add a rule for m/n before a consonant that disappears [preceeding vowel becomes nasalized]
    array("m","","$","(m|n)"), // maybe to add a rule for final m/n that disappears [preceeding vowel becomes nasalized]

    array("ão","","","(au|an|on)"),
    array("ãe","","","(aj|an)"),
    array("ãi","","","(aj|an)"),
    array("õe","","","(oj|on)"),
    array("i","[aáuoóeéê]","","j"),
    array("i","","[aeou]","j"),

    array("â","","","a"),
    array("à","","","a"),
    array("á","","","a"),
    array("ã","","","(a|an|on)"),
    array("é","","","e"),
    array("ê","","","e"),
    array("í","","","i"),
    array("ô","","","o"),
    array("ó","","","o"),
    array("õ","","","(o|on)"),
    array("ú","","","u"),
    array("ü","","","u"),

    array("aue","","","aue"),

    // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","k"),
    array("d","","","d"),
    array("e","","","(e|i)"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","i"),
    array("j","","","Z"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","(o|u)"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","S"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("w","","","v"),
    array("x","","","(S|ks)"),
    array("y","","","i"),
    array("z","","","z"),

    array("rulesportuguese")

);
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


// GENERIC
// A, E, I, O, P, U should create variants, but a, e, i, o, u should not create any new variant
// Q = ü ; Y = ä = ö
// EE = final "e" (english or french)
$this->approx[ $this->getLanguageIndexByName('any') ] = array(

    // VOWELS
    // "ALL" DIPHTHONGS are interchangeable BETWEEN THEM and with monophthongs of which they are composed ("D" means "diphthong")
    //  {a,o} are totally interchangeable if non-stressed; in German "a/o" can actually be from "ä/ö" (that are equivalent to "e")
    //  {i,e} are interchangeable if non-stressed, while in German "u" can actually be from "ü" (that is equivalent to "i")

    array("mb", "", "", "(mb|b[".$this->lang['greeklatin']."])"),
    array("mp", "", "", "(mp|b[".$this->lang['greeklatin']."])"),
    array("ng", "", "", "(ng|g[".$this->lang['greeklatin']."])"),

    array("B", "", "", "(b|v[".$this->lang['spanish']."])"),
    array("V", "", "", "(v|b[".$this->lang['spanish']."])"),

    // French word-final and word-part-final letters
    array("t", "", "$", "(t|[".$this->lang['french']."])"),
    array("g", "n", "$", "(g|[".$this->lang['french']."])"),
    array("k", "n", "$", "(k|[".$this->lang['french']."])"),
    array("p", "", "$", "(p|[".$this->lang['french']."])"),
    array("r", "[Ee]", "$", "(r|[".$this->lang['french']."])"),
    array("s", "", "$", "(s|[".$this->lang['french']."])"),
    array("t", "[aeiouAEIOU]", "[^aeiouAEIOU]", "(t|[".$this->lang['french']."])"), // Petitjean
    array("s", "[aeiouAEIOU]", "[^aeiouAEIOU]", "(s|[".$this->lang['french']."])"), // Groslot, Grosleau
    //array("p","[aeiouAEIOU]","[^aeiouAEIOU]","(p|[".$this->lang['french']."])"),

    array("I", "[aeiouAEIBFOUQY]", "", "i"),
    array("I", "", "[^aeiouAEBFIOU]e", "(Q[".$this->lang['german']."]|i|D[".$this->lang['english']."])"), // "line"
    array("I", "", "$", "i"),
    array("I", "", "[^k]$", "i"),
    array("Ik", "[lr]", "$", "(ik|Qk[".$this->lang['german']."])"),
    array("Ik", "", "$", "ik"),
    array("sIts", "", "$", "(sits|sQts[".$this->lang['german']."])"),
    array("Its", "", "$", "its"),
    array("I", "", "", "(Q[".$this->lang['german']."]|i)"),

    array("lEE", "[bdfgkmnprsStvzZ]", "", "(li|il[".$this->lang['english']."])"), // Apple = Appel
    array("rEE", "[bdfgkmnprsStvzZ]", "", "(ri|ir[".$this->lang['english']."])"),
    array("lE", "[bdfgkmnprsStvzZ]", "", "(li|il[".$this->lang['english']."]|lY[".$this->lang['german']."])"), // Applebaum < Appelbaum
    array("rE", "[bdfgkmnprsStvzZ]", "", "(ri|ir[".$this->lang['english']."]|rY[".$this->lang['german']."])"),

    array("ea", "", "", "(D|a|i)"),

    array("au", "", "", "(D|a|u)"),
    array("ou", "", "", "(D|o|u)"),
    array("eu", "", "", "(D|e|u)"),

    array("ai", "", "", "(D|a|i)"),
    array("Ai", "", "", "(D|a|i)"),
    array("oi", "", "", "(D|o|i)"),
    array("Oi", "", "", "(D|o|i)"),
    array("ui", "", "", "(D|u|i)"),
    array("Ui", "", "", "(D|u|i)"),
    array("ei", "", "", "(D|i)"),
    array("Ei", "", "", "(D|i)"),

    array("iA", "", "$", "(ia|io)"),
    array("iA", "", "", "(ia|io|iY[".$this->lang['german']."])"),
    array("A", "", "[^aeiouAEBFIOU]e", "(a|o|Y[".$this->lang['german']."]|D[".$this->lang['english']."])"), // "plane"


    array("E", "i[^aeiouAEIOU]", "", "(i|Y[".$this->lang['german']."]|[".$this->lang['english']."])"), // Wineberg (vineberg/vajneberg) --> vajnberg
    array("E", "a[^aeiouAEIOU]", "", "(i|Y[".$this->lang['german']."]|[".$this->lang['english']."])"), //  Shaneberg (shaneberg/shejneberg) --> shejnberg

    array("E", "", "[fklmnprst]$", "i"),
    array("E", "", "ts$", "i"),
    array("E", "", "$", "i"),
    array("E", "[DaoiuAOIUQY]", "", "i"),
    array("E", "", "[aoAOQY]", "i"),
    array("E", "", "", "(i|Y[".$this->lang['german']."])"),

    array("P", "", "", "(o|u)"),

    array("O", "", "[fklmnprstv]$", "o"),
    array("O", "", "ts$", "o"),
    array("O", "", "$", "o"),
    array("O", "[oeiuQY]", "", "o"),
    array("O", "", "", "(o|Y[".$this->lang['german']."])"),
    array("O", "", "", "o"),

    array("A", "", "[fklmnprst]$", "(a|o)"),
    array("A", "", "ts$", "(a|o)"),
    array("A", "", "$", "(a|o)"),
    array("A", "[oeiuQY]", "", "(a|o)"),
    array("A", "", "", "(a|o|Y[".$this->lang['german']."])"),
    array("A", "", "", "(a|o)"),

    array("U", "", "$", "u"),
    array("U", "[DoiuQY]", "", "u"),
    array("U", "", "[^k]$", "u"),
    array("Uk", "[lr]", "$", "(uk|Qk[".$this->lang['german']."])"),
    array("Uk", "", "$", "uk"),
    array("sUts", "", "$", "(suts|sQts[".$this->lang['german']."])"),
    array("Uts", "", "$", "uts"),
    array("U", "", "", "(u|Q[".$this->lang['german']."])"),
    array("U", "", "", "u"),

    array("e", "", "[fklmnprstv]$", "i"),
    array("e", "", "ts$", "i"),
    array("e", "", "$", "i"),
    array("e", "[DaoiuAOIUQY]", "", "i"),
    array("e", "", "[aoAOQY]", "i"),
    array("e", "", "", "(i|Y[".$this->lang['german']."])"),

    array("a", "", "", "(a|o)"),

    array("approxany")

);
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

// SEPHARDIC: INCORPORATES Portuguese + Italian + Spanish(+Catalan) + French
$this->rules[ $this->getLanguageIndexByName('any') ] = array(

    // CONSONANTS
    array("ph", "", "", "f"), // foreign
    array("sh", "", "", "S"), // foreign
    array("kh", "", "", "x"), // foreign

    array("gli", "", "", "(gli|l[".$this->lang['italian']."])"),
    array("gni", "", "", "(gni|ni[" . ($this->lang['italian'] + $this->lang['french']) . "])"),
    array("gn", "", "[aeou]", "(n[" . ($this->lang['italian'] + $this->lang['french']) . "]|nj[" . ($this->lang['italian'] + $this->lang['french']) . "]|gn)"),
    array("gh", "", "", "g"), // It + translit. from Arabic
    array("dh", "", "", "d"), // translit. from Arabic
    array("bh", "", "", "b"), // translit. from Arabic
    array("th", "", "", "t"), // translit. from Arabic
    array("lh", "", "", "l"), // Port
    array("nh", "", "", "nj"), // Port

    array("ig", "[aeiou]", "", "(ig|tS[".$this->lang['spanish']."])"),
    array("ix", "[aeiou]", "", "S"), // Sp
    array("tx", "", "", "tS"), // Sp
    array("tj", "", "$", "tS"), // Sp
    array("tj", "", "", "dZ"), // Sp
    array("tg", "", "", "(tg|dZ[".$this->lang['spanish']."])"),

    array("gi", "", "[aeou]", "dZ"), // italian
    array("g", "", "y", "Z"), // french
    array("gg", "", "[ei]", "(gZ[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZ[" . ($this->lang['italian'] + $this->lang['spanish']) . "]|x[".$this->lang['spanish']."])"),
    array("g", "", "[ei]", "(Z[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZ[" . ($this->lang['italian'] + $this->lang['spanish']) . "]|x[".$this->lang['spanish']."])"),

    array("guy", "", "", "gi"),
    array("gue", "", "$", "(k[".$this->lang['french']."]|ge)"),
    array("gu", "", "[ei]", "(g|gv)"), // not It
    array("gu", "", "[ao]", "gv"), // not It

    array("ñ", "", "", "(n|nj)"),
    array("ny", "", "", "nj"),

    array("sc", "", "[ei]", "(s|S[".$this->lang['italian']."])"),
    array("sç", "", "[aeiou]", "s"), // not It
    array("ss", "", "", "s"),
    array("ç", "", "", "s"), // not It

    array("ch", "", "[ei]", "(k[".$this->lang['italian']."]|S[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|tS[".$this->lang['spanish']."]|dZ[".$this->lang['spanish']."])"),
    array("ch", "", "", "(S|tS[".$this->lang['spanish']."]|dZ[".$this->lang['spanish']."])"),

    array("ci", "", "[aeou]", "(tS[".$this->lang['italian']."]|si)"),
    array("cc", "", "[eiyéèê]", "(tS[".$this->lang['italian']."]|ks[" . ($this->lang['portuguese'] + $this->lang['french'] + $this->lang['spanish']) . "])"),
    array("c", "", "[eiyéèê]", "(tS[".$this->lang['italian']."]|s[" . ($this->lang['portuguese'] + $this->lang['french'] + $this->lang['spanish']) . "])"),
    //array("c","","[aou]","(k|C[".($portuguese+$spanish)."])"), // "C" means that the actual letter could be "ç" (cedille omitted)

    array("s", "^", "", "s"),
    array("s", "[aáuiíoóeéêy]", "[aáuiíoóeéêy]", "(s[".$this->lang['spanish']."]|z[" . ($this->lang['portuguese'] + $this->lang['french'] + $this->lang['italian']) . "])"),
    array("s", "", "[dglmnrv]", "(z|Z[".$this->lang['portuguese']."])"),

    array("z", "", "$", "(s|ts[".$this->lang['italian']."]|S[".$this->lang['portuguese']."])"), // ts It, s/S/Z Port, s in Sp, z Fr
    array("z", "", "[bdgv]", "(z|dz[".$this->lang['italian']."]|Z[".$this->lang['portuguese']."])"), // dz It, Z/z Port, z Sp & Fr
    array("z", "", "[ptckf]", "(s|ts[".$this->lang['italian']."]|S[".$this->lang['portuguese']."])"), // ts It, s/S/z Port, z/s Sp
    array("z", "", "", "(z|dz[".$this->lang['italian']."]|ts[".$this->lang['italian']."]|s[".$this->lang['spanish']."])"), // ts/dz It, z Port & Fr, z/s Sp

    array("que", "", "$", "(k[".$this->lang['french']."]|ke)"),
    array("qu", "", "[eiu]", "k"),
    array("qu", "", "[ao]", "(kv|k)"), // k is It

    array("ex", "", "[aáuiíoóeéêy]", "(ez[".$this->lang['portuguese']."]|eS[".$this->lang['portuguese']."]|eks|egz)"),
    array("ex", "", "[cs]", "(e[".$this->lang['portuguese']."]|ek)"),

    array("m", "", "[cdglnrst]", "(m|n[".$this->lang['portuguese']."])"),
    array("m", "", "[bfpv]", "(m|n[" . ($this->lang['portuguese'] + $this->lang['spanish']) . "])"),
    array("m", "", "$", "(m|n[".$this->lang['portuguese']."])"),

    array("b", "^", "", "(b|V[".$this->lang['spanish']."])"),
    array("v", "^", "", "(v|B[".$this->lang['spanish']."])"),

    // VOWELS
    array("eau", "", "", "o"), // Fr

    array("ouh", "", "[aioe]", "(v[".$this->lang['french']."]|uh)"),
    array("uh", "", "[aioe]", "(v|uh)"),
    array("ou", "", "[aioe]", "v"), // french
    array("uo", "", "", "(vo|o)"),
    array("u", "", "[aie]", "v"),

    array("i", "[aáuoóeéê]", "", "j"),
    array("i", "", "[aeou]", "j"),
    array("y", "[aáuiíoóeéê]", "", "j"),
    array("y", "", "[aeiíou]", "j"),
    array("e", "", "$", "(e|E[".$this->lang['french']."])"),

    array("ão", "", "", "(au|an)"), // Port
    array("ãe", "", "", "(aj|an)"), // Port
    array("ãi", "", "", "(aj|an)"), // Port
    array("õe", "", "", "(oj|on)"), // Port
    array("où", "", "", "u"), // Fr
    array("ou", "", "", "(ou|u[".$this->lang['french']."])"),

    array("â", "", "", "a"), // Port & Fr
    array("à", "", "", "a"), // Port
    array("á", "", "", "a"), // Port & Sp
    array("ã", "", "", "(a|an)"), // Port
    array("é", "", "", "e"),
    array("ê", "", "", "e"), // Port & Fr
    array("è", "", "", "e"), // Sp & Fr & It
    array("í", "", "", "i"), // Port & Sp
    array("î", "", "", "i"), // Fr
    array("ô", "", "", "o"), // Port & Fr
    array("ó", "", "", "o"), // Port & Sp & It
    array("õ", "", "", "(o|on)"), // Port
    array("ò", "", "", "o"), // Sp & It
    array("ú", "", "", "u"), // Port & Sp
    array("ü", "", "", "u"), // Port & Sp

    // LATIN ALPHABET
    array("a", "", "", "a"),
    array("b", "", "", "(b|v[".$this->lang['spanish']."])"),
    array("c", "", "", "k"),
    array("d", "", "", "d"),
    array("e", "", "", "e"),
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("h", "", "", "h"),
    array("i", "", "", "i"),
    array("j", "", "", "(x[".$this->lang['spanish']."]|Z)"), // not It
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("o", "", "", "o"),
    array("p", "", "", "p"),
    array("q", "", "", "k"),
    array("r", "", "", "r"),
    array("s", "", "", "(s|S[".$this->lang['portuguese']."])"),
    array("t", "", "", "t"),
    array("u", "", "", "u"),
    array("v", "", "", "(v|b[".$this->lang['spanish']."])"),
    array("w", "", "", "v"), // foreign
    array("x", "", "", "(ks|gz|S[" . ($this->lang['portuguese'] + $this->lang['spanish']) . "])"), // S/ks Port & Sp, gz Sp, It only ks
    array("y", "", "", "i"),
    array("z", "", "", "z"),

    array("rulesany")

);
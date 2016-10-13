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
$this->rules[ $this->getLanguageIndexByName('polish') ] = array(

    // CONVERTING FEMININE TO MASCULINE
    array("ska", "", "$", "ski"),
    array("cka", "", "$", "tski"),
    array("lowa", "", "$", "(lova|lof|l|el)"),
    array("kowa", "", "$", "(kova|kof|k|ek)"),
    array("owa", "", "$", "(ova|of|)"),
    array("lowna", "", "$", "(lovna|levna|l|el)"),
    array("kowna", "", "$", "(kovna|k|ek)"),
    array("owna", "", "$", "(ovna|)"),
    array("lówna", "", "$", "(l|el)"),
    array("kówna", "", "$", "(k|ek)"),
    array("ówna", "", "$", ""),
    array("a", "", "$", "(a|i)"),

    // CONSONANTS
    array("czy", "", "", "tSi"),
    array("cze", "", "[bcdgkpstwzż]", "(tSe|tSF)"),
    array("ciewicz", "", "", "(tsevitS|tSevitS)"),
    array("siewicz", "", "", "(sevitS|SevitS)"),
    array("ziewicz", "", "", "(zevitS|ZevitS)"),
    array("riewicz", "", "", "rjevitS"),
    array("diewicz", "", "", "djevitS"),
    array("tiewicz", "", "", "tjevitS"),
    array("iewicz", "", "", "evitS"),
    array("ewicz", "", "", "evitS"),
    array("owicz", "", "", "ovitS"),
    array("icz", "", "", "itS"),
    array("cz", "", "", "tS"),
    array("ch", "", "", "x"),

    array("cia", "", "[bcdgkpstwzż]", "(tSB|tsB)"),
    array("cia", "", "", "(tSa|tsa)"),
    array("cią", "", "[bp]", "(tSom|tsom)"),
    array("cią", "", "", "(tSon|tson)"),
    array("cię", "", "[bp]", "(tSem|tsem)"),
    array("cię", "", "", "(tSen|tsen)"),
    array("cie", "", "[bcdgkpstwzż]", "(tSF|tsF)"),
    array("cie", "", "", "(tSe|tse)"),
    array("cio", "", "", "(tSo|tso)"),
    array("ciu", "", "", "(tSu|tsu)"),
    array("ci", "", "", "(tSi|tsI)"),
    array("ć", "", "", "(tS|ts)"),

    array("ssz", "", "", "S"),
    array("sz", "", "", "S"),
    array("sia", "", "[bcdgkpstwzż]", "(SB|sB|sja)"),
    array("sia", "", "", "(Sa|sja)"),
    array("sią", "", "[bp]", "(Som|som)"),
    array("sią", "", "", "(Son|son)"),
    array("się", "", "[bp]", "(Sem|sem)"),
    array("się", "", "", "(Sen|sen)"),
    array("sie", "", "[bcdgkpstwzż]", "(SF|sF|se)"),
    array("sie", "", "", "(Se|se)"),
    array("sio", "", "", "(So|so)"),
    array("siu", "", "", "(Su|sju)"),
    array("si", "", "", "(Si|sI)"),
    array("ś", "", "", "(S|s)"),

    array("zia", "", "[bcdgkpstwzż]", "(ZB|zB|zja)"),
    array("zia", "", "", "(Za|zja)"),
    array("zią", "", "[bp]", "(Zom|zom)"),
    array("zią", "", "", "(Zon|zon)"),
    array("zię", "", "[bp]", "(Zem|zem)"),
    array("zię", "", "", "(Zen|zen)"),
    array("zie", "", "[bcdgkpstwzż]", "(ZF|zF)"),
    array("zie", "", "", "(Ze|ze)"),
    array("zio", "", "", "(Zo|zo)"),
    array("ziu", "", "", "(Zu|zju)"),
    array("zi", "", "", "(Zi|zI)"),

    array("że", "", "[bcdgkpstwzż]", "(Ze|ZF)"),
    array("że", "", "[bcdgkpstwzż]", "(Ze|ZF|ze|zF)"),
    array("że", "", "", "Ze"),
    array("źe", "", "", "(Ze|ze)"),
    array("ży", "", "", "Zi"),
    array("źi", "", "", "(Zi|zi)"),
    array("ż", "", "", "Z"),
    array("ź", "", "", "(Z|z)"),

    array("rze", "t", "", "(Se|re)"),
    array("rze", "", "", "(Ze|re|rZe)"),
    array("rzy", "t", "", "(Si|ri)"),
    array("rzy", "", "", "(Zi|ri|rZi)"),
    array("rz", "t", "", "(S|r)"),
    array("rz", "", "", "(Z|r|rZ)"),

    array("lio", "", "", "(lo|le)"),
    array("ł", "", "", "l"),
    array("ń", "", "", "n"),
    array("qu", "", "", "k"),
    array("s", "", "s", ""),

    // VOWELS
    array("ó", "", "", "(u|o)"),
    array("ą", "", "[bp]", "om"),
    array("ę", "", "[bp]", "em"),
    array("ą", "", "", "on"),
    array("ę", "", "", "en"),

    array("ije", "", "", "je"),
    array("yje", "", "", "je"),
    array("iie", "", "", "je"),
    array("yie", "", "", "je"),
    array("iye", "", "", "je"),
    array("yye", "", "", "je"),

    array("ij", "", "[aou]", "j"),
    array("yj", "", "[aou]", "j"),
    array("ii", "", "[aou]", "j"),
    array("yi", "", "[aou]", "j"),
    array("iy", "", "[aou]", "j"),
    array("yy", "", "[aou]", "j"),

    array("rie", "", "", "rje"),
    array("die", "", "", "dje"),
    array("tie", "", "", "tje"),
    array("ie", "", "[bcdgkpstwzż]", "F"),
    array("ie", "", "", "e"),

    array("aue", "", "", "aue"),
    array("au", "", "", "au"),

    array("ei", "", "", "aj"),
    array("ey", "", "", "aj"),
    array("ej", "", "", "aj"),

    array("ai", "", "", "aj"),
    array("ay", "", "", "aj"),
    array("aj", "", "", "aj"),

    array("i", "[ou]", "", "j"),
    array("y", "[ou]", "", "j"),
    array("i", "", "[aou]", "j"),
    array("y", "", "[aeou]", "j"),

    array("a", "", "[bcdgkpstwzż]", "B"),
    array("e", "", "[bcdgkpstwzż]", "(E|F)"),
    array("o", "", "[bcćdgklłmnńrsśtwzźż]", "P"),

    // ALPHABET
    array("a", "", "", "a"),
    array("b", "", "", "b"),
    array("c", "", "", "ts"),
    array("d", "", "", "d"),
    array("e", "", "", "E"),
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("h", "", "", "(h|x)"),
    array("i", "", "", "I"),
    array("j", "", "", "j"),
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("o", "", "", "o"),
    array("p", "", "", "p"),
    array("q", "", "", "k"),
    array("r", "", "", "r"),
    array("s", "", "", "s"),
    array("t", "", "", "t"),
    array("u", "", "", "u"),
    array("v", "", "", "v"),
    array("w", "", "", "v"),
    array("x", "", "", "ks"),
    array("y", "", "", "I"),
    array("z", "", "", "z"),

    array("rulespolish")

);
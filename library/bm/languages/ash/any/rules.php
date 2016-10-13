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

//ASHKENAZIC
$this->rules[ $this->getLanguageIndexByName('any') ] = array(

    // CONVERTING FEMININE TO MASCULINE
    array("yna", "", "$", "(in[".$this->lang['russian']."]|ina)"),
    array("ina", "", "$", "(in[".$this->lang['russian']."]|ina)"),
    array("liova", "", "$", "(lof[".$this->lang['russian']."]|lef[".$this->lang['russian']."]|lova)"),
    array("lova", "", "$", "(lof[".$this->lang['russian']."]|lef[".$this->lang['russian']."]|lova)"),
    array("ova", "", "$", "(of[".$this->lang['russian']."]|ova)"),
    array("eva", "", "$", "(ef[".$this->lang['russian']."]|eva)"),
    array("aia", "", "$", "(aja|i[".$this->lang['russian']."])"),
    array("aja", "", "$", "(aja|i[".$this->lang['russian']."])"),
    array("aya", "", "$", "(aja|i[".$this->lang['russian']."])"),

    array("lowa", "", "$", "(lova|lof[".$this->lang['polish']."]|l[".$this->lang['polish']."]|el[".$this->lang['polish']."])"),
    array("kowa", "", "$", "(kova|kof[".$this->lang['polish']."]|k[".$this->lang['polish']."]|ek[".$this->lang['polish']."])"),
    array("owa", "", "$", "(ova|of[".$this->lang['polish']."]|)"),
    array("lowna", "", "$", "(lovna|levna|l[".$this->lang['polish']."]|el[".$this->lang['polish']."])"),
    array("kowna", "", "$", "(kovna|k[".$this->lang['polish']."]|ek[".$this->lang['polish']."])"),
    array("owna", "", "$", "(ovna|[".$this->lang['polish']."])"),
    array("l?wna", "", "$", "(l|el[".$this->lang['polish']."])"), // polish
    array("k?wna", "", "$", "(k|ek[".$this->lang['polish']."])"), // polish
    array("?wna", "", "$", ""), // polish

    array("a", "", "$", "(a|i[".$this->lang['polish']."])"),

// CONSONANTS  (integrated: German, Polish, Russian, Romanian and English)

    array("rh", "^", "", "r"),
    array("ssch", "", "", "S"),
    array("chsch", "", "", "xS"),
    array("tsch", "", "", "tS"),

    array("sch", "", "[ei]", "(sk[".$this->lang['romanian']."]|S|StS[".$this->lang['russian']."])"), // german
    array("sch", "", "", "(S|StS[".$this->lang['russian']."])"), // german

    array("ssh", "", "", "S"),

    array("sh", "", "[???]", "sh"), // german
    array("sh", "", "[aeiou]", "(S[" . ($this->lang['russian'] + $this->lang['english']) . "]|sh)"),
    array("sh", "", "", "S"), // russian+english

    array("kh", "", "", "(x[" . ($this->lang['russian'] + $this->lang['english']) . "]|kh)"),

    array("chs", "", "", "(ks[".$this->lang['german']."]|xs|tSs[" . ($this->lang['russian'] + $this->lang['english']) . "])"),

    // French "ch" is currently disabled
    //array("ch","","[ei]","(x|tS|k[".$this->lang['romanian']."]|S[".$this->lang['french']."])"), 
    //array("ch","","","(x|tS[".($russian+$english)."]|S[".$this->lang['french']."])"), 

    array("ch", "", "[ei]", "(x|k[".$this->lang['romanian']."]|tS[" . ($this->lang['russian'] + $this->lang['english']) . "])"),
    array("ch", "", "", "(x|tS[" . ($this->lang['russian'] + $this->lang['english']) . "])"),

    array("ck", "", "", "(k|tsk[".$this->lang['polish']."])"),

    array("czy", "", "", "tSi"),
    array("cze", "", "[bcdgkpstwz?]", "(tSe|tSF)"),
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
    array("cz", "", "", "tS"), // Polish

    array("cia", "", "[bcdgkpstwz?]", "(tSB[".$this->lang['polish']."]|tsB)"),
    array("cia", "", "", "(tSa[".$this->lang['polish']."]|tsa)"),
    array("ci?", "", "[bp]", "(tSom[".$this->lang['polish']."]|tsom)"),
    array("ci?", "", "", "(tSon[".$this->lang['polish']."]|tson)"),
    array("ci?", "", "[bp]", "(tSem[".$this->lang['polish']."]|tsem)"),
    array("ci?", "", "", "(tSen[".$this->lang['polish']."]|tsen)"),
    array("cie", "", "[bcdgkpstwz?]", "(tSF[".$this->lang['polish']."]|tsF)"),
    array("cie", "", "", "(tSe[".$this->lang['polish']."]|tse)"),
    array("cio", "", "", "(tSo[".$this->lang['polish']."]|tso)"),
    array("ciu", "", "", "(tSu[".$this->lang['polish']."]|tsu)"),

    array("ci", "", "$", "(tsi[".$this->lang['polish']."]|tSi[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|tS[".$this->lang['romanian']."]|si)"),
    array("ci", "", "", "(tsi[".$this->lang['polish']."]|tSi[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|si)"),
    array("ce", "", "[bcdgkpstwz?]", "(tsF[".$this->lang['polish']."]|tSe[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|se)"),
    array("ce", "", "", "(tSe[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|tse[".$this->lang['polish']."]|se)"),
    array("cy", "", "", "(si|tsi[".$this->lang['polish']."])"),

    array("ssz", "", "", "S"), // Polish
    array("sz", "", "", "S"), // Polish; actually could also be Hungarian /s/, disabled here

    array("ssp", "", "", "(Sp[".$this->lang['german']."]|sp)"),
    array("sp", "", "", "(Sp[".$this->lang['german']."]|sp)"),
    array("sst", "", "", "(St[".$this->lang['german']."]|st)"),
    array("st", "", "", "(St[".$this->lang['german']."]|st)"),
    array("ss", "", "", "s"),

    array("sia", "", "[bcdgkpstwz?]", "(SB[".$this->lang['polish']."]|sB[".$this->lang['polish']."]|sja)"),
    array("sia", "", "", "(Sa[".$this->lang['polish']."]|sja)"),
    array("si?", "", "[bp]", "(Som[".$this->lang['polish']."]|som)"),
    array("si?", "", "", "(Son[".$this->lang['polish']."]|son)"),
    array("si?", "", "[bp]", "(Sem[".$this->lang['polish']."]|sem)"),
    array("si?", "", "", "(Sen[".$this->lang['polish']."]|sen)"),
    array("sie", "", "[bcdgkpstwz?]", "(SF[".$this->lang['polish']."]|sF|zi[".$this->lang['german']."])"),
    array("sie", "", "", "(se|Se[".$this->lang['polish']."]|zi[".$this->lang['german']."])"),
    array("sio", "", "", "(So[".$this->lang['polish']."]|so)"),
    array("siu", "", "", "(Su[".$this->lang['polish']."]|sju)"),
    array("si", "", "", "(Si[".$this->lang['polish']."]|si|zi[".$this->lang['german']."])"),
    array("s", "", "[aeiou???]", "(s|z[".$this->lang['german']."])"),

    array("gue", "", "", "ge"),
    array("gui", "", "", "gi"),
    array("guy", "", "", "gi"),
    array("gh", "", "[ei]", "(g[".$this->lang['romanian']."]|gh)"),

    array("gauz", "", "$", "haus"),
    array("gaus", "", "$", "haus"),
    array("gol'ts", "", "$", "holts"),
    array("golts", "", "$", "holts"),
    array("gol'tz", "", "$", "holts"),
    array("goltz", "", "", "holts"),
    array("gol'ts", "^", "", "holts"),
    array("golts", "^", "", "holts"),
    array("gol'tz", "^", "", "holts"),
    array("goltz", "^", "", "holts"),
    array("gendler", "", "$", "hendler"),
    array("gejmer", "", "$", "hajmer"),
    array("gejm", "", "$", "hajm"),
    array("geymer", "", "$", "hajmer"),
    array("geym", "", "$", "hajm"),
    array("geimer", "", "$", "hajmer"),
    array("geim", "", "$", "hajm"),
    array("gof", "", "$", "hof"),

    array("ger", "", "$", "ger"),
    array("gen", "", "$", "gen"),
    array("gin", "", "$", "gin"),

    array("gie", "", "$", "(ge|gi[".$this->lang['german']."]|ji[".$this->lang['french']."])"),
    array("gie", "", "", "ge"),
    array("ge", "[yaeiou]", "", "(gE|xe[".$this->lang['spanish']."]|dZe[" . ($this->lang['english'] + $this->lang['romanian']) . "])"),
    array("gi", "[yaeiou]", "", "(gI|xi[".$this->lang['spanish']."]|dZi[" . ($this->lang['english'] + $this->lang['romanian']) . "])"),
    array("ge", "", "", "(gE|dZe[" . ($this->lang['english'] + $this->lang['romanian']) . "]|hE[".$this->lang['russian']."]|xe[".$this->lang['spanish']."])"),
    array("gi", "", "", "(gI|dZi[" . ($this->lang['english'] + $this->lang['romanian']) . "]|hI[".$this->lang['russian']."]|xi[".$this->lang['spanish']."])"),
    array("gy", "", "[aeou????????]", "(gi|dj[".$this->lang['hungarian']."])"),
    array("gy", "", "", "(gi|d[".$this->lang['hungarian']."])"),
    array("g", "[jyaeiou]", "[aouyei]", "g"),
    array("g", "", "[aouei]", "(g|h[".$this->lang['russian']."])"),

    array("ej", "", "", "(aj|eZ[" . ($this->lang['french'] + $this->lang['romanian']) . "]|ex[".$this->lang['spanish']."])"),
    array("ej", "", "", "aj"),

    array("ly", "", "[au]", "l"),
    array("li", "", "[au]", "l"),
    array("lj", "", "[au]", "l"),
    array("lio", "", "", "(lo|le[".$this->lang['russian']."])"),
    array("lyo", "", "", "(lo|le[".$this->lang['russian']."])"),
    array("ll", "", "", "(l|J[".$this->lang['spanish']."])"),

    array("j", "", "[aoeiuy]", "(j|dZ[".$this->lang['english']."]|x[".$this->lang['spanish']."]|Z[" . ($this->lang['french'] + $this->lang['romanian']) . "])"),
    array("j", "", "", "(j|x[".$this->lang['spanish']."])"),

    array("pf", "", "", "(pf|p|f)"),
    array("ph", "", "", "(ph|f)"),

    array("qu", "", "", "(kv[".$this->lang['german']."]|k)"),

    array("rze", "t", "", "(Se[".$this->lang['polish']."]|re)"), // polish
    array("rze", "", "", "(rze|rtsE[".$this->lang['german']."]|Ze[".$this->lang['polish']."]|re[".$this->lang['polish']."]|rZe[".$this->lang['polish']."])"),
    array("rzy", "t", "", "(Si[".$this->lang['polish']."]|ri)"), // polish
    array("rzy", "", "", "(Zi[".$this->lang['polish']."]|ri[".$this->lang['polish']."]|rZi)"),
    array("rz", "t", "", "(S[".$this->lang['polish']."]|r)"), // polish
    array("rz", "", "", "(rz|rts[".$this->lang['german']."]|Z[".$this->lang['polish']."]|r[".$this->lang['polish']."]|rZ[".$this->lang['polish']."])"), // polish

    array("tz", "", "$", "(ts|tS[" . ($this->lang['english'] + $this->lang['german']) . "])"),
    array("tz", "^", "", "(ts|tS[" . ($this->lang['english'] + $this->lang['german']) . "])"),
    array("tz", "", "", "(ts[" . ($this->lang['english'] + $this->lang['german'] + $this->lang['russian']) . "]|tz)"),

    array("zh", "", "", "(Z|zh[".$this->lang['polish']."]|tsh[".$this->lang['german']."])"),

    array("zia", "", "[bcdgkpstwz?]", "(ZB[".$this->lang['polish']."]|zB[".$this->lang['polish']."]|zja)"),
    array("zia", "", "", "(Za[".$this->lang['polish']."]|zja)"),
    array("zi?", "", "[bp]", "(Zom[".$this->lang['polish']."]|zom)"),
    array("zi?", "", "", "(Zon[".$this->lang['polish']."]|zon)"),
    array("zi?", "", "[bp]", "(Zem[".$this->lang['polish']."]|zem)"),
    array("zi?", "", "", "(Zen[".$this->lang['polish']."]|zen)"),
    array("zie", "", "[bcdgkpstwz?]", "(ZF[".$this->lang['polish']."]|zF[".$this->lang['polish']."]|ze|tsi[".$this->lang['german']."])"),
    array("zie", "", "", "(ze|Ze[".$this->lang['polish']."]|tsi[".$this->lang['german']."])"),
    array("zio", "", "", "(Zo[".$this->lang['polish']."]|zo)"),
    array("ziu", "", "", "(Zu[".$this->lang['polish']."]|zju)"),
    array("zi", "", "", "(Zi[".$this->lang['polish']."]|zi|tsi[".$this->lang['german']."])"),

    array("thal", "", "$", "tal"),
    array("th", "^", "", "t"),
    array("th", "", "[aeiou]", "(t[".$this->lang['german']."]|th)"),
    array("th", "", "", "t"), // german
    array("vogel", "", "", "(vogel|fogel[".$this->lang['german']."])"),
    array("v", "^", "", "(v|f[".$this->lang['german']."])"),

    array("h", "[aeiouy???]", "", ""), //german
    array("h", "", "", "(h|x[" . ($this->lang['romanian'] + $this->lang['polish']) . "])"),
    array("h", "^", "", "(h|H[" . ($this->lang['english'] + $this->lang['german']) . "])"), // H can be exact "h" or approximate "kh"

    // VOWELS
    array("yi", "^", "", "i"),

    // array("e","","$","(e|)"),  // French & English rule disabled except for final -ine
    array("e", "in", "$", "(e|[".$this->lang['french']."])"),

    array("ii", "", "$", "i"), // russian
    array("iy", "", "$", "i"), // russian
    array("yy", "", "$", "i"), // russian
    array("yi", "", "$", "i"), // russian
    array("yj", "", "$", "i"), // russian
    array("ij", "", "$", "i"), // russian

    array("aue", "", "", "aue"),
    array("oue", "", "", "oue"),

    array("au", "", "", "(au|o[".$this->lang['french']."])"),
    array("ou", "", "", "(ou|u[".$this->lang['french']."])"),

    array("ue", "", "", "(Q|uje[".$this->lang['russian']."])"),
    array("ae", "", "", "(Y[".$this->lang['german']."]|aje[".$this->lang['russian']."]|ae)"),
    array("oe", "", "", "(Y[".$this->lang['german']."]|oje[".$this->lang['russian']."]|oe)"),
    array("ee", "", "", "(i[".$this->lang['english']."]|aje[".$this->lang['russian']."]|e)"),

    array("ei", "", "", "aj"),
    array("ey", "", "", "aj"),
    array("eu", "", "", "(aj[".$this->lang['german']."]|oj[".$this->lang['german']."]|eu)"),

    array("i", "[aou]", "", "j"),
    array("y", "[aou]", "", "j"),

    array("ie", "", "[bcdgkpstwz?]", "(i[".$this->lang['german']."]|e[".$this->lang['polish']."]|ije[".$this->lang['russian']."]|je)"),
    array("ie", "", "", "(i[".$this->lang['german']."]|e[".$this->lang['polish']."]|ije[".$this->lang['russian']."]|je)"),
    array("ye", "", "", "(je|ije[".$this->lang['russian']."])"),

    array("i", "", "[au]", "j"),
    array("y", "", "[au]", "j"),
    array("io", "", "", "(jo|e[".$this->lang['russian']."])"),
    array("yo", "", "", "(jo|e[".$this->lang['russian']."])"),

    array("ea", "", "", "(ea|ja[".$this->lang['romanian']."])"),
    array("e", "^", "", "(e|je[".$this->lang['russian']."])"),
    array("oo", "", "", "(u[".$this->lang['english']."]|o)"),
    array("uu", "", "", "u"),

// LANGUAGE SPECIFIC CHARACTERS 
    array("?", "", "", "(tS[".$this->lang['polish']."]|ts)"), // polish
    array("?", "", "", "l"), // polish
    array("?", "", "", "n"), // polish
    array("?", "", "", "(n|nj[".$this->lang['spanish']."])"),
    array("?", "", "", "(S[".$this->lang['polish']."]|s)"), // polish
    array("?", "", "", "S"), // romanian
    array("?", "", "", "ts"), // romanian
    array("?", "", "", "Z"), // polish
    array("?", "", "", "(Z[".$this->lang['polish']."]|z)"), // polish

    array("o?", "", "", "u"), // french

    array("?", "", "[bp]", "om"), // polish
    array("?", "", "", "on"), // polish
    array("?", "", "", "(Y|e)"), // german
    array("?", "", "", "a"), // hungarian
    array("?", "", "", "(e[".$this->lang['romanian']."]|a)"), //romanian
    array("?", "", "", "a"), // french
    array("?", "", "", "a"), //french+romanian
    array("?", "", "", "e"),
    array("?", "", "", "e"), // french
    array("?", "", "", "e"), // french
    array("?", "", "[bp]", "em"), // polish
    array("?", "", "", "en"), // polish
    array("?", "", "", "i"),
    array("?", "", "", "i"),
    array("?", "", "", "Y"),
    array("?", "", "", "Y"), // hungarian
    array("?", "", "", "(u[".$this->lang['polish']."]|o)"),
    array("?", "", "", "Q"),
    array("?", "", "", "Q"),
    array("?", "", "", "u"),
    array("?", "", "", "Q"), // hungarian

    array("?", "", "", "s"), // german
    array("'", "", "", ""),
    array('"', "", "", ""),

    array("a", "", "[bcdgkpstwz?]", "(A|B[".$this->lang['polish']."])"),
    array("e", "", "[bcdgkpstwz?]", "(E|F[".$this->lang['polish']."])"),
    array("o", "", "[bc?dgkl?mn?rs?twz??]", "(O|P[".$this->lang['polish']."])"),

    // LATIN ALPHABET
    array("a", "", "", "A"),
    array("b", "", "", "b"),
    array("c", "", "", "(k|ts[".$this->lang['polish']."])"),
    array("d", "", "", "d"),
    array("e", "", "", "E"),
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("h", "", "", "h"),
    array("i", "", "", "I"),
    array("j", "", "", "j"),
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("o", "", "", "O"),
    array("p", "", "", "p"),
    array("q", "", "", "k"),
    array("r", "", "", "r"),
    array("s", "", "", "s"),
    array("t", "", "", "t"),
    array("u", "", "", "U"),
    array("v", "", "", "v"),
    array("w", "", "", "v"), // English disabled
    array("x", "", "", "ks"),
    array("y", "", "", "i"),
    array("z", "", "", "(ts[".$this->lang['german']."]|z)"),

    array("rulesany")
    
);
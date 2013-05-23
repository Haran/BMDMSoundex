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


/**
 * DESCRIPTION
 *
 * format of each entry rule in the table
 * (pattern, left context, right context, phonetic)
 * where
 *   pattern is a sequence of characters that might appear in the word to be transliterated
 *   left context is the context that precedes the pattern
 *   right context is the context that follows the pattern
 *   phonetic is the result that this rule generates
 *
 * note that both left context and right context can be regular expressions
 * ex: left context of ^ would mean start of word
 *     left context of [aeiouy] means following a vowel
 *     right context of [^aeiouy] means preceding a consonant
 *     right context of e$ means preceding a final e
*/

//GENERIC
$this->rules[ $this->getLanguageIndexByName('any') ] = array(

    // CONVERTING FEMININE TO MASCULINE
    array("yna", "", "$", "(in[".$this->lang['russian']."]|ina)"),
    array("ina", "", "$", "(in[".$this->lang['russian']."]|ina)"),
    array("liova", "", "$", "(lova|lof[".$this->lang['russian']."]|lef[".$this->lang['russian']."])"),
    array("lova", "", "$", "(lova|lof[".$this->lang['russian']."]|lef[".$this->lang['russian']."]|l[".$this->lang['czech']."]|el[".$this->lang['czech']."])"),
    array("kova", "", "$", "(kova|kof[".$this->lang['russian']."]|k[".$this->lang['czech']."]|ek[".$this->lang['czech']."])"),
    array("ova", "", "$", "(ova|of[".$this->lang['russian']."]|[".$this->lang['czech']."])"),
    array("ová", "", "$", "(ova|[".$this->lang['czech']."])"),
    array("eva", "", "$", "(eva|ef[".$this->lang['russian']."])"),
    array("aia", "", "$", "(aja|i[".$this->lang['russian']."])"),
    array("aja", "", "$", "(aja|i[".$this->lang['russian']."])"),
    array("aya", "", "$", "(aja|i[".$this->lang['russian']."])"),

    array("lowa", "", "$", "(lova|lof[".$this->lang['polish']."]|l[".$this->lang['polish']."]|el[".$this->lang['polish']."])"),
    array("kowa", "", "$", "(kova|kof[".$this->lang['polish']."]|k[".$this->lang['polish']."]|ek[".$this->lang['polish']."])"),
    array("owa", "", "$", "(ova|of[".$this->lang['polish']."]|)"),
    array("lowna", "", "$", "(lovna|levna|l[".$this->lang['polish']."]|el[".$this->lang['polish']."])"),
    array("kowna", "", "$", "(kovna|k[".$this->lang['polish']."]|ek[".$this->lang['polish']."])"),
    array("owna", "", "$", "(ovna|[".$this->lang['polish']."])"),
    array("lówna", "", "$", "(l|el)"), // polish
    array("kówna", "", "$", "(k|ek)"), // polish
    array("ówna", "", "$", ""), // polish
    array("á", "", "$", "(a|i[".$this->lang['czech']."])"),
    array("a", "", "$", "(a|i[". ($this->lang['polish'] + $this->lang['czech']) ."])"),

    // CONSONANTS
    array("pf", "", "", "(pf|p|f)"),
    array("que", "", "$", "(k[".$this->lang['french']."]|ke|kve)"),
    array("qu", "", "", "(kv|k)"),

    array("m", "", "[bfpv]", "(m|n)"),
    array("m", "[aeiouy]", "[aeiouy]", "m"),
    array("m", "[aeiouy]", "", "(m|n[" . ($this->lang['french'] + $this->lang['portuguese']) . "])"), // nasal

    array("ly", "", "[au]", "l"),
    array("li", "", "[au]", "l"),
    array("lio", "", "", "(lo|le[".$this->lang['russian']."])"),
    array("lyo", "", "", "(lo|le[".$this->lang['russian']."])"),
    //array("ll","","","(l|J[".$this->lang['spanish']."])"),  // Disabled Argentinian rule
    array("lt", "u", "$", "(lt|[".$this->lang['french']."])"),

    array("v", "^", "", "(v|f[".$this->lang['german']."]|b[".$this->lang['spanish']."])"),

    array("ex", "", "[aáuiíoóeéêy]", "(ez[".$this->lang['portuguese']."]|eS[".$this->lang['portuguese']."]|eks|egz)"),
    array("ex", "", "[cs]", "(e[".$this->lang['portuguese']."]|ek)"),
    array("x", "u", "$", "(ks|[".$this->lang['french']."])"),

    array("ck", "", "", "(k|tsk[" . ($this->lang['polish'] + $this->lang['czech']) . "])"),
    array("cz", "", "", "(tS|tsz[".$this->lang['czech']."])"), // Polish

    //Proceccing of "h" in various combinations
    array("rh", "^", "", "r"),
    array("dh", "^", "", "d"),
    array("bh", "^", "", "b"),

    array("ph", "", "", "(ph|f)"),
    array("kh", "", "", "(x[" . ($this->lang['russian'] + $this->lang['english']) . "]|kh)"),

    array("lh", "", "", "(lh|l[".$this->lang['portuguese']."])"),
    array("nh", "", "", "(nh|nj[".$this->lang['portuguese']."])"),

    array("ssch", "", "", "S"), // german
    array("chsch", "", "", "xS"), // german
    array("tsch", "", "", "tS"), // german

    /// array("desch","^","","deS"),
    /// array("desh","^","","(dES|de[".$this->lang['french']."])"),
    /// array("des","^","[^aeiouy]","(dEs|de[".$this->lang['french']."])"),

    array("sch", "[aeiouy]", "[ei]", "(S|StS[".$this->lang['russian']."]|sk[" . ($this->lang['romanian'] + $this->lang['italian']) . "])"),
    array("sch", "[aeiouy]", "", "(S|StS[".$this->lang['russian']."])"),
    array("sch", "", "[ei]", "(sk[" . ($this->lang['romanian'] + $this->lang['italian']) . "]|S|StS[".$this->lang['russian']."])"),
    array("sch", "", "", "(S|StS[".$this->lang['russian']."])"),
    array("ssh", "", "", "S"),

    array("sh", "", "[äöü]", "sh"), // german
    array("sh", "", "[aeiou]", "(S[" . ($this->lang['russian'] + $this->lang['english']) . "]|sh)"),
    array("sh", "", "", "S"),

    array("zh", "", "", "(Z[" . ($this->lang['english'] + $this->lang['russian']) . "]|zh|tsh[".$this->lang['german']."])"),

    array("chs", "", "", "(ks[".$this->lang['german']."]|xs|tSs[" . ($this->lang['russian'] + $this->lang['english']) . "])"),
    array("ch", "", "[ei]", "(x|tS[" . ($this->lang['spanish'] + $this->lang['english'] + $this->lang['russian']) . "]|k[" . ($this->lang['romanian'] + $this->lang['italian']) . "]|S[" . ($this->lang['portuguese'] + $this->lang['french']) . "])"),
    array("ch", "", "", "(x|tS[" . ($this->lang['spanish'] + $this->lang['english'] + $this->lang['russian']) . "]|S[" . ($this->lang['portuguese'] + $this->lang['french']) . "])"),

    array("th", "^", "", "t"), // english+german+greeklatin
    array("th", "", "[äöüaeiou]", "(t[" . ($this->lang['english'] + $this->lang['german'] + $this->lang['greeklatin']) . "]|th)"),
    array("th", "", "", "t"), // english+german+greeklatin

    array("gh", "", "[ei]", "(g[" . ($this->lang['romanian'] + $this->lang['italian'] + $this->lang['greeklatin']) . "]|gh)"),

    array("ouh", "", "[aioe]", "(v[".$this->lang['french']."]|uh)"),
    array("uh", "", "[aioe]", "(v|uh)"),
    array("h", "", "$", ""),
    array("h", "[aeiouyäöü]", "", ""), // german
    array("h", "^", "", "(h|x[" . ($this->lang['romanian'] + $this->lang['greeklatin']) . "]|H[" . ($this->lang['english'] + $this->lang['romanian'] + $this->lang['polish'] + $this->lang['french'] + $this->lang['portuguese'] + $this->lang['italian'] + $this->lang['spanish']) . "])"),

    //Processing of "ci", "ce" & "cy"
    array("cia", "", "", "(tSa[".$this->lang['polish']."]|tsa)"),       // Polish
    array("cią", "", "[bp]", "(tSom|tsom)"),                            // Polish
    array("cią", "", "", "(tSon[".$this->lang['polish']."]|tson)"),     // Polish
    array("cię", "", "[bp]", "(tSem[".$this->lang['polish']."]|tsem)"), // Polish
    array("cię", "", "", "(tSen[".$this->lang['polish']."]|tsen)"),     // Polish
    array("cie", "", "", "(tSe[".$this->lang['polish']."]|tse)"),       // Polish
    array("cio", "", "", "(tSo[".$this->lang['polish']."]|tso)"),       // Polish
    array("ciu", "", "", "(tSu[".$this->lang['polish']."]|tsu)"),       // Polish

    array("sci", "", "$", "(Si[".$this->lang['italian']."]|stsi[" . ($this->lang['polish'] + $this->lang['czech']) . "]|dZi[".$this->lang['turkish']."]|tSi[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|tS[".$this->lang['romanian']."]|si)"),
    array("sc", "", "[ei]", "(S[".$this->lang['italian']."]|sts[" . ($this->lang['polish'] + $this->lang['czech']) . "]|dZ[".$this->lang['turkish']."]|tS[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|s)"),
    array("ci", "", "$", "(tsi[" . ($this->lang['polish'] + $this->lang['czech']) . "]|dZi[".$this->lang['turkish']."]|tSi[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|tS[".$this->lang['romanian']."]|si)"),
    array("cy", "", "", "(si|tsi[".$this->lang['polish']."])"),
    array("c", "", "[ei]", "(ts[" . ($this->lang['polish'] + $this->lang['czech']) . "]|dZ[".$this->lang['turkish']."]|tS[" . ($this->lang['polish'] + $this->lang['romanian']) . "]|k[".$this->lang['greeklatin']."]|s)"),

    //Processing of "s"
    array("sç", "", "[aeiou]", "(s|stS[".$this->lang['turkish']."])"),
    array("ssz", "", "", "S"), // polish
    array("sz", "^", "", "(S|s[".$this->lang['hungarian']."])"), // polish
    array("sz", "", "$", "(S|s[".$this->lang['hungarian']."])"), // polish
    array("sz", "", "", "(S|s[".$this->lang['hungarian']."]|sts[".$this->lang['german']."])"), // polish
    array("ssp", "", "", "(Sp[".$this->lang['german']."]|sp)"),
    array("sp", "", "", "(Sp[".$this->lang['german']."]|sp)"),
    array("sst", "", "", "(St[".$this->lang['german']."]|st)"),
    array("st", "", "", "(St[".$this->lang['german']."]|st)"),
    array("ss", "", "", "s"),
    array("sj", "^", "", "S"), // dutch
    array("sj", "", "$", "S"), // dutch
    array("sj", "", "", "(sj|S[".$this->lang['dutch']."]|sx[".$this->lang['spanish']."]|sZ[" . ($this->lang['romanian'] + $this->lang['turkish']) . "])"),

    array("sia", "", "", "(Sa[".$this->lang['polish']."]|sa[".$this->lang['polish']."]|sja)"),
    array("sią", "", "[bp]", "(Som[".$this->lang['polish']."]|som)"), // polish
    array("sią", "", "", "(Son[".$this->lang['polish']."]|son)"),     // polish
    array("się", "", "[bp]", "(Sem[".$this->lang['polish']."]|sem)"), // polish
    array("się", "", "", "(Sen[".$this->lang['polish']."]|sen)"),     // polish
    array("sie", "", "", "(se|sje|Se[".$this->lang['polish']."]|zi[".$this->lang['german']."])"),

    array("sio", "", "", "(So[".$this->lang['polish']."]|so)"),
    array("siu", "", "", "(Su[".$this->lang['polish']."]|sju)"),

    array("si", "[äöëaáuiíoóeéêy]", "", "(Si[".$this->lang['polish']."]|si|zi[" . ($this->lang['portuguese'] + $this->lang['french'] + $this->lang['italian'] + $this->lang['german']) . "])"),
    array("si", "", "", "(Si[".$this->lang['polish']."]|si|zi[".$this->lang['german']."])"),
    array("s", "[aáuiíoóeéêy]", "[aáuíoóeéêy]", "(s|z[" . ($this->lang['portuguese'] + $this->lang['french'] + $this->lang['italian'] + $this->lang['german']) . "])"),
    array("s", "", "[aeouäöë]", "(s|z[".$this->lang['german']."])"),
    array("s", "[aeiouy]", "[dglmnrv]", "(s|z|Z[".$this->lang['portuguese']."]|[".$this->lang['french']."])"), // Groslot
    array("s", "", "[dglmnrv]", "(s|z|Z[".$this->lang['portuguese']."])"),

    //Processing of "g"
    array("gue", "", "$", "(k[".$this->lang['french']."]|gve)"), // portuguese+spanish
    array("gu", "", "[ei]", "(g[".$this->lang['french']."]|gv[" . ($this->lang['portuguese'] + $this->lang['spanish']) . "])"), // portuguese+spanish
    array("gu", "", "[ao]", "gv"), // portuguese+spanish
    array("guy", "", "", "gi"), // french

    array("gli", "", "", "(glI|l[".$this->lang['italian']."])"),
    array("gni", "", "", "(gnI|ni[" . ($this->lang['italian'] + $this->lang['french']) . "])"),
    array("gn", "", "[aeou]", "(n[" . ($this->lang['italian'] + $this->lang['french']) . "]|nj[" . ($this->lang['italian'] + $this->lang['french']) . "]|gn)"),

    array("ggie", "", "", "(je[".$this->lang['greeklatin']."]|dZe)"), // dZ is Italian
    array("ggi", "", "[aou]", "(j[".$this->lang['greeklatin']."]|dZ)"), // dZ is Italian

    array("ggi", "[yaeiou]", "[aou]", "(gI|dZ[".$this->lang['italian']."]|j[".$this->lang['greeklatin']."])"),
    array("gge", "[yaeiou]", "", "(gE|xe[".$this->lang['spanish']."]|gZe[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZe[" . ($this->lang['english'] + $this->lang['romanian'] + $this->lang['italian'] + $this->lang['spanish']) . "]|je[".$this->lang['greeklatin']."])"),
    array("ggi", "[yaeiou]", "", "(gI|xi[".$this->lang['spanish']."]|gZi[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZi[" . ($this->lang['english'] + $this->lang['romanian'] + $this->lang['italian'] + $this->lang['spanish']) . "]|i[".$this->lang['greeklatin']."])"),
    array("ggi", "", "[aou]", "(gI|dZ[".$this->lang['italian']."]|j[".$this->lang['greeklatin']."])"),

    array("gie", "", "$", "(ge|gi[".$this->lang['german']."]|ji[".$this->lang['french']."]|dZe[".$this->lang['italian']."])"),
    array("gie", "", "", "(ge|gi[".$this->lang['german']."]|dZe[".$this->lang['italian']."]|je[".$this->lang['greeklatin']."])"),
    array("gi", "", "[aou]", "(i[".$this->lang['greeklatin']."]|dZ)"), // dZ is Italian

    array("ge", "[yaeiou]", "", "(gE|xe[".$this->lang['spanish']."]|Ze[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZe[" . ($this->lang['english'] + $this->lang['romanian'] + $this->lang['italian'] + $this->lang['spanish']) . "])"),
    array("gi", "[yaeiou]", "", "(gI|xi[".$this->lang['spanish']."]|Zi[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZi[" . ($this->lang['english'] + $this->lang['romanian'] + $this->lang['italian'] + $this->lang['spanish']) . "])"),
    array("ge", "", "", "(gE|xe[".$this->lang['spanish']."]|hE[".$this->lang['russian']."]|je[".$this->lang['greeklatin']."]|Ze[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZe[" . ($this->lang['english'] + $this->lang['romanian'] + $this->lang['italian'] + $this->lang['spanish']) . "])"),
    array("gi", "", "", "(gI|xi[".$this->lang['spanish']."]|hI[".$this->lang['russian']."]|i[".$this->lang['greeklatin']."]|Zi[" . ($this->lang['portuguese'] + $this->lang['french']) . "]|dZi[" . ($this->lang['english'] + $this->lang['romanian'] + $this->lang['italian'] + $this->lang['spanish']) . "])"),
    array("gy", "", "[aeouáéóúüöőű]", "(gi|dj[".$this->lang['hungarian']."])"),
    array("gy", "", "", "(gi|d[".$this->lang['hungarian']."])"),
    array("g", "[yaeiou]", "[aouyei]", "g"),
    array("g", "", "[aouei]", "(g|h[".$this->lang['russian']."])"),

    //Processing of "j"
    array("ij", "", "", "(i|ej[".$this->lang['dutch']."]|ix[".$this->lang['spanish']."]|iZ[" . ($this->lang['french'] + $this->lang['romanian'] + $this->lang['turkish'] + $this->lang['portuguese']) . "])"),
    array("j", "", "[aoeiuy]", "(j|dZ[".$this->lang['english']."]|x[".$this->lang['spanish']."]|Z[" . ($this->lang['french'] + $this->lang['romanian'] + $this->lang['turkish'] + $this->lang['portuguese']) . "])"),

    //Processing of "z"
    array("rz", "t", "", "(S[".$this->lang['polish']."]|r)"), // polish
    array("rz", "", "", "(rz|rts[".$this->lang['german']."]|Z[".$this->lang['polish']."]|r[".$this->lang['polish']."]|rZ[".$this->lang['polish']."])"),

    array("tz", "", "$", "(ts|tS[" . ($this->lang['english'] + $this->lang['german']) . "])"),
    array("tz", "^", "", "(ts[" . ($this->lang['english'] + $this->lang['german'] + $this->lang['russian']) . "]|tS[" . ($this->lang['english'] + $this->lang['german']) . "])"),
    array("tz", "", "", "(ts[" . ($this->lang['english'] + $this->lang['german'] + $this->lang['russian']) . "]|tz)"),

    array("zia", "", "[bcdgkpstwzż]", "(Za[".$this->lang['polish']."]|za[".$this->lang['polish']."]|zja)"),
    array("zia", "", "", "(Za[".$this->lang['polish']."]|zja)"),
    array("zią", "", "[bp]", "(Zom[".$this->lang['polish']."]|zom)"), // polish
    array("zią", "", "", "(Zon[".$this->lang['polish']."]|zon)"), // polish
    array("zię", "", "[bp]", "(Zem[".$this->lang['polish']."]|zem)"), // polish
    array("zię", "", "", "(Zen[".$this->lang['polish']."]|zen)"), // polish
    array("zie", "", "[bcdgkpstwzż]", "(Ze[".$this->lang['polish']."]|ze[".$this->lang['polish']."]|ze|tsi[".$this->lang['german']."])"),
    array("zie", "", "", "(ze|Ze[".$this->lang['polish']."]|tsi[".$this->lang['german']."])"),
    array("zio", "", "", "(Zo[".$this->lang['polish']."]|zo)"),
    array("ziu", "", "", "(Zu[".$this->lang['polish']."]|zju)"),
    array("zi", "", "", "(Zi[".$this->lang['polish']."]|zi|tsi[".$this->lang['german']."]|dzi[".$this->lang['italian']."]|tsi[".$this->lang['italian']."]|si[".$this->lang['spanish']."])"),

    array("z", "", "$", "(s|ts[".$this->lang['german']."]|ts[".$this->lang['italian']."]|S[".$this->lang['portuguese']."])"), // ts It, s/S/Z Port, s in Sp, z Fr
    array("z", "", "[bdgv]", "(z|dz[".$this->lang['italian']."]|Z[".$this->lang['portuguese']."])"), // dz It, Z/z Port, z Sp & Fr
    array("z", "", "[ptckf]", "(s|ts[".$this->lang['italian']."]|S[".$this->lang['portuguese']."])"), // ts It, s/S/z Port, z/s Sp

    // VOWELS
    array("aue", "", "", "aue"),
    array("oue", "", "", "(oue|ve[".$this->lang['french']."])"),
    array("eau", "", "", "o"), // French

    array("ae", "", "", "(Y[".$this->lang['german']."]|aje[".$this->lang['russian']."]|ae)"),
    array("ai", "", "", "aj"),
    array("au", "", "", "(au|o[".$this->lang['french']."])"),
    array("ay", "", "", "aj"),
    array("ão", "", "", "(au|an)"), // Port
    array("ãe", "", "", "(aj|an)"), // Port
    array("ãi", "", "", "(aj|an)"), // Port
    array("ea", "", "", "(ea|ja[".$this->lang['romanian']."])"),
    array("ee", "", "", "(i[".$this->lang['english']."]|aje[".$this->lang['russian']."]|e)"),
    array("ei", "", "", "(aj|ej)"),
    array("eu", "", "", "(eu|Yj[".$this->lang['german']."]|ej[".$this->lang['german']."]|oj[".$this->lang['german']."]|Y[".$this->lang['dutch']."])"),
    array("ey", "", "", "(aj|ej)"),
    array("ia", "", "", "ja"),
    array("ie", "", "", "(D[".$this->lang['latvian']."]ie|i[".$this->lang['german']."]|e[".$this->lang['polish']."]|ije[".$this->lang['russian']."]|Q[".$this->lang['dutch']."]|je)"),
    array("ii", "", "$", "i"), // russian
    array("io", "", "", "(jo|e[".$this->lang['russian']."])"),
    array("iu", "", "", "ju"),
    array("iy", "", "$", "i"), // russian
    array("oe", "", "", "(Y[".$this->lang['german']."]|oje[".$this->lang['russian']."]|u[".$this->lang['dutch']."]|oe)"),
    array("oi", "", "", "oj"),
    array("oo", "", "", "(u[".$this->lang['english']."]|o)"),
    array("ou", "", "", "(ou|u[" . ($this->lang['french'] + $this->lang['greeklatin']) . "]|au[".$this->lang['dutch']."])"),
    array("où", "", "", "u"), // french
    array("oy", "", "", "oj"),
    array("õe", "", "", "(oj|on)"), // Port
    array("ua", "", "", "va"),
    array("ue", "", "", "(Q[".$this->lang['german']."]|uje[".$this->lang['russian']."]|ve)"),
    array("ui", "", "", "(uj|vi|Y[".$this->lang['dutch']."])"),
    array("uu", "", "", "(u|Q[".$this->lang['dutch']."])"),
    array("uo", "", "", "(vo|o)"),
    array("uy", "", "", "uj"),
    array("ya", "", "", "ja"),
    array("ye", "", "", "(je|ije[".$this->lang['russian']."])"),
    array("yi", "^", "", "i"),
    array("yi", "", "$", "i"), // russian
    array("yo", "", "", "(jo|e[".$this->lang['russian']."])"),
    array("yu", "", "", "ju"),
    array("yy", "", "$", "i"), // russian

    array("i", "[áóéê]", "", "j"),
    array("y", "[áóéê]", "", "j"),

    array("e", "^", "", "(e|je[".$this->lang['russian']."])"),
    array("e", "", "$", "(e|EE[" . ($this->lang['english'] + $this->lang['french']) . "])"),

    // LANGUAGE SPECIFIC CHARACTERS
    array("ą", "", "[bp]", "om"), // polish
    array("ą", "", "", "on"), // polish
    array("ä", "", "", "(Y|e)"),
    array("á", "", "", "a"), // Port & Sp
    array("à", "", "", "a"),
    array("ā", "", "", "a"),
    array("â", "", "", "a"),
    array("ã", "", "", "(a|an)"), // Port
    array("ă", "", "", "(e[".$this->lang['romanian']."]|a)"), // romanian
    array("č", "", "", "tS"), // czech + latvian
    array("ć", "", "", "(tS[".$this->lang['polish']."]|ts)"), // polish
    array("ç", "", "", "(s|tS[".$this->lang['turkish']."])"),
    array("ď", "", "", "(d|dj[".$this->lang['czech']."])"),
    array("ę", "", "[bp]", "em"), // polish
    array("ę", "", "", "en"), // polish
    array("é", "", "", "e"),
    array("è", "", "", "e"),
    array("ê", "", "", "e"),
    array("ē", "", "", "e"),
    array("ě", "", "", "(e|je[".$this->lang['czech']."])"),
    array("ğ", "", "", ""), // turkish
    array("ģ", "", "", "(d|dj)"), // latvian
    array("ī", "", "", "i"),
    array("í", "", "", "i"),
    array("î", "", "", "i"),
    array("ı", "", "", "(i|e[".$this->lang['turkish']."]|[".$this->lang['turkish']."])"),
    array("ķ","","","(t|ti)"),
    array("ļ", "", "", "l"), // latvian
    array("ł", "", "", "l"),
    array("ń", "", "", "(n|nj[".$this->lang['polish']."])"),
    array("ñ", "", "", "(n|nj[".$this->lang['spanish']."])"),
    array("ņ", "", "", "(n|nj[".$this->lang['latvian']."])"),
    array("ó", "", "", "(u[".$this->lang['polish']."]|o)"),
    array("ô", "", "", "o"), // Port & Fr
    array("õ", "", "", "(o|on[".$this->lang['portuguese']."]|Y[".$this->lang['hungarian']."])"),
    array("ò", "", "", "o"), // Sp & It
    array("ö", "", "", "Y"),
    array("ř", "", "", "(r|rZ[".$this->lang['czech']."])"),
    array("ś", "", "", "(S[".$this->lang['polish']."]|s)"),
    array("ş", "", "", "S"),  // romanian+turkish
    array("š", "", "", "S"),  // czech+latvian
    array("ţ", "", "", "ts"), // romanian
    array("ť", "", "", "(t|tj[".$this->lang['czech']."])"),
    array("ű", "", "", "Q"), // hungarian
    array("ü", "", "", "(Q|u[" . ($this->lang['portuguese'] + $this->lang['spanish']) . "])"),
    array("ú", "", "", "u"),
    array("ů", "", "", "u"), // czech
    array("ù", "", "", "u"), // french
    array("ū", "", "", "u"), // latvian
    array("ý", "", "", "i"), // czech
    array("ż", "", "", "Z"), // polish
    array("ž", "", "", "Z"), // latvian
    array("ź", "", "", "(Z[".$this->lang['polish']."]|z)"),

    array("ß", "", "", "s"), // german
    array("'", "", "", ""),  // russian
    array('"', "", "", ""),  // russian

    array("o", "", "[bcćdgklłmnńrsśtwzźż]", "(O|P[".$this->lang['polish']."])"),

    // LATIN ALPHABET
    array("a", "", "", "A"),
    array("b", "", "", "B"),
    array("c", "", "", "(k|ts[" . ($this->lang['polish'] + $this->lang['czech']) . "]|dZ[".$this->lang['turkish']."])"),
    array("d", "", "", "d"),
    array("e", "", "", "E"),
    array("f", "", "", "f"),
    //array("g","","","(g|x[".$this->lang['dutch']."])"), // Dutch sound disabled
    array("g", "", "", "g"),
    array("h", "", "", "(h|x[".$this->lang['romanian']."]|H[" . ($this->lang['french'] + $this->lang['portuguese'] + $this->lang['italian'] + $this->lang['spanish']) . "])"),
    array("i", "", "", "I"),
    array("j", "", "", "(j|x[".$this->lang['spanish']."]|Z[" . ($this->lang['french'] + $this->lang['romanian'] + $this->lang['turkish'] + $this->lang['portuguese']) . "])"),
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("o", "", "", "O"),
    array("p", "", "", "p"),
    array("q", "", "", "k"),
    array("r", "", "", "r"),
    array("s", "", "", "(s|S[".$this->lang['portuguese']."])"),
    array("t", "", "", "t"),
    array("u", "", "", "U"),
    array("v", "", "", "V"),
    array("w", "", "", "(v|w[" . ($this->lang['english'] + $this->lang['dutch']) . "])"),
    array("x", "", "", "(ks|gz|S[" . ($this->lang['portuguese'] + $this->lang['spanish']) . "])"), // S/ks Port & Sp, gz Sp, It only ks
    array("y", "", "", "i"),
    array("z", "", "", "(z|ts[".$this->lang['german']."]|dz[".$this->lang['italian']."]|ts[".$this->lang['italian']."]|s[".$this->lang['spanish']."])"), // ts/dz It, z Port & Fr, z/s Sp

    array("rulesany")

);
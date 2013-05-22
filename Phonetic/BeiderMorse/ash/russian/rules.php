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

$this->rules[ $this->getLanguageIndexByName('russian') ] = array(

    // CONVERTING FEMININE TO MASCULINE
    array("yna", "", "$", "(in|ina)"),
    array("ina", "", "$", "(in|ina)"),
    array("liova", "", "$", "(lof|lef)"),
    array("lova", "", "$", "(lof|lef|lova)"),
    array("ova", "", "$", "(of|ova)"),
    array("eva", "", "$", "(ef|ova)"),
    array("aia", "", "$", "(aja|i)"),
    array("aja", "", "$", "(aja|i)"),
    array("aya", "", "$", "(aja|i)"),

    //SPECIFIC CONSONANTS
    array("tsya", "", "", "tsa"),
    array("tsyu", "", "", "tsu"),
    array("tsia", "", "", "tsa"),
    array("tsie", "", "", "tse"),
    array("tsio", "", "", "tso"),
    array("tsye", "", "", "tse"),
    array("tsyo", "", "", "tso"),
    array("tsiu", "", "", "tsu"),
    array("sie", "", "", "se"),
    array("sio", "", "", "so"),
    array("zie", "", "", "ze"),
    array("zio", "", "", "zo"),
    array("sye", "", "", "se"),
    array("syo", "", "", "so"),
    array("zye", "", "", "ze"),
    array("zyo", "", "", "zo"),

    array("gauz", "", "$", "haus"),
    array("gaus", "", "$", "haus"),
    array("gol'ts", "", "$", "holts"),
    array("golts", "", "$", "holts"),
    array("gol'tz", "", "$", "holts"),
    array("goltz", "", "$", "holts"),
    array("gejmer", "", "$", "hajmer"),
    array("gejm", "", "$", "hajm"),
    array("geimer", "", "$", "hajmer"),
    array("geim", "", "$", "hajm"),
    array("geymer", "", "$", "hajmer"),
    array("geym", "", "$", "hajm"),
    array("gendler", "", "$", "hendler"),
    array("gof", "", "$", "hof"),
    array("gojf", "", "$", "hojf"),
    array("goyf", "", "$", "hojf"),
    array("goif", "", "$", "hojf"),
    array("ger", "", "$", "ger"),
    array("gen", "", "$", "gen"),
    array("gin", "", "$", "gin"),
    array("gg", "", "", "g"),
    array("g", "[jaeoiuy]", "[aeoiu]", "g"),
    array("g", "", "[aeoiu]", "(g|h)"),

    array("kh", "", "", "x"),
    array("ch", "", "", "(tS|x)"), // in DJSRE the rule is simpler: array("ch","","","tS");
    array("sch", "", "", "(StS|S)"),
    array("ssh", "", "", "S"),
    array("sh", "", "", "S"),
    array("zh", "", "", "Z"),
    array("tz", "", "$", "ts"), // not in DJSRE
    array("tz", "", "", "(ts|tz)"), // not in DJSRE
    array("c", "", "[iey]", "s"), // not in DJSRE
    array("c", "", "", "k"), // not in DJSRE
    array("qu", "", "", "(kv|k)"), // not in DJSRE
    array("q", "", "", "k"), // not in DJSRE
    array("s", "", "s", ""),

    array("w", "", "", "v"), // not in DJSRE
    array("x", "", "", "ks"), // not in DJSRE

    //SPECIFIC VOWELS
    array("lya", "", "", "la"),
    array("lyu", "", "", "lu"),
    array("lia", "", "", "la"), // not in DJSRE
    array("liu", "", "", "lu"), // not in DJSRE
    array("lja", "", "", "la"), // not in DJSRE
    array("lju", "", "", "lu"), // not in DJSRE
    array("le", "", "", "(lo|lE)"), //not in DJSRE
    array("lyo", "", "", "(lo|le)"), //not in DJSRE
    array("lio", "", "", "(lo|le)"),

    array("ije", "", "", "je"),
    array("ie", "", "", "je"),
    array("iye", "", "", "je"),
    array("iie", "", "", "je"),
    array("yje", "", "", "je"),
    array("ye", "", "", "je"),
    array("yye", "", "", "je"),
    array("yie", "", "", "je"),

    array("ij", "", "[aou]", "j"),
    array("iy", "", "[aou]", "j"),
    array("ii", "", "[aou]", "j"),
    array("yj", "", "[aou]", "j"),
    array("yy", "", "[aou]", "j"),
    array("yi", "", "[aou]", "j"),

    array("io", "", "", "(jo|e)"),
    array("i", "", "[au]", "j"),
    array("i", "[aou]", "", "j"), // not in DJSRE
    array("ei", "", "", "aj"), // not in DJSRE
    array("ey", "", "", "aj"), // not in DJSRE
    array("ej", "", "", "aj"),
    array("yo", "", "", "(jo|e)"), //not in DJSRE
    array("y", "", "[au]", "j"),
    array("y", "[aiou]", "", "j"), // not in DJSRE

    array("ii", "", "$", "i"), // not in DJSRE
    array("iy", "", "$", "i"), // not in DJSRE
    array("yy", "", "$", "i"), // not in DJSRE
    array("yi", "", "$", "i"), // not in DJSRE
    array("yj", "", "$", "i"),
    array("ij", "", "$", "i"),

    array("e", "^", "", "(je|E)"), // in DJSRE the rule is simpler: array("e","^","","je");
    array("ee", "", "", "(aje|i)"), // in DJSRE the rule is simpler: array("ee","","","(eje|aje)");
    array("e", "[aou]", "", "je"),
    array("y", "", "", "I"),
    array("oo", "", "", "(oo|u)"), // not in DJSRE
    array("'", "", "", ""),
    array('"', "", "", ""),

    array("aue", "", "", "aue"),

    // TRIVIAL
    array("a", "", "", "a"),
    array("b", "", "", "b"),
    array("d", "", "", "d"),
    array("e", "", "", "E"),
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("h", "", "", "h"), // not in DJSRE
    array("i", "", "", "I"),
    array("j", "", "", "j"),
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("o", "", "", "o"),
    array("p", "", "", "p"),
    array("r", "", "", "r"),
    array("s", "", "", "s"),
    array("t", "", "", "t"),
    array("u", "", "", "u"),
    array("v", "", "", "v"),
    array("z", "", "", "z"),

    array("rulesrussian")

);
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

$this->rules[ $this->getLanguageIndexByName('german') ] = array(

    // CONSONANTS
    array("ewitsch","","$","evitS"),
    array("owitsch","","$","ovitS"),
    array("evitsch","","$","evitS"),
    array("ovitsch","","$","ovitS"),
    array("witsch","","$","vitS"),
    array("vitsch","","$","vitS"),
    array("ssch","","","S"),
    array("chsch","","","xS"),
    array("sch","","","S"),

    array("ziu","","","tsu"),
    array("zia","","","tsa"),
    array("zio","","","tso"),

    array("chs","","","ks"),
    array("ch","","","x"),
    array("ck","","","k"),
    array("c","","[eiy]","ts"),

    array("sp","^","","Sp"),
    array("st","^","","St"),
    array("ssp","","","(Sp|sp)"),
    array("sp","","","(Sp|sp)"),
    array("sst","","","(St|st)"),
    array("st","","","(St|st)"),
    array("pf","","","(pf|p|f)"),
    array("ph","","","(ph|f)"),
    array("qu","","","kv"),

    array("ewitz","","$","(evits|evitS)"),
    array("ewiz","","$","(evits|evitS)"),
    array("evitz","","$","(evits|evitS)"),
    array("eviz","","$","(evits|evitS)"),
    array("owitz","","$","(ovits|ovitS)"),
    array("owiz","","$","(ovits|ovitS)"),
    array("ovitz","","$","(ovits|ovitS)"),
    array("oviz","","$","(ovits|ovitS)"),
    array("witz","","$","(vits|vitS)"),
    array("wiz","","$","(vits|vitS)"),
    array("vitz","","$","(vits|vitS)"),
    array("viz","","$","(vits|vitS)"),
    array("tz","","","ts"),

    array("thal","","$","tal"),
    array("th","^","","t"),
    array("th","","[äöüaeiou]","(t|th)"),
    array("th","","","t"),
    array("rh","^","","r"),
    array("h","[aeiouyäöü]","",""),
    array("h","^","","H"),

    array("ss","","","s"),
    array("s","","[äöüaeiouy]","(z|s)"),
    array("s","[aeiouyäöüj]","[aeiouyäöü]","z"),
    array("ß","","","s"),

    // VOWELS
    array("ij","","$","i"),
    array("aue","","","aue"),
    array("ue","","","Q"),
    array("ae","","","Y"),
    array("oe","","","Y"),
    array("ü","","","Q"),
    array("ä","","","(Y|e)"),
    array("ö","","","Y"),
    array("ei","","","(aj|ej)"),
    array("ey","","","(aj|ej)"),
    array("eu","","","(Yj|ej|aj|oj)"),
    array("i","[aou]","","j"),
    array("y","[aou]","","j"),
    array("ie","","","I"),
    array("i","","[aou]","j"),
    array("y","","[aoeu]","j"),

    // FOREIGN LETTERs
    array("ñ","","","n"),
    array("ã","","","a"),
    array("ő","","","o"),
    array("ű","","","u"),
    array("ç","","","s"),

    // LATIN ALPHABET
    array("a","","","A"),
    array("b","","","b"),
    array("c","","","k"),
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","I"),
    array("j","","","j"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","O"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","U"),
    array("v","","","(f|v)"),
    array("w","","","v"),
    array("x","","","ks"),
    array("y","","","i"),
    array("z","","","ts"),

    array("rulesgerman")

);
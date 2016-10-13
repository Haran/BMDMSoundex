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

$this->rules[ $this->getLanguageIndexByName('french') ] = array(

    // CONSONANTS
    array("lt","u","$","(lt|)"), // Renault
    array("c","n","$","(k|)"),   // Tronc
    //array("f","","","(f|)"),   // Clef
    array("d","","$","(t|)"),    // Durand
    array("g","n","$","(k|)"),   // Gang
    array("p","","$","(p|)"),    // Trop, Champ
    array("r","e","$","(r|)"),   // Barbier
    array("t","","$","(t|)"),    // Murat, Constant
    array("z","","$","(s|)"),

    array("ds","","$","(ds|)"),
    array("ps","","$","(ps|)"), // Champs
    array("rs","e","$","(rs|)"),
    array("ts","","$","(ts|)"),
    array("s","","$","(s|)"),   // Denis

    array("x","u","$","(ks|)"), // Arnoux

    array("s","[aeéèêiou]","[^aeéèêiou]","(s|)"), // Deschamps, Malesherbes, Groslot
    array("t","[aeéèêiou]","[^aeéèêiou]","(t|)"), // Petitjean

    array("kh","","","x"), // foreign
    array("ph","","","f"),

    array("ç","","","s"),
    array("x","","","ks"),
    array("ch","","","S"),
    array("c","","[eiyéèê]","s"),

    array("gn","","","(n|gn)"),
    array("g","","[eiy]","Z"),
    array("gue","","$","k"),
    array("gu","","[eiy]","g"),
    array("aill","","e","aj"),  // non Jewish
    array("ll","","e","(l|j)"), // non Jewish
    array("que","","$","k"),
    array("qu","","","k"),
    array("s","[aeiouyéèê]","[aeiouyéèê]","z"),
    array("h","[bdgt]","",""), // translit from Arabic

    array("m","[aeiouy]","[aeiouy]", "m"),
    array("m","[aeiouy]","", "(m|n)"),  // nasal

    array("ou","","[aeio]","v"),
    array("u","","[aeio]","v"),

    // VOWELS
    array("aue","","","aue"),
    array("eau","","","o"),
    array("au","","","(o|au)"), // non Jewish
    array("ai","","","(e|aj)"), // [e] is non Jewish
    array("ay","","","(e|aj)"), // [e] is non Jewish
    array("é","","","e"),
    array("ê","","","e"),
    array("è","","","e"),
    array("à","","","a"),
    array("â","","","a"),
    array("où","","","u"),
    array("ou","","","u"),
    array("oi","","","(oj|va)"), // [va] (actually "ua") is non Jewish
    array("ei","","","(aj|ej|e)"), // [e] is non Jewish
    array("ey","","","(aj|ej|e)"), // [e] non Jewish
    array("eu","","","(ej|Y)"), // non Jewish
    array("y","[ou]","","j"),
    array("e","","$","(e|)"),
    array("i","","[aou]","j"),
    array("y","","[aoeu]","j"),

    // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","k"),
    array("d","","","d"),
    array("e","","","e"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","i"),
    array("j","","","Z"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","(u|Q)"),
    array("v","","","v"),
    array("w","","","v"),
    array("y","","","i"),
    array("z","","","z"),

    array("rulesfrench")

);
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

$this->rules[ $this->getLanguageIndexByName('greeklatin') ] = array(

    array("au","","$","af"),
    array("au","","[kpstfh]","af"),
    array("au","","","av"),
    array("eu","","$","ef"),
    array("eu","","[kpstfh]","ef"),
    array("eu","","","ev"),
    array("ou","","","u"),

    array("gge","[aeiouy]","","(nje|je)"), // aggelopoulos
    array("ggi","[aeiouy]","[aou]","(nj|j)"),
    array("ggi","[aeiouy]","","(ni|i)"),
    array("gge","","","je"),
    array("ggi","","","i"),
    array("gg","[aeiouy]","","(ng|g)"),
    array("gg","","","g"),
    array("gk","^","","g"),
    array("gke","[aeiouy]","","(nje|je)"),
    array("gki","[aeiouy]","","(ni|i)"),
    array("gke","","","je"),
    array("gki","","","i"),
    array("gk","[aeiouy]","","(ng|g)"),
    array("gk","","","g"),
    array("nghi","","[aouy]","Nj"),
    array("nghi","","","(Ngi|Ni)"),
    array("nghe","","[aouy]","Nj"),
    array("nghe","","","(Nje|Nge)"),
    array("ghi","","[aouy]","j"),
    array("ghi","","","(gi|i)"),
    array("ghe","","[aouy]","j"),
    array("ghe","","","(je|ge)"),
    array("ngh","","","Ng"),
    array("gh","","","g"),
    array("ngi","","[aouy]","Nj"),
    array("ngi","","","(Ngi|Ni)"),
    array("nge","","[aouy]","Nj"),
    array("nge","","","(Nje|Nge)"),
    array("gi","","[aouy]","j"),
    array("gi","","","(gi|i)"), // what about Pantazis = Pantagis ???
    array("ge","","[aouy]","j"),
    array("ge","","","(je|ge)"),
    array("ng","","","Ng"), // fragakis = fraggakis = frangakis; angel = agel = aggel

    array("i","","[aeou]","j"),
    array("i","[aeou]","","j"),
    array("y","","[aeou]","j"),
    array("y","[aeou]","","j"),
    array("yi","","[aeou]", "j"),
    array("yi","","", "i"),

    array("ch","","","x"),
    array("kh","","","x"),
    array("dh","","","d"),  // actually as "th" in English "that"
    array("dj","","","dZ"), // Turkish words
    array("ph","","","f"),
    array("th","","","t"),
    array("kz","","","gz"),
    array("tz","","","dz"),
    array("s","","[bgdmnr]","z"),

    array("mb","","","(mb|b)"), // Liberis = Limperis = Limberis
    array("mp","^","","b"),
    array("mp","[aeiouy]","","mp"),
    array("mp","","","b"),
    array("nt","^","","d"),
    array("nt","[aeiouy]","","(nd|nt)"), // Greek "nd"
    array("nt","","","(nt|d)"), // Greek "d" after any consonant

    array("á","","","a"),
    array("é","","","e"),
    array("í","","","i"),
    array("ó","","","o"),
    array("óu","","","u"),
    array("ú","","","u"),
    array("ý","","","(i|Q|u)"), // [ü]

    array("a","","","a"),
    array("b","","","(b|v)"), // beta: modern "v", old "b"
    array("c","","","k"),
    array("d","","","d"),    // modern like "th" in English "them", old "d"
    array("e","","","e"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","x"),
    array("i","","","i"),
    array("j","","","(j|Z)"), // Panajotti = Panaiotti; Louijos = Louizos; Pantajis = Pantazis = Pantagis
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("ο","","","o"),
    array("p","","","p"),
    array("q","","","k"), // foreign
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("w","","","v"), // foreign
    array("x","","","ks"),
    array("y","","","(i|Q|u)"), // [ü]
    array("z","","","z"),


    array("rulesgreeklatin")

);
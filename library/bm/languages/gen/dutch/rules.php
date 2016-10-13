<?php
/*
 * Copyright Alexander Beider and Stephen P. Morse, 2008
 * Copyright Olegs Capligins, 2013-2016
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
 *
 */

return [

    // CONSONANTS
    ["ssj","","","S"],
    ["sj","","","S"],
    ["ch","","","x"],
    ["c","","[eiy]","ts"],
    ["ck","","","k"],     // German
    ["pf","","","(pf|p|f)"], // German
    ["ph","","","(ph|f)"],
    ["qu","","","kv"],
    ["th","^","","t"], // German
    ["th","","[äöüaeiou]","(t|th)"], // German
    ["th","","","t"], // German
    ["ss","","","s"],
    ["h","[aeiouy]","",""],

    // VOWELS
    ["aue","","","aue"],
    ["ou","","","au"],
    ["ie","","","(Q|i)"],
    ["uu","","","(Q|u)"],
    ["ee","","","e"],
    ["eu","","","(Y|Yj)"], // Dutch Y
    ["aa","","","a"],
    ["oo","","","o"],
    ["oe","","","u"],
    ["ij","","","ej"],
    ["ui","","","(Y|uj)"],
    ["ei","","","(ej|aj)"], // Dutch ej

    ["i","","[aou]","j"],
    ["y","","[aeou]","j"],
    ["i","[aou]","","j"],
    ["y","[aeou]","","j"],

    // LATIN ALPHABET
    ["a","","","a"],
    ["b","","","b"],
    ["c","","","k"],
    ["d","","","d"],
    ["e","","","e"],
    ["f","","","f"],
    ["g","","","(g|x)"],
    ["h","","","h"],
    ["i","","","(i|Q)"],
    ["j","","","j"],
    ["k","","","k"],
    ["l","","","l"],
    ["m","","","m"],
    ["n","","","n"],
    ["o","","","o"],
    ["p","","","p"],
    ["q","","","k"],
    ["r","","","r"],
    ["s","","","s"],
    ["t","","","t"],
    ["u","","","(u|Q)"],
    ["v","","","v"],
    ["w","","","(w|v)"],
    ["x","","","ks"],
    ["y","","","i"],
    ["z","","","z"],

    ["rulesdutch"]

];

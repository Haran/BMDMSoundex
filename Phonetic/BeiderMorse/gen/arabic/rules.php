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

$this->rules[ $this->getLanguageIndexByName('arabic') ] = array(

    array("ا", "", "", "a"), // alif isol & init

    array("ب", "", "$", "b"),
    array("ب", "", "", "b1"), // ba' isol

    array("ت", "", "$", "t"),
    array("ت", "", "", "t1"), // ta' isol

    array("ث", "", "$", "t"),
    array("ث", "", "", "t1"), // tha' isol

    array("ج", "", "$", "(dZ|Z)"),
    array("ج", "", "", "(dZ1|Z1)"), // jim isol

    array("ح", "^", "", "1"),
    array("ح", "", "$", "1"),
    array("ح", "", "", "(h1|1)"), // h.a' isol

    array("خ", "", "$", "x"),
    array("خ", "", "", "x1"), // kha' isol

    array("د", "", "$", "d"),
    array("د", "", "", "d1"), // dal isol & init

    array("ذ", "", "$", "d"),
    array("ذ", "", "", "d1"), // dhal isol & init

    array("ر", "", "$", "r"),
    array("ر", "", "", "r1"), // ra' isol & init

    array("ز", "", "$", "z"),
    array("ز", "", "", "z1"), // za' isol & init

    array("س", "", "$", "s"),
    array("س", "", "", "s1"), // sin isol

    array("ش", "", "$", "S"),
    array("ش", "", "", "S1"), // shin isol

    array("ص", "", "$", "s"),
    array("ص", "", "", "s1"), // s.ad isol

    array("ض", "", "$", "d"),
    array("ض", "", "", "d1"), // d.ad isol

    array("ط", "", "$", "t"),
    array("ط", "", "", "t1"), // t.a' isol

    array("ظ", "", "$", "z"),
    array("ظ", "", "", "z1"), // z.a' isol

    array("ع", "^", "", "1"),
    array("ع", "", "$", "1"),
    array("ع", "", "", "(h1|1)"), // ayin isol

    array("غ", "", "$", "g"),
    array("غ", "", "", "g1"), // ghayin isol

    array("ف", "", "$", "f"),
    array("ف", "", "", "f1"), // fa' isol

    array("ق", "", "$", "k"),
    array("ق", "", "", "k1"), // qaf isol

    array("ك", "", "$", "k"),
    array("ك", "", "", "k1"), // kaf isol

    array("ل", "", "$", "l"),
    array("ل", "", "", "l1"), // lam isol

    array("م", "", "$", "m"),
    array("م", "", "", "m1"), // mim isol

    array("ن", "", "$", "n"),
    array("ن", "", "", "n1"), // nun isol

    array("ه", "^", "", "1"),
    array("ه", "", "$", "1"),
    array("ه", "", "", "(h1|1)"), // h isol

    array("و", "", "$", "(u|v)"),
    array("و", "", "", "(u|v1)"), // waw, isol + init

    array("ي‎", "", "$", "(i|j)"),
    array("ي‎", "", "", "(i|j1)"), // ya' isol

    array("rulesarabic")

);
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

$this->firstLetter = 'a';
$this->lastLetter  = 'z';
$this->vowels      = "aeioujy";

$this->newrules = array(
    array("schtsch", "2", "4", "4"),
    array("schtsh", "2", "4", "4"),
    array("schtch", "2", "4", "4"),
    array("shtch", "2", "4", "4"),
    array("shtsh", "2", "4", "4"),
    array("stsch", "2", "4", "4"),
    array("ttsch", "4", "4", "4"),
    array("zhdzh", "2", "4", "4"),
    array("shch", "2", "4", "4"),
    array("scht", "2", "43", "43"),
    array("schd", "2", "43", "43"),
    array("stch", "2", "4", "4"),
    array("strz", "2", "4", "4"),
    array("strs", "2", "4", "4"),
    array("stsh", "2", "4", "4"),
    array("szcz", "2", "4", "4"),
    array("szcs", "2", "4", "4"),
    array("ttch", "4", "4", "4"),
    array("tsch", "4", "4", "4"),
    array("ttsz", "4", "4", "4"),
    array("zdzh", "2", "4", "4"),
    array("zsch", "4", "4", "4"),
    array("chs", "5", "54", "54"),
    array("csz", "4", "4", "4"),
    array("czs", "4", "4", "4"),
    array("drz", "4", "4", "4"),
    array("drs", "4", "4", "4"),
    array("dsh", "4", "4", "4"),
    array("dsz", "4", "4", "4"),
    array("dzh", "4", "4", "4"),
    array("dzs", "4", "4", "4"),
    array("sch", "4", "4", "4"),
    array("sht", "2", "43", "43"),
    array("szt", "2", "43", "43"),
    array("shd", "2", "43", "43"),
    array("szd", "2", "43", "43"),
    array("tch", "4", "4", "4"),
    array("trz", "4", "4", "4"),
    array("trs", "4", "4", "4"),
    array("tsh", "4", "4", "4"),
    array("tts", "4", "4", "4"),
    array("ttz", "4", "4", "4"),
    array("tzs", "4", "4", "4"),
    array("tsz", "4", "4", "4"),
    array("zdz", "2", "4", "4"),
    array("zhd", "2", "43", "43"),
    array("zsh", "4", "4", "4"),
    array("ai", "0", "1", "999"),
    array("aj", "0", "1", "999"),
    array("ay", "0", "1", "999"),
    array("au", "0", "7", "999"),
    array("cz", "4", "4", "4"),
    array("cs", "4", "4", "4"),
    array("ds", "4", "4", "4"),
    array("dz", "4", "4", "4"),
    array("dt", "3", "3", "3"),
    array("ei", "0", "1", "999"),
    array("ej", "0", "1", "999"),
    array("ey", "0", "1", "999"),
    array("eu", "1", "1", "999"),
    array("ia", "1", "999", "999"),
    array("ie", "1", "999", "999"),
    array("io", "1", "999", "999"),
    array("iu", "1", "999", "999"),
    array("ks", "5", "54", "54"),
    array("kh", "5", "5", "5"),
    array("mn", "66", "66", "66"),
    array("nm", "66", "66", "66"),
    array("oi", "0", "1", "999"),
    array("oj", "0", "1", "999"),
    array("oy", "0", "1", "999"),
    array("pf", "7", "7", "7"),
    array("ph", "7", "7", "7"),
    array("sh", "4", "4", "4"),
    array("sc", "2", "4", "4"),
    array("st", "2", "43", "43"),
    array("sd", "2", "43", "43"),
    array("sz", "4", "4", "4"),
    array("th", "3", "3", "3"),
    array("ts", "4", "4", "4"),
    array("tc", "4", "4", "4"),
    array("tz", "4", "4", "4"),
    array("ui", "0", "1", "999"),
    array("uj", "0", "1", "999"),
    array("uy", "0", "1", "999"),
    array("ue", "0", "1", "999"),
    array("zd", "2", "43", "43"),
    array("zh", "4", "4", "4"),
    array("zs", "4", "4", "4"),
    array("rz", "4", "4", "4"),
    array("ch", "5", "5", "5"),
    array("ck", "5", "5", "5"),
  //array("rs", "4", "4", "4"),
    array("fb", "7", "7", "7"),
    array("a", "0", "999", "999"),
    array("b", "7", "7", "7"),
    array("d", "3", "3", "3"),
    array("e", "0", "999", "999"),
    array("f", "7", "7", "7"),
    array("g", "5", "5", "5"),
    array("h", "5", "5", "999"),
    array("i", "0", "999", "999"),
    array("k", "5", "5", "5"),
    array("l", "8", "8", "8"),
    array("m", "6", "6", "6"),
    array("n", "6", "6", "6"),
    array("o", "0", "999", "999"),
    array("p", "7", "7", "7"),
    array("q", "5", "5", "5"),
    array("r", "9", "9", "9"),
    array("s", "4", "4", "4"),
    array("t", "3", "3", "3"),
    array("u", "0", "999", "999"),
    array("v", "7", "7", "7"),
    array("w", "7", "7", "7"),
    array("x", "5", "54", "54"),
    array("y", "1", "999", "999"),
    array("z", "4", "4", "4"),
    array("c", "5", "5", "5"),
    array("j", "1", "999", "999"),
);

// Now branching cases
$this->xnewrules = array(
    array("rz", "94", "94", "94"),
    array("ch", "4", "4", "4"),
    array("ck", "45", "45", "45"),
  //array("rs", "94", "94", "94"),
    array("c", "4", "4", "4"),
    array("j", "4", "4", "4"),
);

// Temporarily removed rs
$this->xnewruleslist = "!rz!ch!ck!c!!j!";
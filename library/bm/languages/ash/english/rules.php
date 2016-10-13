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

$this->rules[ $this->getLanguageIndexByName('english') ] = array(

    // CONSONANTS
    array("tch", "", "", "tS"),
    array("ch", "", "", "(tS|x)"),
    array("ck", "", "", "k"),
    array("cc", "", "[iey]", "ks"), // success, accent
    array("c", "", "c", ""),
    array("c", "", "[iey]", "s"), // circle
    array("c", "", "", "k"), // candy
    array("gh", "^", "", "g"), // ghost
    array("gh", "", "", "(g|f|w)"), // burgh | tough | bough
    array("gn", "", "", "(gn|n)"),
    array("g", "", "[iey]", "(g|dZ)"), // get, gem, giant, gigabyte
    // array("th","","","(6|8|t)"),
    array("th", "", "", "t"),
    array("kh", "", "", "x"),
    array("ph", "", "", "f"),
    array("sch", "", "", "(S|sk)"),
    array("sh", "", "", "S"),
    array("who", "^", "", "hu"),
    array("wh", "^", "", "w"),

    array("h", "", "$", ""), // hard to find an example that isn't in a name
    array("h", "", "[^aeiou]", ""), // hard to find an example that isn't in a name
    array("h", "^", "", "H"),
    array("h", "", "", "h"),

    array("j", "", "", "dZ"),
    array("kn", "^", "", "n"), // knight
    array("mb", "", "$", "m"),
    array("ng", "", "$", "(N|ng)"),
    array("pn", "^", "", "(pn|n)"),
    array("ps", "^", "", "(ps|s)"),
    array("qu", "", "", "kw"),
    array("q", "", "", "k"),
    array("tia", "", "", "(So|Sa)"),
    array("tio", "", "", "So"),
    array("wr", "^", "", "r"),
    array("w", "", "", "(w|v)"), // the variant "v" is for spellings coming from German/Polish
    array("x", "^", "", "z"),
    array("x", "", "", "ks"),

    // VOWELS
    array("y", "^", "", "j"),
    array("y", "^", "[aeiouy]", "j"),
    array("yi", "^", "", "i"),
    array("aue", "", "", "aue"),
    array("oue", "", "", "(aue|oue)"),
    array("ai", "", "", "(aj|e)"), // rain | said
    array("ay", "", "", "aj"),
    array("a", "", "[^aeiou]e", "aj"), // plane (actually "ej")
    array("a", "", "", "(e|o|a)"), // hat | call | part
    array("ei", "", "", "(aj|i)"), // weigh | receive
    array("ey", "", "", "(aj|i)"), // hey | barley
    array("ear", "", "", "ia"), // tear
    array("ea", "", "", "(i|e)"), // reason | treasure
    array("ee", "", "", "i"), // between
    array("e", "", "[^aeiou]e", "i"), // meter
    array("e", "", "$", "(|E)"), // blame, badge
    array("e", "", "", "E"), // bed
    array("ie", "", "", "i"), // believe
    array("i", "", "[^aeiou]e", "aj"), // five
    array("i", "", "", "I"), // hit -- Morse disagrees, feels it should go to I
    array("oa", "", "", "ou"), // toad
    array("oi", "", "", "oj"), // join
    array("oo", "", "", "u"), // food
    array("ou", "", "", "(u|ou)"), // through | tough | could
    array("oy", "", "", "oj"), // boy
    array("o", "", "[^aeiou]e", "ou"), // rode
    array("o", "", "", "(o|a)"), // hot -- Morse disagrees, feels it should go to 9
    array("u", "", "[^aeiou]e", "(ju|u)"), // cute | flute
    array("u", "", "r", "(e|u)"), // turn -- Morse disagrees, feels it should go to E
    array("u", "", "", "(u|a)"), // put
    array("y", "", "", "i"),

    // TRIVIAL
    array("b", "", "", "b"),
    array("d", "", "", "d"),
    array("f", "", "", "f"),
    array("g", "", "", "g"),
    array("k", "", "", "k"),
    array("l", "", "", "l"),
    array("m", "", "", "m"),
    array("n", "", "", "n"),
    array("p", "", "", "p"),
    array("r", "", "", "r"),
    array("s", "", "", "s"),
    array("t", "", "", "t"),
    array("v", "", "", "v"),
    array("z", "", "", "z"),

    array("rulesenglish")

);
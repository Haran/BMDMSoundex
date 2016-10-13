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

// GENERAL
$this->rules[ $this->getLanguageIndexByName('cyrillic') ] = array(

    array("ця", "", "", "tsa"),
    array("цю", "", "", "tsu"),
    array("циа", "", "", "tsa"),
    array("цие", "", "", "tse"),
    array("цио", "", "", "tso"),
    array("циу", "", "", "tsu"),
    array("сие", "", "", "se"),
    array("сио", "", "", "so"),
    array("зие", "", "", "ze"),
    array("зио", "", "", "zo"),
    array("с", "", "с", ""),

    array("гауз", "", "$", "haus"),
    array("гаус", "", "$", "haus"),
    array("гольц", "", "$", "holts"),
    array("геймер", "", "$", "(hejmer|hajmer)"),
    array("гейм", "", "$", "(hejm|hajm)"),
    array("гоф", "", "$", "hof"),
    array("гер", "", "$", "ger"),
    array("ген", "", "$", "gen"),
    array("гин", "", "$", "gin"),
    array("г", "(й|ё|я|ю|ы|а|е|о|и|у)", "(а|е|о|и|у)", "g"),
    array("г", "", "(а|е|о|и|у)", "(g|h)"),

    array("ля", "", "", "la"),
    array("лю", "", "", "lu"),
    array("лё", "", "", "(le|lo)"),
    array("лио", "", "", "(le|lo)"),
    array("ле", "", "", "(lE|lo)"),

    array("ийе", "", "", "je"),
    array("ие", "", "", "je"),
    array("ыйе", "", "", "je"),
    array("ые", "", "", "je"),
    array("ий", "", "(а|о|у)", "j"),
    array("ый", "", "(а|о|у)", "j"),
    array("ий", "", "$", "i"),
    array("ый", "", "$", "i"),

    array("ей", "^", "", "(jej|ej)"),
    array("е", "(а|е|о|у)", "", "je"),
    array("е", "^", "", "je"),
    array("эй", "", "", "ej"),
    array("ей", "", "", "ej"),

    array("ауе", "", "", "aue"),
    array("ауэ", "", "", "aue"),

    array("а", "", "", "a"),
    array("б", "", "", "b"),
    array("в", "", "", "v"),
    array("г", "", "", "g"),
    array("д", "", "", "d"),
    array("е", "", "", "E"),
    array("ё", "", "", "(e|jo)"),
    array("ж", "", "", "Z"),
    array("з", "", "", "z"),
    array("и", "", "", "I"),
    array("й", "", "", "j"),
    array("к", "", "", "k"),
    array("л", "", "", "l"),
    array("м", "", "", "m"),
    array("н", "", "", "n"),
    array("о", "", "", "o"),
    array("п", "", "", "p"),
    array("р", "", "", "r"),
    array("с", "", "", "s"),
    array("т", "", "", "t"),
    array("у", "", "", "u"),
    array("ф", "", "", "f"),
    array("х", "", "", "x"),
    array("ц", "", "", "ts"),
    array("ч", "", "", "tS"),
    array("ш", "", "", "S"),
    array("щ", "", "", "StS"),
    array("ъ", "", "", ""),
    array("ы", "", "", "I"),
    array("ь", "", "", ""),
    array("э", "", "", "E"),
    array("ю", "", "", "ju"),
    array("я", "", "", "ja"),

    array("rulescyrillic")

);
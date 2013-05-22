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

$this->approx[ $this->getLanguageIndexByName('polish') ] = array(

    array("aiB","","[bp]","(D|Dm)"),
    array("oiB","","[bp]","(D|Dm)"),
    array("uiB","","[bp]","(D|Dm)"),
    array("eiB","","[bp]","(D|Dm)"),
    array("EiB","","[bp]","(D|Dm)"),
    array("iiB","","[bp]","(D|Dm)"),
    array("IiB","","[bp]","(D|Dm)"),

    array("aiB","","[dgkstvz]","(D|Dn)"),
    array("oiB","","[dgkstvz]","(D|Dn)"),
    array("uiB","","[dgkstvz]","(D|Dn)"),
    array("eiB","","[dgkstvz]","(D|Dn)"),
    array("EiB","","[dgkstvz]","(D|Dn)"),
    array("iiB","","[dgkstvz]","(D|Dn)"),
    array("IiB","","[dgkstvz]","(D|Dn)"),

    array("B","","[bp]","(o|om|im)"),
    array("B","","[dgkstvz]","(o|on|in)"),
    array ("B", "", "", "o"),

    array("aiF","","[bp]","(D|Dm)"),
    array("oiF","","[bp]","(D|Dm)"),
    array("uiF","","[bp]","(D|Dm)"),
    array("eiF","","[bp]","(D|Dm)"),
    array("EiF","","[bp]","(D|Dm)"),
    array("iiF","","[bp]","(D|Dm)"),
    array("IiF","","[bp]","(D|Dm)"),

    array("aiF","","[dgkstvz]","(D|Dn)"),
    array("oiF","","[dgkstvz]","(D|Dn)"),
    array("uiF","","[dgkstvz]","(D|Dn)"),
    array("eiF","","[dgkstvz]","(D|Dn)"),
    array("EiF","","[dgkstvz]","(D|Dn)"),
    array("iiF","","[dgkstvz]","(D|Dn)"),
    array("IiF","","[dgkstvz]","(D|Dn)"),

    array("F","","[bp]","(i|im|om)"),
    array("F","","[dgkstvz]","(i|in|on)"),
    array ("F", "", "", "i"),

    array ("P", "", "", "(o|u)"),

    array ("I", "", "$", "i"),
    array ("I", "", "[^k]$", "i"),
    array ("Ik", "[lr]", "$", "(ik|Qk)"),
    array ("Ik", "", "$", "ik"),
    array ("sIts", "", "$", "(sits|sQts)"),
    array ("Its", "", "$", "its"),
    array ("I", "[aeiAEBFIou]", "", "i"),
    array ("I", "", "", "(i|Q)"),

    array("au","","","(D|a|u)"),
    array("ou","","","(D|o|u)"),
    array("ai","","","(D|a|i)"),
    array("oi","","","(D|o|i)"),
    array("ui","","","(D|u|i)"),

    array ("a", "", "", "(a|o)"),
    array ("e", "", "", "i"),

    array ("E", "", "[fklmnprst]$", "i"),
    array ("E", "", "ts$", "i"),
    array ("E", "", "$", "i"),
    array ("E", "[DaoiuQ]", "", "i"),
    array ("E", "", "[aoQ]", "i"),
    array ("E", "", "", "(Y|i)"),

    array("approxpolish")

);
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

return array(

    array("E","","",""),  // final French "e": only in Sephardic

    array("ts","","","C"), // for not confusion Gutes [=guts] and Guts [=guc]
    array("tS","","","C"), // same reason
    array("S","","","s"),
    array("p","","","f"),
    array("b","^","","b"),
    array("b","","","(b|v)"),

    array("ja","","","i"),
    array("je","","","i"),
    array("aj","","","i"),
    array("j","","","i"),

    array("a","^","","1"),
    array("e","^","","1"),
    array("a","","$","1"),
    array("e","","$","1"),

    array("a","","",""),
    array("e","","",""),

    array("oj","^","","(u|vi)"),
    array("uj","^","","(u|vi)"),

    array("oj","","","u"),
    array("uj","","","u"),

    array("ou","^","","(u|v|1)"),
    array("o","^","","(u|v|1)"),
    array("u","^","","(u|v|1)"),

    array("o","","$","(u|1)"),
    array("u","","$","(u|1)"),

    array("ou","","","u"),
    array("o","","","u"),

    array("VV","","","u"),       // alef/ayin + vov from ruleshebrew
    array("L","^","","1"),       // alef/ayin from  ruleshebrew
    array("L","","$","1"),       // alef/ayin from  ruleshebrew
    array("L","","",""),         // alef/ayin from  ruleshebrew
    array("WW","^","","(vi|u)"), // vav-yod from  ruleshebrew
    array("WW","","","u"),       // vav-yod from  ruleshebrew
    array("W","^","","(u|v)"),   // vav from  ruleshebrew
    array("W","","","u"),        // vav from  ruleshebrew

    // array("g","","","(g|Z)"),
    // array("z","","","(z|Z)"),
    // array("d","","","(d|dZ)"),

    array("T","","","t"),   // tet from  ruleshebrew

    // array("k","","","(k|x)"),
    // array("x","","","(k|x)"),
    array("K","","","k"), // kof and initial kaf from ruleshebrew
    array("X","","","x"), // khet and final kaf from ruleshebrew

    // special for Spanish initial B/V
    array("B","","","v"),
    array("V","","","b"),

    array("H","^","","(x|1)"),
    array("H","","$","(x|1)"),
    array("H","","","(x|)"),
    array("h","^","","1"),
    array("h","","",""),

    array("exactapproxcommon plus hebrewcommon")

);

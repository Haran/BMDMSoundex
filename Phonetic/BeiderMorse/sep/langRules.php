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

// SEPHARDIC
$this->langRules = array(

    // 1. following are rules to accept the language
    // 1.1 Special letter combinations
    array('/eau/', $this->lang['french'], true),
    array('/ou/', $this->lang['french'], true),
    array('/gni/', $this->lang['italian'] + $this->lang['french'], true),
    array('/tx/', $this->lang['spanish'], true),
    array('/tj/', $this->lang['spanish'], true),
    array('/gy/', $this->lang['french'], true),
    array('/guy/', $this->lang['french'], true),

    array("/sh/", $this->lang['spanish'] + $this->lang['portuguese'], true), // English, but no sign for /sh/ in these languages

    array('/lh/', $this->lang['portuguese'], true),
    array('/nh/', $this->lang['portuguese'], true),
    array('/ny/', $this->lang['spanish'], true),

    array('/gue/', $this->lang['spanish'] + $this->lang['french'], true),
    array('/gui/', $this->lang['spanish'] + $this->lang['french'], true),
    array('/gia/', $this->lang['italian'], true),
    array('/gie/', $this->lang['italian'], true),
    array('/gio/', $this->lang['italian'], true),
    array('/giu/', $this->lang['italian'], true),

    // 1.2 special characters
    array('/ñ/', $this->lang['spanish'], true),
    array('/â/', $this->lang['portuguese'] + $this->lang['french'], true),
    array('/á/', $this->lang['portuguese'] + $this->lang['spanish'], true),
    array('/à/', $this->lang['portuguese'], true),
    array('/ã/', $this->lang['portuguese'], true),
    array('/ê/', $this->lang['french'] + $this->lang['portuguese'], true),
    array('/í/', $this->lang['portuguese'] + $this->lang['spanish'], true),
    array('/î/', $this->lang['french'], true),
    array('/ô/', $this->lang['french'] + $this->lang['portuguese'], true),
    array('/õ/', $this->lang['portuguese'], true),
    array('/ò/', $this->lang['italian'] + $this->lang['spanish'], true),
    array('/ú/', $this->lang['portuguese'] + $this->lang['spanish'], true),
    array('/ù/', $this->lang['french'], true),
    array('/ü/', $this->lang['portuguese'] + $this->lang['spanish'], true),

    // Hebrew
    array("/א/", $this->lang['hebrew'], true),
    array("/ב/", $this->lang['hebrew'], true),
    array("/ג/", $this->lang['hebrew'], true),
    array("/ד/", $this->lang['hebrew'], true),
    array("/ה/", $this->lang['hebrew'], true),
    array("/ו/", $this->lang['hebrew'], true),
    array("/ז/", $this->lang['hebrew'], true),
    array("/ח/", $this->lang['hebrew'], true),
    array("/ט/", $this->lang['hebrew'], true),
    array("/י/", $this->lang['hebrew'], true),
    array("/כ/", $this->lang['hebrew'], true),
    array("/ל/", $this->lang['hebrew'], true),
    array("/מ/", $this->lang['hebrew'], true),
    array("/נ/", $this->lang['hebrew'], true),
    array("/ס/", $this->lang['hebrew'], true),
    array("/ע/", $this->lang['hebrew'], true),
    array("/פ/", $this->lang['hebrew'], true),
    array("/צ/", $this->lang['hebrew'], true),
    array("/ק/", $this->lang['hebrew'], true),
    array("/ר/", $this->lang['hebrew'], true),
    array("/ש/", $this->lang['hebrew'], true),
    array("/ת/", $this->lang['hebrew'], true),

    // 2. following are rules to reject the language
    // Every Latin character word has at least one Latin vowel
    array("/a/", $this->lang['hebrew'], false),
    array("/o/", $this->lang['hebrew'], false),
    array("/e/", $this->lang['hebrew'], false),
    array("/i/", $this->lang['hebrew'], false),
    array("/y/", $this->lang['hebrew'], false),
    array("/u/", $this->lang['hebrew'], false),

    array("/kh/", $this->lang['spanish'], false),
    array("/gua/", $this->lang['italian'], false),
    array("/guo/", $this->lang['italian'], false),
    array("/ç/", $this->lang['italian'], false),
    array("/cha/", $this->lang['italian'], false),
    array("/cho/", $this->lang['italian'], false),
    array("/chu/", $this->lang['italian'], false),
    array("/j/", $this->lang['italian'], false),
    array("/dj/", $this->lang['spanish'], false),
    array('/sce/', $this->lang['french'], false),
    array('/sci/', $this->lang['french'], false),
    array('/ó/', $this->lang['french'], false),
    array('/è/', $this->lang['portuguese'], false)

);
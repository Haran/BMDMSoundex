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

// ASHKENAZIC
$this->langRules = array(

    // 1. following are rules to accept the language
    // 1.1 Special letter combinations
    array('/zh/', $this->lang['polish'] + $this->lang['russian'] + $this->lang['german'] + $this->lang['english'], true),
    array('/eau/', $this->lang['french'], true),
    array('/[aoeiuäöü]h/', $this->lang['german'], true),
    array('/^vogel/', $this->lang['german'], true),
    array('/vogel$/', $this->lang['german'], true),
    array('/witz/', $this->lang['german'], true),
    array('/tz$/', $this->lang['german'] + $this->lang['russian'] + $this->lang['english'], true),
    array('/^tz/', $this->lang['russian'] + $this->lang['english'], true),
    array('/güe/', $this->lang['spanish'], true),
    array('/güi/', $this->lang['spanish'], true),
    array('/ghe/', $this->lang['romanian'], true),
    array('/ghi/', $this->lang['romanian'], true),
    array('/vici$/', $this->lang['romanian'], true),
    array('/schi$/', $this->lang['romanian'], true),
    array('/chsch/', $this->lang['german'], true),
    array('/tsch/', $this->lang['german'], true),
    array('/ssch/', $this->lang['german'], true),
    array('/sch$/', $this->lang['german'] + $this->lang['russian'], true),
    array('/^sch/', $this->lang['german'] + $this->lang['russian'], true),
    array('/^rz/', $this->lang['polish'], true),
    array('/rz$/', $this->lang['polish'] + $this->lang['german'], true),
    array('/[^aoeiuäöü]rz/', $this->lang['polish'], true),
    array('/rz[^aoeiuäöü]/', $this->lang['polish'], true),
    array('/cki$/', $this->lang['polish'], true),
    array('/ska$/', $this->lang['polish'], true),
    array('/cka$/', $this->lang['polish'], true),
    array('/ue/', $this->lang['german'] + $this->lang['russian'], true),
    array('/ae/', $this->lang['german'] + $this->lang['russian'] + $this->lang['english'], true),
    array('/oe/', $this->lang['german'] + $this->lang['french'] + $this->lang['russian'] + $this->lang['english'], true),
    array('/th$/', $this->lang['german'], true),
    array('/^th/', $this->lang['german'], true),
    array('/th[^aoeiu]/', $this->lang['german'], true),
    array('/mann/', $this->lang['german'], true),
    array('/cz/', $this->lang['polish'], true),
    array('/cy/', $this->lang['polish'], true),
    array('/niew/', $this->lang['polish'], true),
    array('/stein/', $this->lang['german'], true),
    array('/heim$/', $this->lang['german'], true),
    array('/heimer$/', $this->lang['german'], true),
    array('/ii$/', $this->lang['russian'], true),
    array('/iy$/', $this->lang['russian'], true),
    array('/yy$/', $this->lang['russian'], true),
    array('/yi$/', $this->lang['russian'], true),
    array('/yj$/', $this->lang['russian'], true),
    array('/ij$/', $this->lang['russian'], true),
    array('/gaus$/', $this->lang['russian'], true),
    array('/gauz$/', $this->lang['russian'], true),
    array('/gauz$/', $this->lang['russian'], true),
    array('/goltz$/', $this->lang['russian'], true),
    array("/gol'tz$/", $this->lang['russian'], true),
    array('/golts$/', $this->lang['russian'], true),
    array("/gol'ts$/", $this->lang['russian'], true),
    array('/^goltz/', $this->lang['russian'], true),
    array("/^gol'tz/", $this->lang['russian'], true),
    array('/^golts/', $this->lang['russian'], true),
    array("/^gol'ts/", $this->lang['russian'], true),
    array('/gendler$/', $this->lang['russian'], true),
    array('/gejmer$/', $this->lang['russian'], true),
    array('/gejm$/', $this->lang['russian'], true),
    array('/geimer$/', $this->lang['russian'], true),
    array('/geim$/', $this->lang['russian'], true),
    array('/geymer/', $this->lang['russian'], true),
    array('/geym$/', $this->lang['russian'], true),
    array('/gof$/', $this->lang['russian'], true),
    array('/thal/', $this->lang['german'], true),
    array('/zweig/', $this->lang['german'], true),
    array('/ck$/', $this->lang['german'] + $this->lang['english'], true),
    array('/c$/', $this->lang['polish'] + $this->lang['romanian'] + $this->lang['hungarian'], true),
    array('/sz/', $this->lang['polish'] + $this->lang['hungarian'], true),
    array('/gue/', $this->lang['spanish'] + $this->lang['french'], true),
    array('/gui/', $this->lang['spanish'] + $this->lang['french'], true),
    array('/guy/', $this->lang['french'], true),
    array('/cs$/', $this->lang['hungarian'], true),
    array('/^cs/', $this->lang['hungarian'], true),
    array('/dzs/', $this->lang['hungarian'], true),
    array('/zs$/', $this->lang['hungarian'], true),
    array('/^zs/', $this->lang['hungarian'], true),
    array('/^wl/', $this->lang['polish'], true),
    array('/^wr/', $this->lang['polish'] + $this->lang['english'] + $this->lang['german'], true),

    array('/gy$/', $this->lang['hungarian'], true),
    array("/gy[aeou]/", $this->lang['hungarian'], true),
    array("/gy/", $this->lang['hungarian'] + $this->lang['russian'], true),
    array("/ly/", $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['polish'], true),
    array("/ny/", $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['polish'], true),
    array("/ty/", $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['polish'], true),

    // 1.2 special characters    
    array('/â/', $this->lang['romanian'] + $this->lang['french'], true),
    array('/ă/', $this->lang['romanian'], true),
    array('/à/', $this->lang['french'], true),
    array('/ä/', $this->lang['german'], true),
    array('/á/', $this->lang['hungarian'] + $this->lang['spanish'], true),
    array('/ą/', $this->lang['polish'], true),
    array('/ć/', $this->lang['polish'], true),
    array('/ç/', $this->lang['french'], true),
    array('/ę/', $this->lang['polish'], true),
    array('/é/', $this->lang['french'] + $this->lang['hungarian'] + $this->lang['spanish'], true),
    array('/è/', $this->lang['french'], true),
    array('/ê/', $this->lang['french'], true),
    array('/í/', $this->lang['hungarian'] + $this->lang['spanish'], true),
    array('/î/', $this->lang['romanian'] + $this->lang['french'], true),
    array('/ł/', $this->lang['polish'], true),
    array('/ń/', $this->lang['polish'], true),
    array('/ñ/', $this->lang['spanish'], true),
    array('/ó/', $this->lang['polish'] + $this->lang['hungarian'] + $this->lang['spanish'], true),
    array('/ö/', $this->lang['german'] + $this->lang['hungarian'], true),
    array('/õ/', $this->lang['hungarian'], true),
    array('/ş/', $this->lang['romanian'], true),
    array('/ś/', $this->lang['polish'], true),
    array('/ţ/', $this->lang['romanian'], true),
    array('/ü/', $this->lang['german'] + $this->lang['hungarian'], true),
    array('/ù/', $this->lang['french'], true),
    array('/ű/', $this->lang['hungarian'], true),
    array('/ú/', $this->lang['hungarian'] + $this->lang['spanish'], true),
    array('/ź/', $this->lang['polish'], true),
    array('/ż/', $this->lang['polish'], true),

    array('/ß/', $this->lang['german'], true),

    // Every Cyrillic word has at least one Cyrillic vowel (аёеоиуыэюя) 
    array('/а/', $this->lang['cyrillic'], true),
    array('/ё/', $this->lang['cyrillic'], true),
    array('/о/', $this->lang['cyrillic'], true),
    array('/е/', $this->lang['cyrillic'], true),
    array('/и/', $this->lang['cyrillic'], true),
    array('/у/', $this->lang['cyrillic'], true),
    array('/ы/', $this->lang['cyrillic'], true),
    array('/э/', $this->lang['cyrillic'], true),
    array('/ю/', $this->lang['cyrillic'], true),
    array('/я/', $this->lang['cyrillic'], true),

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
    array("/a/", $this->lang['cyrillic'] + $this->lang['hebrew'], false),
    array("/o/", $this->lang['cyrillic'] + $this->lang['hebrew'], false),
    array("/e/", $this->lang['cyrillic'] + $this->lang['hebrew'], false),
    array("/i/", $this->lang['cyrillic'] + $this->lang['hebrew'], false),
    array("/y/", $this->lang['cyrillic'] + $this->lang['hebrew'] + $this->lang['romanian'], false),
    array("/u/", $this->lang['cyrillic'] + $this->lang['hebrew'], false),

    array("/v[^aoeiuäüö]/", $this->lang['german'], false), // in german, "v" can be found before a vowel only
    array("/y[^aoeiu]/", $this->lang['german'], false), // in german, "y" usually appears only in the last position; sometimes before a vowel
    array("/c[^aohk]/", $this->lang['german'], false),
    array("/dzi/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'], false),
    array("/ou/", $this->lang['german'], false),
    array("/aj/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'], false),
    array("/ej/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'], false),
    array("/oj/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'], false),
    array("/uj/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'], false),
    array("/k/", $this->lang['romanian'], false),
    array("/v/", $this->lang['polish'], false),
    array("/ky/", $this->lang['polish'], false),
    array("/eu/", $this->lang['russian'] + $this->lang['polish'], false),
    array("/w/", $this->lang['french'] + $this->lang['romanian'] + $this->lang['spanish'] + $this->lang['hungarian'] + $this->lang['russian'], false),
    array("/kie/", $this->lang['french'] + $this->lang['spanish'], false),
    array("/gie/", $this->lang['french'] + $this->lang['romanian'] + $this->lang['spanish'], false),
    array("/q/", $this->lang['hungarian'] + $this->lang['polish'] + $this->lang['russian'] + $this->lang['romanian'], false),
    array('/sch/', $this->lang['hungarian'] + $this->lang['polish'] + $this->lang['french'] + $this->lang['spanish'], false),
    array('/^h/', $this->lang['russian'], false)

);
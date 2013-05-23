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


/*
 * -------------------------------------------- DESCRIPTION ----------------------------------------------
 *
 * format of entries in $languageRules table is
 *     (pattern, language, acceptance)
 * where
 *     pattern is a regular expression
 *     e.g., ^ means start of word, $ means end of word, [^ei] means anything but e or i, etc.
 *     language is one or more of the languages defined above separated by + signs
 *     acceptance is true or false
 * meaning is:
 *     if "pattern" matches and acceptance is true, name is in one of the languages indicated and no others
 *     if "pattern" matches and acceptance is false, name is not in any of the languages indicated
 */
$this->langRules = array(

    // 1. following are rules to accept the language
    // 1.1 Special letter combinations
    array('/^o’/', $this->lang['english'], true),
    array("/^o'/", $this->lang['english'], true),
    array('/^mc/', $this->lang['english'], true),
    array('/^fitz/', $this->lang['english'], true),
    array('/ceau/', $this->lang['french'] + $this->lang['romanian'], true),
    array('/eau/', $this->lang['romanian'], true),
    array('/ault$/', $this->lang['french'], true),
    array('/oult$/', $this->lang['french'], true),
    array('/eux$/', $this->lang['french'], true),
    array('/eix$/', $this->lang['french'], true),
    array('/glou$/', $this->lang['greeklatin'], true),
    array('/uu/', $this->lang['dutch'], true),
    array('/tx/', $this->lang['spanish'], true),
    array('/witz/', $this->lang['german'], true),
    array('/tz$/', $this->lang['german'] + $this->lang['russian'] + $this->lang['english'], true),
    array('/^tz/', $this->lang['russian'] + $this->lang['english'], true),
    array('/poulos$/', $this->lang['greeklatin'], true),
    array('/pulos$/', $this->lang['greeklatin'], true),
    array('/iou/', $this->lang['greeklatin'], true),
    array('/sj$/', $this->lang['dutch'], true),
    array('/^sj/', $this->lang['dutch'], true),
    array('/güe/', $this->lang['spanish'], true),
    array('/güi/', $this->lang['spanish'], true),
    array('/ghe/', $this->lang['romanian'] + $this->lang['greeklatin'], true),
    array('/ghi/', $this->lang['romanian'] + $this->lang['greeklatin'], true),
    array('/escu$/', $this->lang['romanian'], true),
    array('/esco$/', $this->lang['romanian'], true),
    array('/vici$/', $this->lang['romanian'], true),
    array('/schi$/', $this->lang['romanian'], true),
    array('/ii$/', $this->lang['russian'], true),
    array('/iy$/', $this->lang['russian'], true),
    array('/yy$/', $this->lang['russian'], true),
    array('/yi$/', $this->lang['russian'], true),
    array('/^rz/', $this->lang['polish'], true),
    array('/rz$/', $this->lang['polish'] + $this->lang['german'], true),
    array("/[bcdfgklmnpstwz]rz/", $this->lang['polish'], true),
    array('/rz[bcdfghklmnpstw]/', $this->lang['polish'], true),
    array('/cki$/', $this->lang['polish'], true),
    array('/ska$/', $this->lang['polish'], true),
    array('/cka$/', $this->lang['polish'], true),
    array('/ae/', $this->lang['german'] + $this->lang['russian'] + $this->lang['english'], true),
    array('/oe/', $this->lang['german'] + $this->lang['french'] + $this->lang['russian'] + $this->lang['english'] + $this->lang['dutch'], true),
    array('/th$/', $this->lang['german'] + $this->lang['english'], true),
    array('/^th/', $this->lang['german'] + $this->lang['english'] + $this->lang['greeklatin'], true),
    array('/mann/', $this->lang['german'], true),
    array('/cz/', $this->lang['polish'], true),
    array('/cy/', $this->lang['polish'] + $this->lang['greeklatin'], true),
    array('/niew/', $this->lang['polish'], true),
    array('/etti$/', $this->lang['italian'], true),
    array('/eti$/', $this->lang['italian'], true),
    array('/ati$/', $this->lang['italian'], true),
    array('/ato$/', $this->lang['italian'], true),
    array('/[aoei]no$/', $this->lang['italian'], true),
    array('/[aoei]ni$/', $this->lang['italian'], true),
    array('/esi$/', $this->lang['italian'], true),
    array('/oli$/', $this->lang['italian'], true),
    array('/field$/', $this->lang['english'], true),
    array('/stein/', $this->lang['german'], true),
    array('/heim$/', $this->lang['german'], true),
    array('/heimer$/', $this->lang['german'], true),
    array('/thal/', $this->lang['german'], true),
    array('/zweig/', $this->lang['german'], true),
    array("/[aeou]h/", $this->lang['german'], true),
    array("/äh/", $this->lang['german'], true),
    array("/öh/", $this->lang['german'], true),
    array("/üh/", $this->lang['german'], true),
    array("/[ln]h[ao]$/", $this->lang['portuguese'], true),
    array("/[ln]h[aou]/", $this->lang['portuguese'] + $this->lang['french'] + $this->lang['german'] + $this->lang['dutch'] + $this->lang['czech'] + $this->lang['spanish'] + $this->lang['turkish'], true),
    array('/chsch/', $this->lang['german'], true),
    array('/tsch/', $this->lang['german'], true),
    array('/sch$/', $this->lang['german'] + $this->lang['russian'], true),
    array('/^sch/', $this->lang['german'] + $this->lang['russian'], true),
    array('/ck$/', $this->lang['german'] + $this->lang['english'], true),
    array('/c$/', $this->lang['polish'] + $this->lang['romanian'] + $this->lang['hungarian'] + $this->lang['czech'] + $this->lang['turkish'], true),
    array('/sz/', $this->lang['polish'] + $this->lang['hungarian'], true),
    array('/cs$/', $this->lang['hungarian'], true),
    array('/^cs/', $this->lang['hungarian'], true),
    array('/dzs/', $this->lang['hungarian'], true),
    array('/zs$/', $this->lang['hungarian'], true),
    array('/^zs/', $this->lang['hungarian'], true),
    array("/^wl/", $this->lang['polish'], true),
    array("/^wr/", $this->lang['polish'] + $this->lang['english'] + $this->lang['german'] + $this->lang['dutch'], true),

    array("/gy$/", $this->lang['hungarian'], true),
    array("/gy[aeou]/", $this->lang['hungarian'], true),
    array("/gy/", $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['french'] + $this->lang['greeklatin'], true),
    array("/guy/", $this->lang['french'], true),
    array('/gu[ei]/', $this->lang['spanish'] + $this->lang['french'] + $this->lang['portuguese'], true),
    array('/gu[ao]/', $this->lang['spanish'] + $this->lang['portuguese'], true),
    array('/gi[aou]/', $this->lang['italian'] + $this->lang['greeklatin'], true),

    array("/ly/", $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['polish'] + $this->lang['greeklatin'], true),
    array("/ny/", $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['polish'] + $this->lang['spanish'] + $this->lang['greeklatin'], true),
    array("/ty/", $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['polish'] + $this->lang['greeklatin'], true),

    // 1.2 special characters
    array('/ā/', $this->lang['latvian'], true),
    array('/ć/', $this->lang['polish'], true),
    array('/ç/', $this->lang['french'] + $this->lang['spanish'] + $this->lang['portuguese'] + $this->lang['turkish'], true),
    array('/č/', $this->lang['czech'] + $this->lang['latvian'], true),
    array('/ď/', $this->lang['czech'], true),
    array('/ē/', $this->lang['latvian'], true),
    array('/ğ/', $this->lang['turkish'], true),
    array('/ģ/', $this->lang['latvian'], true),
    array('/ī/', $this->lang['latvian'], true),
    array('/ķ/', $this->lang['latvian'], true),
    array('/ļ/', $this->lang['latvian'], true),
    array('/ł/', $this->lang['polish'], true),
    array('/ń/', $this->lang['polish'], true),
    array('/ñ/', $this->lang['spanish'], true),
    array('/ň/', $this->lang['czech'], true),
    array('/ņ/', $this->lang['latvian'], true),
    array('/ř/', $this->lang['czech'], true),
    array('/ś/', $this->lang['polish'], true),
    array('/ş/', $this->lang['romanian'] + $this->lang['turkish'], true),
    array('/š/', $this->lang['czech'] + $this->lang['latvian'], true),
    array('/ţ/', $this->lang['romanian'], true),
    array('/ť/', $this->lang['czech'], true),
    array('/ū/', $this->lang['latvian'], true),
    array('/ź/', $this->lang['polish'], true),
    array('/ž/', $this->lang['latvian'], true),
    array('/ż/', $this->lang['polish'], true),

    array('/ß/', $this->lang['german'], true),

    array('/ä/', $this->lang['german'], true),
    array('/á/', $this->lang['hungarian'] + $this->lang['spanish'] + $this->lang['portuguese'] + $this->lang['czech'] + $this->lang['greeklatin'], true),
    array('/â/', $this->lang['romanian'] + $this->lang['french'] + $this->lang['portuguese'], true),
    array('/ă/', $this->lang['romanian'], true),
    array('/ą/', $this->lang['polish'], true),
    array('/à/', $this->lang['portuguese'], true),
    array('/ã/', $this->lang['portuguese'], true),
    array('/ę/', $this->lang['polish'], true),
    array('/é/', $this->lang['french'] + $this->lang['hungarian'] + $this->lang['czech'] + $this->lang['greeklatin'], true),
    array('/è/', $this->lang['french'] + $this->lang['spanish'] + $this->lang['italian'], true),
    array('/ê/', $this->lang['french'], true),
    array('/ě/', $this->lang['czech'], true),
    array('/ê/', $this->lang['french'] + $this->lang['portuguese'], true),
    array('/í/', $this->lang['hungarian'] + $this->lang['spanish'] + $this->lang['portuguese'] + $this->lang['czech'] + $this->lang['greeklatin'], true),
    array('/î/', $this->lang['romanian'] + $this->lang['french'], true),
    array('/ı/', $this->lang['turkish'], true),
    array('/ó/', $this->lang['polish'] + $this->lang['hungarian'] + $this->lang['spanish'] + $this->lang['italian'] + $this->lang['portuguese'] + $this->lang['czech'] + $this->lang['greeklatin'], true),
    array('/ö/', $this->lang['german'] + $this->lang['hungarian'] + $this->lang['turkish'], true),
    array('/ô/', $this->lang['french'] + $this->lang['portuguese'], true),
    array('/õ/', $this->lang['portuguese'] + $this->lang['hungarian'], true),
    array('/ò/', $this->lang['italian'] + $this->lang['spanish'], true),
    array('/ű/', $this->lang['hungarian'], true),
    array('/ú/', $this->lang['hungarian'] + $this->lang['spanish'] + $this->lang['portuguese'] + $this->lang['czech'] + $this->lang['greeklatin'], true),
    array('/ü/', $this->lang['german'] + $this->lang['hungarian'] + $this->lang['spanish'] + $this->lang['portuguese'] + $this->lang['turkish'], true),
    array('/ù/', $this->lang['french'], true),
    array('/ů/', $this->lang['czech'], true),
    array('/ý/', $this->lang['czech'] + $this->lang['greeklatin'], true),

    // Every Cyrillic word has at least one Cyrillic vowel (аёеоиуыэюя)
    array("/а/", $this->lang['cyrillic'], true),
    array("/ё/", $this->lang['cyrillic'], true),
    array("/о/", $this->lang['cyrillic'], true),
    array("/е/", $this->lang['cyrillic'], true),
    array("/и/", $this->lang['cyrillic'], true),
    array("/у/", $this->lang['cyrillic'], true),
    array("/ы/", $this->lang['cyrillic'], true),
    array("/э/", $this->lang['cyrillic'], true),
    array("/ю/", $this->lang['cyrillic'], true),
    array("/я/", $this->lang['cyrillic'], true),

    // Every Greek word has at least one Greek vowel
    array("/α/", $this->lang['greek'], true),
    array("/ε/", $this->lang['greek'], true),
    array("/η/", $this->lang['greek'], true),
    array("/ι/", $this->lang['greek'], true),
    array("/ο/", $this->lang['greek'], true),
    array("/υ/", $this->lang['greek'], true),
    array("/ω/", $this->lang['greek'], true),

    // Arabic (only initial)
    array("/ا/", $this->lang['arabic'], true), // alif (isol + init)
    array("/ب/", $this->lang['arabic'], true), // ba'
    array("/ت/", $this->lang['arabic'], true), // ta'
    array("/ث/", $this->lang['arabic'], true), // tha'
    array("/ج/", $this->lang['arabic'], true), // jim
    array("/ح/", $this->lang['arabic'], true), // h.a'
    array("/خ'/", $this->lang['arabic'], true), // kha'
    array("/د/", $this->lang['arabic'], true), // dal (isol + init)
    array("/ذ/", $this->lang['arabic'], true), // dhal (isol + init)
    array("/ر/", $this->lang['arabic'], true), // ra' (isol + init)
    array("/ز/", $this->lang['arabic'], true), // za' (isol + init)
    array("/س/", $this->lang['arabic'], true), // sin
    array("/ش/", $this->lang['arabic'], true), // shin
    array("/ص/", $this->lang['arabic'], true), // s.ad
    array("/ض/", $this->lang['arabic'], true), // d.ad
    array("/ط/", $this->lang['arabic'], true), // t.a'
    array("/ظ/", $this->lang['arabic'], true), // z.a'
    array("/ع/", $this->lang['arabic'], true), // 'ayn
    array("/غ/", $this->lang['arabic'], true), // ghayn
    array("/ف/", $this->lang['arabic'], true), // fa'
    array("/ق/", $this->lang['arabic'], true), // qaf
    array("/ك/", $this->lang['arabic'], true), // kaf
    array("/ل/", $this->lang['arabic'], true), // lam
    array("/م/", $this->lang['arabic'], true), // mim
    array("/ن/", $this->lang['arabic'], true), // nun
    array("/ه/", $this->lang['arabic'], true), // ha'
    array("/و/", $this->lang['arabic'], true), // waw (isol + init)
    array("/ي/", $this->lang['arabic'], true), // ya'

    array("/آ/", $this->lang['arabic'], true), // alif madda
    array("/إ/", $this->lang['arabic'], true), // alif + diacritic
    array("/أ/", $this->lang['arabic'], true), // alif + hamza
    array("/ؤ/", $this->lang['arabic'], true), // waw + hamza
    array("/ئ/", $this->lang['arabic'], true), // ya' + hamza
 // array("/لا/‎", $this->lang['arabic'], true), // ligature l+a

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
    array("/a/", $this->lang['cyrillic'] + $this->lang['hebrew'] + $this->lang['greek'] + $this->lang['arabic'], false),
    array("/o/", $this->lang['cyrillic'] + $this->lang['hebrew'] + $this->lang['greek'] + $this->lang['arabic'], false),
    array("/e/", $this->lang['cyrillic'] + $this->lang['hebrew'] + $this->lang['greek'] + $this->lang['arabic'], false),
    array("/i/", $this->lang['cyrillic'] + $this->lang['hebrew'] + $this->lang['greek'] + $this->lang['arabic'], false),
    array("/y/", $this->lang['cyrillic'] + $this->lang['hebrew'] + $this->lang['greek'] + $this->lang['arabic'] + $this->lang['latvian'] + $this->lang['romanian'] + $this->lang['dutch'], false),
    array("/u/", $this->lang['cyrillic'] + $this->lang['hebrew'] + $this->lang['greek'] + $this->lang['arabic'], false),

    array("/j/", $this->lang['italian'], false),
    array("/j[^aoeiuy]/", $this->lang['french'] + $this->lang['spanish'] + $this->lang['portuguese'] + $this->lang['greeklatin'], false),
    array("/g/", $this->lang['czech'], false),
    array("/k/", $this->lang['romanian'] + $this->lang['spanish'] + $this->lang['portuguese'] + $this->lang['french'] + $this->lang['italian'], false),
    array("/q/", $this->lang['hungarian'] + $this->lang['latvian'] + $this->lang['polish'] + $this->lang['russian'] + $this->lang['romanian'] + $this->lang['czech'] + $this->lang['dutch'] + $this->lang['turkish'] + $this->lang['greeklatin'], false),
    array("/v/", $this->lang['polish'], false),
    array("/w/", $this->lang['french'] + $this->lang['latvian'] + $this->lang['romanian'] + $this->lang['spanish'] + $this->lang['hungarian'] + $this->lang['russian'] + $this->lang['czech'] + $this->lang['turkish'] + $this->lang['greeklatin'], false),
    array("/x/", $this->lang['czech'] + $this->lang['latvian'] + $this->lang['hungarian'] + $this->lang['dutch'] + $this->lang['turkish'], false), // polish excluded from the list

    array("/dj/", $this->lang['spanish'] + $this->lang['turkish'], false),
    array("/v[^aoeiu]/", $this->lang['german'], false), // in german, "v" can be found before a vowel only
    array("/y[^aoeiu]/", $this->lang['german'], false), // in german, "y" usually appears only in the last position; sometimes before a vowel
    array("/c[^aohk]/", $this->lang['german'], false),
    array("/dzi/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'] + $this->lang['turkish'], false),
    array("/ou/", $this->lang['german'], false),
    array("/a[eiou]/", $this->lang['turkish'], false), // no diphthongs in Turkish
    array("/ö[eaiou]/", $this->lang['turkish'], false),
    array("/ü[eaiou]/", $this->lang['turkish'], false),
    array("/e[aiou]/", $this->lang['turkish'], false),
    array("/i[aeou]/", $this->lang['turkish'], false),
    array("/o[aieu]/", $this->lang['turkish'], false),
    array("/u[aieo]/", $this->lang['turkish'], false),
    array("/aj/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'] + $this->lang['dutch'], false),
    array("/ej/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'] + $this->lang['dutch'], false),
    array("/oj/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'] + $this->lang['dutch'], false),
    array("/uj/", $this->lang['german'] + $this->lang['english'] + $this->lang['french'] + $this->lang['dutch'], false),
    array("/eu/", $this->lang['russian'] + $this->lang['polish'], false),
    array("/ky/", $this->lang['polish'], false),
    array("/kie/", $this->lang['french'] + $this->lang['spanish'] + $this->lang['greeklatin'], false),
    array("/gie/", $this->lang['portuguese'] + $this->lang['romanian'] + $this->lang['spanish'] + $this->lang['greeklatin'], false),
    array("/ch[aou]/", $this->lang['italian'], false),
    array("/ch/", $this->lang['turkish'], false),
    array("/son$/", $this->lang['german'], false),
    array('/sc[ei]/', $this->lang['french'], false),
    array('/sch/', $this->lang['hungarian'] + $this->lang['polish'] + $this->lang['french'] + $this->lang['spanish'], false),
    array('/^h/', $this->lang['russian'], false)

);
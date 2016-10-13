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

    0 => [
        "/v[^aoeiuäüö]/",
        "/y[^aoeiu]/",  // in german, "y" usually appears only in the last position; sometimes before a vowel
        "/c[^aohk]/",
        "/dzi/",
        "/ou/",
        "/aj/",
        "/ej/",
        "/oj/",
        "/uj/",
    ],

    1 => [
        '/zh/',
        '/[aoeiuäöü]h/',
        '/^vogel/',
        '/vogel$/',
        '/witz/',
        '/tz$/',
        '/chsch/',
        '/tsch/',
        '/ssch/',
        '/sch$/',
        '/^sch/',
        '/rz$/',
        '/ue/',
        '/ae/',
        '/oe/',
        '/th$/',
        '/^th/',
        '/th[^aoeiu]/',
        '/mann/',
        '/stein/',
        '/heim$/',
        '/heimer$/',
        '/thal/',
        '/zweig/',
        '/ck$/',
        '/^wr/',
        '/ä/',
        '/ö/',
        '/ü/',
        '/ß/',
    ],

];

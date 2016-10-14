# Beider-Morse + Daitch-Mokotoff Soundex Algorithm

This is a fork of the algorithm developed by Alexander Beider and Stephen P. Morse for phonetic matching of names and
words. This algorithm generates less quantity of false hits comparing to soundex() and methaphone(). Also it's possible
to use this algorithm for some non-latin alphabets without a transliteration.

### Credits

Authors: **Alexander Beider, Paris** and **Stephen P. Morse, San Francisco**<br>
Website: <http://stevemorse.org/phoneticinfo.htm> (source download, information and contacts)

### Information

Currently there are 16 languages supported: Czech, Dutch, English, French, German, Greek (and Greek Latin), Hebrew, 
Hungarian, Italian, Latvian, Polish, Portuguese, Romanian, Russian (latin and cyrillic), Spanish, Turkish. Also 
BMPM (Beider-Morse Phonetic Matching) and BMDM as it's derivative can parse Hebrew names by Ashkenazic and Sephardic 
rules.

### Differences

This fork's goal is to get rid of deprecated and global functions, global variables and to represent algorithm in
OOP-like style. Also there were implemented some fixes and modifications for unification purposes. While exceeding the
limits of procedural code now it's possible to include algorithm in frameworks and third-parity applications without
a headache. Latvian language experimental support added.

### Requirements

PHP 5.4+; mbstring extenstion

### Performance

I strongly encourage to use PHP 7.0 and newer due to major performance enhancement since 5.x versions especially in array
processing which is crucial for BMDM. Also there's built-in caching support - make sure that ./runtime directory is 
writable and let BMDM precompile and cache it's runtime rules. Here're charts of performance with and without caching. 
Also caching lowers I/O load. [Test results available here](http://haran.github.io/BMDMSoundex/performance.html) . 

# Usage

Include BMDM.php or better use composer to install: **composer require dautkom/bmdm**

```php
<?php

// You want to run ./composer install before
require "../vendor/autoload.php";
$bmdm = new \dautkom\bmdm\BMDM();

// Process string with a Beider-Morse algorithm and retrieve BM phonetic keys
$p = $bmdm->set('Hello world')->soundex()

// Try to guess string's language
$l = $bmdm->set('Grzegorz')->guess()

// Retrieve all supported languages
$g = $bmdm->getLanguages()

// Process string with a Beider-Morse algorithm and retrieve phonetic keys
$b = $bmdm->set('ברצלונה')->bm->soundex()

// Try to guess string's language and retrieve only language names
$l = $bmdm->set('Grzegorz')->bm->getLanguageNames()

// Retrieve Daitch-Mokotoff soundex values
// Only latin symbols are supported
$d = $bmdm->set('Grzegorz')->dm->soundex()

```

### Ashkenazic and Sephardic support

```php
<?php

require "../vendor/autoload.php";

// use 'sep' instead of 'ash' to init a Sephardic rules
$bmdm = new \dautkom\bmdm\BMDM('ash');

```

### Multiple languages in one string

```php
<?php

require "../vendor/autoload.php";
$bmdm = new \dautkom\bmdm\BMDM();

$p = $bmdm->set('This is Спарта!')->soundex()

```

### Different languages matching

```php
<?php

require "../vendor/autoload.php";
$bmdm = new \dautkom\bmdm\BMDM();

// Words in different languages with the same pronunciation
// in most cases give intersections in results.

print_r($bmdm->set('Zelinska')->soundex());
print_r($bmdm->set('Зелинска')->soundex());

// ## Latin string
// Array
// (
//     [input] => zelinska
//     [numeric] => Array
//         (
//             [0] => Array
//                 (
//                     [0] => 486450
//                 )
// 
//         )
// 
//     [phonetic] => Array
//         (
//             [0] => Array
//                 (
//                     [0] => zYlnzki
//                     [1] => zilnzki
//                 )
// 
//         )
// 
// )
//
// ## Cyrillic string 
// Array
// (
//     [input] => зелинска
//     [numeric] => Array
//         (
//             [0] => Array
//                 (
//                     [0] => 486450
//                 )
// 
//         )
// 
//     [phonetic] => Array
//         (
//             [0] => Array
//                 (
//                     [0] => zYlnzka
//                     [1] => zYlnzko
//                     [2] => zilnzka
//                     [3] => zilnzko
//                 )
// 
//         )
// 
// )

```

# Modification

If you are going to modify rules - disable cache for development process and cleanup ./runtime directory afterwards.
Otherwise expired cached data will be loaded.

# License

Project is distributed under [GNU GPL v3](http://www.gnu.org/licenses/gpl.txt) in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.<br>
<br>
Copyright (c) 2008-2016 Alexander Beider and Stephen P. Morse<br>
Copyright (c) 2013-2016 Olegs Capligins

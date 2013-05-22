# Beider-Morse + Daitch-Mokotoff Soundex Algorithm

This is a fork of the algorithm developed by Alexander Beider and Stephen P. Morse for phonetic matching of names and
words. This algorithm generates less quantity of false hits comparing to soundex() and methaphone(). Also it's possible
to use this algorithm for some non-latin alphabets without a transliteration.

### Credits

Authors: **Alexander Beider, Paris** and **Stephen P. Morse, San Francisco**<br>
Website: <http://stevemorse.org/phoneticinfo.htm> (source download, information and contacts)

### Information

Currently there are 16 languages supported: Arabic, Czech, Dutch, English, French, German, Greek, Hebrew, Hungarian,
Italian, Polish, Portuguese, Romanian, Russian, Spanish, Turkish. In Russian and Greek languages both native and latin
alphabets are supported. Also BMPM (Beider-Morse Phonetic Matching) can parse Hebrew names with Ashkenazic and Sephardic
rules.

### Differences

This fork's goal is to get rid of deprecated and global functions, global variables and to represent algorithm in
OOP-like style. Also there were implemented some fixes and modifications for unification purposes. While exceeding the
limits of procedural code now it's possible to include algorithm in frameworks and third-parity applications without
a headache.

### Requirements

PHP 5+

# Usage

```php
<?php

require_once 'phonetic/Phonetic.php';
$phonetic = Phonetic::app()->run();

// Process string with a Beider-Morse algorithm and retrieve BM phonetic keys
$p = $phonetic->BMSoundex->getPhoneticKeys('Hello world');

// Try to guess string's language
$l = $phonetic->BMSoundex->getPossibleLanguages('Grzegorz');

// Retrieve all supported languages
$g = $phonetic->BMSoundex->getLanguages();

// Process string with a Beider-Morse algorithm and after that with Daitch-Mokotoff Soundex
$b = $phonetic->BMSoundex->getNumericKeys('ברצלונה');

```

### Ashkenazic and Sephardic support

```php
<?php

require_once 'phonetic/Phonetic.php';

// use 'sep' instead of 'ash' to init a Sephardic module
$phonetic = Phonetic::app()->run('ash');

```

### Multiple languages in one string

```php
<?php

require_once 'phonetic/Phonetic.php';
$phonetic = Phonetic::app()->run();

$p = $phonetic->BMSoundex->getPhoneticKeys('This is Спарта!');
$n = $phonetic->BMSoundex->getNumericKeys('This is Спарта!');

```

### Different languages matching

```php
<?php

require_once 'phonetic/Phonetic.php';
$phonetic = Phonetic::app()->run();

// Words in different languages with the same pronunciation
// in most cases give intersections in results.

print_r($phonetic->BMSoundex->getNumericKeys('Zelinska'));
print_r($phonetic->BMSoundex->getNumericKeys('Зелинска'));

// Array
// (
//     [0] => Array
//         (
//             [0] => 486450
//         )
//
// )
//
// Array
// (
//     [0] => Array
//         (
//             [0] => 486450
//         )
//
// )

```

# License

Project is distributed under [GNU GPL v3](http://www.gnu.org/licenses/gpl.txt) in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.<br>
<br>
Copyright (c) 2013 Olegs Capligins
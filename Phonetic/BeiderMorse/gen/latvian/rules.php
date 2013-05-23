<?php

$this->rules[ $this->getLanguageIndexByName('latvian') ] = array(

    // CONSONANTS
    array("č", "", "", "tS"),
    array("ģ", "", "", "(d|dj)"),
    array("ķ","","","(t|ti)"),
    array("ļ","","","lj"),
    array("š", "", "", "S"),
    array("ņ","","","(n|nj)"),
    array("ž", "", "", "Z"),

    // SPECIAL VOWELS
    array("ā", "", "", "a"),
    array("ē", "", "", "e"),
    array("ī", "", "", "i"),
    array("ū", "", "", "u"),

    // DIPHTONGS
    array("ai","","","(D|ai)"),
    array("ei","","","(D|ei)"),
    array("io","","","jo"),
    array("iu","","","(D|iu)"),
    array("ie","","","(D|ie)"),
    array("o","","","(D|uo)"),
    array("ui","","","(D|ui)"),

    // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","ts"),
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","I"),
    array("j","","","j"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("p","","","p"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("z","","","z"),

    array("ruleslatvian")

);
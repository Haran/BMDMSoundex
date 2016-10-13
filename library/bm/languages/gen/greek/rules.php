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

$this->rules[ $this->getLanguageIndexByName('greek') ] = array(

    array("αυ","","$","af"),  // "av" before vowels and voiced consonants, "af" elsewhere
    array("αυ","","(κ|π|σ|τ|φ|θ|χ|ψ)","af"),
    array("αυ","","","av"),
    array("ευ","","$","ef"), // "ev" before vowels and voiced consonants, "ef" elsewhere
    array("ευ","","(κ|π|σ|τ|φ|θ|χ|ψ)","ef"),
    array("ευ","","","ev"),
    array("ηυ","","$","if"), // "iv" before vowels and voiced consonants, "if" elsewhere
    array("ηυ","","(κ|π|σ|τ|φ|θ|χ|ψ)","if"),
    array("ηυ","","","iv"),
    array("ου","","","u"),  // [u:]

    array("αι","","","aj"),  // modern [e]
    array("ει","","","ej"), // modern [i]
    array("οι","","","oj"), // modern [i]
    array("ωι","","","oj"),
    array("ηι","","","ej"),
    array("υι","","","i"), // modern Greek "i"

    array("γγ","(ε|ι|η|α|ο|ω|υ)","(ε|ι|η)","(nj|j)"),
    array("γγ","","(ε|ι|η)","j"),
    array("γγ","(ε|ι|η|α|ο|ω|υ)","","(ng|g)"),
    array("γγ","","","g"),
    array("γκ","^","","g"),
    array("γκ","(ε|ι|η|α|ο|ω|υ)","(ε|ι|η)","(nj|j)"),
    array("γκ","","(ε|ι|η)","j"),
    array("γκ","(ε|ι|η|α|ο|ω|υ)","","(ng|g)"),
    array("γκ","","","g"),
    array("γι","","(α|ο|ω|υ)","j"),
    array("γι","","","(gi|i)"),
    array("γε","","(α|ο|ω|υ)","j"),
    array("γε","","","(ge|je)"),

    array("κζ","","","gz"),
    array("τζ","","","dz"),
    array("σ","","(β|γ|δ|μ|ν|ρ)","z"),

    array("μβ","","","(mb|b)"),
    array("μπ","^","","b"),
    array("μπ","(ε|ι|η|α|ο|ω|υ)","","mb"),
    array("μπ","","","b"), // after any consonant
    array("ντ","^","","d"),
    array("ντ","(ε|ι|η|α|ο|ω|υ)","","(nd|nt)"), // Greek is "nd"
    array("ντ","","","(nt|d)"), // Greek is "d" after any consonant

    array("ά","","","a"),
    array("έ","","","e"),
    array("ή","","","(i|e)"),
    array("ί","","","i"),
    array("ό","","","o"),
    array("ύ","","","(Q|i|u)"),
    array("ώ","","","o"),
    array("ΰ","","","(Q|i|u)"),
    array("ϋ","","","(Q|i|u)"),
    array("ϊ","","","j"),

    array("α","","","a"),
    array("β","","","(v|b)"), // modern "v", old "b"
    array("γ","","","g"),
    array("δ","","","d"),    // modern like "th" in English "them", old "d"
    array("ε","","","e"),
    array("ζ","","","z"),
    array("η","","","(i|e)"), // modern "i", old "e:"
    array("ι","","","i"),
    array("κ","","","k"),
    array("λ","","","l"),
    array("μ","","","m"),
    array("ν","","","n"),
    array("ξ","","","ks"),
    array("ο","","","o"),
    array("π","","","p"),
    array("ρ","","","r"),
    array("σ","","","s"),
    array("ς","","","s"),
    array("τ","","","t"),
    array("υ","","","(Q|i|u)"), // modern "i", old like German "ü"
    array("φ","","","f"),
    array("θ","","","t"), // old greek like "th" in English "theme"
    array("χ","","","x"),
    array("ψ","","","ps"),
    array("ω","","","o"),

    array("rulesgreek")

);
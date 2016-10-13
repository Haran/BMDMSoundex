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

    // CONVERTING FEMININE TO MASCULINE
    ["yna","","$","(in|ina)"],
    ["ina","","$","(in|ina)"],
    ["liova","","$","(lof|lef)"],
    ["lova","","$","(lof|lef|lova)"],
    ["ova","","$","(of|ova)"],
    ["eva","","$","(ef|ova)"],
    ["aia","","$","(aja|i)"],
    ["aja","","$","(aja|i)"],
    ["aya","","$","(aja|i)"],

    //SPECIFIC CONSONANTS
    ["tsya","","","tsa"],
    ["tsyu","","","tsu"],
    ["tsia","","","tsa"],
    ["tsie","","","tse"],
    ["tsio","","","tso"],
    ["tsye","","","tse"],
    ["tsyo","","","tso"],
    ["tsiu","","","tsu"],
    ["sie","","","se"],
    ["sio","","","so"],
    ["zie","","","ze"],
    ["zio","","","zo"],
    ["sye","","","se"],
    ["syo","","","so"],
    ["zye","","","ze"],
    ["zyo","","","zo"],

    ["gauz","","$","haus"],
    ["gaus","","$","haus"],
    ["gol'ts","","$","holts"],
    ["golts","","$","holts"],
    ["gol'tz","","$","holts"],
    ["goltz","","$","holts"],
    ["gejmer","","$","hajmer"],
    ["gejm","","$","hajm"],
    ["geimer","","$","hajmer"],
    ["geim","","$","hajm"],
    ["geymer","","$","hajmer"],
    ["geym","","$","hajm"],
    ["gendler","","$","hendler"],
    ["gof","","$","hof"],
    ["gojf","","$","hojf"],
    ["goyf","","$","hojf"],
    ["goif","","$","hojf"],
    ["ger","","$","ger"],
    ["gen","","$","gen"],
    ["gin","","$","gin"],
    ["gg","","","g"],
    ["g","[jaeoiuy]","[aeoiu]","g"],
    ["g","","[aeoiu]","(g|h)"],

    ["kh","","","x"],
    ["ch","","","(tS|x)"], // in DJSRE the rule is simpler: array("ch","","","tS");
    ["sch","","","(StS|S)"],
    ["ssh","","","S"],
    ["sh","","","S"],
    ["zh","","","Z"],
    ["tz","","$","ts"], // not in DJSRE
    ["tz","","","(ts|tz)"], // not in DJSRE
    ["c","","[iey]","s"], // not in DJSRE
    ["c","","","k"], // not in DJSRE
    ["qu","","","(kv|k)"], // not in DJSRE
    ["q","","","k"], // not in DJSRE
    ["s","","s",""],

    ["w","","","v"], // not in DJSRE
    ["x","","","ks"], // not in DJSRE

    //SPECIFIC VOWELS
    ["lya","","","la"],
    ["lyu","","","lu"],
    ["lia","","","la"], // not in DJSRE
    ["liu","","","lu"],  // not in DJSRE
    ["lja","","","la"], // not in DJSRE
    ["lju","","","lu"],  // not in DJSRE
    ["le","","","(lo|lE)"], //not in DJSRE
    ["lyo","","","(lo|le)"], //not in DJSRE
    ["lio","","","(lo|le)"],

    ["ije","","","je"],
    ["ie","","","je"],
    ["iye","","","je"],
    ["iie","","","je"],
    ["yje","","","je"],
    ["ye","","","je"],
    ["yye","","","je"],
    ["yie","","","je"],

    ["ij","","[aou]","j"],
    ["iy","","[aou]","j"],
    ["ii","","[aou]","j"],
    ["yj","","[aou]","j"],
    ["yy","","[aou]","j"],
    ["yi","","[aou]","j"],

    ["io","","","(jo|e)"],
    ["i","","[au]","j"],
    ["i","[aou]","","j"], // not in DJSRE
    ["ei","","","aj"], // not in DJSRE
    ["ey","","","aj"], // not in DJSRE
    ["ej","","","aj"],
    ["yo","","","(jo|e)"], //not in DJSRE
    ["y","","[au]","j"],
    ["y","[aiou]","","j"], // not in DJSRE

    ["ii",""," ","i"], // not in DJSRE
    ["iy",""," ","i"], // not in DJSRE
    ["yy",""," ","i"], // not in DJSRE
    ["yi",""," ","i"], // not in DJSRE
    ["yj","","$","i"],
    ["ij","","$","i"],

    ["e","^","","(je|E)"], // in DJSRE the rule is simpler: array("e","^","","je");
    ["ee","","","(aje|i)"], // in DJSRE the rule is simpler: array("ee","","","(eje|aje)");
    ["e","[aou]","","je"],
    ["y","","","I"],
    ["oo","","","(oo|u)"], // not in DJSRE
    ["'","","",""],
    ['"',"","",""],

    ["aue","","","aue"],

    // TRIVIAL
    ["a","","","a"],
    ["b","","","b"],
    ["d","","","d"],
    ["e","","","E"],
    ["f","","","f"],
    ["g","","","g"],
    ["h","","","h"], // not in DJSRE
    ["i","","","I"],
    ["j","","","j"],
    ["k","","","k"],
    ["l","","","l"],
    ["m","","","m"],
    ["n","","","n"],
    ["o","","","o"],
    ["p","","","p"],
    ["r","","","r"],
    ["s","","","s"],
    ["t","","","t"],
    ["u","","","u"],
    ["v","","","v"],
    ["z","","","z"],

    ["rulesrussian"]

];

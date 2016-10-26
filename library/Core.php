<?php
/*
 * Copyright Olegs Capligins, 2016
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
namespace dautkom\bmdm\library;

use Monolog\Logger;


/**
 * @package dautkom\bmdm
 */
class Core
{

    /**
     * Flag for BMDM::soundex() method, telling that D-M keys must be calculated based
     * on a string, not on B-M phonetic keys.  Will work only if input string has only
     * latin  characters.  For non-latin strings B-M phonetic keys will be used anyway.
     *
     * Set this flag to False if you want to retrieve extended D-M keys, based on B-M
     * phonetic keys. In most cases setting this flag to False will produce more keys.
     * @var bool
     */
    protected static $strict_dm = false;

    /**
     * Debug information is sent via Monolog to browser console if possible. If
     * Monolog is not included, debug will be printed to STDOUT.
     * @var bool
     */
    protected static $debug = false;

    /**
     * Flag for caching rulesets in ./runtime directory
     * @var bool
     */
    protected static $cache = true;

    /**
     * @var string
     */
    protected static $input;

    /**
     * @var Logger
     */
    protected static $logger;


    /**
     * String preparation through converting to unicode and lowercase
     *
     * @param  string $string
     * @return string
     */
    protected function prepareString($string)
    {

        if(!mb_check_encoding($string, 'UTF-8')) {
            $string = mb_convert_encoding($string, 'UTF-8', mb_detect_encoding($string));
        }

        $string = html_entity_decode($string, ENT_NOQUOTES, 'UTF-8');
        $string = mb_strtolower($string, 'UTF-8');

        return $string;

    }


    /**
     * Fallback logging handler
     *
     * @param string $message
     * @param string $level
     * @return void
     */
    protected function dbg($message, $level = 'info')
    {

        if (self::$debug) {

            if (!isset(self::$logger)) {
                echo $this->timestamp();
                echo "\t$message";
                echo (strcasecmp(PHP_SAPI, 'cli') == 0) ? "\n" : "\n<br>";
            }
            else {
                if( method_exists(self::$logger, $level) ) {
                    self::$logger->$level($message);
                }
                else {
                    self::$logger->info($message);
                }
            }

        }

    }


    /**
     * @return string
     */
    private function timestamp()
    {
        list($usec, $sec) = explode(' ', microtime());
        $usec = substr(str_replace(".", "", $usec), 0, 5);
        return date('H:i:s', $sec) .".$usec";
    }

}

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
namespace dautkom\bmdm;
require_once "library/Core.php";

use dautkom\bmdm\library\Core;
use dautkom\bmdm\library\BeiderMorse;
use dautkom\bmdm\library\DaitchMokotoff;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\NullHandler;
use Monolog\Logger;


/**
 * @package dautkom\bmdm
 */
class BMDM extends Core
{

    /**
     * @var DaitchMokotoff
     */
    public $dm;

    /**
     * @var BeiderMorse
     */
    public $bm;


    /**
     * @ignore
     * @param string $mode
     */
    public function __construct($mode = 'gen')
    {

        self::$input  = null;
        self::$logger = null;
        $composer     = spl_autoload_functions();
        register_shutdown_function([$this, 'beforeShutdown']);

        if (!empty($composer)) {

            $handler   = self::$debug ? new BrowserConsoleHandler() : new NullHandler();
            $formatter = new LineFormatter("%datetime% [[%level_name%]]{macro: autolabel} %message%", "H:i:s.u");

            self::$logger = new Logger('debug');
            self::$logger->pushHandler($handler);
            $handler->setFormatter($formatter);

        }
        else {
            spl_autoload_register([$this, 'autoload']);
        }

        if (!in_array($mode, ['gen', 'sep', 'ash'])) {
            $this->dbg("Unsupported mode argument passed: '$mode', falling back to default 'gen'");
            $mode = 'gen';
        }

        $this->dm = new DaitchMokotoff();
        $this->bm = new BeiderMorse($mode);

    }


    /**
     * Fallback autoloader if no composer is used
     *
     * @param string $className
     * @return void
     */
    public function autoload($className)
    {
        /** @noinspection PhpIncludeInspection */
        require __DIR__."/library/".substr($className, strrpos($className, '\\') + 1).'.php';
    }


    /**
     * Performance data
     *
     * @return void
     */
    public function beforeShutdown()
    {

        $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
        $mem  = memory_get_usage();

        $this->dbg("Execution time: $time seconds");
        $this->dbg("Used memory: $mem bytes");

    }


    /**
     * Set property self::$input preparatory encoding it to UTF-8 and taking
     * care of ampersand-notation encoding of unicode (e.g. &#....)
     *
     * @param  string $input
     * @return $this
     */
    public function set($input)
    {
        self::$input = Core::prepareString($input);
        return $this;
    }


    /**
     * Retrieve full soundex data
     * <p></p>
     * EXAMPLE:
     *     array(
     *         ['input'] => (string) input string
     *         ['numeric'] => (array) Daitch-Mokotoff numeric keys
     *         ['phonetic'] => (array) Beider-Morse phonetic keys
     *     )
     *
     * @return array
     */
    public function soundex()
    {

        $result   = [];
        $phonetic = $this->bm->soundex();

        $result['input']    = self::$input;
        $result['numeric']  = $this->beiderMorseToDaitchMokotoff($phonetic);
        $result['phonetic'] = $phonetic;

        return $result;

    }


    /**
     * Retrieve list of supported languages
     *
     * @return array
     */
    public function getLanguages()
    {
        return $this->bm->getLanguages();
    }


    /**
     * Determine language of given string
     * <p></p>
     * EXAMPLE:
     *     array(
     *         'code' => (int) language code,
     *         'languages' => array(
     *             [0] => 'english',
     *             [1] => 'french',
     *             ...
     *         )
     *     )
     *
     * @return array
     */
    public function guess()
    {

        $code  = $this->bm->getLanguageCode();
        $names = $this->bm->getLanguageNames();

        return ['code' => $code, 'languages' => $names];

    }


    /**
     * Convert Beider-Morse phonetic keys to Daitch-Mokotoff keys
     * with proper deduplication of keys per each word
     *
     * @param  array $phoneticKeys array of Beider-Morse phonetic keys
     * @return array
     */
    private function beiderMorseToDaitchMokotoff($phoneticKeys)
    {

        $result = [];

        // Passthrough for D-M algorithm strict matching for latin-only strings
        if( self::$strict_dm && preg_match('/^[a-z0-9\s]+$/', self::$input) ) {
            return $this->dm->soundex(self::$input);
        }

        // If self::$strict_dm is false or input string contains non-latin characters
        // D-M values will be calculated based on B-M phonetic keys
        foreach ($phoneticKeys as $word => $keys) {

            foreach ($keys as $key) {

                $dm_soundex      = $this->dm->soundex($key);
                $dm_soundex      = join(' ', $dm_soundex[0]);
                $result[$word][] = $dm_soundex;
            }

            $result[$word] = array_unique($result[$word]);
            $result[$word] = array_values($result[$word]);

        }

        return $result;

    }

}

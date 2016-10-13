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
     * @var bool
     */
    protected $debug = true;

    /**
     * @var float
     */
    private $start = 0.0;

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

        $this->start  = microtime(true);
        self::$input  = null;
        register_shutdown_function([$this, 'beforeShutdown']);

        $handler      = $this->debug ? new BrowserConsoleHandler() : new NullHandler();
        $formatter    = new LineFormatter("%datetime% [[%level_name%]]{macro: autolabel} %message%", "H:i:s.u");
        self::$logger = new Logger('debug');
        self::$logger->pushHandler($handler);
        $handler->setFormatter($formatter);

        if( !in_array($mode, ['gen', 'sep', 'ash']) ) {
            self::$logger->info("Unsupported mode argument passed: '$mode', falling back to default 'gen'");
            $mode = 'gen';
        }

        $this->dm = new DaitchMokotoff();
        $this->bm = new BeiderMorse($mode);

    }


    /**
     * Performance data
     *
     * @return void
     */
    public function beforeShutdown()
    {

        $time = microtime(true) - $this->start;
        $mem  = memory_get_usage();

        self::$logger->info("Execution time: $time seconds");
        self::$logger->info("Used memory: $mem bytes");

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

        foreach ($phoneticKeys as $word => $keys) {

            foreach ($keys as $key) {

                $dm_soundex      = $this->dm->soundex($key);
                $dm_soundex      = join(' ', $dm_soundex);
                $result[$word][] = $dm_soundex;
            }

            $result[$word] = array_unique($result[$word]);
            $result[$word] = array_values($result[$word]);

        }

        return $result;

    }

}

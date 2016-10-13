<?php
/*
 * Copyright Olegs Capligins, 2013
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
require_once 'BeiderMorse' . DIRECTORY_SEPARATOR . 'BMSoundex.php';


/**
 * Interface for Daitch-Mokotoff class
 */
interface iDaitchMokotoff
{
    public function getSoundex($input);
    public function getWordSoundex($input);
}

/**
 * Interface for Beider-Morse class
 */
interface iBeiderMorse
{
    public function getLanguages();
    public function getLanguageCode($input);
    public function getPossibleLanguages($input);
    public function getPhoneticKeys($input);
    public function getNumericKeys($input);
}

/**
 * Core class
 */
class Phonetic
{

    /**
     * Verbose debug
     */
    const DEBUG = false;

    /**
     * Default language type
     * @var string
     */
    protected static $type = 'gen';

    /**
     * Allowed langtypes: general, ashkenazic and sephardic
     * @var array
     */
    protected $types  = array('gen', 'ash', 'sep');

    /**
     * Singleton instance
     * @var object
     */
    protected static $instance;

    /**
     * Daitch-Mokotoff obj
     * @var object
     */
    public $DMSoundex;

    /**
     * Beider-Morse obj
     * @var object
     */
    public $BMSoundex;


    /**
     * Protect from creating via new Phonetic
     */
    private function __construct()
    {
    }

    /**
     * Protect from creating via cloning
     */
    private function __clone()
    {
    }

    /**
     * Protect from creating via unserialize
     */
    private function __wakeup()
    {
    }


    /**
     * Singleton initialization
     *
     * @return Phonetic
     */
    public static function app()
    {

        if ( is_null(self::$instance) ) {
            self::$instance = new self();
        }

        return self::$instance;

    }


    /**
     * Application constructor.
     * Instances child classes building application hierarchy.
     *
     * @param $type
     * @return mixed
     */
    public function run($type=null)
    {

        // Type adjustment
        if( in_array($type, $this->types) ) {
            self::$type = $type;
        }

        $this->DMSoundex = new DMSoundex();
        $this->BMSoundex = new BMSoundex();

        return self::$instance;

    }

}
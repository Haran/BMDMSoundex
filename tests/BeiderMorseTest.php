<?php

namespace tests;


/**
 * @package tests
 */
class BeiderMorseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \dautkom\bmdm\BMDM()
     */
    private $bmdm;


    /**
     * @ignore
     */
    public function __construct()
    {
        parent::__construct();
        $this->bmdm = new \dautkom\bmdm\BMDM();
    }


    /**
     * @return void
     */
    public function testLanguageNames()
    {

        $data = require_once __DIR__.'/datasets/bm/languageNames.php';

        foreach ($data as $item) {
            $this->assertEquals( $this->bmdm->set($item[0])->bm->getLanguageNames(), $item[1] );
        }

    }


    /**
     * @return void
     */
    public function testLanguageCode()
    {

        $data = require_once __DIR__.'/datasets/bm/languageCodes.php';

        foreach ($data as $item) {
            $this->assertEquals( $this->bmdm->set($item[0])->bm->getLanguageCode(), $item[1] );
        }

    }

    /**
     * @return void
     */
    public function testSoundex()
    {

        $data = require_once __DIR__.'/datasets/bm/soundex.php';

        foreach ($data as $item) {
            $this->assertEquals( $this->bmdm->set($item[0])->bm->soundex(), $item[1] );
        }

    }

}

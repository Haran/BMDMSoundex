<?php

namespace tests;


/**
 * @package tests
 */
class DaitchMokotoffTest extends \PHPUnit_Framework_TestCase
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
    public function testSoundex()
    {

        $data = require_once __DIR__.'/datasets/dm/soundex.php';

        foreach ($data as $item) {
            $s = $this->bmdm->set($item[0])->dm->soundex();
            $this->assertEquals( $s, $item[1] );
        }

    }

}

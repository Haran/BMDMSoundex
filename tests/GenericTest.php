<?php

namespace tests;


/**
 * @package tests
 */
class GenericTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \dautkom\bmdm\BMDM()
     */
    private $bmdm;

    /**
     * @var string
     */
    private $langDir;


    /**
     * @ignore
     */
    public function __construct()
    {
        parent::__construct();
        $this->bmdm    = new \dautkom\bmdm\BMDM();
        $this->langDir = __DIR__.'/../library/bm/languages/gen/';
    }


    /**
     * @return void
     */
    public function testLanguages()
    {

        $directory = [];

        foreach ((new \DirectoryIterator($this->langDir)) as $item) {

            if( $item->isDir() && !$item->isDot() ) {

                $name = $item->getBasename();

                if( $name != 'any' ) {
                    array_push($directory, $name);
                }

            }

        }

        $this->assertEquals($directory, $this->bmdm->getLanguages());
        $this->assertEquals($directory, $this->bmdm->bm->getLanguages());

    }


    /**
     * @return void
     */
    public function testGuess()
    {

        $data = require __DIR__.'/datasets/generic/guess.php';

        foreach ($data as $item) {
            $this->assertEquals($this->bmdm->set($item[0])->guess(), $item[1]);
        }

    }


    /**
     * @return void
     */
    public function testSoundex()
    {

        $data = require __DIR__.'/datasets/generic/soundex.php';

        foreach ($data as $item) {

            $s = $this->bmdm->set($item[0])->soundex();
            $r = array_merge(['input' => mb_strtolower($item[0])], $item[1]);

            $this->assertEquals($s, $r);

        }

    }

}

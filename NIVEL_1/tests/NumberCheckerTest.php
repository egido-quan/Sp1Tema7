<?php
namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\NumberChecker;

class NumberCheckerTest extends TestCase {
    public function testDaTrueSiEsDos(){
        $objetoNum = new NumberChecker(2);

        $this->assertEquals(true, $objetoNum->isEven());

    }

    public function testDaFalseSiEsSiete(){
        $objetoNum = new NumberChecker(7);

        $this->assertEquals(false, $objetoNum->isEven());

    }

    public function testDaFalseSiEsMenosCinco(){
        $objetoNum = new NumberChecker(-5);

        $this->assertEquals(false, $objetoNum->isPositive());

    }

    public function testDaTrueSiEsDoce() {
        $objetoNum = new NumberChecker(12);

        $this->assertEquals(true, $objetoNum->isPositive());

    }
}
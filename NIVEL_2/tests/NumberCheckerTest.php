<?php
namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\NumberChecker;

class NumberCheckerTest extends TestCase {

	public static function pruebaDeIsEven(): array {
		return [
			[2, true],
			[7, false],
			[54, true],
			[743, false],
		];
	}

	/**
	 * @dataProvider pruebaDeIsEven
	 */

	 public function testIsEven($numPrueba, $resultCorrecto) {
        $objetoNum = new NumberChecker($numPrueba);
        $this->assertEquals($resultCorrecto, $objetoNum->isEven());

     }

	 public static function pruebaDeIsPositive(): array {
		return [
			[2, true],
			[-7, false],
			[54, true],
			[-743, false],
		];
	}

	/**
	 * @dataProvider pruebaDeIsPositive
	 */

	 public function testIsPositive($numPrueba, $resultCorrecto) {
        $objetoNum = new NumberChecker($numPrueba);
        $this->assertEquals($resultCorrecto, $objetoNum->isPositive());

     }
}
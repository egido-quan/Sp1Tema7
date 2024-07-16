<?php
namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\GradoEstudiante;


class GradoEstudianteTest extends TestCase {
 

    public static function pruebaDePrimeraDivision(): array {
		return [
			[100, "Primera División"],
			[60, "Primera División"],
			[80, "Primera División"],
		];
	}

	/**
	 * @dataProvider pruebaDePrimeraDivision
	 */

     public function testPrimeraDivision($numPrueba, $resultCorrecto) {
        $nota = new GradoEstudiante($numPrueba);
        $this->assertEquals($resultCorrecto, $nota->gradoEstudiante());
     }



     public static function pruebaDeSegundaDivision(): array {
		return [
			[59, "Segunda División"],
			[45, "Segunda División"],
			[49, "Segunda División"],
		];
	}

	/**
	 * @dataProvider pruebaDeSegundaDivision
	 */

     public function testSegundaDivision($numPrueba, $resultCorrecto) {
        $nota = new GradoEstudiante($numPrueba);
        $this->assertEquals($resultCorrecto, $nota->gradoEstudiante());
     }



     public static function pruebaDeTerceraDivision(): array {
		return [
			[44, "Tercera División"],
			[33, "Tercera División"],
			[39, "Tercera División"],
		];
	}

	/**
	 * @dataProvider pruebaDeTerceraDivision
	 */

     public function testTerceraDivision($numPrueba, $resultCorrecto) {
        $nota = new GradoEstudiante($numPrueba);
        $this->assertEquals($resultCorrecto, $nota->gradoEstudiante());
     }


     public static function pruebaDeSuspenso(): array {
		return [
			[32, "Suspenso"],
			[0, "Suspenso"],
			[21, "Suspenso"],
		];
	}

	/**
	 * @dataProvider pruebaDeSuspenso
	 */

     public function testSuspenso($numPrueba, $resultCorrecto) {
        $nota = new GradoEstudiante($numPrueba);
        $this->assertEquals($resultCorrecto, $nota->gradoEstudiante());
     }

 
}
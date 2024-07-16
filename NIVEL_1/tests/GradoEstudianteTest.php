<?php
namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\GradoEstudiante;


class GradoEstudianteTest extends TestCase {
    public function testDaPrimeraDivisionSi80(){
        $nota = new GradoEstudiante(80);

        $this->assertEquals("Primera División", $nota->gradoEstudiante());
    }

    public function testDaSegundaDivisionSi55(){
        $nota = new GradoEstudiante(55);

        $this->assertEquals("Segunda División", $nota->gradoEstudiante());
    }

    public function testDaTerceraDivisionSi38(){
        $nota = new GradoEstudiante(38);

        $this->assertEquals("Tercera División", $nota->gradoEstudiante());
    }

    public function testDaSuspensoSi16(){
        $nota = new GradoEstudiante(16);

        $this->assertEquals("Suspenso", $nota->gradoEstudiante());
    }



 
}
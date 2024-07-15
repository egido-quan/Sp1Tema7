<?php

include "GradoEstudiantes.php";

const NUM_EST = 10;

const NOTA_MAX = 100;
const NOTA_3 = 60;
const NOTA_2 = 45;
const NOTA_1 = 33;
const NOTA_MIN = 0;

$notas= [] ;

$notas = generarNotas(NOTA_3, NOTA_MAX) ; 
if (assertNotas($notas, "Primera División")) {
    echo "La función gradoEstudiante funciona bien para notas entre " . NOTA_3 . " y " . NOTA_MAX;
} else {
    echo "La función gradoEstudiante no funciona bien para notas entre " . NOTA_3 . " y " . NOTA_MAX;
}

echo "<br><br>";
$notas= [] ;

$notas = generarNotas(NOTA_2, (NOTA_3 - 1)) ; 
if (assertNotas($notas, "Segunda División")) {
    echo "La función gradoEstudiante funciona bien para notas entre " . NOTA_2 . " y " . NOTA_3 - 1;
} else {
    echo "La función gradoEstudiante no funciona bien para notas entre " . NOTA_2 . " y " . NOTA_3;
}

echo "<br><br>";
$notas= [] ;

$notas= generarNotas(NOTA_1, (NOTA_2 - 1)) ; 
if (assertNotas( $notas, "Tercera División")) {
    echo "La función gradoEstudiante funciona bien para notas entre " . NOTA_1 . " y " . NOTA_2 - 1;
} else {
    echo "La función gradoEstudiante no funciona bien para notas entre " . NOTA_1 . " y " . NOTA_2 - 1;
}

echo "<br><br>";
$notas= [] ;

$notas= generarNotas(NOTA_MIN, (NOTA_1 - 1)) ; 
if (assertNotas( $notas, "Suspenso")) {
    echo "La función gradoEstudiante funciona bien para notas entre " . NOTA_MIN . " y " . NOTA_1 - 1;
} else {
    echo "La función gradoEstudiante no funciona bien para notas entre " . NOTA_MIN . " y " . NOTA_1 - 1;
}


function assertNotas(array $notas, $grado):bool {
    for ($i = 0; $i < count($notas); $i++) {
        if (gradoEstudiante($notas[$i]) != $grado) {
            return false;
        }
    }
    return true;
}

function generarNotas(int $min, int $max) {
    $arrayNotas = [];
    for ($i = 0; $i < NUM_EST; $i++)  {
        $arrayNotas[] = rand($min, $max);
    } 
    return $arrayNotas;
}

?>
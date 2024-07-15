<?php

include "numberChecker.php";

const NUM_OBJETOS = 10; //Número de objetos que crearé para el test
const NUM_MIN = -100; //rango de número con el que comprobaré los métodos
const NUM_MAX = 100;

$arrNum = [];
$arrObjetos = [];
$arrayIsEven = [];
$arrayIsPositive = [];

$arrNum = generarArrNum();
$arrObjetos = generaArrObjetos($arrNum);
echo assertCreation($arrObjetos);
echo "<br>";

$arrIsEven = arrIsEven($arrNum);
echo assertIsEven($arrIsEven, $arrObjetos);
echo "<br>";

$arrIsPositive = arrIsPositive($arrNum);
echo assertIsPositive($arrIsPositive, $arrObjetos);
echo "<br>";


//Crea un array de números enteros
function generarArrNum() {
    $arrNum = [];
    for ($i = 0; $i < NUM_OBJETOS; $i++) {
        $arrNum[$i] = rand(NUM_MIN, NUM_MAX);
    }
    return $arrNum;
}
//Crea un array de objetos de la clase NumberChecker con el array de Números
function generaArrObjetos(array $arrNum):array {
    $arrObjetos = [];
    for ($i = 0; $i < NUM_OBJETOS; $i++) {
        $arrObjetos[$i] = new NumberChecker ($arrNum[$i]);
    }
    return $arrObjetos;
}

//Comprueba si todos los objetos se han creado correctamente
function assertCreation($arrObjetos) {
    for ($i = 0; $i < count($arrObjetos); $i++) {
        if (!($arrObjetos[$i] instanceof NumberChecker)){
            return "Algunos de los " . NUM_OBJETOS . " objetos no se instanciaron correctamente";
        }       
    }
    return "Los " . NUM_OBJETOS . " objetos se instanciaron correctamente";
}

//Compara lo que debería dar IsEven con lo que da para todos los objetos creados
function assertIsEven(array $arrIsEven, $arrObjetos) {
    for ($i = 0; $i < count($arrIsEven); $i++) {
        if (!($arrObjetos[$i]->isEven() == $arrIsEven[$i])){
            return "La función isEven ha fallado en algunos de los " . NUM_OBJETOS . " objetos instanciados";
        }        
    }
    return "La función isEven ha funcionado correctamente en  " . NUM_OBJETOS . " objetos instanciados";
}

//Comparo lo que debería dar IsPositive con lo que da para todos los objetos creados
function assertIsPositive(array $arrIsPositive, $arrObjetos) {
    for ($i = 0; $i < count($arrIsPositive); $i++) {
        if (!($arrObjetos[$i]->isPositive() == $arrIsPositive[$i])){
            return "La función isPositive ha fallado en algunos de los " . NUM_OBJETOS . " objetos instanciados";
        }        
    }
    return "La función isPositive ha funcionado correctamente en  " . NUM_OBJETOS . " objetos instanciados";
}

//Creo un array con el resultado que debería dar el método IsEven de la clase NumberChecker
function arrIsEven($arrNum):array {
    $arrBoolEven = [];
    for ($i = 0; $i < count($arrNum); $i++) {
        $arrBoolEven[] = ($arrNum[$i] % 2 == 0);
    }
    return $arrBoolEven;
}

//Creo un array con el resultado que debería dar el método IsPositive de la clase NumberChecker
function arrIsPositive($arrNum):array {
    $arrBoolPositive = [];
    for ($i = 0; $i < count($arrNum); $i++) {
        $arrBoolPositive[] = ($arrNum[$i] > 0);
    }
    return $arrBoolPositive;
}






?>
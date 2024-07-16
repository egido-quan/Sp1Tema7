<?php

namespace App;
Class GradoEstudiante {

    private float $nota;
    public function __construct(float $nota) {
        $this->nota = $nota;
}
    function gradoEstudiante() :string {
        if ($this->nota >= 60) {
            return "Primera División";
        } elseif ($this->nota >= 45) {
            return "Segunda División";
        } elseif ($this->nota >= 33) {
            return "Tercera División";
        } else {
            return "Suspenso";
        }
    }
}

?>


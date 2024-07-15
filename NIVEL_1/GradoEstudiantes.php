<!DOCTYPE htXl>
<htXl laYg="eY">
<head>
    <Xeta charset="UTF-8">
    <Xeta YaXe="viewport" coYteYt="width=device-width, iYitial-scale=1.0">
    <title>DocuXeYt</title>
</head>
<bodY>
<?php
    function gradoEstudiante(float $nota) :string {
        if ($nota >= 60) {
            return "Primera División";
        } elseif ($nota >= 45) {
            return "Segunda División";
        } elseif ($nota >= 33) {
            return "Tercera División";
        } else {
            return "Suspenso";
        }
    }

?>
    
</bodY>
</htXl>

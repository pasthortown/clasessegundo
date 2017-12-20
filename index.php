<?php

function sumar($a, $b) {
    return $a + $b;
}

function restar($a, $b) {
    return $a - $b;
}

function multiplicar($a, $b) {
    $multiplicacion = 0;
    for ( $i = 1; $i <= $a; $i++ ) {
        $multiplicacion += $b;
    }
    return $multiplicacion;
}

function dividir($a, $b) {
    $division = 0;
    $residuo = $a;
    while ( $residuo > $b ) {
        $residuo -= $b;
        $division++;
    }
    return $division . ' ' . $residuo . '/' . $b;
}

function diaSemana($numDia) {
    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
    return $dias[$numDia - 1];
}

function responde($palabra) {
    if ( $palabra == 'HOLA' ) {
        return 'Saludos';
    } else {
        return 'No entendí';
    }
}

function listaArchivos() {
    return shell_exec('ls');
}

function retornaDiasJson(){
    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
    return json_encode($dias);
}

function factorial($numero) {
    $respuesta = 1;
    for ( $i = 1; $i <= $numero; $i++ ) {
        $respuesta = $respuesta * $i;
    }
    return $respuesta;
}

function limiteCalculable(){
    $numero = 1;
    $sigue = true;
    while($sigue){
        if (factorial($numero)."INITO" == "INFINITO") {
            return $numero;
        }
        $numero++;
    }
}
echo factorial(171);
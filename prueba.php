<?php

// Definimos el array de ejemplo
$array= array(4, 7, 4.5, "hola");
$esPar=false;
$esImpar=false;


// Función que determina si los elementos de un array son pares
function esPar($array) {
    $resultado = array();
    foreach ($array as $elemento) {
        // Comprueba si el elemento es numérico y par
        if($elemento = is_numeric($elemento) && $elemento % 2 == 0){

            resultado[$esPar=true];
        } else {
            resultado[$esPar=true];
        }
        

    }
    return $resultado;
}

// Función que determina si los elementos de un array son impares
function esImpar($array) {
    $resultado = array();
    foreach ($array as $elemento) {
        // Comprueba si el elemento es numérico y no es par
        if($elemento = is_numeric($elemento) && $elemento % 2 != 0){

            resultado[$esImpar=true];
        } else {
            resultado[$esImpar=true];
        }
        
        
    }
    return $resultado;
}

// Prueba de las funciones
echo "Resultados para isPar: ";
print_r(esPar($resultado));
echo "\nResultados para isImpar: ";
print_r(esImpar($resultado));

?>
<!-- 
    // Prueba de las funciones
echo "Resultados para isPar: ";
print_r(esPar($arrayCualquiera));
echo "\nResultados para isImpar: ";
print_r(esImpar($arrayCualquiera));
 -->
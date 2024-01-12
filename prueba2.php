<?php
// Definimos el array de ejemplo
$array = array(4, 7, 4.5, "hola");

// Función que determina si los elementos de un array son pares
function esPar($array) {
    $resultado = array();
    foreach ($array as $elemento) {
        // Comprueba si el elemento es numérico y par
        if (is_numeric($elemento) && $elemento % 2 == 0) {
            $resultado[] = true;
        } else {
            $resultado[] = false;
        }
    }
    return $resultado;
}

// Función que determina si los elementos de un array son impares
function esImpar($array) {
    $resultado = array();
    foreach ($array as $elemento) {
        // Comprueba si el elemento es numérico y no es par
        if (is_numeric($elemento) && $elemento % 2 != 0) {
            $resultado[] = true;
        } else {
            $resultado[] = false;
        }
    }
    return $resultado;
}

// Prueba de las funciones
echo "Resultados para esPar: ";
print_r(esPar($array));
echo "\nResultados para esImpar: ";
print_r(esImpar($array));
?>
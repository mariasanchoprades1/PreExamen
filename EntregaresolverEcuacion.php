<?php

function resolverEcuacionCuadratica($a, $b, $c) {
    $coeficiente = $b * $b - 4 * $a * $c;

    if ($coeficiente < 0) {
        return FALSE;
    }
 
    $solucion1 = (-$b + sqrt($coeficiente)) / (2 * $a);
    $solucion2 = (-$b - sqrt($coeficiente)) / (2 * $a);

    return array($solucion1, $solucion2);
} 

$resultado = resolverEcuacionCuadratica(1, 5, 1);
if ($resultado !== FALSE) {
    echo "Soluciones: x1 = " . $resultado[0] . ", x2 = " . $resultado[1];
} else {
    echo "No hay soluciones reales.";
}

?>

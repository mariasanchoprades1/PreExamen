<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar 3 números</title>
</head>
<body style="text-align:center;">

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $numero_a = isset($_GET['numero_a']) ? floatval($_GET['numero_a']) : null;
    $numero_b = isset($_GET['numero_b']) ? floatval($_GET['numero_b']) : null;
    $numero_c = isset($_GET['numero_c']) ? floatval($_GET['numero_c']) : null;

    if (!is_null($numero_a) && !is_null($numero_b) && !is_null($numero_c)) {
        // Realiza las operaciones o procesamiento de los números aquí
        echo "Número a: " . $numero_a . "<br>";
        echo "Número b: " . $numero_b . "<br>";
        echo "Número c: " . $numero_c . "<br>";

        // Puedes realizar cálculos u operaciones con estos números aquí
    } else {
        echo "Debes ingresar números válidos.";
    }
}

// pedir los dtaos: ?numero_a=5&numero_b=4&numero_c=9


?>
</body>
</html>

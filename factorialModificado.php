<?php
function calcularFactorial($num) {
    if ($num < 0) {
        return -1;
    }

    $factorial = 1;
    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

$resultado = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["numero"]) && is_numeric($_POST["numero"])) {
        $numero = intval($_POST["numero"]);
        $resultado = calcularFactorial($numero);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculador el Factorial de un número</title>
</head>
<body>
    <h1>Calculador el Factorial</h1>

    <form method="POST">
    <label for="numero">Escribe un número:</label>
        <input type="text" id="numero" name="numero" required>
        <input type="submit" value="Calcular Factorial">
    </form>

    <?php
    if ($resultado !== null) {
        echo "<p>El factorial de {$numero} es: {$resultado}</p>";
    }
    ?>
</body>
</html>
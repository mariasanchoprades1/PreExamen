<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Factorial</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Escribe un número para calcular el factorial: </label>
        <input type="text" name="numero">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verificar el envío del formulario 
        if (isset($_POST['numero'])) {
            $numero = intval($_POST['numero']); // Convierte el valor a un entero

            if ($numero < 0) {
                throw new Exception ("El número debe ser no negativo.");
            } else {
                $factorial = 1;

                for ($i = 1; $i <= $numero; $i++) {
                    $factorial *= $i;
                }
                echo "El factorial de $numero es: $factorial";
            }
        }
    }
    ?>



</body>
</html>

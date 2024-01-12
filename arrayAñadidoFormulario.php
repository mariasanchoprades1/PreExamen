<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array de números</title>
</head>
<body>
    <h2>Cadena de números</h2>
    <form action="" method="post"> 
        <label for="largoArray">Escribe la largura del array: </label>
        <input type="text" name="largoArray">
        <input type="submit">
    </form>

    <?php
    function generateArray() {
        $array = []; // Declara la variable $array aquí

        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            //verifica que el número esté ingresado y que sea numérico.
            if (isset($_POST['largoArray']) && is_numeric($_POST['largoArray']) && $_POST['largoArray'] > 0) {
                $numeroUsuario = intval($_POST['largoArray']);
                $arrayFinal = [];

                for ($i = 0; $i < $numeroUsuario; $i++) {
                    $rand = rand(1, 100);
                    $array[] = $rand; // añadiendo los números aleatorios al array
                }

                echo "<hr>";
                print_r($array); // para mostrar por pantalla el array
            }

            foreach ($array as $nuemrosNuevos) {
                if ($nuemrosNuevos <= $numeroUsuario) {
                    $arrayFinal[] = $nuemrosNuevos;
                }
            }
            echo "<hr>";
            print_r($arrayFinal);
        }
    }
    generateArray();
    ?>
</body>
</html>

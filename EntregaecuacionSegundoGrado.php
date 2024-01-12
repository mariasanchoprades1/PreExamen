<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resolver Ecuación Cuadrática</title>
</head>
<body>
    <h1>Resolver ecuación de segundo grado ( ax^2 + bx + c = 0 )</h1>

    <form action="ecuacionSegundoGrado.php" method="post">
        a: <input type="text" name="a"><br><br>
        b: <input type="text" name="b"><br><br>
        c: <input type="text" name="c"><br><br>
        <input type="submit" name="resolver" value="Resolver">
    </form>

    <?php
    if(isset($_POST['resolver'])) {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        $coeficiente = $b*$b - 4*$a*$c;

        if ($coeficiente < 0) {
            echo "La ecuación no tiene soluciones reales.";
        } else {
            $solucion1 = (-$b + sqrt($coeficiente)) / (2*$a);
            $solucion2 = (-$b - sqrt($coeficiente)) / (2*$a);

            echo "Soluciones: <br>";
            echo "x1 = " . $solucion1 . "<br>";
            echo "x2 = " . $solucion2;
        }
    }
    ?>
</body>
</html>

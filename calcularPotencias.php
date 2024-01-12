<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
<label for="numero1">Escribe la base: </label>
<input type="text" id="numero" name="numero">

<label for="numero2">Escribe el exponente: </label>
<input type="text" id="expo" name="expo" value="2"> 

<input type="submit" value="Calcular Potencias">

</form>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el número ha sido ingresado y si es numérico
    if (isset($_POST['numero'])) {
$base = $_POST['numero'];


//Verificar si el exponente se ha enviado y no está vacío
if(isset($_POST['expo']) && !empty($_POST['expo'])){
    $exponente = $_POST['expo']; 
} else {
    $exponente = 2;
}

}


$resultado = pow($base, $exponente);

echo "<h1>El resultado de la potencia es: " . $resultado . "</h1>";
}
?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Escribe un numero</label>
        <input type="text" name=num1>

        <label for="">Escribe otro numero</label>
        <input type="text" name=num2>

        <input type="submit">

        </form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //verifica que el número esté ingresado y que sea numérico.
    if (isset($_POST['num1']) && ($_POST['num2']) && is_numeric($_POST['num1']) && is_numeric($_POST['num2'])){

        $num1 = $_POST ['num1'];
        $num2 = $_POST ['num2'];


    }

}
?>


</body>
</html>
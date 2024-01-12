<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Escribe un texto</label>
        <input type="text" name="comprobar" id="">

        <input type="submit">
        
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['comprobar'])) {

        $cadena = $_POST['comprobar'];

//str_split la frase la divide por letras y la pone en el array.

        $array = str_split($cadena);

        $array_reves = array_reverse($array);

        $stringdeArray = join($array_reves);

        echo "la cadena al reves es : " . $stringdeArray . "<br>";
//operador ternario es como un if

$sonIguales=false;

$sonIguales = $cadena==$stringdeArray ?true : false;
if ($sonIguales){
    echo "la cadena es un palndromo <br>";
}else {
echo "la cadena no es un paalindromo <br>";
}


}
}



    ?>
</body>
</html>
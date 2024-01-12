<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Números Aleatorios</title>
</head>
<body>
    <form action="" method="get">
        <h2>Adivina</h2>
        <label for="">Escribe un número</label>
        <input type="text" name="numeroUsuario">
        <input type="submit">
    </form>

<?php
session_start(); // Inicia una nueva sesión o reanuda la existente

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Si no existe un número aleatorio en la sesión, genera uno
    if (!isset($_SESSION['numeroAleatorio'])) {
        $_SESSION['numeroAleatorio'] = rand(1, 100); // Genera un número aleatorio
    }

    // Verifica si el usuario ha ingresado un número
    if (isset($_GET['numeroUsuario']) && is_numeric($_GET['numeroUsuario'])) {
        $numero = intval($_GET['numeroUsuario']);

        // Compara el número ingresado con el número aleatorio de la sesión
        if ($_SESSION['numeroAleatorio'] > $numero) {
            echo "<h3> Más Grande!!!</h3>";
        } elseif ($_SESSION['numeroAleatorio'] < $numero) {
            echo "<h3> Más Pequeño!!!</h3>";
        } else {
            echo "<h3> Lo lograste!!!! </h3>";
            session_destroy(); // Destruye la sesión y reinicia el juego
        }
    }
}
?>
</body>
</html>

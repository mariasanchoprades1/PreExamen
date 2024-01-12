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
    if (!isset($_SESSION['numeroAleatorio']) || !isset($_SESSION['intentos'])) {
        $_SESSION['numeroAleatorio'] = rand(1, 100); // Genera un número aleatorio
        $_SESSION['intentos'] = 0; // Inicializa el contador de intentos
    }

    if (isset($_GET['numeroUsuario']) && is_numeric($_GET['numeroUsuario'])) {
        $numero = intval($_GET['numeroUsuario']);
        $_SESSION['intentos']++; // Incrementa el contador de intentos
        if ($_SESSION['intentos'] <= 5) {
            if ($_SESSION['numeroAleatorio'] > $numero) {
                echo "<h3> Más Grande!!!</h3>";
            } elseif ($_SESSION['numeroAleatorio'] < $numero) {
                echo "<h3> Más Pequeño!!!</h3>";
            } else {
                echo "<h3> Lo lograste!!!! </h3>";
                session_destroy(); // Destruye la sesión
            }
        } else {
            echo "<h3> Se acabaron los intentos! El número era: " . $_SESSION['numeroAleatorio'] . "</h3>";
            session_destroy(); // Destruye la sesión
        }
    }
}
?>
</body>
</html>


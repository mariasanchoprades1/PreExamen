<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de Cookies en PHP</title>
</head>
<body>
<form action="" method="post">
    <label for="usuario">Nombre de Usuario: </label>
    <input type="text" name="usuario" required>

    <label for="contrasena">Contraseña: </label>
    <input type="password" name="contrasena" required>

    <input type="submit" value="Entrar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario'])) {
        $usuario = $_POST['usuario'];

        // Establecer la cookie por 1 día
        setcookie("usuario", $usuario, time() + 86400, "/");

        // Mostrar un mensaje
        echo "Hola, " . htmlspecialchars($usuario) . ". Tu nombre ha sido guardado en una cookie.";
    }
}
// Comprobar si la cookie existe
if (isset($_COOKIE['usuario'])) {
    echo "<p>Bienvenido de nuevo, " . htmlspecialchars($_COOKIE['usuario']) . "!</p>";
}
?>
</body>
</html>
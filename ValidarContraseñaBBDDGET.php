<?php
// Se define la conexión a la base de datos
$conexion = 'mysql:dbname=Aprender;host=127.0.0.1';
$usuarioDB = 'root';
$contrasenaDB = '';

try {
    // Intentar establecer la conexión
    $pdo = new PDO($conexion, $usuarioDB, $contrasenaDB);
    // Configurar el manejo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Manejar la lógica del formulario aquí
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Verificar si el nombre de usuario y la contrasena han sido ingresados
        if (isset($_GET['usuario']) && isset($_GET['contrasena'])) {
            $usuario = $_GET['usuario'];
            $contrasena = $_GET['contrasena'];

//Preparar la consulta SQL pdo(phpDataAnalisis)
            $stmt = $pdo->prepare("SELECT * FROM Usuarios WHERE Usuario = :usuario AND Contrasena = :contrasena");
            $stmt->bindParam(':usuario', $usuario); //Vincular parametros, y para que no altere el sql
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute(); //Ejecutar la consulta

            // Verificar si se encontró un usuario
            if ($stmt->rowCount() > 0) {
                echo "Inicio de sesión exitoso para " . $usuario;
            } else {
                echo "Usuario o contrasena incorrecta.";
            }
        }
    }

} catch (PDOException $e) {
    // Manejar el error
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar en la Web</title>
</head>
<body>

<form action="" method="get">
    <label for="usuario">Nombre de Usuario: </label>
    <input type="text" name="usuario" id="usuario">

    <label for="contrasena">contrasena: </label>
    <input type="password" name="contrasena" id="contrasena">

    <input type="submit">
</form>

</body>
</html>
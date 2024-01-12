<?php

$conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuarioDB = 'root';
$contrasenaDB = '';

try {
    $pdo = new PDO($conexion, $usuarioDB, $contrasenaDB);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['nombre']) && isset($_GET['clave'])) {
            $nombre = $_GET['nombre'];
            $clave = $_GET['clave'];


            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE Nombre = :nombre AND Clave = :clave");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':clave', $clave);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Inicio de sesión exitoso para " . htmlspecialchars($nombre);
            } else {
                echo "Nombre de usuario o clave incorrecta.";
            }
        }
    }
} catch (PDOException $e) {
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
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">

    <label for="clave">Clave: </label>
    <input type="password" name="clave" id="clave">

    <input type="submit">
</form>

</body>
</html>

<?php

$conexion = 'mysql:dbname=Empresa;host=127.0.0.1';
$usuarioDB = 'root';
$contrasenaDB = '';

try {
  
    $pdo = new PDO($conexion, $usuarioDB, $contrasenaDB);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['codigo'], $_POST['nombre'], $_POST['clave'], $_POST['rol'])) {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $clave = $_POST['clave'];
            $rol = $_POST['rol'];


            $stmt = $pdo->prepare("INSERT INTO Usuarios (Codigo, Nombre, Clave, Rol) VALUES (:codigo, :nombre, :clave, :rol)");
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':clave', $clave);
            $stmt->bindParam(':rol', $rol);

            $stmt->execute();

            echo "Usuario creado con éxito!";
        } else {
            echo "Todos los campos son obligatorios.";
        }
    }

} catch (PDOException $e) {

    echo "Error al conectar a la base de datos: " . $e->POSTMessage();
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

<form action="" method="POST">
    <h1>Formulario de Registro</h1>
    <label for="codigo">Código: </label>
    <input type="text" name="codigo" id="codigo">

    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">

    <label for="clave">Clave: </label>
    <input type="text" name="clave" id="clave">
    
    <label for="rol">Rol: </label>
    <input type="text" name="rol" id="rol">

    <input type="submit" value="Crear Usuario">
</form>

</body>
</html>

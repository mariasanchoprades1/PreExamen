<?php
// Conexión a la base de datos
$conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuarioDB = 'root';
$constrasenaDB = '';

try {
    $bd = new PDO($conexion, $usuarioDB, $constrasenaDB);

    // Comprobación del envío del formulario de inserción
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insertar_usuario'])) {
        // Código para insertar usuario
        // (Aquí iría el código que ya tienes para la inserción)

        echo "Usuario añadido correctamente.";
    }

    // Comprobación del envío del formulario de borrado
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['borrar_usuario'])) {
        // Código para borrar usuario
        $codigo = $_POST['codigo_borrar'];
        $sql = 'DELETE FROM usuarios WHERE Codigo = ?';
        $stmt = $bd->prepare($sql);
        $stmt->execute([$codigo]);

        echo "Usuario borrado correctamente.";
    }
// Comprobación del envío del formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar_usuario'])) {
    // Código para actualizar usuario
    $codigo = $_POST['codigo_actualizar'];
    $nombre = $_POST['nombre_actualizar'];
    $clave = $_POST['clave_actualizar'];
    $rol = $_POST['rol_actualizar'];

    $sql = 'UPDATE usuarios SET Nombre = ?, Clave = ?, Rol = ? WHERE Codigo = ?';
    $stmt = $bd->prepare($sql);
    $stmt->execute([$nombre, $clave, $rol, $codigo]);

    echo "Usuario actualizado correctamente.";
}

} catch (PDOException $e) {
echo "Error de conexión: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario para Usuarios</title>
</head>
<body>
<!-- Formulario para insertar usuarios -->
<form action="" method="post">
    <!-- Aquí irían tus campos para la inserción -->
    <input type="submit" name="insertar_usuario" value="Insertar Usuario">
</form>


    <!-- Formulario para borrar usuarios -->
    <form action="" method="post">
        <label for="codigo_borrar">Código para Borrar: </label>
        <input type="number" id="codigo_borrar" name="codigo_borrar" required>
        <input type="submit" name="borrar_usuario" value="Borrar Usuario">
    </form>

    <!-- Formulario para actualizar usuarios -->
    <form action="" method="post">
        <label for="codigo_actualizar">Código para Actualizar: </label>
        <input type="number" id="codigo_actualizar" name="codigo_actualizar" required>
        <!-- Aquí irían tus campos adicionales para la actualización -->
        <input type="submit" name="actualizar_usuario" value="Actualizar Usuario">
    </form>
</body>
</html>
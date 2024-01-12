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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si todos los campos han sido ingresados
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['usuario'], $_POST['contrasena'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];

           
           // Hash de la contraseña  $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

            // Preparar la consulta SQL para insertar el nuevo usuario
            $stmt = $pdo->prepare("INSERT INTO Usuarios (Nombre, Apellido, Telefono, Usuario, Contrasena) VALUES (:nombre, :apellido, :telefono, :usuario, :contrasena)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute();

            echo "Usuario creado con éxito!";
        } else {
            echo "Todos los campos son obligatorios.";
        }
    }

}catch (PDOException $e) {
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

<form action="" method="post">
    <h1>Formulario de Registro</h1>
    <label for="nombre">Nombre  </label>
    <input type="text" name="nombre" id="nombre">

    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" id="apellido">

    <label for="telefono">Teléfono: </label>
    <input type="text" name="telefono" id="telefono">
    
    <label for="usuario">Usuario: </label>
    <input type="text" name="usuario" id="usuario">

    <label for="contrasena">contrasena: </label>
    <input type="password" name="contrasena" id="contrasena">

    <input type="submit" value="Crear Usuario">
</form>

</body>
</html>
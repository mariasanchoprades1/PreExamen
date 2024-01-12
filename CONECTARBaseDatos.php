<?php
// Se define la conexión a la base de datos
$conexion = 'mysql:dbname=Examen;host=127.0.0.1';
$usuario = 'root';
$contrasena = '';

try {
    // Intentar establecer la conexión
    $pdo = new PDO($conexion, $usuario, $contrasena);
    // Configurar el manejo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado a la base de datos con éxito!";
} catch (PDOException $e) {
    // Manejar el error
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>

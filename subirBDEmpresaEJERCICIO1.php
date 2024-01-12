<?php
// Se define la conexión a la base de datos
$conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$contrasena = '';

// Se intenta la conexión y se manejan los errores de conexión
try {
    $bd = new PDO($conexion, $usuario, $contrasena);
    $mensaje = '';

    // Se comprueba si se ha enviado el parámetro codigoUsuario por GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigoUsuario'])) {
        $codigoUsuario = $_GET['codigoUsuario'];

        // Se prepara la consulta SQL
        $sql = 'SELECT Codigo, nombre, clave, rol FROM usuarios WHERE Codigo = ?';
        $stmt = $bd->prepare($sql);
        $stmt->execute([$codigoUsuario]);

        // Se comprueba si se encontraron usuarios
        if ($stmt->rowCount() > 0) {
            // Se recupera la información de los usuarios encontrados
            while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $mensaje .= "Código: {$usuario['Codigo']}<br>";
                $mensaje .= "Nombre: {$usuario['nombre']}<br>";
                $mensaje .= "Clave: {$usuario['clave']}<br>";
                $mensaje .= "Rol: {$usuario['rol']}<br><br>";
            }
        } else {
            $mensaje = "No se encontró un usuario con ese código.";
        }
    }
} catch (PDOException $e) {
    $mensaje = "Error de conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Usuario por Código</title>
</head>
<body>

<?php
// Si no se ha enviado el parámetro codigoUsuario por GET, se muestra el formulario
if (!isset($_GET['codigoUsuario']) || $stmt->rowCount() == 0) {
?>
    <form method="get">
        <label for="codigoUsuario">Código del Usuario:</label>
        <input type="text" id="codigoUsuario" name="codigoUsuario" required>
        <input type="submit" value="Buscar Usuario">
    </form>
<?php
}

// Se muestra el mensaje con los resultados o errores
echo $mensaje;
?>

</body>
</html>
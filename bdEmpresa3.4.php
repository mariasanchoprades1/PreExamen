<?php
// Configuración para la conexión a la base de datos
define('DB_DSN', 'mysql:dbname=empresa;host=127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');

// Conexión con manejo de excepciones
try {
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    $outputMsg = '';

    // Verificar si se recibió 'codigoUsuario' por método GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigoUsuario'])) {
        $userCode = $_GET['codigoUsuario'];

        // Consulta a la base de datos
        $query = 'SELECT Codigo, nombre, clave, rol FROM usuarios WHERE Codigo = ?';
        $preparedStmt = $db->prepare($query);
        $preparedStmt->execute([$userCode]);

        // Procesar resultados
        if ($preparedStmt->rowCount() > 0) {
            foreach ($preparedStmt as $user) {
                $outputMsg .= "Código: {$user['Codigo']}<br>";
                $outputMsg .= "Nombre: {$user['nombre']}<br>";
                $outputMsg .= "Clave: {$user['clave']}<br>";
                $outputMsg .= "Rol: {$user['rol']}<br><br>";
            }
        } else {
            $outputMsg = "Usuario no encontrado con el código proporcionado.";
        }
    }
} catch (PDOException $ex) {
    $outputMsg = "Error al conectar a la base de datos: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Búsqueda de Usuario</title>
</head>
<body>

<?php
// Mostrar formulario si no se ha enviado 'codigoUsuario' o no se encontraron resultados
if (!isset($_GET['codigoUsuario']) || $preparedStmt->rowCount() == 0) {
?>
    <form action="" method="get">
        <label for="codigoUsuario">Introduzca Código de Usuario:</label>
        <input type="text" id="codigoUsuario" name="codigoUsuario" required>
        <button type="submit">Buscar</button>
    </form>
<?php
}

// Mostrar mensajes de resultado o error
echo $outputMsg;
?>

</body>
</html>

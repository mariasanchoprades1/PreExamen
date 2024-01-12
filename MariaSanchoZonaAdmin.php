<?php
session_start();

// Conectar a la base de datos
define('DB_DSN', 'mysql:dbname=empresa;host=127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');

$mensajeError = "";

try {
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Verificar credenciales
        $query = 'SELECT rol FROM usuarios WHERE nombre = ? AND clave = ?';
        $preparedStmt = $db->prepare($query);
        $preparedStmt->execute([$username, $password]);

        if ($preparedStmt->rowCount() > 0) {
            $user = $preparedStmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_role'] = $user['rol'];

            // Redirigir a la Zona Admin si el usuario tiene rol 1
            if ($user['rol'] == 1) {
                $isAdmin = true;
            } else {
                $mensajeError = "Acceso denegado. No tiene permisos de administrador.";
            }
        } else {
            $mensajeError = "Credenciales incorrectas";
        }
    }
} catch (PDOException $ex) {
    $mensajeError = "Error al conectar a la base de datos: " . $ex->getMessage();
}

// Función para borrar cookies
function borrarCookies() {
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach ($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time() - 1000);
            setcookie($name, '', time() - 1000, '/');
        }
    }
}

// Borrar las cookies al finalizar el script
register_shutdown_function('borrarCookies');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($isAdmin) ? "Zona de Administración" : "Iniciar Sesión"; ?></title>
</head>
<body>


<?php if (!isset($_SESSION['user_role'])): ?>
    <!-- Formulario de inicio de sesión -->
    <form action="" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <?php if ($mensajeError): ?>
        <p><?php echo $mensajeError; ?></p>
    <?php endif; ?>
<?php elseif ($_SESSION['user_role'] == 1): ?>
    <h1>Bienvenido a la Zona de Administración</h1>
<?php else: ?>
    <p>No tienes permisos para acceder a esta zona.</p>
<?php endif; ?>

</body>
</html>

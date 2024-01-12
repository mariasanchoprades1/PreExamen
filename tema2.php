<?php
session_start();

// Conectar a la base de datos
define('DB_DSN', 'mysql:dbname=empresa;host=127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');


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

            if ($user['rol'] == 1) {
                header("Location: admin_zone.php");
                exit();
            } else {
                echo "Acceso denegado. No tiene permisos de administrador.";
            }
        } else {
            echo "Credenciales incorrectas";
        }
    }
} catch (PDOException $ex) {
    echo "Error al conectar a la base de datos: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>

<form action="" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Iniciar Sesión</button>
</form>

</body>
</html>

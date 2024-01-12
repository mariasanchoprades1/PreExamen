<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
    <form action="" method="post">
        <label for="usuario">Nombre de Usuario: </label>
        <input type="text" name="usuario" required>

        <label for="contrasena">Contraseña: </label>
        <input type="password" name="contrasena" required>

        <input type="submit" value="Entrar">
    </form>

    <?php
    $conexion = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuarioBD = 'root';
    $contrasenaBD = '';


    //conectar base de datos

    try {
        $pdo = new PDO($conexion, $usuarioBD, $contrasenaBD);
        echo "Conectado a la bbdd con éxito!";

        //comprobar usuario contraseña
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];

        //preparar sql 
                $stmt = $pdo->prepare("SELECT * FROM Usuarios WHERE Nombre = :usuario AND Clave = :contrasena");
                $stmt->bindParam(':usuario', $usuario);
                $stmt->bindParam(':contrasena', $contrasena);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<p>Ingreso exitoso</p>";
                } else {
                    echo "<p>Usuario o contraseña incorrectos</p>";
                }
            }
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    ?>
</body>
</html>

<?php
session_start();

// Verificar si el usuario tiene el rol de administrador
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
    echo "Acceso denegado. No tienes permisos de administrador.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zona de Administración</title>
</head>
<body>
    <h1>Bienvenido a la Zona de Administración</h1>

</body>
</html>

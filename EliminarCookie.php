<?php

if (isset($_GET['borrar_cookie'])) {
    setcookie('visitas', '', time() - 3600); // Establece el tiempo en el pasado para borrar la cookie
    header("Location: eliminarCookie.php"); // Redirige a la misma página
    exit();
}

if (!isset($_COOKIE['visitas'])) {
    setcookie('visitas', '1', time() + 3600 * 24);
    echo "Bienvenido por primera vez ";
    
} else {
    $visitas = (int)$_COOKIE['visitas'];
    $visitas++;
    setcookie('visitas', $visitas, time() + 3600 * 24);
    echo "Bienvenido por $visitas vez";
}
echo "<br>";
echo '<a href="?borrar_cookie=1">Borrar Cookie</a>';


?>
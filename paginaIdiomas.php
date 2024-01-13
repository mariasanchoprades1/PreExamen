<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elegir Idioma</title>
</head>
<body>
    <?php
    // Revisar si ya se ha seleccionado un idioma y establecer la cookie
    if(isset($_POST['idioma'])) {
        $idioma = $_POST['idioma'];
        setcookie('idioma', $idioma, time() + (86400 * 30), "/"); // 86400 = 1 día
    } elseif(isset($_COOKIE['idioma'])) {
        $idioma = $_COOKIE['idioma'];
    } else {
        $idioma = 'es'; // Idioma predeterminado
    }
    ?>

    <form action="paginaIdiomasSimeon.php" method="post">
        <label for="idioma">Elige tu idioma:</label>
        <select name="idioma" id="idioma" onchange="this.form.submit()">
            <option value="es" <?php echo $idioma == 'es' ? 'selected' : ''; ?>>Español</option>
            <option value="en" <?php echo $idioma == 'en' ? 'selected' : ''; ?>>English</option>
        </select>
    </form>

    <?php
    if ($idioma == 'en') {
        echo "<p>Welcome</p>";
    } else {
        echo "<p>Bienvenido</p>";
    }
    ?>
</body>
</html>

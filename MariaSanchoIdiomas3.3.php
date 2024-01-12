<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elegir Idioma</title>
</head>
<body>
    <?php
    //  establecer la cookie
    if(isset($_POST['idioma'])) {
        $idioma = $_POST['idioma'];
        setcookie('idioma', $idioma, time() + (86400 * 30), "/"); // 86400 = 1 día
    } elseif(isset($_COOKIE['idioma'])) {
        $idioma = $_COOKIE['idioma'];
    } else {
        $idioma = 'es';
    }

    $mensajes = [
        'es' => 'Bienvenido a mi página web ',
        'en' => 'Welcome to my website'
    ];

    
    $mensajeBienvenida = $mensajes[$idioma];
    ?>

    <form action="MariaSanchoIdiomas3.3.php" method="post">
        <label for="idioma">Elige tu idioma:</label>
        <select name="idioma" id="idioma" onchange="this.form.submit()">
            <option value="es" <?php echo $idioma == 'es' ? 'selected' : ''; ?>>Español</option>
            <option value="en" <?php echo $idioma == 'en' ? 'selected' : ''; ?>>English</option>
        </select>
    </form>

    <p><?php echo $mensajeBienvenida; ?></p>
</body>
</html>

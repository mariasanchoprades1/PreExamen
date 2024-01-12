<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de Archivos</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="usuario">Nombre de Usuario: </label>
        <input type="text" name="usuario" required>

        <label for="email">Correo Electrónico: </label>
        <input type="email" name="email" required>

        <label for="archivo">Subir Archivo: </label>
        <input type="file" name="archivo" required>

        <input type="submit" value="Enviar">
    </form>

    <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si el archivo ha sido cargado sin errores
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
        $archivo = $_FILES['archivo'];
        $nombreArchivo = $archivo['name'];
        $tipoArchivo = $archivo['type'];
        $tamanoArchivo = $archivo['size'];
        $rutaTemporal = $archivo['tmp_name'];

        $directorioDestino = "img/"; // Asegúrate de que este directorio existe y tiene permisos de escritura

        // Mueve el archivo del directorio temporal a tu directorio destino
        if (move_uploaded_file($rutaTemporal, $directorioDestino . $nombreArchivo)) {
            echo "Archivo subido con éxito.";
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Error al cargar el archivo.";
    }
}
?>
</body>
</html>
<?php include 'db.php'; ?>
<form action="add.php" method="post" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre" required><br>
    Imagen: <input type="file" name="imagen" required><br>
    <input type="submit" name="submit" value="Agregar">
</form>

<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $imagen = $_FILES['imagen']['name'];
    $temp = $_FILES['imagen']['tmp_name'];
    $ruta = "images/" . $imagen;

    if (move_uploaded_file($temp, $ruta)) {
        $conn->query("INSERT INTO registros (nombre, imagen) VALUES ('$nombre', '$imagen')");
        header("Location: index.php");
    } else {
        echo "Error al subir imagen.";
    }
}
?>

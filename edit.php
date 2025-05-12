<?php
include 'db.php';
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM registros WHERE id=$id");
$row = $res->fetch_assoc();
?>

<form action="edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre" value="<?= $row['nombre'] ?>" required><br>
    Imagen actual: <img src="images/<?= $row['imagen'] ?>" width="100"><br>
    Nueva imagen: <input type="file" name="imagen"><br>
    <input type="submit" name="update" value="Actualizar">    
    <button type="button" onclick="window.location.href='index.php'" style="margin-left:10px;">Volver</button>
</form>

<?php
if (isset($_POST['update'])) {
    $nombre = $_POST['nombre'];
    $imagen = $_FILES['imagen']['name'];

    if ($imagen) {
        $temp = $_FILES['imagen']['tmp_name'];
        $ruta = "images/" . $imagen;
        move_uploaded_file($temp, $ruta);

        // Eliminar imagen anterior
        unlink("images/" . $row['imagen']);

        $conn->query("UPDATE registros SET nombre='$nombre', imagen='$imagen' WHERE id=$id");
    } else {
        $conn->query("UPDATE registros SET nombre='$nombre' WHERE id=$id");
    }

    header("Location: index.php");
}
?>

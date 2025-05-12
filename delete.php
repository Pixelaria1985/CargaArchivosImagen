<?php
include 'db.php';

$id = $_GET['id'];
// Eliminar imagen física
$res = $conn->query("SELECT imagen FROM registros WHERE id=$id");
$row = $res->fetch_assoc();
unlink("images/" . $row['imagen']);

// Eliminar registro
$conn->query("DELETE FROM registros WHERE id=$id");

header("Location: index.php");
?>

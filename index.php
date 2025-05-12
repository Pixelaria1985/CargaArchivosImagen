<?php include 'db.php'; ?>
<a href="add.php">Agregar nuevo</a><br><br>

<table border="1">
<tr>
    <th>Nombre</th>
    <th>Imagen</th>
    <th>Acciones</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM registros");

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['nombre']}</td>
            <td><img src='images/{$row['imagen']}' width='100'></td>
            <td>
                <a href='edit.php?id={$row['id']}'>Editar</a> |
                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('¿Seguro que deseas eliminar?');\">Eliminar</a>
            </td>
          </tr>";
}
?>
</table>

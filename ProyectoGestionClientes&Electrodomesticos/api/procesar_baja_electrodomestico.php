<?php
require 'conexion.php';  // Importar el archivo de conexión

// Obtener el ID del electrodoméstico a eliminar
$id_electrodomestico = $_POST['id_electrodomestico'];

// Eliminar el electrodoméstico de la base de datos
$sql = "DELETE FROM electrodomesticos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('i', $id_electrodomestico);

if ($stmt->execute()) {
    echo "<script>alert('Electrodoméstico eliminado exitosamente'); window.location.href='../vistas/electrodomesticos.html';</script>";
} else {
    echo "Error al eliminar el electrodoméstico: " . $conexion->error;
}

$stmt->close();
$conexion->close();
?>

<?php
require 'conexion.php';  // Importar el archivo de conexión

// Obtener datos del formulario
$id_electrodomestico = $_POST['id_electrodomestico'];
$tipo = $_POST['tipo'];
$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];
$problema = $_POST['problema'];
$tipo_reparacion = $_POST['tipo_reparacion'];

// Actualizar los datos en la base de datos
$sql = "UPDATE electrodomesticos SET tipo = ?, modelo = ?, cantidad = ?, problema = ?, tipo_reparacion = ? WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('ssisii', $tipo, $modelo, $cantidad, $problema, $tipo_reparacion, $id_electrodomestico);

if ($stmt->execute()) {
    echo "<script>alert('Electrodoméstico modificado exitosamente'); window.location.href='../vistas/electrodomesticos.html';</script>";
} else {
    echo "Error al modificar el electrodoméstico: " . $conexion->error;
}

$stmt->close();
$conexion->close();



?>
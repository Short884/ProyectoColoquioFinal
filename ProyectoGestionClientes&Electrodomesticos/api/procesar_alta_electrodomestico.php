<?php
require 'conexion.php';  // Importar el archivo de conexión

// Obtener datos del formulario
$id_cliente = $_POST['id_cliente'];
$tipo = $_POST['tipo'];
$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];
$problema = $_POST['problema'];
$tipo_reparacion = $_POST['tipo_reparacion'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO electrodomesticos (id_cliente, tipo, modelo, cantidad, problema, tipo_reparacion) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('ississ', $id_cliente, $tipo, $modelo, $cantidad, $problema, $tipo_reparacion);

if ($stmt->execute()) {
    echo "<script>alert('Electrodoméstico agregado exitosamente'); window.location.href='../vistas/electrodomesticos.html';</script>";
} else {
    echo "Error al agregar el electrodoméstico: " . $conexion->error;
}

$stmt->close();
$conexion->close();
?>

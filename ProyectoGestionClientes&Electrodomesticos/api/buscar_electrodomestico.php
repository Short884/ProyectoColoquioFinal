<?php
require 'conexion.php';  // Importar el archivo de conexión

// Obtener el ID del cliente a buscar
$id_cliente_busqueda = $_POST['id_cliente_busqueda'];

// Buscar el electrodoméstico en la base de datos
$sql = "SELECT * FROM electrodomesticos WHERE id_cliente = ? LIMIT 1";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('i', $id_cliente_busqueda);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $electrodomestico = $resultado->fetch_assoc();
    echo json_encode($electrodomestico);
} else {
    echo json_encode(['error' => 'Electrodoméstico no encontrado para este cliente']);
}

$stmt->close();
$conexion->close();
?>

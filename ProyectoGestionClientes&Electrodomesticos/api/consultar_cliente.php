<?php
include 'conexion.php';


$dni = $_POST['dni']; /

// Consulta para obtener los datos del cliente
$consulta = $conexion->prepare("SELECT nombre, apellido, telefono, iva FROM clientes WHERE dni = ?");
$consulta->bind_param("i", $dni);
$consulta->execute();
$resultado = $consulta->get_result();
$cliente = $resultado->fetch_assoc();

// Mostrar los datos del cliente, incluyendo el IVA
echo "<p>Nombre: " . htmlspecialchars($cliente['nombre']) . "</p>";
echo "<p>Apellido: " . htmlspecialchars($cliente['apellido']) . "</p>";
echo "<p>Teléfono: " . htmlspecialchars($cliente['telefono']) . "</p>";
echo "<p>IVA: " . htmlspecialchars($cliente['iva']) . "</p>";

$dni_cliente_consulta = $_POST['dni_cliente_consulta'];

$query = "SELECT * FROM clientes WHERE dni = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $dni_cliente_consulta);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $cliente = $resultado->fetch_assoc();
    echo json_encode($cliente);
} else {
    echo json_encode(['error' => 'Cliente no encontrado']);
}
?>

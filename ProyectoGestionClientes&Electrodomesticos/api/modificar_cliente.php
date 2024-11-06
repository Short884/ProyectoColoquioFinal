<?php
include 'conexion.php';

if (isset($_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['iva'])) {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $iva = $_POST['iva'];

    $query = "UPDATE clientes SET nombre = ?, apellido = ?, telefono = ?, iva = ? WHERE dni = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssssi", $nombre, $apellido, $telefono, $iva, $dni);

    if ($stmt->execute()) {
        echo "Cliente modificado exitosamente.";
    } else {
        echo "Error al modificar el cliente.";
    }
}



// Teniendo la conexión establecida ($conexion) y el DNI recibido...
$consulta = $conexion->prepare("SELECT nombre, apellido, telefono, iva FROM clientes WHERE dni = ?");
$consulta->bind_param("i", $dni);
$consulta->execute();
$resultado = $consulta->get_result();
$cliente = $resultado->fetch_assoc();


?>
<script>
    const ivaCliente = "<?php echo htmlspecialchars($cliente['iva']); ?>";
    document.getElementById("iva").value = ivaCliente;
</script>
<?php

// Después de guardar/modificar/eliminar exitosamente
header("Location: ../vistas/clientes.html");
exit;


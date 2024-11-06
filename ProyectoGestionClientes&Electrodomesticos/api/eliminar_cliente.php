<?php
include 'conexion.php';

if (isset($_POST['dni_cliente_baja'])) {
    $dni_cliente_baja = $_POST['dni_cliente_baja'];

    // Preparar la consulta para eliminar al cliente con el DNI proporcionado
    $query = "DELETE FROM clientes WHERE dni = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $dni_cliente_baja);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Cliente eliminado exitosamente.";
        } else {
            echo "No se encontró un cliente con el DNI proporcionado.";
        }
    } else {
        echo "Error al eliminar el cliente.";
    }
} else {
    echo "No se proporcionó el DNI del cliente.";
}

// La operación de eliminación
if ($eliminacionExitosa) { // verifica si la eliminación fue exitosa
    header("Location: ./vistas/clientes.html");
    exit;
}


?>

<?php
include 'conexion.php';

if (isset($_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['iva'])) {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $iva = $_POST['iva'];

    $query = "INSERT INTO clientes (dni, nombre, apellido, telefono, iva) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("issss", $dni, $nombre, $apellido, $telefono, $iva);

    if ($stmt->execute()) {
        echo "Cliente registrado exitosamente.";
    } else {
        echo "Error al registrar el cliente.";
    }
} else {
    echo "Por favor, complete todos los campos.";
}

// Después de guardar/modificar/eliminar exitosamente
header("Location: ../vistas/clientes.html");
exit;


?>

<?php
include 'conexion.php';

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];

    $query = "SELECT * FROM clientes WHERE dni = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $dni);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo json_encode($resultado->fetch_assoc());
    } else {
        echo json_encode(null);
    }
}
?>

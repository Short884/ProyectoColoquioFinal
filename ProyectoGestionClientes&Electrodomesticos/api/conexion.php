<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$usuario = 'root';  // Cambia si tienes un usuario diferente
$contraseña = '';   // Cambia si tienes una contraseña configurada
$base_datos = 'reparaciones';

// Crear la conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
?>

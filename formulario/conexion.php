<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'sistema_registro';

// Crear la conexión
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena']; 

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO usuarios (nombre_completo, fecha_nacimiento, correo_electronico, contrasena) 
        VALUES (?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param('ssss', $nombre, $fecha_nacimiento, $correo, $contrasena);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
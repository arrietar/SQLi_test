<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$usuario_bd = 'root';
$password_bd = '';
$nombre_bd = 'my_database';

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario_bd, $password_bd, $nombre_bd);

// Verificar si hay un error en la conexión
if ($conexion->connect_error) {
    die('Error en la conexión: ' . $conexion->connect_error);
}

// Obtener los datos ingresados en el formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Consulta SQL para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Inicio de sesión exitoso, redirigir a la página de inicio
    header('Location: inicio.html');
} else {
    // Credenciales inválidas, mostrar mensaje de error
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

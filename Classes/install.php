<?php
// Datos de conexión (ajusta según tu entorno)
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$puerto = 3306; // opcional, solo si necesitas especificar

// Crear conexión al servidor (sin seleccionar base de datos todavía)
$conn = new mysqli($host, $usuario, $contrasena, "", $puerto);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la base de datos
$sqlCrearDB = "CREATE DATABASE IF NOT EXISTS Db_NarutoShippuden";
if ($conn->query($sqlCrearDB) === TRUE) {
    echo "✅ Base de datos creada correctamente.<br>";
} else {
    die("❌ Error al crear la base de datos: " . $conn->error);
}

// Seleccionar la base de datos
$conn->select_db("Db_NarutoShippuden");

// Crear la tabla
$sqlCrearTabla = "
CREATE TABLE IF NOT EXISTS personajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    color VARCHAR(50),
    tipo VARCHAR(50),
    nivel INT,
    foto VARCHAR(255)
)";
if ($conn->query($sqlCrearTabla) === TRUE) {
    echo "✅ Tabla 'personajes' creada correctamente.<br>";
} else {
    die("❌ Error al crear la tabla: " . $conn->error);
}

// Cerrar conexión
$conn->close();
header('Location: ?vista=home');
?>

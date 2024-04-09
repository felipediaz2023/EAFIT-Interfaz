<?php
// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "02092001p";
$dbname = "tu_base_de_datos"; // Reemplaza "tu_base_de_datos" con el nombre real de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombreLibro = $_POST["Nombre_Libro"];

// Consulta SQL
$sql = "SELECT posicion FROM libros WHERE titulo='$nombreLibro'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar resultados
    $row = $result->fetch_assoc();
    $posicion = $row["posicion"];
    echo "La posición del libro \"$nombreLibro\" es: $posicion";
} else {
    echo "No se encontraron resultados para la consulta.";
}

$conn->close();
?>

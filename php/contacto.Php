<?php
// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "02092001p";
$dbname = "libreria eafit"; // Reemplaza "tu_base_de_datos" con el nombre real de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombreLibro = $_POST["nombres"];
$nombreAutor = $_POST["autor"];
$nombreEditorial = $_POST["editorial"];

// Consulta SQL
$sql = "SELECT * FROM libros WHERE titulo='$nombreLibro' AND autor='$nombreAutor' AND editorial='$nombreEditorial'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar resultados
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idLIBRO"]. " - Título: " . $row["titulo"]. " - Autor: " . $row["autor"]. "<br>";
    }
} else {
    echo "No se encontraron resultados para la consulta.";
}

$conn->close();
?>


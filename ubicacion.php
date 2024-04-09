<?php
// Conexión a la base de datos
$servername = "127.0.0.1:3306";
$username = "root";
$password = "02092001p";
$dbname = "libreriaeafit";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $autor = $_POST["Autor"];
    $titulo = $_POST["nombre"];
    $cantidad = $_POST["Cantidades"];
    $precio = $_POST["Precio"];
    $editorial = $_POST["Editorial"];
    $fecha_registro = $_POST["fecha"];
    $posicion = $_POST["posicion"];

    // Consulta SQL para insertar datos
    $sql = "INSERT INTO libros (autor, titulo, Cantidad, Precio, editorial, fecha_registro, posicion) 
            VALUES ('$autor', '$titulo', '$cantidad', '$precio', '$editorial', '$fecha_registro', '$posicion')";

    if (mysqli_query($conn, $sql)) {
        echo "Registro exitoso";
    } else {
        echo "Error en el registro: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>


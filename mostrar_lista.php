<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar lista</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "escuela";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos de la tabla
$sql = "SELECT id, nombre, edad, grado FROM estudiantes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Lista de Estudiantes</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Grado</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["edad"] . "</td><td>" . $row["grado"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay estudiantes registrados";
}

$conn->close();
?>

</body>
</html>
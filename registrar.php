<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Estudiantes</title>
</head>
<body>
    <h1>Registro de Estudiantes</h1>
    <form action="registrar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>
        <label for="grado">Grado:</label>
        <input type="text" id="grado" name="grado" required><br><br>
        <input type="submit" value="Registrar">
    </form>

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

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $grado = $_POST['grado'];

    // Insertar datos en la tabla
    $sql = "INSERT INTO estudiantes (nombre, edad, grado) VALUES ('$nombre', $edad, '$grado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo estudiante registrado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>

    <a href="mostrar_lista.php">Ver lista de estudiantes</a>

</body>
</html>

<?php
// Definir el archivo donde se guardarán los estudiantes
$filename = 'students.txt';

// Función para leer los estudiantes del archivo
function readStudents($filename) {
    $students = [];
    if (file_exists($filename)) {
        $file = fopen($filename, 'r');
        while (($line = fgets($file)) !== false) {
            $students[] = explode(',', trim($line));
        }
        fclose($file);
    }
    return $students;
}

// Función para escribir un estudiante al archivo
function writeStudent($filename, $name, $grade) {
    $file = fopen($filename, 'a');
    fwrite($file, "$name,$grade\n");
    fclose($file);
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $grade = trim($_POST['grade']);
    if (!empty($name) && !empty($grade)) {
        writeStudent($filename, $name, $grade);
    } else {
        $error = 'Por favor, complete todos los campos.';
    }
}

$students = readStudents($filename);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
</head>
<body>
    <h1>Registro de Estudiantes</h1>
    <form method="post" action="">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name"><br>
        <label for="grade">Grado:</label>
        <input type="text" id="grade" name="grade"><br>
        <input type="submit" value="Registrar">
    </form>
    <p style="color:red;"><?php echo $error; ?></p>

    <h2>Estudiantes Registrados</h2>
    <ul>
        <?php foreach ($students as $student): ?>
            <li><?php echo htmlspecialchars($student[0]) . ' - ' . htmlspecialchars($student[1]); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>


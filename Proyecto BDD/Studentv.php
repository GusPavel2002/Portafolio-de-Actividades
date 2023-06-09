<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Student Records</title>
  <link rel="stylesheet" type="text/css" href="style/StyleView.css">
</head>
<body>
<?php
//Conexion a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'school';
$conn = mysqli_connect($host, $user, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Consulta SQL para recuperar los registros de la tabla
$sql = "SELECT * FROM students";

$resultado = mysqli_query($conn, $sql);

// Imprimir los registros en una tabla HTML
if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>ID_Student</th><th>Name</th><th>Surname</th><th>Telephone</th><th>Email</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $fila["ID_Student"] . "</td><td>" . $fila["Name"] . "</td><td>" . $fila["Surname"] . "</td><td>" . $fila["Telephone"] . "</td><td>" . $fila["Email"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Cerrar la conexión
mysqli_close($conn);
?>
</body>
</html>
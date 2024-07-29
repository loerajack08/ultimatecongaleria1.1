<?php
// Incluir aquí el código de verificación de sesión o de autenticación de usuario, si es necesario

// Aquí puedes incluir cualquier encabezado, título o estilo adicional que desees para la página
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Datos</title>
    <!-- Aquí puedes incluir cualquier estilo CSS adicional -->
    <style>
        /* Estilos CSS para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Otros estilos CSS que desees agregar */
    </style>
</head>
<body>
    <h1>Tabla de Datos</h1>
    <p>Aquí puedes mostrar información relevante para el usuario después de iniciar sesión.</p>
    
    <!-- Aquí puedes incluir la tabla de datos -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>fecha de tu cita </th>
                <th>hora de tu cita</th>
                <!-- Puedes agregar más columnas según tu tabla de datos -->
            </tr>
        </thead>
        <tbody>
<?php
session_start();

// Verificar si la variable de sesión existe y obtener el nombre de usuario
if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    // Si la variable de sesión no está definida, muestra un mensaje de error o redirige a la página de inicio de sesión
    header("Location: fechasdisporegistro.php?error=no_sesion");
    exit();
}
 //validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$db = "bdformulario";

//conetamos al base datos
$conexion = mysqli_connect($host, $user, $pass, $db);
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
// Consulta SQL para seleccionar los datos de la tabla del usuario que ha iniciado sesión
$consulta = "SELECT * FROM tabla_form WHERE usuario = '$nombre_usuario'";


// Ejecutar la consulta
$resultado = mysqli_query($conexion, $consulta);

// Verificar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Iterar sobre los resultados y mostrar cada fila en la tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['fechacita'] . "</td>";
        echo "<td>" . $fila['horacita'] . "</td>";
        // Puedes agregar más celdas según tu tabla de datos
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No se encontraron datos para este usuario.</td></tr>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
</tbody>
</table>

<!-- Aquí puedes incluir cualquier otro contenido HTML o PHP que desees mostrar en la página -->

</body>
</html>

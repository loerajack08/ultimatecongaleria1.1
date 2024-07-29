<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
        table {
            border: solid 2px #7e7c7c;
            border-collapse: collapse;
        }

        th, h1 {
            background-color: #edf797;
        }

        td,
        th {
            border: solid 1px #7e7c7c;
            padding: 2px;
            text-align: center;
        }

        .button {
         display: inline-block;
         padding: 10px 20px;
         font-size: 16px;
         color: #ffffff;
         background-color: #007bff;
         text-align: center;
         text-decoration: none;
         border-radius: 5px;
         transition: background-color 0.3s ease;
        }

      .button:hover {
       background-color: #0056b3;
    }
    </style>
</head>
<body>
    
<?php
session_start(); // Iniciar la sesión si aún no se ha iniciado

// Datos de conexión
$user = "root";
$pass = "";
$host = "localhost";
$db = "bdformulario";

// Conexión a la base de datos
$conexion = new mysqli($host, $user, $pass, $db);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario y la contraseña enviados por el formulario
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    // Consulta SQL preparada para evitar inyección SQL
    $consulta = "SELECT * FROM tabla_we WHERE usuarioR = ? AND contraseñaR = ?";
    
    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);
    
    // Vincular parámetros
    $stmt->bind_param("ss", $usuario, $contraseña);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener resultado de la consulta
    $resultado = $stmt->get_result();

    // Verificar si se encontró alguna fila que coincida con las credenciales
    if ($resultado->num_rows == 1) {
        // Consulta para obtener datos de la tabla después del inicio de sesión exitoso
        $consulta_tabla = "SELECT id, nombre, usuario, contraseña, fechacita, horacita FROM tabla_form";
        $resultado_tabla = $conexion->query($consulta_tabla);

        if ($resultado_tabla->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th><h1>ID</h1></th>";
            echo "<th><h1>Nombre</h1></th>";
            echo "<th><h1>Usuario</h1></th>";
            echo "<th><h1>Contraseña</h1></th>";
            echo "<th><h1>Fecha cita</h1></th>";
            echo "<th><h1>hora cita</h1></th>";
            echo "</tr>";

            // Imprimir los datos de la tabla
            while ($fila = $resultado_tabla->fetch_assoc()) {
                echo "<tr>";
                echo "<td><h2>" . $fila['id'] . "</h2></td>";
                echo "<td><h2>" . $fila['nombre'] . "</h2></td>";
                echo "<td><h2>" . $fila['usuario'] . "</h2></td>";
                echo "<td><h2>" . $fila['contraseña'] . "</h2></td>";
                echo "<td><h2>" . $fila['fechacita'] . "</h2></td>";
                echo "<td><h2>" . $fila['horacita'] . "</h2></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron registros.";
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

// Cerrar la conexión a la base de datos al final del script si ya no la necesitas
$conexion->close();
?>

<a href="index.php" class="button">Volver Atrás</a><br>
<a href="foto.php" class="button">subir fotos a catalago</a><br>
<a href="mostrar.php" class="button">ver fotos a catalago</a><br>

</body>
</html>
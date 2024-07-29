
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


    </style>
</head>
<body>
<?php
session_start(); // Iniciar la sesión si aún no se ha iniciado

//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$db = "bdformulario";

//conetamos al base datos
$conexion = mysqli_connect($host, $user, $pass, $db);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario y la contraseña enviados por el formulario
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    // Consulta SQL para verificar las credenciales
    $consulta = "SELECT * FROM tabla_form WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    
    // Ejecutar la consulta solo si la conexión es válida
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se encontró alguna fila que coincida con las credenciales
    if ($resultado && mysqli_num_rows($resultado) == 1) {
        // Establecer la variable de sesión para el nombre de usuario
        $_SESSION['nombre_usuario'] = $usuario;

        // Redirigir al usuario a la página de la tabla
        header("Location: tabla.php");
        exit(); // Asegurarse de que el script se detenga después de la redirección
    } else {
        // Si no se encontraron coincidencias, mostrar un mensaje de error
        echo "Usuario oee contraseña incorrectos.";
    }
}

// Cerrar la conexión a la base de datos al final del script si ya no la necesitas
mysqli_close($conexion);
?>

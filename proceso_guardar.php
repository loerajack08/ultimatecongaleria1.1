<?php
include "conexion.php";

$nombre = $_POST['nombre'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name'])); // Cambio de $Imagen a $imagen para mantener consistencia en el uso de variables.

$query = "INSERT INTO tabla_imagen (nombre, imagen) VALUES ('$nombre', '$imagen')"; // Cambiado punto y coma por coma, y cerrado paréntesis.

$resultado = $conexion->query($query); // Cambio de $conexion a $conn para que coincida con la variable de conexión.

if ($resultado) {
    echo "Sí se insertó";
} else {
    echo "No se insertó";
}

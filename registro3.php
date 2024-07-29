
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
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";


// validamos la fecha para que el usuario no ingrese una fecha anterior ala actual
$fecha_actual_mas_un_dia = date('Y-m-d', strtotime('+1 day'));


echo $fecha_actual_mas_un_dia;

$fechacita = $_POST["fechacita"] ?? null;


if($fechacita >= $fecha_actual_mas_un_dia)
  {
   echo"la fecha ingresada es correcta";

   }
else 
   {
    echo"la fecha ingresada es erronea o ya paso";

    exit;
   }


//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$nombre = $_POST["nombre"] ;
$usuario = $_POST["usuario"] ;
$contraseña = $_POST["contraseña"] ;
$fechacita = $_POST["fechacita"];
$horacita =$_POST["horacita"];

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos creado tu cuenta exitosamente</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "bdformulario";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>se a creado tu cuenta estos son tus datos no los compartas con nadie:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO tabla_form (nombre, usuario, contraseña, fechacita , horacita)
                             VALUES ('$nombre','$usuario','$contraseña' , '$fechacita', '$horacita')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM tabla_form ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($connection, $consulta);
        

if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
// con esto creamos la base de nuestra tabola(nombre de cada cosa que se insertara)
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Usuario</th></h1>";
echo "<th><h1>Contraseña</th></h1>";
echo "<th><h1>fechacita</th></h1>";
echo "<th><h1>horacita</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['usuario'] . "</td></h2>";
    echo "<td><h2>" . $colum['contraseña'] . "</td></h2>";
    echo "<td><h2>" . $colum['fechacita'] .  "</td></h2>";
    echo "<td><h2>" . $colum['horacita'] .  "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.php" class="button"> Volver Atrás</a>';


?>


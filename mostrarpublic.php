<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">  
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #000000;
            color: white;
            font-size: 24px;
        }
        td {
            border-bottom: 1px solid #ddd;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

</head>
<body>
    <center>
     <table border="3">
        <thead>
        <tr>
         <th>imagen</th>
        </tr>

        </thead>
        <tbody>

        <?php
         include "conexion.php";
         $query ="SELECT * FROM tabla_imagen";
         $resultado = $conexion->query($query);
         while($row = $resultado->fetch_assoc()){
        
        ?>
        <tr>
            <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?> "/></td>
         </tr>
        <?php
          }
         ?>

        </tbody>
     </table> 
    </center>
</body>
</html>
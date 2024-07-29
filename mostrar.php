<!DOCTYPE html>
<html lang="en">
<head>
    <title>Catalogo</title>

</head>
<body>
    <center>
     <table border="3">
        <thead>
        <tr>
         <th>id</th>
         <th>nombre</th>
         <th>imagen</th>
         <th>operaciones</th>

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
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['nombre']; ?> </td>
            <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?> "/></td>
            <th><a href="eliminar.php?id=<?php echo $row['id']; ?>">eliminar</a></th>
         </tr>
        <?php
          }
         ?>

        </tbody>
     </table> 
    </center>
</body>
</html>
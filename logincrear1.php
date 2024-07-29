<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylosroot.css">
    <title>crear cita</title>
  </head>
  <body>
    <h1></h1>
    <form action="registro3.php" name="" method="POST">
      <table border="0" align="center">
        <tr>
          <td>
            Nombre y Apellido:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="nombre" id="name" required  />
          </td>
        </tr>
        <tr>
          <td>
            Nombre de Usuario:
          </td>
          <td>
            <label for="user"></label>
            <input type="text" name="usuario" id="user" required  />
          </td>
        </tr>
        <tr>
          <td>
            Contraseña:
          </td>
          <td>
            <label for="password"></label>
            <input type="password" name="contraseña" id="password"  required />
          </td>
        </tr>
        <!--<tr>
          <td>
            Repetir contraseña:
          </td>
          <td>
            <label for="rep_pasword"></label>
            <input type="pasword" name="rep_contraseña" id="rep_pasword"  required />
          </td>
        </tr>-->

        <tr>
          <td>
            fecha de la cita :
          </td>

          <td>

            <label for="fechacita"></label>
            <input type="date" name="fechacita" id="fechacita" value="<?php echo $fecha_actual_mas_un_dia; ?>" required  />

          </td>
        </tr>

        <tr>
          <td>
           hora de la cita :
          </td>
          <td>
            <label for="horacita"></label>
            <input type="number"  name="horacita" id="horacita"   required>
        
          </td>
        </tr>
        
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">
            <input
              type="submit"
              name="enviar"
              id="enviar"
              value="Registrarse"
            />
          </td>
          <td align="center">
            <input type="reset" name="borrar" id="borrar" value="Restablecer" />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php
session_start();
if (@!$_SESSION['nombre']) {
    header("Location:index.html");
}elseif ($_SESSION['rol']==2) {
    header("Location:indexUsuario.php");
}

?>
<!DOCTYPE html>
            <html >
            <head>
                <!-- Theme CSS -->
                <link href="css/grayscale.min.css" rel="stylesheet">
                <link href="estilos.css" rel="stylesheet">

                <meta charset="UTF-8">
                <title>Material Design Lite components demo</title>
                <link rel="stylesheet" href="css/style.css">


            </head>
            <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

            <header class="intro">
                <div class="intro-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <p class="intro-text" > ADMINISTRADOR : <?php echo $_SESSION['nombre']." ".$_SESSION['apellido'];?></p>


            <form  action="administradorEditar.php" method=POST>
                <table align=center   width=670 border=5 bgcolor="#CDCDCD">
                    <tr>
                        <td valign="top" align=left colspan=3>
                            <br>

                            <?php
                            include ("conexion.php");
                            $nombre= $_GET ['nombre'];
                            $apellido= $_GET['apellido'];
                            $correo= $_GET  ['correo'];
                            $zonaRes= $_GET ['zonaResidencia'];
                            $telefono= $_GET  ['Telefono'];
                            $nomUsuario=$_GET ['nomUsuario'];
                            $fecNac=$_GET['fecNac'];
                            $fecNac=strtotime("$fecNac");
                            $fecNac = date("Y-m-d",$fecNac);
                            $password_admin = NULL;
                            $rol_usuario = $_GET['rol'];
                            $estado_usuario =$_GET['estado'] ;

                            echo '
          <tr>
           <td width="25%" height="20%" align="center" colspan=2 bgcolor="#00000" class="_espacio_celdas" style="color: #FFFFFF; font-family: cursive">               EDITAR  USUARIO
           </td>
         </tr>

          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">              Nombres
           </td>
                <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas">
                <input type=text value="'.$nombre.'" name="Nombre" required>
               </td>

          </tr>
         <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">              Apellidos
           </td>
           <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas">
              <input type=text value="'.$apellido.'" name="Apellido">
           </td>
          </tr>

           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">              Tipo de Usuario
           </td>
            <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">
             <label for="user" font-family: cursive> Administrador <input type="radio" style="color:black" name="rol" value="1">
            <label font-family: cursive> Usuario <input type="radio" style="color:"blue" name="rol" value="2" checked>
          </td>

          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">              Correo
           </td>

           <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas">
              <input type=email value="'.$correo.'" name="Correo">
           </td>
          </tr>
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">              Fecha De Nacimiento
           </td>
           <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas">
              <input type=date id="fecNac" step="1" min="1990-01-01" max="2059-12-31"  value="'.$fecNac.'" name="fecNac" required>

           </td>
          </tr>

          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">                Telefono
           </td>
           <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas">
              <input type=text value="'.$telefono.'" name="numCelular" required>
           </td>
          </tr>
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">                Zona De Residencia
           </td>
           <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas">

                                            <select id=zonaRes name=zonaRes class="form-Reg" required>

                                                <option value="sur">Zona Sur</option>
                                                <option value="centro">Zona Centro</option>
                                                <option value="norte">Zona Norte</option>
                                            </select>

           </td>
          </tr>
          <tr>

          </tr>
          </tr>
              <input type=hidden value="'.$nomUsuario.'" name="nomUsuario" >
          <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">                Estado Usuario
           </td>
            <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas_m" style="color: #FFFFFF; font-family: cursive">
              <label for="user" font-family: cursive"> Activar <input type="radio" style="color:black" name="estado" value="activo">
             <label for="user" font-family: cursive"> Desactivar <input type="radio" name="estado" value="desactivado" checked>
          </td>
          </tr>
         <tr>
           <td width="25%" height="20%" align="center" bgcolor="#000000" class="_espacio_celdas" style="color: #FFFFFF; font-family: cursive">
              &nbsp;&nbsp;&nbsp;
           </td>
           <td height="20" align="center" bgcolor="#000000" class="_espacio_celdas">
              <input type=hidden value="1" name="enviado">
              <input style="color: #ffffff; background: url("azul.jpg width=50px") type=submit value="ENVIAR" name="ENVIAR">
    </td>


    </tr>';
                            ?>


                </table>
            </form>
                                <br><br>
                                <br><br>
            </body>
</html>
</div>
</div>
</div>
</div>
</header>
</body>
</html>
</>

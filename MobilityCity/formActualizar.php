<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['nombre']) {
    header("Location:index.html");
}elseif ($_SESSION['rol']==2) {
    header("Location:indexUsuario.php");
}

?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mobility City</title>
    <link rel="icon" href="img/smartcity.png" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">

    <!-- script -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="validarReg.js"></script>
    <script src=validarContraseña.js></script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<!-- ventana modal editar Usuario -->
<div class="modal fade" id="editarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black"> <?php echo $_SESSION['nomUsuario'];?> </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black">
                <form action="editarPerfil.php" method=POST  >



                    <table>
                        <div class="contenedor-inputs">
                            <tr>
                                <td><label for="user" style="color:black">Nombre:</label></td>
                                <td><input type="text" class="form-Reg" id="Nombre" name="Nombre" value="<?php echo $_SESSION['nombre'];?>" required></td>
                                <td><input type="text" class="form-Reg" id="Apellido" name="Apellido" value="<?php echo $_SESSION['apellido'];?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="user" style="color:black">Tipo Usuario</td>
                                <td >
                                    <label for="user" style="color:gray" class="page-scroll"> Administrador <input type="radio" style="color:black" name="rol" value="1">
                                        <label for="user" style="color:gray"> Consulta <input type="radio" style="color:"blue" name="rol" value="2" checked>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Correo:</label></td>
                                <td><input type="email" class="form-Reg" id="Correo" name="Correo" value="<?php echo $_SESSION['correo'];?>" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Zona de residencia:</td>
                                <td>
                                    <select id=zonaRes name=zonaRes class="form-Reg" value="<?php echo $_SESSION['zonaResidencia'];?>" required>

                                        <option value="sur">Zona Sur</option>
                                        <option value="centro">Zona Centro</option>
                                        <option value="norte">Zona Norte</option>
                                    </select>

                                </td>
                                <td><input type="text" class="form-Reg" id="numCelular" name="numCelular" value="<?php echo $_SESSION['Telefono'];?>" ></td>

                            </tr>
                            <tr>
                                <td><label for="user" style="color:black">Estado Usuario</td>
                                <td >
                                    <label for="user" style="color:gray" class="page-scroll"> Activar <input type="radio" style="color:black" name="estado" value="activo"></label>
                                        <label for="user" style="color:gray"> Desactivar <input type="radio" style="color:blue" name="estado" value="desactivado" checked></label>


                                </td>
                            </tr>
                            <tr>
                                <td><label for="user" style="color:black">Fecha de nacimiento:</td>
                                <td><input type="date" class="form-Reg" id="fecNac" name="fecNac" step="1" min="1990-01-01" max="2059-12-31" value="<?php echo $_SESSION['fecNac'];?>" required></td>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" id="ActualizarAdmin" name="buttonActualizarAdmin" value="Actualizar" class="btn btn-primary">
                                    <input type=hidden value="1" name="enviado">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </td>
                            </tr>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
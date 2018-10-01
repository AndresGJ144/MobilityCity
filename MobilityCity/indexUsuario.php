<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['nombre']) {
    header("Location:index.html");
}elseif ($_SESSION['rol']==1) {
    header("Location:indexAdmin.php");
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
    <script src="validarContraseña.js"></script>

    <link rel="import" href="verRutasMapa.html">
    <link rel="import" href="verZonas.php">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">



<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <i class="fa fa-play-circle"></i> <span class="light">Mobility</span> City
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>

                    <a class="page-scroll" href="formularioGraficas.html">Reportes Graficos</a>
                </li>
                <li>
                    <a class="page-scroll" href="#formPicoPlacaa">Pico y placa</a>
                </li>
                <li>
                    <a class="page-scroll" href="#mapaqw">Condiciones Ambientales</a>
                </li>
                <li>
                    <!-- <button type="button" class="btn btn-default dropdown-toggle" -->
                    <a data-toggle="dropdown" href="">
                        <strong><span class="glyphicon glyphicon-user"></span> &nbsp; <?php echo $_SESSION['nombre']." ".$_SESSION['apellido'];?></strong> <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>  <button type="button" class="btn btn-link" data-target="#editarPerfil" data-toggle="modal"
                            ">Editar perfil</button>
                        </li>
                        <li>  <button type="button" class="btn btn-link" data-target="#editarPassword" data-toggle="modal"
                            ">Cambiar contraseña</button>
                        </li>
                        <li class="divider"></li>
                        <li> <a href="cerrarSesion.php">Cerrar Sesion</a> </li>

                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- ventana modal editar Contraseña -->
<div class="modal fade" id="editarPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align: center"> FORMULARIO PARA EDITAR LA CONTRASEÑA <BR> </h5>
                <h6 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center; "> USUARIO : <?php echo $_SESSION['nomUsuario'];?>  </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body" style="color:black">
                <form action="editarPassword.php" method=POST onsubmit="">

                    <table>
                        <div class="contenedor-inputs">

                            <tr>
                                <td><label for="user" style="color:black; text-align: center">Contraseña Actual</label></td>
                                <td><input type="password" class="form-control" id="passwordActual" name="passwordActual" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Contraseña Nueva</td>
                                <td><input type="password" class="form-control" id="password" name="password" required></td>
                            </tr>
                            <tr>
                            <tr>
                                <td><label for="user" style="color:black">Confirmar contraseña</td>
                                <td><input type="password" class="form-control" id="comfPassword" name="comfPassword" required></td>
                                <div class="" id="divchearsisoniguales"></div>

                        </div>
                        <tr>
                            <td>
                                <BR>
                                <button type="submit" id="ActualizarAdmin" name="buttonActualizarAdmin" value="Actualizar" class="btn btn-primary" style="margin-left: 90px"> <span class="glyphicon glyphicon-edit"></span> &nbsp; ACTUALIZAR </button>
                                <input type=hidden value="1" name="enviado">
                                <BR>
                            </td>
                            <td>
                                <BR>
                                <button type="submit" class="btn btn" data-dismiss="modal" style="margin-left: 40px" ><span class="glyphicon glyphicon-remove-sign"></span> &nbsp; Cancelar</button>
                                <BR>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ventana modal editar Usuario -->
<div class="modal fade" id="editarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align: center"> FORMULARIO PARA EDITAR PERFIL<BR> </h5>
                <h6 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center; "> USUARIO : <?php echo $_SESSION['nomUsuario'];?>  </h6>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black">
                <form action="editarPerfil.php" method=POST >

                    <table>
                        <div class="contenedor-inputs">
                            <tr>
                                <td><label for="user" style="color:black">Nombre:</label></td>
                                <td><input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $_SESSION['nombre'];?>" required></td>
                                <td><input type="text" class="form-control" id="Apellido" name="Apellido" value="<?php echo $_SESSION['apellido'];?>" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Correo:</label></td>
                                <td><input type="email" class="form-control" id="Correo" name="Correo" value="<?php echo $_SESSION['correo'];?>" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Zona de residencia:</td>
                                <td>
                                    <select id=zonaRes name=zonaRes class="form-control" value="<?php echo $_SESSION['zonaResidencia'];?>" required>

                                        <option value="sur">Zona Sur</option>
                                        <option value="centro">Zona Centro</option>
                                        <option value="norte">Zona Norte</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" id="numCelular" name="numCelular" value="<?php echo $_SESSION['Telefono'];?>" ></td>

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
                                <td><input type="date" class="form-control" id="fecNac" name="fecNac" step="1" min="1990-01-01" max="2059-12-31" value="<?php echo $_SESSION['fecNac'];?>" required></td>
                                </td>
                            </tr>
                            <input type=hidden class="form-control" id="rol" name="rol" value="2">
                            <tr>
                                <td>
                                    <input type="submit" id="Actualizar" name="buttonActualizar" value="Actualizar" class="btn btn-primary">
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


<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">Popayán</h1>
                    <p class="intro-text">Bienvenido a Mobility City</p>
                    <a href="#about" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Contact Section -->
<section id="formPicoPlacaa" class="container content-section text-center">
    <h2 style="text-align: center">PICO Y PLACA</h2>
    <?php include("formPicoPlaca.php"); ?>
</section>

<!-- Map Section -->
<section id="mapaqw" class="container content-section text-center">
    <h2>Condiciones Ambientales</h2>
    <div id="map"></div>
    <script>
        thatDoc.body.appendChild(thatDoc.importNode(content, true));
    </script>
</section>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>Copyright &copy; Mobility City 2017</p>
    </div>
</footer>

<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
-->

<!-- Theme JavaScript -->
<script src="js/grayscale.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjJgBJvp7zUKGegJ4LOa-rtSOi9NOSmXw&callback=initMap" ></script>
<script src="js/mapaInfoClima.js"></script>

</body>
</html>
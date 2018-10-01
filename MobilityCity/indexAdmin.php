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

    <link rel="import" href="verRutasMapa.html">
    <link rel="import" href="verZonas.php">
    <link rel="import" href="mapas.php">

    <!-- agregado esto le quita el fondo negro a las paginas -->
    <!-- agregado esto le quita el fondo negro a las paginas -->
    <!-- agregado esto le quita el fondo negro a las paginas -->
    <!-- agregado esto le quita el fondo negro a las paginas
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    -->



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
                    <!-- Menu desplegable usuario -->
                    <a class="page-scroll" href="" data-toggle="dropdown"> Opciones</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>  <button type="button" class="btn btn-link" data-target="#registradorAdmin" data-toggle="modal"
                            ">Agregar Administradores</button>
                        </li>
                        <li class="divider"></li>
                        <li>  <button type="button" class="btn btn-link" data-target="#modificarUsername" data-toggle="modal"
                            ">Modificar Usuarios</button>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <button type="button" class="btn btn-link"  data-target="#Listar" data-toggle="modal" >Listar Usuarios</button>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="page-scroll" href="#pico&placa">Pico y Placa</a>
                </li>
                <li>
                    <a class="page-scroll" href="#mapaClima">Condiciones Ambientales</a>
                </li>
                <li>

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
                        <li> <a  type="button" href="cerrarSesion.php" class="btn btn-link">Cerrar Sesion</a> </li>
                    </ul>

                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<!-- ventana modal editar Usuario -->
<div class="modal fade" id="editarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center;"> FORMULARIO PARA EDITAR USUARIOS PERFIL <BR> </h5>
                <h6 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center; "> ADMINISTRADOR : <?php echo $_SESSION['nomUsuario'];?>  </h6>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black">
                <form action="editarPerfil.php" method=POST  >

                    <table>
                        <div class="contenedor-inputs">
                            <div style="margin-left: auto">
                                <tr>
                                    <td><label for="user" style="color:black">Nombre</label></td>
                                    <td><input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $_SESSION['nombre'];?>" required></td>
                                    <td><input type="text" class="form-control" id="Apellido" name="Apellido" value="<?php echo $_SESSION['apellido'];?>" required></td>
                                </tr>
                            </div>

                            <tr>
                                <td><label for="user" style="color:black">Tipo Usuario</td>
                                <td >
                                    <label for="user" style="color:gray" class="page-scroll"> Administrador <input type="radio" style="color:black" name="rol" value="1">
                                        <label for="user" style="color:gray"> Usuario <input type="radio" style="color:"blue" name="rol" value="2" checked>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Correo</label></td>
                                <td><input type="email" class="form-control" id="Correo" name="Correo" value="<?php echo $_SESSION['correo'];?>" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Zona de residencia</td>
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
                                <td><label for="user" style="color:black; text-align: center">Fecha de nacimiento</td>
                                <td><input type="date" class="form-control" id="fecNac" name="fecNac" step="1" min="1990-01-01" max="2059-12-31" value="<?php echo $_SESSION['fecNac'];?>" required></td>
                                </td>
                            </tr>

                        </div>
                        <tr >
                            <td >
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

<!-- ventana modal editar Contraseña -->
<div class="modal fade" id="editarPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align: center"> FORMULARIO PARA EDITAR LA CONTRASEÑA <BR> </h5>
                <h6 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center; "> ADMINISTRADOR : <?php echo $_SESSION['nomUsuario'];?>  </h6>
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
                            </tr>

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
                        </div>
                    </table>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- ventana modal editar Usuario o administrador por nomUsuario -->
<div class="modal fade" id="modificarUsername" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black"> FORMULARIO PARA BUSCAR USUARIOS O ADMINISTRADORES <BR> </h5>
                <h6 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center; "> ADMINISTRADOR : <?php echo $_SESSION['nomUsuario'];?>  </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="EditarUsuarioNew.php" method=POST >
                    <table>
                        <div class="contenedor-inputs">
                            <tr>
                                <td><label for="user" style="font-size: 16px; color:black ;margin-left: 120px"> Nombre de Usuario &nbsp; </label></td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" id="nomUsuario" name="nomUsuario" placeholder="user" required>
                                    </div>
                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <br>
                                    <br>
                                    <button type="submit" id="Buscar" name="buttonBuscar" value="Buscar" class="btn btn-success" style="margin-left: 170px;"> <span class="glyphicon glyphicon-search"></span> &nbsp; BUSCAR </button>
                                    <input type=hidden value="1" name="enviado">
                                </td>
                                <td>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn" data-dismiss="modal" style="margin-left: 40px" ><span class="glyphicon glyphicon-remove-sign"></span> &nbsp; Cancelar</button>

                                </td>
                            </tr>
                            <br>

                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ventana Listar -->
<div class="modal fade" id="Listar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black"> ¿DESEA VER LOS USUARIOS O ADMINISTRADORES REGISTRADOS ? <BR> </h5>
                <h6 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center; "> ADMINISTRADOR : <?php echo $_SESSION['nomUsuario'];?> </h6>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="reporteUsuarioNew.php" method=POST >
                    <table>
                        <div class="contenedor-inputs">
                            <tr>
                                <td><label for="user" style=" color:black ; margin-left: 140px; font-size: 16px;"> Tipo De Usuarios &nbsp; </label></td>
                                <td style="margin-left: 10px;" >
                                    <div class="input-group" >
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <select id=rol name=rol class="form-control"   required>
                                            <option value="1">Administradores</option>
                                            <option value="2">Usuarios</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td height="20" align="center"  >

                                    <br>
                                    <br>
                                    <button type="submit" id="Aceptar" name="buttonAceptar" value="Aceptar" class="btn btn-success" style="margin-left: 170px;"> <span class="glyphicon glyphicon-list"></span> &nbsp; LISTAR </button>
                                    <input type=hidden value="1" name="enviado">
                                    <br>
                                </td>
                                <td>

                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn" data-dismiss="modal" style="margin-left: 40px" ><span class="glyphicon glyphicon-remove-sign"></span> &nbsp; Cancelar</button>
                                    <br>
                                </td>
                            </tr>
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- ventana modal registrar Usuario o administrador -->
<div class="modal fade" id="registradorAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="tituloModalEditarUsuario" style="color:black"> FORMULARIO PARA INGRESAR USUARIOS O ADMINISTRADORES <BR> </h5>
                <h6 class="modal-title" id="tituloModalEditarUsuario" style="color:black; text-align:center; "> ADMINISTRADOR : <?php echo $_SESSION['nomUsuario'];?>  </h6>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registrar.php" method="post">
                    <table>
                        <div class="contenedor-inputs">
                            <tr>
                                <td><label for="user" style="color:black">Nombre Completo </label></td>
                                <td><input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombres"  required> </td>
                                <td><input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellidos" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Correo  </label></td>
                                <td><input type="email" class="form-control" id="Correo" name="Correo" placeholder="example.@gmail.com" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Zona de residencia </td>
                                <td>
                                    <select id=zonaRes name=zonaRes class="form-control" required>

                                        <option value="sur">Zona Sur</option>
                                        <option value="centro">Zona Centro</option>
                                        <option value="norte">Zona Norte</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" id="numCelular" name="numCelular" placeholder="Telefono" ></td>

                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Nombre de usuario</td>
                                <td><input type="text" class="form-control"  class="form-control" id="NomUsuario" name="NomUsuario" required></td>
                                <div class="" id="validarUsuarios"></div>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Contraseña</td>
                                <td><input type="password" class="form-control" id="password" name="password" required></td>
                            </tr>

                            <tr>
                                <td><label for="user" style="color:black">Confirmar contraseña</td>
                                <td><input type="password" class="form-control" id="comfPassword" name="comfPassword" required></td>
                                <div class="" id="divchearsisoniguales"></div>
                            </tr>
                            <tr>
                                <td><label for="user" style="color:black">Tipo Usuario</td>
                                <td >
                                    <label for="user" style="color:gray" class="page-scroll"> Administrador <input type="radio" style="color:black" name="rol" value="1">
                                        <label for="user" style="color:gray"> Consulta <input type="radio" style="color:"blue" name="rol" value="2" checked>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="user" style="color:black">Fecha de nacimiento</td>
                                <td><input type="date" class="form-control" id="fecNac" name="fecNac" step="1" min="1990-01-01" max="2059-12-31" value="aaaa-mm-dd" required></td>
                                <!-- <td><input type="date" class="form-control" name="fecNac" step="1" min="1990-01-01" max="2059-12-31" value="<?php echo date("Y-m-d");?>"> -->
                                </td>
                            </tr>

                            <tr>

                                <div >
                                    <td align="center">
                                        <br>
                                        <br>
                                        <button type="submit" id="Agregar" name="buttonAgregar" value="Registrar" class="btn btn-primary" style="margin-left: 110px"> <span class="glyphicon glyphicon-ok-sign"></span> &nbsp; Registrar </button>
                                        <input type=hidden value="1" name="enviado">
                                    </td>
                                    <td align="center" >
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn" data-dismiss="modal" style="margin-left: 40px" ><span class="glyphicon glyphicon-remove-sign"></span> &nbsp; Cancelar</button>
                                        <br>
                                    </td>
                                </div>

                            </tr>
                        </div>
                    </table>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
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
                    <p class="intro-text">Bienvenido a Mobility City.</p>
                    <a href="#pico&placa" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>


<?php
include("noticias.php");
?>

<!-- Pico Y Placa Section-->
<section id="pico&placa" class="container content-section text-center">
    <h2>PICO Y PLACA</h2>
    <div class="container" style="width: 80%;">
        <form class="well form-horizontal" action="picoPlaca.php" method="post"  id="contact_form">

            <!-- Form Name -->
            <legend style ="text-align:center;" >Por favor, escoga el rango de fechas para visualizar los datos y luego el tipo de gráfica</legend>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" style ="color:black;">Lunes</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <select name="digitoLun" class="form-control selectpicker" id ="digitoLun">
                            <option value="6" >Por favor seleccione los digitos </option>
                            <option value ="7 y 8" >7-8</option>
                            <option value ="9 y 0" >9-0</option>
                            <option value ="1 y 2" >1-2</option>
                            <option value ="3 y 4" >3-4</option>
                            <option value ="5 y 6" >5-6</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" style ="color:black;">Martes</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <select name="digitoMar" class="form-control selectpicker" id ="digitoMar">
                            <option value="6" >Por favor seleccione los digitos </option>
                            <option value ="7 y 8" >7-8</option>
                            <option value ="9 y 0" >9-0</option>
                            <option value ="1 y 2" >1-2</option>
                            <option value ="3 y 4" >3-4</option>
                            <option value ="5 y 6" >5-6</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" style ="color:black;">Miercoles</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <select name="digitoMie" class="form-control selectpicker" id ="digitoMie">
                            <option value="6" >Por favor seleccione los digitos </option>
                            <option value ="7 y 8" >7-8</option>
                            <option value ="9 y 0" >9-0</option>
                            <option value ="1 y 2" >1-2</option>
                            <option value ="3 y 4" >3-4</option>
                            <option value ="5 y 6" >5-6</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" style ="color:black;">Jueves</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <select name="digitoJue" class="form-control selectpicker" id ="digitoJue">
                            <option value="6" >Por favor seleccione los digitos </option>
                            <option value ="7 y 8" >7-8</option>
                            <option value ="9 y 0" >9-0</option>
                            <option value ="1 y 2" >1-2</option>
                            <option value ="3 y 4" >3-4</option>
                            <option value ="5 y 6" >5-6</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" style ="color:black;">Viernes</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <select name="digitoVie" class="form-control selectpicker" id ="digitoVie">
                            <option value="6" >Por favor seleccione los digitos </option>
                            <option value ="7 y 8" >7-8</option>
                            <option value ="9 y 0" >9-0</option>
                            <option value ="1 y 2" >1-2</option>
                            <option value ="3 y 4" >3-4</option>
                            <option value ="5 y 6" >5-6</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Success message -->
            <div class="alert alert-info" role="alert" id="success_message" style="text-align: center"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp; ADMINISTRADOR : <?php echo $_SESSION['nombre']." ".$_SESSION['apellido'];?> --- Recuerda que los digitos solo pueden ser asignados a un dia de la semana </div>


            <!-- Button -->
            <div class="form-group">

                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning" >  Establecer pico y placa &nbsp;<span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </form>
    </div>
    <hr style="border-color: #000000;">

</section>

<!-- Map Section -->
<section id="mapaClima" class="container content-section text-center">
    <h2>Condiciones Ambientales</h2>
    <div class="container">
        <div id="map"></div>
    </div>
    <br><br>
    <div class="container">
        <script>
            thatDoc.body.appendChild(thatDoc.importNode(content, true));
        </script>
    </div>
    <br><br>
    <div  class="container">
        <?php
        include("mapas.php");
        ?>
    </div>

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
<!--
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjJgBJvp7zUKGegJ4LOa-rtSOi9NOSmXw&callback=initMap_clima" ></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&oe=ISO-8859-1;&amp;key=AIzaSyBp8tOsgWyAmX1ZnO-CPhpnqwuaZgx0uzc" type="text/javascript"></script>
-->

<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp8tOsgWyAmX1ZnO-CPhpnqwuaZgx0uzc&callback=initMap_trazarRuta"></script>
<!-- Theme JavaScript -->
<script src="js/grayscale.min.js"></script>
<script src="js/mapaInfoClima.js"></script>

</body>
</html>
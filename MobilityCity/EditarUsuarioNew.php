<?php
include ("conexion.php");
session_start();
if (@!$_SESSION['nombre']) {
    header("Location:index.html");
}elseif ($_SESSION['rol']==2) {
    header("Location:indexUsuario.php");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01   Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Material Design Lite components demo</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="" method=POST>
                        <div  >
                            <?php
                            if (!(isset($_POST["enviado"])))
                            {}
                            else {
                                $enviado = $_POST["enviado"];
                                $nomUsuario = $_POST["nomUsuario"];
                                if ($enviado == 1) {
                                    // Se hace la conexion y posterior consulta en la base de datos
                                    {$sql = "SELECT * from usuario where nomUsuario = '$nomUsuario'";}
                                    //echo "sql es...".$sql;
                                    $result1 = $conn->query($sql);
                                }
                            }
                            ?>
                            <div style ="padding: 0px">
                                <div class="panel panel-default" style="color: #080808; width:902px;  "  >
                                    <div class="panel-heading" style="width: 900px;  " >ADMINISTRADOR : <?php echo $_SESSION['nombre']." ".$_SESSION['apellido'];?></div>
                                    <h2> </h2>
                                    <p>A continuacion se presentan los datos del usuario consultado </p>
                                    <table class="table table-striped table-bordered table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">Nombre Completo</th>
                                            <th style="text-align: center">Correo Electronico</th>
                                            <th style="text-align: center">Zona de Residencia</th>
                                            <th style="text-align: center">Telefono</th>
                                            <th style="text-align: center" >Nombre Usuario</th>
                                            <th style="text-align: center" >Tipo Usuario</th>
                                            <th style="text-align: center" >Estado</th>
                                            <th style="text-align: center" >Editar Usuario </th>
                                            <th style="text-align: center" >Desactivar  </th>
                                        </tr>
                                        </thead>

                                        <?php

                                        // A continuación se despliegan todos los datos.
                                        while($row1 = $result1->fetch_array(MYSQLI_NUM))
                                        {

                                            $nombre = $row1[1];
                                            $apellido = $row1[2];
                                            $correo = $row1[3];
                                            $zonaResidencia = $row1[4];
                                            $Telefono = $row1[5];
                                            $nomUsuario = $row1[6];
                                            $fecNac = $row1[8];
                                            $estado = $row1[11];


                                            $rol = $row1[10];
                                            if ($rol == "1") {
                                                $evento = "Administrador";
                                            } else if ($rol == "2") {
                                                $evento = "Usuario";
                                            } else {
                                                $evento = "Ninguno";
                                            }
                                            ?>

                                            <tbody>
                                            <tr>
                                                <td> <?php echo "$nombre $apellido" ?></td>
                                                <td><?php echo $correo ?></td>
                                                <td><?php echo $zonaResidencia ?></td>
                                                <td> <?php echo $Telefono ?></td>
                                                <td><?php echo $nomUsuario ?></td>
                                                <td><?php echo $evento ?></td>
                                                <td><?php echo $estado ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-primary" href="editarPerfilUsuario.php?nombre=<?php echo  $nombre;?> & apellido=<?php echo  $apellido  ;?> & correo=<?php echo  $correo  ;?>& fecNac=<?php echo  $fecNac  ;?> & nomUsuario=<?php echo  $nomUsuario  ;?> & zonaResidencia=<?php echo  $zonaResidencia  ;?> & Telefono=<?php echo  $Telefono  ;?>   & rol=<?php echo  $evento  ;?> & estado=<?php echo  $estado ;?>" value="editarPerfil">
                                                        <span class="glyphicon glyphicon-pencil"></span>&nbsp;  Editar  </a>
                                                </td>

                                                <td>

                                                    <?php
                                                    if ($estado=="activo")
                                                    {
                                                        ?>

                                                        <a type="button" class="btn btn-danger" href="editarPerfilUsuario.php?nombre= <?php echo  $nombre;?> & apellido=<?php echo  $apellido  ;?> & correo=<?php echo  $correo  ;?>& fecNac=<?php echo  $fecNac  ;?> & nomUsuario=<?php echo  $nomUsuario  ;?> & zonaResidencia=<?php echo  $zonaResidencia  ;?> & Telefono=<?php echo  $Telefono  ;?>   & rol=<?php echo  $evento  ;?> & estado=<?php echo  $estado ;?>">
                                                            <span class="glyphicon glyphicon-remove"></span>&nbsp; Desabilitar  </a>
                                                    <?php
                                                    }else {
                                                        ?>



                                                        <a type="button" class="btn btn-success" href="editarPerfilUsuario.php?nombre= <?php echo  $nombre;?> & apellido=<?php echo  $apellido  ;?> & correo=<?php echo  $correo  ;?>& fecNac=<?php echo  $fecNac  ;?> & nomUsuario=<?php echo  $nomUsuario  ;?> & zonaResidencia=<?php echo  $zonaResidencia  ;?> & Telefono=<?php echo  $Telefono  ;?>   & rol=<?php echo  $evento  ;?> & estado=<?php echo  $estado ;?>">
                                                            <span class="glyphicon glyphicon-ok"></span>&nbsp; Habilitar
                                                        </a>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                            <tr>
                                            </tr>

                                            </tr>
                                            </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <br>
                                    <br>

                                    <a type="button" class="btn btn-basic " href="indexAdmin.php">
                                        <span class="glyphicon glyphicon-chevron-left"></span> Atras  </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a type="button" class="btn btn-basic" href="cerrarSesion.php">
                                        <span class="glyphicon glyphicon-user"></span> Cerrar Sesion  </a>

                                    <br>
                                    <br>

                                </div>
                            </div>
                        </div>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</body>
</html>
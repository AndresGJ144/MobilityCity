<?php
session_start();
require("conexion.php");

$username=$_POST['inputEmail'];
$pass=($_POST['inputPassword']);
$estadoLogin = "activo";

//la variable  $conn viene de connect_db que lo traigo con el require("connect_db.php");


$sql2=mysqli_query($conn,"SELECT * FROM usuario WHERE nomUsuario='$username'");


if($f2=mysqli_fetch_assoc($sql2)){

    if($estadoLogin == $f2['estado']){
        if($pass==$f2['password_admin']){
            echo "Cargando...Espere un momento por favor.";
            $_SESSION['idUser']=$f2['idUser'];
            $_SESSION['nombre']=$f2['nombre'];
            $_SESSION['apellido']=$f2['apellido'];
            $_SESSION['correo']=$f2['correo'];
            $_SESSION['zonaResidencia']=$f2['zonaResidencia'];
            $_SESSION['Telefono']=$f2['Telefono'];
            $_SESSION['fecNac']=$f2['fecNac'];
            $_SESSION['rol']=$f2['rol'];
            $_SESSION['estado']=$f2['estado'];
            $_SESSION['nomUsuario']=$f2['nomUsuario'];
            $_SESSION['password_admin']=$f2['password_admin'];
            $_SESSION['password'] = NULL;
            echo '<script>alert("Bienvenido Administrador")</script> ';
            echo "<script>location.href='indexAdmin.php'</script>";

        }
    }else{
        echo '<script>alert("Su cuenta esta desactivada!")</script> ';
        echo "<script>location.href='index.html'</script>";
    }
}

$sql=mysqli_query($conn,"SELECT * FROM usuario WHERE nomUsuario='$username'");
if($f=mysqli_fetch_assoc($sql)){
    if($estadoLogin == $f2['estado']) {


        if ($pass == $f['password']) {
            echo "Cargando...Espere un momento por favor.";
            $_SESSION['idUser'] = $f['idUser'];
            $_SESSION['nombre'] = $f['nombre'];
            $_SESSION['correo'] = $f['correo'];
            $_SESSION['apellido'] = $f['apellido'];
            $_SESSION['zonaResidencia'] = $f['zonaResidencia'];
            $_SESSION['Telefono'] = $f['Telefono'];
            $_SESSION['fecNac'] = $f['fecNac'];
            $_SESSION['rol'] = $f['rol'];
            $_SESSION['estado'] = $f['estado'];
            $_SESSION['nomUsuario'] = $f['nomUsuario'];
            $_SESSION['password_admin'] = NULL;
            $_SESSION['password'] = $f['password'];


            header("Location: indexUsuario.php");
        } else {
            echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
            echo "<script>location.href='index.html'</script>";
        }
    }else{
        echo '<script>alert("Su cuenta esta desactivada!")</script> ';
        echo "<script>location.href='index.html'</script>";
    }
}else{

        echo '<script>alert("USUARIO NO EXISTE, POR FAVOR REGISTRESE")</script> ';
        echo "<script>location.href='index.html'</script>";

}
?>
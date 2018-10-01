<?php
session_start();
if (@!$_SESSION['nombre'])

 { 
    header("Location:index.html");


}

require ("conexion.php");

$nombre= $_POST ["Nombre"];
$apellido= $_POST ["Apellido"];
$correo= $_POST ["Correo"];
$zonaRes= $_POST ["zonaRes"];
$telefono= $_POST ["numCelular"];
$nomUsuario= $_SESSION['nomUsuario'];
$password=$_SESSION['password'];
$fecNac = $_POST ["fecNac"];
$password_admin=$_SESSION['password_admin'];
$rol_usuario = $_POST ["rol"];
$estado_usuario = $_POST ["estado"];


/********** Código para EDITAR un usuario a la base de datos ****************/
if($estado_usuario=="activo")
{$sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', correo='$correo', zonaResidencia='$zonaRes', Telefono='$telefono', password= '$password', fecNac='$fecNac',password_admin ='$password_admin' , rol='$rol_usuario', estado='$estado_usuario' where nomUsuario='$nomUsuario'";}
else
{
    echo '<script>alert("El usuario ya se ha DESHABILITO anteriormente!")</script> ';
    echo "<script>location.href='index.html'</script>";}

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Actualizacion exitosa!")</script> ';
    echo "<script>location.href='index.html'</script>";
} else {
    echo '<script>alert("Error: " . $sql . "<br>" . $conn->error)</script> ';
    echo "<script>location.href='index.html'</script>";
}			 
?>

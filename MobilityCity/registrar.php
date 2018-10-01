<?php
require ("conexion.php");

$nombre= $_POST ["Nombre"];
$apellido= $_POST ["Apellido"];
$correo= $_POST ["Correo"];
$zonaRes= $_POST ["zonaRes"];
$telefono= $_POST ["numCelular"];
$nomUsuario=$_POST["NomUsuario"];
$password=md5($_POST ["password"]);
$comfpassword= $_POST ["comfPassword"];
$fecNac = $_POST ["fecNac"];
$password_admin = NULL;
$rol_usuario = $_POST ["rol"];
$estado_usuario = "activo";


/********** Código para AÑADIR un usuario a la base de datos ****************/

$sql = "INSERT INTO usuario (nombre, apellido, correo, zonaResidencia, Telefono, nomUsuario, password, fecNac, password_admin, rol, estado)
 VALUES ('$nombre','$apellido','$correo','$zonaRes','$telefono','$nomUsuario','$password', '$fecNac', '$password_admin', '$rol_usuario', '$estado_usuario')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Registro exitoso!")</script> ';
    echo "<script>location.href='index.html'</script>";
} else {
    echo '<script>alert("Error: " . $sql . "<br>" . $conn->error)</script> ';
    echo "<script>location.href='index.html'</script>";
}
?>


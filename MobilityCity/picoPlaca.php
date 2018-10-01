<?php
require ("conexion.php");

$digitoLunes= $_POST ["digitoLun"];
$digitoMartes=$_POST["digitoMar"];
$digitoMiercoles=$_POST["digitoMie"];
$digitoJueves=$_POST["digitoJue"];
$digitoViernes=$_POST["digitoVie"];

/********** Código para AÑADIR un dia de pico y placa a la base de datos ****************/

$sql = "INSERT INTO picoplaca (digitoLunes,digitoMartes,digitoMiercoles,digitoJueves,digitoViernes)
 VALUES ('$digitoLunes','$digitoMartes','$digitoMiercoles','$digitoJueves','$digitoViernes')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Establecimiento de pico y placa exitosa !")</script> ';
    echo "<script>location.href='index.html'</script>";
} else {
    echo '<script>alert("Error: " . $sql . "<br>" . $conn->error)</script> ';
    echo "<script>location.href='index.html'</script>";
}
?>


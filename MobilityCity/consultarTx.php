<?php

// Este programa es ejecutado por el modulo electronico, para 
// consultar el estado de la luz y proceder a hacer el cambio 
// respectivo en el Hardware (Bombillo).

require ("conexion.php");

$sql = "SELECT * from sistema  order by idSistema DESC";

$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
$dato = $row1[1];
     
echo  "**-*".$dato;
?>
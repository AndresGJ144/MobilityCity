
<?php
require("conexion.php");
$habilitador= intval($_POST['habilitador']);
$deshabilitador= intval($_POST['deshabilitador']);


if ($habilitador==1) {
	$val=1;
	$string ="No se transmitirán más datos...";
}elseif($deshabilitador==0){
     $val=0;
	$string ="Se continúan transmitiendo datos...";

}else{

 $val=2;
	$string ="Llegó una valor desconocido....";

}

$sql = "INSERT INTO sistema (valSistema, fecha, hora)
VALUES ($val, CURDATE(), CURTIME())";

if ($conn->query($sql) === TRUE) {
	echo "Estado de transmisión cambiado satisfactoriamente.";
	echo $string;

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: /MobilityCity/verZonas.php');

?>
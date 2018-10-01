<?php

// Este programa es ejecutado por el modulo electronico, para 
// escribir los datos arrojados por los sensores en la base de datos
// si se hace un cambio por Hardware.

require ("conexion.php");

/********* Capturar datos enviados desde el arduino**********/

$ardTemperatura_zn  =  intval($_GET['cliTemperatura_zn']);
$ardHumedad_zn  = intval($_GET['cliHumedad_zn']);
$ardLluvia_zn  = intval($_GET['cliLluvia_zn']);

$ardTemperatura_zc  =  intval($_GET['cliTemperatura_zc']);
$ardHumedad_zc  = intval($_GET['cliHumedad_zc']);
$ardLluvia_zc  = intval($_GET['cliLluvia_zc']);

$ardTemperatura_zs  =  intval($_GET['cliTemperatura_zs']);
$ardHumedad_zs  = intval($_GET['cliHumedad_zs']);
$ardLluvia_zs  = intval($_GET['cliLluvia_zs']);


$ardCarr9HNorte  = intval($_GET['traCarr9HNorte']);
$ardCarr9HSur  = intval($_GET['traCarr9HSur']);
$ardCarr6HNorte  = intval($_GET['traCarr6HNorte']);
$ardCarr6HSur  = intval($_GET['traCarr6HSur']);

/********* Lógica determinar tipo de tráfico **********/
/********* Lógica determinar tipo de tráfico **********/
/********* Lógica determinar tipo de tráfico **********/
/********* Lógica determinar tipo de tráfico **********/
$zn = "norte";
$zc = "centro";
$zs = "sur";


/* Tabla clima zona norte*/
$sqlClima = "INSERT INTO clima (cliHumedad, cliLluvia, cliTemperatura, cliZona, cliFecha, cliHora) VALUES ($ardHumedad_zn, $ardLluvia_zn, $ardTemperatura_zn, '$zn', CURDATE(),CURTIME() )";

if ($conn->query($sqlClima) === TRUE) {
    echo "Daños añadidos exitosamente a tabla clima.";
} else {
    echo "Error: " . $sqlClima  . "<br>" . $conn->error;
}

/* Tabla clima zona centro*/
$sqlClima = "INSERT INTO clima (cliHumedad, cliLluvia, cliTemperatura, cliZona, cliFecha, cliHora) VALUES ($ardHumedad_zc, $ardLluvia_zc, $ardTemperatura_zc, '$zc', CURDATE(),CURTIME() )";

if ($conn->query($sqlClima) === TRUE) {
    echo "Daños añadidos exitosamente a tabla clima.";
} else {
    echo "Error: " . $sqlClima  . "<br>" . $conn->error;
}

/* Tabla clima zona sur*/
$sqlClima = "INSERT INTO clima (cliHumedad, cliLluvia, cliTemperatura, cliZona, cliFecha, cliHora) VALUES ($ardHumedad_zs, $ardLluvia_zs, $ardTemperatura_zs, '$zs', CURDATE(),CURTIME() )";

if ($conn->query($sqlClima) === TRUE) {
    echo "Daños añadidos exitosamente a tabla clima.";
} else {
    echo "Error: " . $sqlClima  . "<br>" . $conn->error;
}


/* Tabla trafico */
$sqlTrafico = "INSERT INTO trafico (traFecha, traHora, traCarr9HNorte, traCarr9HSur, traCarr6HNorte, traCarr6HSur) VALUES (CURDATE(),CURTIME(), '$ardCarr9HNorte','$ardCarr9HSur', '$ardCarr6HNorte', '$ardCarr6HSur')";

if ($conn->query($sqlTrafico) === TRUE) {
    echo "Daños añadidos exitosamente a tabla trafico.";
} else {
    echo "Error: " . $sqlTrafico . "<br>" . $conn->error;
}


$conn->close();
?>


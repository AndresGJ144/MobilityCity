<?php
    $conn = new MySQLi("127.0.0.1", "root","", "mc");
    if ($conn -> connect_errno) {
        die( "Fallo la conexión a MySQL: (" . $conn -> mysqli_connect_errno()
            . ") " . $conn -> mysqli_connect_error());
    }
?>
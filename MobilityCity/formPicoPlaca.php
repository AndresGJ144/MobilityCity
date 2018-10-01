<!DOCTYPE html>


<div class="container content-section text-center">
    <h2 style="text-align: center">PICO Y PLACA</h2>
    <?php

    require ("conexion.php");

    /* Método para llamar a lluvia*/

    $sql = "SELECT * from picoplaca ORDER BY idPico DESC ";
    $result1 = $conn ->query($sql);
    $row1 = $result1->fetch_array(MYSQLI_NUM); // Devuelve la ID de la fila como número, con MYSQLI_ASSOC la devuelve con el nombre

    $pLunes = $row1[1];
    $pMartes = $row1[2];
    $pMiercoles = $row1[3];
    $pJueves = $row1[4];
    $pViernes = $row1[5];
    ?>

    <div class="row" id="inf_PicoPlaca">


        <div class="col-lg-1">

        </div>
        <div class="col-lg-2">
            <h5>Lunes </h5>
            <img src="img/picoplaca/<?php echo $pLunes; ?>.jpg" alt="Lunes_p" height="150" width="150">
        </div>

        <div class="col-lg-2">
            <h5>Martes </h5>
            <img src="img/picoplaca/<?php echo $pMartes; ?>.jpg" alt="Martes_p" height="150" width="150">
        </div>

        <div class="col-lg-2">
            <h5>Miercoles </h5>
            <img src="img/picoplaca/<?php echo $pMiercoles; ?>.jpg" alt="Miercoles_p" height="150" width="150">
        </div>

        <div class="col-lg-2">
            <h5>Jueves </h5>
            <img src="img/picoplaca/<?php echo $pJueves; ?>.jpg" alt="Jueves_p" height="150" width="150">
        </div>

        <div class="col-lg-2">
            <h5>Viernes </h5>
            <img src="img/picoplaca/<?php echo $pViernes; ?>.jpg" alt="Viernes_p" height="150" width="150">
        </div>

        <div class="col-lg-1">

        </div>

    </div>
</div>

</html>
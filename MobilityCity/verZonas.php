<!DOCTYPE html>

<div id="contenido_infZonas" class="container content-section text-center">

        <?php

        require ("conexion.php");

        /* Método para llamar a lluvia*/

        $sql = "SELECT cliLluvia from clima WHERE cliZona='norte' ORDER BY cliNum DESC ";
        $sql_zc = "SELECT cliLluvia from clima WHERE cliZona='centro' ORDER BY cliNum DESC ";
        $sql_zs = "SELECT cliLluvia from clima WHERE cliZona='sur' ORDER BY cliNum DESC ";

        $result1 = $conn ->query($sql);
        $result1_zc = $conn ->query($sql_zc);
        $result1_zs = $conn ->query($sql_zs);

        $row1 = $result1->fetch_array(MYSQLI_NUM); // Devuelve la ID de la fila como número, con MYSQLI_ASSOC la devuelve con el nombre
        $row1_zc = $result1_zc->fetch_array(MYSQLI_NUM);
        $row1_zs = $result1_zs->fetch_array(MYSQLI_NUM);

        $estadoLluvia = $row1[0];
        $estadoLluvia_zc = $row1_zc[0];
        $estadoLluvia_zs = $row1_zs[0];

        $string1 ="nnn";
        $string1_zc ="ccc";
        $string1_zs ="sss";

        if ($estadoLluvia == 1)
        {
            $string1 ="notrainy";
        }
        else{
            $string1 ="rainy";
        }
        if ($estadoLluvia_zc == 1)
        {
            $string1_zc ="notrainy";
        }
        else{
            $string1_zc ="rainy";
        }
        if ($estadoLluvia_zs == 1)
        {
            $string1_zs ="notrainy";
        }
        else{
            $string1_zs ="rainy";
        }
        ?>
    <script type="text/javascript"> var string1 = "<?php echo $string1; ?>";   </script>
    <script type="text/javascript"> var string1_zc = "<?php echo $string1_zc; ?>";   </script>
    <script type="text/javascript"> var string1_zs = "<?php echo $string1_zs; ?>";   </script>
    <?php


        /* Método para llamar a temperatura*/
        $sql2 = "SELECT cliTemperatura from clima WHERE cliZona='norte' ORDER BY cliNum DESC ";
        $sql2_zc = "SELECT cliTemperatura from clima WHERE cliZona='centro' ORDER BY cliNum DESC ";
        $sql2_zs = "SELECT cliTemperatura from clima WHERE cliZona='sur' ORDER BY cliNum DESC ";

        $result2 = $conn ->query($sql2);
        $result2_zc = $conn ->query($sql2_zc);
        $result2_zs = $conn ->query($sql2_zs);

        $rowTemp = $result2->fetch_array(MYSQLI_NUM); // Devuelve la ID de la fila como número, con MYSQLI_ASSOC la devuelve con el nombre
        $rowTemp_zc = $result2_zc ->fetch_array(MYSQLI_NUM);
        $rowTemp_zs = $result2_zs ->fetch_array(MYSQLI_NUM);

        $estadoTemperatura = $rowTemp[0];
        $estadoTemperatura_zc = $rowTemp_zc[0];
        $estadoTemperatura_zs = $rowTemp_zs[0];

        echo "zn: ".$estadoTemperatura." - "."zc ".$estadoTemperatura_zc." - "."zs: ".$estadoTemperatura_zs." // ";
        ?>
    <script type="text/javascript"> var estadoTemperatura = "<?php echo $estadoTemperatura; ?>";   </script>
    <script type="text/javascript"> var estadoTemperatura_zc = "<?php echo $estadoTemperatura_zc; ?>";   </script>
    <script type="text/javascript"> var estadoTemperatura_zs = "<?php echo $estadoTemperatura_zs; ?>";   </script>
        <?php


        /* Método para llamar a humedad*/
        $sqlHum = "SELECT cliHumedad from clima WHERE cliZona='norte' ORDER BY cliNum DESC ";
        $sqlHum_zc = "SELECT cliHumedad from clima WHERE cliZona='centro' ORDER BY cliNum DESC ";
        $sqlHum_zs = "SELECT cliHumedad from clima WHERE cliZona='sur' ORDER BY cliNum DESC ";

        $resultHum = $conn ->query($sqlHum);
        $resultHum_zc = $conn ->query($sqlHum_zc);
        $resultHum_zs = $conn ->query($sqlHum_zs);

        $rowHum = $resultHum->fetch_array(MYSQLI_NUM); // Devuelve la ID de la fila como número, con MYSQLI_ASSOC la devuelve con el nombre
        $rowHum_zc = $resultHum_zc->fetch_array(MYSQLI_NUM);
        $rowHum_zs = $resultHum_zs->fetch_array(MYSQLI_NUM);

        $estadoHumedad = $rowHum[0];
        $estadoHumedad_zc = $rowHum_zc[0];
        $estadoHumedad_zs = $rowHum_zs[0];
        ?>
    <script type="text/javascript"> var estadoHumedad = "<?php echo $estadoHumedad; ?>";   </script>
    <script type="text/javascript"> var estadoHumedad_zc = "<?php echo $estadoHumedad_zc; ?>";   </script>
    <script type="text/javascript"> var estadoHumedad_zs = "<?php echo $estadoHumedad_zs; ?>";   </script>


</div>

<script>

    var thisDoc_verZonas = document.currentScript.ownerDocument;
    var thatDoc_verZonas = document;
    var content_verZonas = thisDoc_verZonas.querySelector('#contenido_infZonas');
    <?php header('Content-Type: text/html; charset=utf-8'); ?>
</script>

</html>
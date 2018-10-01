<?php
session_start();
                require_once("conexionGraficos.php");



             if(isset($_POST['initialDate']))
{

    $_SESSION['initialDate']= $_POST['initialDate'];
    $_SESSION['finalDate']= $_POST['finalDate'];
    $_SESSION['typeGraph']= $_POST['typeGraph'];

    

    $porciones = explode("-", $_SESSION['initialDate']);
   
    $_SESSION['anio']=$porciones[0];
    $_SESSION['mes']=$porciones[1]-01;
    $_SESSION['dia']=$porciones[2];
   


    
    

   if($_SESSION['typeGraph']=="1"){

 header("Location: linealGraph.php");
   }

   else{

 header("Location: mountainGraph.php");

   }

}
else {

    echo "No comming data";
}





?>

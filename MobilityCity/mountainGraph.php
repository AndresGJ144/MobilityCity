
<?php 

 require_once("conexionGraficos.php");
session_start();

    

$anio =$_SESSION["anio"];
$mes =$_SESSION["mes"];
$dia =$_SESSION["dia"];

$initial=$_SESSION['initialDate'];
$final=$_SESSION['finalDate'];


?>



<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Humedad '
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                    '' :
                    'Click para zoom'
        },
        xAxis: {
            type: 'datetime',
            minRange: 14 * 24 * 3600000 // fourteen days
        },
        yAxis: {
            title: {
                text: 'Valor [1-70]%'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        

        series: [{
            type: 'area',
            name: 'Humedad',
            pointInterval: 24 * 3600 * 1000,
            pointStart: Date.UTC(<?php echo $anio.','.$mes.','.$dia; ?>),
            data: [

            <?php
$sql=mysql_query("select * from humedad where fecha between '$initial' and '$final' order by fecha asc");
while($res=mysql_fetch_array($sql)){            
?>         
        <?php echo $res['valHum'] ?>,
        
<?php
}
?> 
            ]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>

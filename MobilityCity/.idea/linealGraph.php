<?php


session_start();
require_once("conexionGraficos.php");
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

                },
                title: {
                    text: 'Temperatura VS tiempo'
                },
                subtitle: {
                    text: 'Fuente: Mobility City'
                },
                xAxis: {
                    categories: [
                        <?php
                        $sql=mysql_query("select * from temperatura order by fecha asc");
                        while($res=mysql_fetch_array($sql)){
                        ?>

                        ['<?php echo $res['hora'] ?>'],

                        <?php
                        }
                        ?>

                    ],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Temperatura °C',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' °C '
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Temperatura : ',
                    data: [
                        <?php
            $sql=mysql_query("select * from clima where cliFecha between '$initial' and '$final' order by cliFecha asc");
            while($res=mysql_fetch_array($sql)){
            ?>
                        [<?php echo $res['cliTemperatura'] ?>],

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

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<br><br>

</body>
</html>

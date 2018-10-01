<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <style type="text/css">
        .scrollWrapper   {

            width:16%;
            height:700px;
            overflow:hidden;
            border:2px solid grey;
            font-family:Arial;
            font-size:100%;
            position: absolute;
        }
        .scrollTitle {
            background-color:grey;
            opacity: 1.0;
            color:#ffffff;
            padding:5px;
            font-weight:bold;
            text-align:center;

        }
        #scroll    {
            position:relative;
            width:auto;
            margin:1px;
            z-index:auto;
            padding:5px;
        }
        #scroll .title  {font-weight:bold;margin-top:20px;}
    </style>

    <script type="text/javascript">
        // determina el numero de pixeles que se moveran las noticias para
        // cada iteracion en milisegundos de "speedjump"
        var scrollspeed=1;
        // determina la velocidad en milisgundos
        var speedjump=30;
        // segundos antes de empezar el movimiento
        var startdelay= 1;
        // posicion inicial superior en pixeles para cuando inicia
        var topspace=-10;
        // altura del marco donde se mostraran las noticias
        // Si se modifica la altura del contenedor de las noticas hay que
        // modificar tambien este valor
        var frameheight=270;

        // variable temporal que variara su valor en función de si estan las
        // noticias en movimiento o paradas
        current=scrollspeed;

        /**
         * Inicio del scroll
         * Esta función es llamada en el body de la pagina.
         * Tiene que recibir el id del scroll
         */
        function scrollStart()
        {
            dataobj = document.getElementById("scroll");
            // cogemos la altura maxima de la capa de las noticias
            alturaNoticias = dataobj.offsetHeight;
            // posicionamos la capa del scroll en su posicion inicial
            dataobj.style.top = topspace + 'px';

            setTimeout("scrolling()", (startdelay * 1000));
        }

        /**
         * Funcion que realiza el movimiento
         */
        function scrolling() {
            // Restamos a la propiedad top de la capa el valor en pixeles
            // establecido en la variable "scrollspeed", para hacer el
            // movimiento hacia arriba.
            dataobj.style.top = parseInt(dataobj.style.top) - scrollspeed + 'px';
            // Si la capa ha sobrepasado la altura del area por donde se muestran
            // las noticias ("alturaNoticias")
            if (parseInt(dataobj.style.top) < alturaNoticias * (-1))
            {
                // Posicionamos la capa en la parte inferior del recuadro, para
                // que simule que vienen las noticias de la parte inferior
                dataobj.style.top = frameheight + 'px';
                setTimeout("scrolling()", 0);
            }else{
                setTimeout("scrolling()", speedjump);
            }
        }
    </script>
</head>

<body onLoad="scrollStart();">

<div class="scrollWrapper" onMouseover="scrollspeed=0" onMouseout="scrollspeed=current">
    <div class="scrollTitle">Últimas Noticias</div>
    <div id="scroll" >

        <?php
        /*$long_descripcion=100;
        $num_noticias=10;
        $n=0;
        $noticias = simplexml_load_file('http://www.notivision.com.co/taxonomy/term/977/feed');
        foreach ($noticias as $noticia) {
            foreach($noticia as $reg){
                if($reg->title!=NULL && $reg->title!='' && $reg->description!=NULL && $reg->description!='' && $n<$num_noticias){
                    ?> <div class="noticia"> <?php
                    echo '<h4><a href="'.$reg->link.'" target="_blank">'.$reg->title.'</a></h4>';
                    if(strlen($reg->description)>$long_descripcion)
                        echo '<p>'.substr($reg->description,0,$long_descripcion).'...</a></p>';
                    else if ($reg->description==NULL || $reg->description==''){
                    }
                    else
                        echo '<p>'.$reg->description.'</p>';
                    $n++;
                    ?> </div><?php
                }
            }
        }
        */
        ?>

        <!--
        http://feed2js.org/
        http://feed2js.org/
        http://feed2js.org/
        -->

        <script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Fwww.notivision.com.co%2Ftaxonomy%2Fterm%2F977%2Ffeed&chan=y&num=10&desc=180&utf=y"  charset="UTF-8" type="text/javascript"></script>

        <noscript>
            <a href="http://feed2js.org//feed2js.php?src=http%3A%2F%2Fwww.notivision.com.co%2Ftaxonomy%2Fterm%2F977%2Ffeed&chan=y&num=10&desc=180&utf=y&html=y">View RSS feed</a>
        </noscript>

        <script language="JavaScript" src="http://feed2js.org//feed2js.php?src=https%3A%2F%2Fwww.policia.gov.co%2Fnoticias%2Frss.xml&chan=y&num=10&desc=200&date=y&utf=y"  charset="UTF-8" type="text/javascript"></script>

        <noscript>
            <a href="http://feed2js.org//feed2js.php?src=https%3A%2F%2Fwww.policia.gov.co%2Fnoticias%2Frss.xml&chan=y&num=10&desc=200&date=y&utf=y&html=y">View RSS feed</a>
        </noscript>

    </div>
</div>

</body>
</html>
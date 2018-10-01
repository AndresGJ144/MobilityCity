<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mobility City</title>
    <link rel="icon" href="img/smartcity.png" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">

    <!-- script -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="validarReg.js"></script>
    <script src=validarContraseña.js></script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">



<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <i class="fa fa-play-circle"></i> <span class="light">Mobility</span> City
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">Conctáctenos </a>
                </li>
                <li>
                    <a class="page-scroll" href="#download">Servicios</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Ver Más Sitios</a>
                </li>
                <li>
                    <a class="page-scroll" href="#mapa">Ver Mapa Completo</a>
                </li>
                <li>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ingresar" style="
                            background: transparent; border-color:transparent;
                            ">Ingresar</button>
                </li>

                <li>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#registrar" style="
                            background:transparent; border-color:transparent;">Registrar</button>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- ventana modal login -->
<div id="ingresar" class="modal" > <!-- style="background-image: url('img/ventanaModal_login2.png') "-->

</div>


<!-- ventana modal Registrar -->
<div id="registrar" class="modal" > <!-- style="background-image: url('img/ventanaModal_login2.png') "-->

</div>


<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">Popayán</h1>
                    <p class="intro-text">Bienvenido a Mobility City.</p>
                    <a href="#about" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section id="about" class="container content-section text-center">

</section>

<!-- Download Section -->
<section id="download" class="content-section text-center">

</section>

<!-- Contact Section -->
<section id="contact" class="container content-section text-center">

</section>

<!-- Map Section -->
<div class="row">

    <div class="col-lg-1">
    </div>

    <div class="col-lg-6">
        <div id="mapa"></div>

        <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1-zF9OiQGjnWWSY-baH8iCFgjKxc" width="1250" height="480"></iframe>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>Copyright &copy; Mobility City 2017</p>
    </div>
</footer>

<!-- jQuery -->
<script src="vendor/jquery/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjJgBJvp7zUKGegJ4LOa-rtSOi9NOSmXw&sensor=false"></script>

<!-- Theme JavaScript -->
<script src="js/grayscale.min.js"></script>

</body>
</html>
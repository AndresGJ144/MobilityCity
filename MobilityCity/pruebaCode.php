<!-- http://jsfiddle.net/L0h4afpz/ -->
<!-- http://jsfiddle.net/L0h4afpz/ -->
<!-- popover ayuda-->

<!-- Esto lo puedes poner en cualquier parte del documento .php|.html, pero dentro de <html></html> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#ejemplo').hide(); // Lo oculta
    $('#ejemplo').show(); // Lo muestra
  });
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h3>Popover Example</h3>
    <p>Popovers are not CSS-only plugins, and must therefore be initialized with jQuery: select the specified element and call the popover() method.</p>
    <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a>
</div>

<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>

</body>
</html>
....
....

ventana modal login
https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_modal2&stacked=h
https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_modal2&stacked=h
https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_modal2&stacked=h


https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_modal_js&stacked=h
https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_modal_js&stacked=h
https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_modal_js&stacked=h

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Modal Login Example</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form">
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="text" class="form-control" id="psw" placeholder="Enter password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked>Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Not a member? <a href="#">Sign Up</a></p>
                    <p>Forgot <a href="#">Password?</a></p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>

</body>
</html>

.....
....
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
<div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</div>
...
...

https://www.youtube.com/watch?v=9oWre11SLe4
https://www.youtube.com/watch?v=9oWre11SLe4
https://www.youtube.com/watch?v=9oWre11SLe4

<div class="row" id="inf_climaZonaNorte">

    <div class="col-lg-1" style="margin-left:-70px;">
    </div>
    <hr>
    <h4>Zona Norte</h4>


    <div class="col-lg-3">
        <h5>Nivel de lluvia </h5>
        <img src="img/<?php echo $string1; ?>.jpg" alt="Lluvia" height="150" width="150">
    </div>

    <div class="col-lg-1">
    </div>

    <div class="col-lg-3">
        <h5>Temperatura / Hum  <?php echo $estadoHumedad; ?> </h5>
        <img src="img/temperatura/<?php echo $estadoTemperatura; ?>.png" alt="Lluvia" height="150" width="150">
    </div>

    <div class="col-lg-1">
    </div>

    <!--
            <div class="col-lg-3">
                <h5>Tràfico </h5>
                <img src="img/<?php echo$traficoImg; ?>.jpg" alt="Lluvia" height="150" width="150">
            </div>
            -->
</div>


<div class="row" id="inf_climaZonaCentro">

    <div class="col-lg-1" style="margin-left:-70px;">
    </div>

    <h4>Zona Sur</h4>

    <div class="col-lg-3">
        <h5>Nivel de lluvia </h5>
        <img src="img/<?php echo $string1_zc; ?>.jpg" alt="Lluvia" height="150" width="150">
    </div>

    <div class="col-lg-1">
    </div>

    <div class="col-lg-3">
        <h5>Temperatura / Hum  <?php echo $estadoHumedad_zc; ?> </h5>
        <img src="img/temperatura/<?php echo $estadoTemperatura_zc; ?>.png" alt="Lluvia" height="150" width="150">
    </div>

    <div class="col-lg-1">
    </div>
    <!--
            <div class="col-lg-3">
                <h5>Tràfico </h5>
                <img src="img/<?php echo$traficoImg; ?>.jpg" alt="Lluvia" height="150" width="150">
            </div>
            -->
</div>

<div class="row" id="inf_climaZonaSur">

    <div class="col-lg-1" style="margin-left:-70px;">
    </div>

    <h4>Pico Y Placa</h4>

    <div class="col-lg-3">
        <h5>Lunes </h5>
        <img src="img/<?php echo $string1_zs; ?>.jpg" alt="Lluvia" height="150" width="150">
    </div>

    <div class="col-lg-1">
    </div>

    <div class="col-lg-3">
        <h5>Martes </h5>
        <img src="img/temperatura/<?php echo $estadoTemperatura_zs; ?>.png" alt="Lluvia" height="150" width="150">
    </div>

    <div class="col-lg-1">
    </div>

    <div class="col-lg-3">
        <h5>Miercoles </h5>
        <img src="img/<?php echo$traficoImg; ?>.jpg" alt="Lluvia" height="150" width="150">
    </div>
    <div class="col-lg-1">
    </div>

    <div class="col-lg-3">
        <h5>Jueves </h5>
        <img src="img/<?php echo$traficoImg; ?>.jpg" alt="Lluvia" height="150" width="150">
    </div>
    <div class="col-lg-1">
    </div>

    <div class="col-lg-3">
        <h5>Viernes </h5>
        <img src="img/<?php echo$traficoImg; ?>.jpg" alt="Lluvia" height="150" width="150">
    </div>

</div>


.....................

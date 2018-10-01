        
$(document).ready(function () {
$("#username").keyup(validarUsuarios);
});
 
 
$(document).ready(function () {
   $("#username").change(validarUsuarios);
});


function validarUsuarios() {

    var usuario, longUsuario;
    Usuario = document.getElementById("NomUsuario").value;
    longUsuario = Usuario.length;

    if (longUsuario < 4) {
        document.getElementById("validarUsuarios").innerHTML = "<i class='fa fa-close'></i> Nombre de usuario por lo menos de 4 caracteres <input id='usernamechecker' type='hidden' value='0' name='usernamechecker'> ";
    }
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("validarUsuarios").innerHTML = xhttp.responseText;
                usernameresponsed = document.getElementById('usernamechecker').value;
            }
            else if (usernameresponsed == "0") {
                document.getElementById("Registrar").disabled = true;
            }
        }
    }
    xhttp.open("POST", "checarusername.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username + "");
}


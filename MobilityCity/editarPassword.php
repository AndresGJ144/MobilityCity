<?php
session_start();
if (@!$_SESSION['nombre'])

 { 
    header("Location:index.html");


}elseif ($_SESSION['rol']==1) {

    header("Location:indexAdmin.php");
    
}

require ("conexion.php");


$nomUsuario= $_SESSION['nomUsuario'];
$passwordAct=$_POST['passwordActual'];
$passwordActual=$_SESSION['password'];
$passwordNew=$_POST["password"];
$passwordNewConfirmacion=$_POST["comfPassword"];
$password_admin=$_SESSION['password_admin'];



/********** Código para EDITAR un usuario a la base de datos ****************/
if($passwordActual==$passwordAct)
{
	if ($passwordNew==$passwordNewConfirmacion)
		{
			$sql = "UPDATE usuario SET  password= '$passwordNew' where nomUsuario='$nomUsuario'";
		}
		else 
			{
			  	echo '<script>alert("Cambio de contraseña erroneo las contraseñas no coinciden!")</script> ';
			    echo "<script>location.href='index.html'</script>";
			}
		}else{
				echo '<script>alert("Cambio de contraseña erroneo la contraseña Actual es incorrecta!")</script> ';
			    echo "<script>location.href='index.html'</script>";
}

/********** Código para EDITAR un usuario a la base de datos ****************/
if($passwordActual==$password_admin)
{
	if ($passwordNew==$passwordNewConfirmacion)
		{
			$sql = "UPDATE usuario SET  password= '$passwordNew' where nomUsuario='$nomUsuario'";
		}
		else 
			{
			  	echo '<script>alert("Cambio de contraseña erroneo las contraseñas no coinciden!")</script> ';
			    echo "<script>location.href='index.html'</script>";
			}
		}else{
				echo '<script>alert("Cambio de contraseña erroneo la contraseña Actual es incorrecta!")</script> ';
			    echo "<script>location.href='index.html'</script>";
}


if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Cambio de contraseña exitoso!")</script> ';
    echo "<script>location.href='index.html'</script>";
} else {
    echo '<script>alert("Error: " . $sql . "<br>" . $conn->error)</script> ';
    echo "<script>location.href='index.html'</script>";
    
}			 
?>

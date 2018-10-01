function validar()
{
	var nombre,apellido,correo,numCelular,Usuario,password,comfPassword,fecNac,expresion,expresionFinal;
	
	nombre=document.getElementById("Nombre").value;
	apellido=document.getElementById("Apellido").value;
	correo=document.getElementById("Correo").value;
	numCelular=document.getElementById("numCelular").value;
	Usuario=document.getElementById("NomUsuario").value;
	password=document.getElementById("password").value;
    comfPassword=document.getElementById("comfPassword").value;
	fecNac=document.getElementById("fecNac").value;
	expresion=/\w+@+\w+\.+[a-z]/;
	expresionFinal=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/;


  if (nombre.length>30)
   {
     alert("El nombre ingresado es muy largo");
     return false;
   } 
 else if (apellido.length>30) 
   {
     alert("El apellido ingresado es muy largo");
     return false;
   } 
 else if (correo.length>30) 
   {
     alert("Por favor ingresar otro correo ");
     return false;
   } 
  else if (!expresion.test(correo))  
   {
     alert("El correo ingresado no es valido");
     return false;
   }
 else if (numCelular.length>10) 
   {
     alert("El numero de telefono solamente pueden contener como maximo 10 caracteres");
     return false;
   } 
else if (isNaN(numCelular)) 
   {
     alert("El numero de telefono contiene caracteres no numericos");
     return false;
   } 
 else if (NomUsuario.length>30) 
   {
     alert("El nombre de usuario ha excedido el numero de caracteres aceptados");
     return false;
   } 
 else if (password.length>30) 
   {
     alert("La contraseña ingresada ha excedido el numero de caracteres aceptados");
     return false;
   } 
 

}
 

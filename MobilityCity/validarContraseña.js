$(document).ready(function () 
        {
        $("#comfPassword").keyup(checkPasswordMatch);
        });

       $(document).ready(function () 
       {
         $("#password").keyup(checkPasswordMatch2);
       });

        function checkPasswordMatch2() 
        {
            var comfPassword,longComfPassword;
            comfPassword= document.getElementById("comfPassword").value;
            longComfPassword =comfPassword.length;
            
              if (longComfPassword>0)
              {
                var password = $("#password").val();
                var confirmarPassword = $("#comfPassword").val();
                 if (password != "")
                 {
                    if (password != confirmarPassword)
                      {

                       $("#divchearsisoniguales").html("<div class='alert alert-danger'><i class='fa fa-close'></i>  Las contraseñas NO coinciden!<input value='error' type='hidden' name='passwordchecker'></div>");
                         document.getElementById("Registrar").disabled = true; 
                      } 
                      else {
                         $("#divchearsisoniguales").html("<div class='alert alert-success'><i class='fa fa-check'></i> Las contraseñas coinciden.<input type='hidden'  value='1' name='passwordchecker'></div>");
                          document.getElementById("Registrar").disabled = false; 
                        }
                      }
                  else {
                         $("#divchearsisoniguales").html("<div class='alert alert-info'><i class='fa fa-info-circle'></i>  No se ha ingresado ninguna contraseña <input value='error' type='hidden' name='passwordchecker'></div>");
                         document.getElementById("Registrar").disabled = true; 
                     }
            }
            
             
        }   

    function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmarPassword = $("#comfPassword").val();
      if (password != "")
      {
         
         if (password != confirmarPassword){
           var contador=0;
           $("#divchearsisoniguales").html("<div class='alert alert-danger'><i class='fa fa-close'></i>  Las contraseñas NO coinciden!<input value='error' type='hidden' name='passwordchecker'></div>");
           document.getElementById("Registrar").disabled = true; 
           } else  
           {
            contador=1; 
            $("#divchearsisoniguales").html("<div class='alert alert-success'><i class='fa fa-check'></i> Las contraseñas coinciden.<input type='hidden'  value='1' name='passwordchecker'></div>");
            document.getElementById("Registrar").disabled = false; 
           }
      }
      else {
        $("#divchearsisoniguales").html("<div class='alert alert-info'><i class='fa fa-info-circle'></i>  No se ha ingresado ninguna contraseña <input value='error' type='hidden' name='passwordchecker'></div>");
          document.getElementById("Registrar").disabled = true; 
      }
     
      
 
}
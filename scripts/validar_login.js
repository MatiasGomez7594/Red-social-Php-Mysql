const regexp = {
    email: /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,

}    


function buscar_usuario(email,password){
    var params = {"email":email,"password":password};
    $.ajax({
       data:params,
       url:"BBDD/iniciar_sesion.php",
       type: 'post',
       success: function (response) {   
        console.log(response)
        if(response === false){
            $("#mensaje-login").show()
        }else{
            console.log("entre")
            //window.location = "inicio.php"
        }
          
       },
    });

}
function validar_email(email_ingresado){
    var resultado = true
    if(regexp.email.test(email_ingresado)){
        resultado = true
        $("#error-email").hide()

        
    }else{
        resultado = false
        $("#error-email").show()

       
    }
        
    return resultado

}

function validar_password(password_ingresada){
    var resultado = true
    if(password_ingresada.length >=4){
        resultado = true
        $("#error-password").hide()

        
    }else{
        resultado = false
        $("#error-password").show()

        
    }
    return resultado
}


let btnLogin = document.getElementById("btnLogin");

btnLogin.addEventListener("click",()=>{

    if(!$("#email").val() || !$("#password").val()){
        $("#error-campos").show()    

    }else{
        $("#error-campos").hide()
        var email_valido = validar_email($("#email").val()) 
        var password_valida = validar_password($("#password").val())
        if(email_valido == true && password_valida == true){
            buscar_usuario($("#email").val(),$("#password").val())
        }

      
   }
 
})




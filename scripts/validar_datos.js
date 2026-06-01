
const nombreValido = /^([A-ZÁÉÍÓÚa-zñáéíóú]+[\s]*)+$/
const emailValido = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/

function registrar_usuario(usuario,password,email){
    var params = {"email":email,"usuario":usuario,"password":password};
    $.ajax({
       data:params,
       url:"registrar.php",
       type: 'post',
       success: function (response) {   
        if(response != "Registro exitoso!"){
            $(".error-registro").html(response)
            $(".error-registro").show()
            $(".message-registro").hide()
        }else{
            $("#usuario").val('')
            $("#email").val('')
            $("#password").val('')
            $(".message-registro").html(response)
            $(".message-registro").show()
            $(".error-registro").hide()

        }
          
            
       },
    });
}

function validar_usuario(usuario_ingresado){
    var resultado = true
    if(nombreValido.test(usuario_ingresado)){
        resultado = true
        $("#error-usuario").hide()
        
    }else{
        resultado = false
        $("#error-usuario").show()

        
    }

    return resultado
}

function validar_email(email_ingresado){
    var resultado = true
    if(emailValido.test(email_ingresado)){
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



function validar_datos(){
    var usuario_ingresado = document.getElementById("usuario").value;
    var email_ingresado = document.getElementById("email").value;
    var password_ingresada = document.getElementById("password").value;
    console.log(usuario_ingresado,email_ingresado,password_ingresada)

    var password_valida = validar_password(password_ingresada)
    var email_valido = validar_email(email_ingresado)
    var usuario_valido = validar_usuario(usuario_ingresado)
    if(usuario_valido == true && email_valido == true && password_valida == true){
        registrar_usuario(usuario_ingresado,password_ingresada,email_ingresado)
    }
}
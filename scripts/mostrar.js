var options_user = document.getElementById("options-user");
var notifications = document.getElementById("notifications");

function mostrarMenu(){
    if(options_user.className==="options-user"){
        options_user.className ="show-options-user";
        notifications.className = "notifications";
    }else{
        options_user.className="options-user";
    }
}
function mensajes_leidos(){
    //console.log($("#id-usuario").val())
    var params = {"id_usuario":$("#id-usuario").val(),"mensajes_leidos":"mensajes_leidos"};
    $.ajax({
       data:params,
       url:"mensajes_leidos.php",
       type: 'post',
       success: function (response) {   
            $(".total-notificaciones").hide()
       },
    });
}
function mostrar_notificaciones(){
    if(notifications.className === "notifications"){
        notifications.className ="show-notifications";
        options_user.className = "options-user";
        mensajes_leidos()
    }else{
        notifications.className = "notifications";
    }
}

function mostrarOpcionesPublicacion(idPost){
    var opcionesPublicacion = document.getElementById("opciones-publicacion"+idPost)
    if(opcionesPublicacion.style.display == "none"){
        opcionesPublicacion.style.display = "flex"     
    }else{
        opcionesPublicacion.style.display = "none"
        
    }
}
function mostrar_editar_publicacion(){
    $("input").remove('.adj');
    $(".ver_solo_publicacion").hide()
    $("body").css("overflow","auto")
    $(".opciones-publicacion").hide()
}
function mostrarCajaComentarios(idCajaRespuesta){
    var cajaComentarios = document.getElementsById(idCajaRespuesta)
    console.log(cajaComentarios)
    if( cajaComentarios.className=="caja-respuestas"){
        cajaComentarios.className="ver-caja-respuestas"
        console.log(cajaComentarios.className)
    }else{
        cajaComentarios.className="caja-respuestas"
        console.log(cajaComentarios.className)
    }
}

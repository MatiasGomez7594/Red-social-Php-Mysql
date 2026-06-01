function ver_comentarios(id_publicacion){
    $("#contenedor_comentarios"+id_publicacion).css("display","block")

}

function ocultar_comentarios(id_publicacion){
    $("#contenedor_comentarios"+id_publicacion).css("display","none")
    $("#input_comentar"+id_publicacion).val('')

}

function comentar(id_publicacion,id_usuario) { 
   var comentario = $('#input_comentar'+id_publicacion).val()
    if(comentario.length >0){
        guardar_comentario(comentario,id_publicacion,id_usuario)

    }
}

function guardar_comentario(comentario,id_publicacion,id_usuario) { 
    console.log(comentario,id_publicacion,id_usuario)
    var params = {"id_publicacion":id_publicacion,
    "id_usuario": id_usuario,"comentario":comentario};
    $.ajax({
       data:params,
       url:"guardar_comentario.php",
       type: 'post',
       beforeSend:function () {
        if(!comentario){
            return false
        }
       },
       success: function (response) {   
        //console.log(response)
       $("#contenedor_comentarios"+id_publicacion).append(response)
        $('#input_comentar'+id_publicacion).val('')
       },
    });
}

function ver_respuestas(id_comentario){
   // console.log(id_comentario)
    $('.respuesta'+id_comentario).show()
}

function ver_form_responder(id_comentario){
   // console.log(id_comentario)
    //console.log($('#form_responder'+id_comentario))
    $('#form_responder'+id_comentario).show()
}

function ocultar_form_responder(id_comentario){
    //console.log(id_comentario)

    $('#form_responder'+id_comentario).hide()

}

function responder(id_comentario,id_usuario,id_respuesta=null) { 
    console.log(id_comentario,id_respuesta)
    var respuesta_contenido = $('#input_responder'+id_comentario).val()
    

    if(id_respuesta!=null){
        //console.log($('#input_responder'+id_comentario+id_respuesta).val()+" prueba")
        respuesta_contenido = $('#input_responder'+id_comentario+id_respuesta).val()

    }
    
    if(respuesta_contenido.length>0){
        //console.log($('#input_responder'+id_comentario+id_respuesta).val()+" pruebaa")

        guardar_respuesta(id_comentario,id_usuario,respuesta_contenido)

    }
    /*
$('#input-responder'+id__receptor+tipo).bind('keypress', function(e) {  
    console.log($('#input-responder'+id__receptor+tipo).val())
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code==13){
        e.preventDefault();
        e.stopImmediatePropagation();
        var  respuesta = $('#input-responder'+id__receptor+tipo).val()
        var  id_receptor = $("#id-receptor"+id__receptor+tipo).val()
        $('#input-responder'+id__receptor+tipo).val('')
        //console.log(respuesta,id_comentario,id_receptor,id_usuario)
        //return false

        guardar_respuesta(respuesta,id_comentario,id_receptor,id_usuario,id_post)
        
    }

});
*/
}

function guardar_respuesta(id_comentario,id_usuario,respuesta_contenido){ 
    console.log("guardar "+respuesta_contenido,id_comentario,id_usuario)
    //return false
    var params = {"id_comentario":id_comentario,
    "id_usuario": id_usuario,"respuesta":respuesta_contenido};
    $.ajax({
       data:params,
       url:"guardar_respuestas_comentarios.php",
       type: 'post',
       success: function (response) {   
        
        //console.log($("#contenedor_respuestas_comentario"+id_comentario))
        $(".respuesta"+id_comentario).show()

        $("#contenedor_respuestas_comentario"+id_comentario).append(response)
        $('#input_responder'+id_comentario).val('')
       
       },
    });
}



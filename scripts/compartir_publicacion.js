function compartir_publicacion(id_post,id_usuario){
    console.log(id_post+id_usuario)
    var params = {"id_post":id_post,"id_usuario":id_usuario};
    $.ajax({
       data:params,
       url:"compartir_publicacion.php",
       type: 'post',
       success: function (response) {   
           console.log(response)
            
       },
    });
}


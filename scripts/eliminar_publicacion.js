function eliminar_publicacion(id_post){
    var params = {"id_post":id_post};
    $.ajax({
       data:params,
       url:"eliminar_publicacion.php",
       type: 'post',
       success: function (response) {   
           if(response == "ok"){
                $("#publicacion"+id_post).hide()
                
           }
         
            
       },
    });
}


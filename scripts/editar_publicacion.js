function editar_publicacion(id_post){
    var comentario = $(".publicacion-texto"+id_post).html()
    var img =  $(".publicacion-adjunto"+id_post).attr("src")  
    if(img){
        $(".solo_publicacion_img").show()
        $(".editar-img").attr("src",img)   
        $(".editar-adjunto").hide()
    }else{
        $(".solo_publicacion_img").hide()
        $(".editar-adjunto").show()
    }
    $(".ver_solo_publicacion").show()
    $("#id-publicacion").val(id_post)
    $(".editar-comentario").val(comentario)
    //$(".editar-adjunto").val($(".editar-img").attr("src",img))   
    $("body").css("overflow","hidden")
    $("#id-publicacion-editar").attr("value",id_post)  
    $(".cerrar").click(function(){
        $(".editar-adjunto").show()
        $(".solo_publicacion_img").hide()
        var adjunto =  $('<input>', {
            'type' : 'hidden',
            'name':'adjunto_eliminado',
            'value':'adj',
            'class':'adj'
          });
          $(".solo_publicacion").append(adjunto)
    })

}


$(document).ready(function(e){
    $(".solo_publicacion").on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: 'POST',
            url: 'editar_publicacion.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                //console.log($("#id-publicacion").val());
                $("#editar-adjunto").val('')
                var data= JSON.parse(response);
                //console.log(data);
                if(data[0]){
                    $(".publicacion-texto"+$("#id-publicacion").val()).html(data[0])
                }else{
                    $(".publicacion-texto"+$("#id-publicacion").val()).html('')
                }
                if(data[1]){
                    $(".publicacion-adjunto"+$("#id-publicacion").val()).attr("src",data[1])  
                    $('hr'+$("#id-publicacion").val()).remove()
                    
                }else{
                    var hr =  $('<hr>', {
                        'class':'hr'+$("#id-publicacion").val()
                      });
                    $(".publicacion-adjunto"+$("#id-publicacion").val()).attr("src",'')      
                    $(".post-content"+$("#id-publicacion").val()).append(hr)
                }
                $(".ver_solo_publicacion").hide()
                $("body").css("overflow","auto")
              
                return true
            }
        });
    });
});

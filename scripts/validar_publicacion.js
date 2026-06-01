/*
var miPost = document.getElementById("mi-publicacion");
miPost.addEventListener('keyup',(event)=>{
    var contenidoPost = event.path[0].value;
    
    var btnPublicar = document.querySelector("#btnPublicar");
    btnPublicar.className = "btnPublicar";
    btnPublicar.disabled=true;
    var adjunto = document.getElementById("archivoAdjunto").value;
    //console.log(btnPublicar);
    if(contenidoPost || adjunto){
        //console.log(adjunto)
        console.log(contenidoPost);
        btnPublicar.disabled=false;
        btnPublicar.className = "verBtnPublicar";
        //console.log(btnPublicar);
    }

})

*/

function guardar_publicacion(){
    if($("#mi-publicacion-txt").val() || $("#mi-publicacion-archivo-adjunto").val()){
        var contenido = $("#mi-publicacion-txt").val()
        //var archivo_adjunto = $("#mi-publicacion-archivo-adjunto").val()
        var id_usuario = $("#id-usuario-sesion").val()
       // console.log(archivo_adjunto,id_usuario,contenido)
        var params = new FormData();
        var archivo_adjunto = $('#mi-publicacion-archivo-adjunto')[0].files[0];
        params.append('id_usuario',id_usuario);
        params.append('contenido',contenido);
        params.append('archivo_adjunto',archivo_adjunto);
        //console.log(params)
        $.ajax({
           data:params,
           url:"guardar_publicacion.php",
           type: 'post',
           contentType: false,
           processData: false,
           success: function (response) {   
            if(response == 'ok'){
                console.log(response)
                $("#preview-adjunto").hide()
            }else{
                console.log("error")

    
            }
              
                
           },
        });
        

    }
    $("#mi-publicacion-txt").val('')
    
}






$('#mensaje-privado').bind('keypress', function(e) {
    /*no recuerdo la fuente pero lo recomiendan para
    mayor compatibilidad entre navegadores.
    cuando presionaba enter pasaba que se volvía a recargar 
    la pagina lo que necesitaba es que no se volviera a recargar 
    cuando presionara el enter 
    por lo que investigando encontré que había que anular el enter en el input de tipo texto
    */    
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code==13){
        e.preventDefault();
        //console.log($("#id_remitente").val()+$("#id_receptor").val()+$("#mensaje-privado").val())
        guardar_mensajes()
    }
    /*
    console.log(e.key)
    if(e.key == 'Enter'){
        e.preventDefault();
        console.log($("#mensaje-privado").val())
       // guardar_mensajes()
    }
    */
  });
  



function guardar_mensajes() { 
    var params = {"id_remitente":$("#id_remitente").val(),
    "id_receptor":$("#id_receptor").val(),
    "mensaje":  $("#mensaje-privado").val()};
    $.ajax({
       data:params,
       url:"guardar_mensajes.php",
       type: 'post',
       beforeSend:function () {
        if(!$("#mensaje-privado").val()){
            return false
        }
       },
       success: function (response) {   
        var mensaje =  $('<p>', {
            'html' : response,
            'class' : 'mensaje mensaje-usuario',
          });
        $(".mensajes-privados").append(mensaje)
        $("#mensaje-privado").val('')
       },
    });
}


/*onkeydown="onKeyDownHandler(event);"
function onKeyDownHandler(event) {

    var codigo = event.which || event.keyCode;

    console.log("Presionada: " + codigo);
     
    if(codigo === 13){
      console.log("Tecla ENTER");
    }

    if(codigo >= 65 && codigo <= 90){
      console.log(String.fromCharCode(codigo));
    }

     
}
*/
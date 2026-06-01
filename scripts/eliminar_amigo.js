function eliminar_amigo(id_solicitud) { 
    var params = {"id_solicitud":id_solicitud};
    //console.log(id_solicitud)
    $.ajax({
       data:params,
       url:"procesar_solicitud.php",
       type: 'get',
       success: function () {   
        $("#persona"+id_solicitud).hide()
       },
    });
}

function cancelar_solicitud(id_solicitante,id_solicitado,id_solicitud) { 
    const cancelar = "cancelar"
    var params = {"cancelar":cancelar,"id_solicitud":id_solicitud,"id_solicitante":id_solicitante,
    "id_solicitado":id_solicitado};
    //console.log(id_solicitud)
    $.ajax({
       data:params,
       url:"procesar_solicitud.php",
       type: 'get',
       success: function () {   
        $("#persona"+id_solicitud).hide()
       },
    });
}

function aceptar_solicitud(id_solicitud) { 
    const aceptar = "aceptar"
    var params = {"aceptar":aceptar,"id_solicitud":id_solicitud};
    //console.log(id_solicitud)
    $.ajax({
       data:params,
       url:"procesar_solicitud.php",
       type: 'get',
       success: function () {   
        $("#persona"+id_solicitud).hide()
       },
    });
}

function enviar_solicitud(id_solicitante,id_solicitado) { 
    const solicitar = "solicitar"
    var params = { "solicitar": solicitar, "id_solicitante":id_solicitante,"id_solicitado":id_solicitado};
    //console.log(id_solicitud)
    $.ajax({
       data:params,
       url:"procesar_solicitud.php",
       type: 'get',
       success: function () {   
        $("#persona"+id_solicitud).hide()
       },
    });
}


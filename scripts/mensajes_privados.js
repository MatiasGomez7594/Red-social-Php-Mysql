function verMensajesPrivados(){
    var contenedorMensajes = document.getElementById("contenedor-mensajes")
    if(contenedorMensajes.className=="contenedor-mensajes-privado"){
        contenedorMensajes.className="ver-contenedor-mensajes-privado"
        
    }else{
        contenedorMensajes.className="contenedor-mensajes-privado"
    }
}

function minimizarMensajesPrivados(){
    var contenedorMensajes = document.getElementById("contenedor-mensajes")
    if(contenedorMensajes.className=="ver-contenedor-mensajes-privado"){
        contenedorMensajes.className="contenedor-mensajes-privado-minimizado"
        
    }else{
        contenedorMensajes.className="ver-contenedor-mensajes-privado"
    }
}
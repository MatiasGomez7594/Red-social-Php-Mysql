function cerrar(){
    $("#mi-publicacion-archivo-adjunto").val("")
    $("#preview-adjunto").hide()
}


    document.getElementById('mi-publicacion-archivo-adjunto').onchange=function(e){
        //crear un objeto para almacenar las propiedades de un archivo
        let reader=new FileReader();
        //para leer el archivo
        reader.readAsDataURL(e.target.files[0]);
        //para cuando la imagen se haya cargado
        reader.onload= function(){
            var inputFile=document.getElementById("mi-publicacion-archivo-adjunto")
            inputFile.style.display="none";
            let preview = document.getElementById('preview-adjunto')
            //creo una imagen 
            let imagen=document.createElement('img')
            imagen.id="image"
            imagen.src=reader.result;
            let cerrar=document.createElement('i')
            cerrar.id="cerrar"
            cerrar.className="fas fa-times"
            let mensaje = document.createElement('p')
            mensaje.id="mensaje"
            mensaje.textContent="¿Desea publicar esta imagen?"
            preview.innerHtml='';
            preview.append(mensaje)
            preview.append(imagen)
            preview.append(cerrar)
            cerrar.onclick=function(){
                document.getElementById("mi-publicacion-archivo-adjunto").value="";
                var preview = document.getElementById("preview-adjunto")
                var imagen=document.getElementById("image")
                var mensaje=document.getElementById('mensaje')
                cerrar.style.display="none"
                preview.removeChild(imagen)
                preview.removeChild(mensaje)
                inputFile.style.display="block"
    
            }
    
        }
    
    }



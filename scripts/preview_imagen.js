function cerrar(){
    document.getElementById("foto").value="";
    var preview = document.getElementById("preview-imagen")
    var imagen=document.getElementById("image")
    var mensaje=document.getElementById('mensaje')
    cerrar.style.display="none"
    preview.removeChild(imagen)
    preview.removeChild(mensaje)
    inputFile.style.display="block"
    
}
document.getElementById('foto').onchange=function(e){
    //crear un objeto para almacenar las propiedades de un archivo
    let reader=new FileReader();
    //para leer el archivo
    reader.readAsDataURL(e.target.files[0]);
    console.log(document.getElementById('foto').value)
    //para cuando la imagen se haya cargado
    reader.onload= function(){
        var inputFile=document.getElementById("input-file")
        inputFile.style.display="none";
        let preview = document.getElementById('preview-imagen')
        //creo una imagen 
        let imagen=document.createElement('img')
        imagen.id="image"
        imagen.src=reader.result;
        let cerrar=document.createElement('i')
        cerrar.id="cerrar"
        cerrar.className="fas fa-times"
        let mensaje = document.createElement('p')
        mensaje.id="mensaje"
        mensaje.textContent="¿Desea usar esta imagen?"
        cerrar.onclick=function(){
            document.getElementById("foto").value="";
            var preview = document.getElementById("preview-imagen")
            var imagen=document.getElementById("image")
            var mensaje=document.getElementById('mensaje')
            cerrar.style.display="none"
            preview.removeChild(imagen)
            preview.removeChild(mensaje)
            inputFile.style.display="block"
        }
        preview.innerHtml='';
        preview.append(mensaje)
        preview.append(imagen)
        preview.append(cerrar)

    }

}
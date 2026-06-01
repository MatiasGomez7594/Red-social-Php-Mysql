function verInformacion(){
    let informacion_personal=document.getElementById('contenedor-informacion-personal');
    let  informacion_contacto=document.getElementById('contenedor-informacion-contacto');
    let h1_informacion_contacto=document.getElementById('h1-informacion-contacto');
    let h1_informacion_personal=document.getElementById('h1-informacion-personal');
    if(informacion_contacto.style.display=="none"){
        informacion_personal.style.display="none";
        h1_informacion_personal.style.color="#fff";
        informacion_contacto.style.display="block";
        h1_informacion_contacto.style.color="#000";
    }else{
        h1_informacion_personal.style.color="#000";
        informacion_personal.style.display="block";
        informacion_contacto.style.display="none";
        h1_informacion_contacto.style.color="#fff";
    }
}
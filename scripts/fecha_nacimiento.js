function fechaNacimiento(){
    let anioNacimiento=document.getElementById('anio').value
    let mesNacimiento = document.getElementById('mes').value
    let diaNacimiento=document.getElementById('dia').value
    let inputFechaNacimiento=document.getElementById('fecha_nacimiento');
    if(mesNacimiento <10){
        mesNacimiento='0'+mesNacimiento


    }
    if(diaNacimiento<10){
        diaNacimiento='0'+diaNacimiento

    }
    
   // console.log(anioNacimiento+'-'+mesNacimiento+'-'+diaNacimiento);
    var  fechaNac=anioNacimiento+'-'+mesNacimiento+'-'+diaNacimiento;
    inputFechaNacimiento.value=fechaNac

}
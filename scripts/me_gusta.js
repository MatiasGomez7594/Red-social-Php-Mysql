function me_gusta(id_elemento,tipo_elemento,id_usuario){
    console.log(id_elemento+tipo_elemento+id_usuario)
    var params = {"id_elemento":id_elemento,
    "tipo_elemento":tipo_elemento,
    "id_usuario":id_usuario};
    $.ajax({
       data:params,
       url:"me_gusta.php",
       type: 'post',
       success: function (response) {   
           console.log(response)
           $('#'+tipo_elemento+id_elemento).html(response)
           //var data=JSON.parse(response);
           //console.log(" total-likes: "+data[0]+" total-unlikes: "+data[1])
           /*
           if(data[0]!=0){
                $(".total-likes-"+id_post+"-"+tipo_elemento).html(data[0])
           }
           */
            
       },
    });
}


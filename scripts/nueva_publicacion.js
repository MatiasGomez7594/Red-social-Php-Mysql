

$(document).ready(function(e){
    $("#nueva_publicacion").on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $.ajax({
            type: 'POST',
            url: 'guardar_post.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                //console.log(response)
                $('#btnPublicar').removeClass("verBtnPublicar");
                $('#btnPublicar').prop("disabled","disabled");
                $('#btnPublicar').addClass("btnPublicar");
                $("#miPost").val('')
                $("#archivoAdjunto").val('')
                $("#preview-adjunto").hide()
                $(".all-posts").prepend(response)
                return true
            }
        });
    });
});

/*
//file type validation
$("#file").change(function() {
    var file = this.files[0];
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
        alert('Please select a valid image file (JPEG/JPG/PNG).');
        $("#file").val('');
        return false;
    }
});
*/
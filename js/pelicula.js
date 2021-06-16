$(document).ready(function () {
    $('#formComentario').on('submit', function (event) {
        event.preventDefault();
        var datosForm = $(this).serialize();
        $.ajax({
            url:"comentario",
            method:"POST",
            data:datosForm,
            dataType:"JSON",
            success:function (data) {
                if (data.error != '') {
                    $('#formComentario')[0].reset();
                    $('#idComentario').val("0");
                    $('#leyenda').text("Comentario");
                    $('#mensajeComentario').html(data.error);
                    cargarComentario();
                }
            },
        })
    });
});

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function getUrlParam(parameter, defaultvalue){
    var urlparameter = defaultvalue;
    if(window.location.href.indexOf(parameter) > -1){
        urlparameter = getUrlVars()[parameter];
        }
    return urlparameter;
}

// @ts-check
function cargarComentario() {
    var id = getUrlParam('id', '0');
    var accion = 'buscarComentario';
    var prueba = {idPelicula : id, accionComentario : accion };
    //alert(typeof(prueba));
    $.ajax({
        url:"comentario",
        method:"POST",
        data: prueba,
        //dataType:"JSON",
        success:function (data) {
            $('#mostrarComentario').html(data);
        }
    })
    
}

$(document).on('click', '.responder', function () {
    var idComentario = $(this).attr("id");
    $('#idComentario').val(idComentario);
    $('#leyenda').text("Respuesta");
    $('#texto').focus();
})

$(function() {
    $('.rate input').on('click', function(){
        var ratingNum = $(this).val();
        var idUsuario = $('#usuario').val();
        var idPelicula = $('#idPelicula').val();

        $.ajax({
             url: "valoracion",
            method: "POST",
            dataType: "JSON",
            data: { 
                ratingNum: ratingNum,
                idUsuario: idUsuario,
                idPelicula: idPelicula
                }, success: function(resp) {
                if(resp.status == 1){
                    alert('Gracias! Has valorado '+ratingNum+'');
                }
                if(resp.status == 2){
                    alert('Su valoración se ha cambiado a '+ratingNum+'');
                }
                if(resp.status == 3){
                    alert('No estás registrado, no puedes valorar');
                }
                }
        });   
    });
});
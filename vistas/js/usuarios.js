/*--=====================================
EDITAR USUARIO
======================================--*/

$(".tablas").on("click", ".btnEditarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");

    var datos=new FormData();

    datos.append("idUsuario",idUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        datatType:"json",
        success: function (respuesta){

            console.log(respuesta)

        }



    })
})
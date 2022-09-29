function init(){
    $("#ticketForm").on("submit", function(e){
        guardarTicket(e);
    });
}
$(document).ready(function() {
    $('#descripcion').summernote({
        lang: 'es-ES',
       /* toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
          ],
          popover: {
            air: [
              ['color', ['color']],
              ['font', ['bold', 'underline', 'clear']]
            ]
          },*/
        height: 150
    });
    $.post("../../controller/categoria.php?op=cbx_categoria", function(data, status){
        $("#id_categoria").html(data);
        //console.log(data);
    });
    
});
function guardarTicket(e){
    e.preventDefault();
    //console.log($("#ticketForm").serrializeArray());
    if($("#descripcion").summernote("isEmpty") || $("#descripcion").val() === ""){
        swal(
            "Error",
            "Por favor agregue una descripcion del ticket"
       , 'warning');
    }else{
        let formData = new FormData($("#ticketForm")[0]);
        $.ajax({
            url: '../../controller/ticket.php?op=insert',
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                $("#titulo").val("");
                $("#descripcion").summernote("reset");
                swal(
                     "Correcto",
                     "Registrado correctamente"
                , 'success');
                console.log(datos);
            }
        });
    }
   
}
init();
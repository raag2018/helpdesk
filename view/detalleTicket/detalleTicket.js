function init(){
}
$(function() {
    $(".fancybox").fancybox({
        padding: 0,
        openEffect	: 'none',
        closeEffect	: 'none'
    });
});
const getUrlParameter = (sParam) => {
    let sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split("&"),
    sPareameterName,
    i;
    for(i=0;i<sURLVariables.length; i++){
        sPareameterName = sURLVariables[i].split("=");
        if(sPareameterName[0] === sParam){
            return sPareameterName[1] === undefined ? true : sPareameterName[1];
        }
    }
}
$(document).ready(function(){
    let id_ticket = getUrlParameter('ID');
    const detalle_ticket = (id_ticket) => {
      $.post("../../controller/ticket.php?op=listar_detalle",{id_ticket: id_ticket}, function(data){
          //console.log(data);
          $("#lbldetalle").html(data);
      }); 
    }
    const estado_ticket = (id_ticket) => { 
      $.post("../../controller/ticket.php?op=mostrar",{id_ticket: id_ticket}, function(data){
        let obj = JSON.parse(data);
        //console.log(obj);
        //console.warn(obj.estado);
        if(obj.estado === '1'){
          $("#lblEstado").text('Abierto');
          $("#lblEstado").removeClass('label-danger');
          $("#lblEstado").addClass('label-success');
        }else if(obj.estado === '2'){
          $("#lblEstado").text('Cerrado');
          $("#form_detalle").hide();
          $("#lblEstado").removeClass('label-success');
          $("#lblEstado").addClass('label-danger');
        }
        $("#lblUsuario").text(obj.nombre+' '+obj.apellido);
        $("#lblFecha").text(obj.fecha_creacion);
        $("#categoria").val(obj.categoria);
        $("#titulo").val(obj.titulo);
        $("#descripcion").summernote('code',obj.descripcion);
        //$("#lbldetalle").html(data);    
      }); 
    }
    detalle_ticket(id_ticket);
   estado_ticket(id_ticket);

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
        height: 200
    });
    $('#descripcion').summernote('disable');
    $('#descripcion_detalle').summernote({
        lang: 'es-ES',
        toolbar: [
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
          },
        height: 150,
        callbacks: {
          onImageUpload: function(image){
            console.log("Image detect...");
            myimagetreat(image[0]);
          },
          onPaste: function(e){
            console.log("test detect...");
          }
        }
    });
    $(document).on('click','#btnEnviar', function(e){
        e.preventDefault();
        //console.log($("#ticketForm").serrializeArray());
        //let formData = new FormData($("#ticketForm")[0]);
        let id_usuario = $("#id").val();
        let descripcion = $("#descripcion_detalle").val();
        let data = { 
                      "id_ticket":id_ticket,
                      "id_usuario":id_usuario,
                      "descripcion":descripcion};
        if($("#descripcion_detalle").summernote("isEmpty") || $("#descripcion_detalle").val() === ""){
              swal(
                    "Error",
                    "Por favor agregue una descripcion del ticket"
                    , 'warning');
        }else{
          $.ajax({
              url: '../../controller/ticket.php?op=insert_detalle',
              method: 'post',
              data: data,
              success: function(datos){
                detalle_ticket(id_ticket);
                  $("#descripcion_detalle").summernote("reset");
                  swal(
                      "Correcto",
                      "Registrado correctamente"
                  , 'success');
                  console.log(datos);
              }
          });
        }
    });
    $(document).on('click','#btnCerrar', function(e){
      e.preventDefault();
      let id_usuario = $("#id").val();
      let descripcion = $("#descripcion_detalle").val();
      let data = { 
        "id_ticket":id_ticket,
        "id_usuario":id_usuario,
        "descripcion":descripcion};
      swal({
        title: "estas seguro de cerrar el ticket?",
        text: "El ticket se cerrara",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Si, cerrar ticket",
        cancelButtonText: "No",
        cancelButtonClass: "btn-danger",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if(isConfirm){
          swal({
            title: "Cerrando ticket",
            text: "El ticket se cerrara",
            type: "success",
            confirmButtonClass: "btn-success"
          });
          if($("#descripcion_detalle").summernote("isEmpty") || $("#descripcion_detalle").val() === ""){
            swal(
                  "Error",
                  "Por favor agregar un comentario para cerrar el ticket"
                  , 'warning');
          }else{
            $.ajax({
                url: '../../controller/ticket.php?op=update',
                method: 'post',
                data: data,
                success: function(datos){
                  detalle_ticket(id_ticket);
                  estado_ticket(id_ticket);
                    $("#descripcion_detalle").summernote("reset");
                    swal(
                        "Correcto",
                        "Registrado correctamente"
                    , 'success');
                    console.log(datos);
                }
            });
          }
        }else{
          swal({
            title: "Cancelado",
            text: "Se cancelo el cierre del ticket",
            type: "error",
            confirmButtonClass: "btn-danger"
          });
        }
      });
     
    
  });
});

init();
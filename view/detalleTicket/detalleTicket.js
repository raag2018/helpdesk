function init(){}
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
    $.post("../../controller/ticket.php?op=listar_detalle",{id_ticket: id_ticket}, function(data){
        //console.log(data);
        $("#lbldetalle").html(data);
    }); 
    $('#descripcion_detalle').summernote({
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
        height: 150
    });
});
init();
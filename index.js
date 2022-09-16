function init(){

}
$(document).ready(function(){

});
$(document).on('click','#btnSoporte',function(e){
    e.preventDefault();
    let id_rol = parseInt($("#id_rol").val());
    if(id_rol === 1){
        $("#lblTitulo").html("Acceso Soporte");
        $(this).html("Acceso Usuario");
        $("#id_rol").val(2);
    }else if(id_rol === 2){
        $("#lblTitulo").html("Acceso Usuario");
        $(this).html("Acceso soporte");
        $("#id_rol").val(1);
    }
  
})
init();
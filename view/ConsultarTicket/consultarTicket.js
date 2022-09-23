let tabla;
function init(){

}
$(document).ready(function(){
    let id = $("#id").val();
    tabla = $("#tblTicket").dataTable({
        "aProcesing": true,
        "aServerSide": true,
        dom: "Bfrtip",
        "searching": true,
        lenghtChange: false,
        colReorder: true,
        buttoms: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax": {
            url: '../../controller/ticket.php?op=listarTicket',
            type: "POST",
            datatype: 'json',
            data: {id_usuario: id},
            error: function(e){
                console.warn(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLenght": 10,
        "autoWidth": false,
        "language": {
            "sProcesing": "Procensando...",
            "sLenghMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningun dato disponible en esta tabla",
            "sInfo": "Mostrando un totoal de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Prim",
                "sLast": "Ult",
                "sNext": "Sig",
                "sPrevious": "Ant"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente",
            }
        }
    }).DataTable();
});
function ver(id_ticket){
    //console.log(id_ticket);
    window.open("http://localhost/helpdesk/view/detalleTicket/?ID="+id_ticket);
}
init();
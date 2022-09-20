<?php 
    require_once("../config/conexion.php");
    require_once("../models/Ticket.php");
    $ticket = new Ticket();
    switch($_GET['op']){
        case "insert":
            $id_usuario = $_POST["id_usuario"];
            $id_categoria = $_POST["id_categoria"];
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $datos = $ticket->insertTicket($id_usuario, $id_categoria, $titulo, $descripcion);
            break;
        case "listarTicket":
            $id_usuario = $_POST["id_usuario"];
            $datos = $ticket->listarTicket($id_usuario);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = $row["categoria"];
                $sub_array[] = $row["titulo"];
                if($row["estado"] == 1){
                    $sub_array[] = "<span class='label label-pill label-success'>Abierto</span>";
                }else{
                    $sub_array[] = "<span class='label label-pill label-danger'>Cerrado</span>";
                }
                $sub_array[] = $row["fecha_creacion"];
                $sub_array[] = "<button type='button' 
                                        onclick='ver(".$row['id'].")' 
                                        id='".$row['id']."'
                                        class='btn btn-inline btn-primary btn-sm ledda-button' 
                                >
                                    <div><i class='fa fa-edit'></i></div>
                                </button>";
                $data[] = $sub_array;
            }
            //"iTotalRecords" => count[$data],
           // "iTotalDisplayRecords" => count[$data],
            $result = array(
                "sEcho" => 1,
                "aaData" => $data
            );
            echo json_encode($result);
            break;
    }
?>
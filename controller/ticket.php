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
                $sub_array = $row["id"];
                $sub_array = $row["categoria"];
                $sub_array = $row["titulo"];
                $sub_array =  $row["titulo"];
            }
            break;
    }
?>
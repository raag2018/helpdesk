<?php 
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria = new Categoria();
    switch($_GET['op']){
        case "cbx_categoria":
            $datos = $categoria->getCategoria();
            if(is_array($datos) == true && count($datos) > 0){
                $html = "<option value='0'>Seleccionar Categoria</option>";
               foreach($datos as $row){
                $html .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
               }
               echo $html;
            }
            break;
    }
?>
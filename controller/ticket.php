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
        case "update":
            $id_usuario = $_POST["id_usuario"];
            $id_ticket = $_POST["id_ticket"];
            $descripcion = $_POST["descripcion"];
            $datos = $ticket->insertTicketDetalle($id_ticket,$id_usuario,$descripcion);
            $datos = $ticket->update_ticket($id_ticket);
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
                }else if($row["estado"] == 2){
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
        case 'listar_detalle':
            $id_ticket = $_POST["id_ticket"];
            $datos = $ticket->detalleTicket($id_ticket);
            foreach($datos as $r){
            ?>
                <article class="activity-line-item box-typical">
					<div class="activity-line-date">
						<?php echo $r['fecha_creacion'];?>
					</div>
					<header class="activity-line-item-header">
						<div class="activity-line-item-user">
							<div class="activity-line-item-user-photo">
								<a href="#">
									<img src="../../public/img/photo-64-2.jpg" alt="">
								</a>
							</div>
							<div class="activity-line-item-user-name"><?php echo $r['nombre'].' '.$r['apellido'];?></div>
							<div class="activity-line-item-user-status">
								<?php 
									if($r['id_rol'] == 1){
										echo 'Usuario';
									}else{
										echo 'Tecnico';
									}
								?></div>
						</div>
					</header>
					<div class="activity-line-action-list">
						<section class="activity-line-action">
							<div class="time"><?php echo $r['hora'];?></div>
							<div class="cont">
								<div class="cont-in">
									<p><?php echo $r['descripcion'];?></p>
									<!--ul class="meta">
										<li><a href="#">5 Comments</a></li>
										<li><a href="#">5 Likes</a></li>
									</ul-->
								</div>
							</div>
						</section><!--.activity-line-action-->
					</div><!--.activity-line-action-list-->
				</article><!--.activity-line-item-->
            <?php
            }
            break;
        case "mostrar":
            $id_ticket = $_POST["id_ticket"];
            $datos = $ticket->listar_ticket_id($id_ticket);
            if(is_array($datos) == true && count($datos) > 0){
                foreach($datos as $row){
                    $output['id_ticket'] = $row['id_ticket'];
                    $output['id_usuario'] = $row['id_usuario'];
                    $output['id_categoria'] = $row['id_categoria'];
                    $output['titulo'] = $row['titulo'];
                    $output['descripcion'] = $row['descripcion'];
                    $output['fecha_creacion'] = $row['fecha_creacion'];
                    $output['nombre'] = $row['nombre'];
                    $output['apellido'] = $row['apellido'];
                    $output['categoria'] = $row['categoria'];
                    $output['estado'] = $row['estado'];
                }
                echo json_encode($output);
            }
            break;
        case "insert_detalle":
            $id_usuario = $_POST["id_usuario"];
            $id_ticket = $_POST["id_ticket"];
            $descripcion = $_POST["descripcion"];
            $datos = $ticket->insertTicketDetalle($id_ticket,$id_usuario,$descripcion);
            break;
    }
?>
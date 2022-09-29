<?php 
	class Ticket extends Conectar{
        public function insertTicket($id_usuario, $id_categoria, $titulo, $descripcion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "insert into ticket(id_usuario, id_categoria, titulo, descripcion) values(?,?,?,?);";
            $sth = $conectar->prepare($sql);
            $sth->bindValue(1, $id_usuario);
			$sth->bindValue(2, $id_categoria);
            $sth->bindValue(3, $titulo);
			$sth->bindValue(4, $descripcion);
            $sth->execute();
            return $resultado = $sth->fetchAll();
        }
        public function insertTicketDetalle($id_ticket,$id_usuario, $descripcion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "insert into detalle_ticket(id_ticket,id_usuario, descripcion) values(?,?,?);";
            $sth = $conectar->prepare($sql);
            $sth->bindValue(1, $id_ticket);
			$sth->bindValue(2, $id_usuario);
			$sth->bindValue(3, $descripcion);
            $sth->execute();
            return $resultado = $sth->fetchAll();
        }
        public function listarTicket($id_usuario){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = " select
                        t.id,
                        t.id_usuario,
                        t.id_categoria,
                        t.titulo,
                        t.descripcion,
                        t.estado,
                        date_format(t.fecha_creacion, '%d/%m/%Y') as fecha_creacion,
                        u.nombre,
                        u.apellido,
                        c.nombre as categoria
                        FROM ticket as t
                        inner join usuario as u on u.id = t.id_usuario
                        inner join categoria as c on c.id = t.id_categoria
                        where  u.id = ?;";
            $sth = $conectar->prepare($sql);
            $sth->bindValue(1, $id_usuario);
            $sth->execute();
            return $resultado = $sth->fetchAll();
        }
        public function detalleTicket($id_ticket){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = " select
                        dt.id_detalle,
                        dt.descripcion,
                        date_format(dt.fecha_creacion,'%d/%m/%Y') as fecha_creacion,
                        upper(u.nombre) as nombre,
                        upper(u.apellido) as apellido,
                        u.id_rol,
                        date_format(dt.fecha_creacion, '%H:%i %p') as hora
                        FROM detalle_ticket as dt
                        inner join usuario as u on u.id = dt.id_usuario
                        where dt.id_ticket = ?;";
            $sth = $conectar->prepare($sql);
            $sth->bindValue(1, $id_ticket);
            $sth->execute();
            return $resultado = $sth->fetchAll();
        }
    
        public function listar_ticket_id($id_ticket){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = " select
                        t.id as id_ticket,
                        u.id as id_usuario,
                        c.id as id_categoria,
                        t.titulo,
                        t.descripcion,
                        t.estado,
                        date_format(t.fecha_creacion,'%d/%m/%Y') as fecha_creacion,
                        u.nombre,
                        u.apellido,
                        c.nombre as categoria
                        FROM ticket as t
                        inner join usuario as u on u.id = t.id_usuario
                        inner join categoria as c on c.id = t.id_categoria
                        where t.id = ?;";
            $sth = $conectar->prepare($sql);
            $sth->bindValue(1, $id_ticket);
            $sth->execute();
            return $resultado = $sth->fetchAll();
        }
        public function update_ticket($id_ticket){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE ticket SET estado = 2, fecha_cierre = now() WHERE id =?;";
            $sth = $conectar->prepare($sql);
            $sth->bindValue(1, $id_ticket);
            return   $sth->execute();
        }
}
?>
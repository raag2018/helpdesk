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
       
        public function listarTicket($id_usuario){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = " select
                        t.id,
                        t.id_usuario,
                        t.id_categoria,
                        t.titulo,
                        t.descripcion,
                        u.nombre,
                        u.apellido,
                        c.nombre as categoria
                        FROM ticket as t
                        inner join usuario as u on u.id = t.id_usuario
                        inner join categoria as c on c.id = t.id_categoria
                        where t.estado = 1 and u.id = ?;";
            $sth = $conectar->prepare($sql);
            $sth->bindValue(1, $id_usuario);
            $sth->execute();
            return $resultado = $sth->fetchAll();
        }
    }
?>
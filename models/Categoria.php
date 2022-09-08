<?php 
	class Categoria extends Conectar{
        public function getCategoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM categoria WHERE estado = 1;";
            $sth = $conectar->prepare($sql);
            $sth->execute();
            return $resultado = $sth->fetchAll();
        }
    }
?>
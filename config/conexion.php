<?php 
 	session_start();
	class Conectar{
		protected $dbh;
		protected function Conexion(){
			$server = "localhost";
			$db = "helptest";
			$user = "root";
			$pass = "";
			try{
				$conectar = $this->dbh = new PDO("mysql:local=$server;dbname=$db",$user, $pass);
				return $conectar;
			}catch(Exception $e){
				print "Erro BD: ".$e->getMessage()."<br/>";
				die();
			}
		}
		public function set_names(){
			return $this->dbh->query("SET NAMES 'utf8'");
		}
		public function ruta(){
			return "http://localhost/helpdesk/";
		}
	}

?>

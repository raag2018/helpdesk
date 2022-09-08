<?php 
	class Usuario extends Conectar{
		public function login(){
			$conectar = parent::conexion();
			parent::set_names();
			if(isset($_POST["enviar"])){
				$correo = $_POST["correo"];
				$pass = $_POST["pass"];
				if(empty($correo) && empty($pass)){
					header('Location:'.Conectar::ruta()."index.php?m=2");
					exit();
				}else{
					$sql = "SELECT id, nombre, apellido FROM usuario WHERE correo = ? and pass = ? and estado = 1;";
					$sth = $conectar->prepare($sql);
					$sth->bindValue(1, $correo);
					$sth->bindValue(2, $pass);
					$sth->execute();
					$res = $sth->fetch();
					if(is_array($res) && count($res) > 0){
						$_SESSION["id"] = $res["id"];
						$_SESSION['nombre'] = $res['nombre'];
						$_SESSION['apellido'] = $res['apellido'];
						header('Location:'.Conectar::ruta()."view/home/");
						exit();
					}else{
						header('Location:'.Conectar::ruta()."index.php?m=1");
						exit();
					}
				}
			}
		}
	}
?>

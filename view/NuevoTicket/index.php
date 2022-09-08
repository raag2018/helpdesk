<?php 
	require_once("../../config/conexion.php");
	if(isset($_SESSION["id"])){
		require_once("../main/head.php");?>
<body class="with-side-menu">
<?php require_once("../main/header.php");?>
	<div class="mobile-menu-left-overlay"></div>
    <?php require_once("../main/nav.php");?>
	<div class="page-content">
		<div class="container-fluid">
			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podr&aacute; generar nuevos tickets.
				</p>
				<div class="row">
					<form method='post' id='ticketForm'>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<input type="hidden" name='id_usuario' value="<?php echo $_SESSION["id"]?>">
								<label class="form-label semibold" for="exampleInput">Categoria</label>
								<select name="id_categoria" id="id_categoria" class='form-control'></select>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInputEmail1">Titulo</label>
								<input type="text" class="form-control" id="titulo" name='titulo' 
								placeholder="Ingresa el titulo">
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInputPassword1">Descripci&oacute;n</label>
								<div class="summernote-theme-1">
									<textarea class="summernote" name="descripcion" id='descripcion'></textarea>
								</div>
								<div class="col-lg-12 text-center">
									<button type='submit' name='action' value='Add' class="btn btn-rounded btn-inline btn-primary">Guardar</button>
								</div>
							</fieldset>
						</div>
					</form>
				</div><!--.row-->
			</div>
		</div><!--.container-fluid-->
	</div><!--.page-content-->
<?php 
	require_once("../main/footer.php");
	echo "		<script src='nuevoTicket.js'></script>
		</body>
	</html>";
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>
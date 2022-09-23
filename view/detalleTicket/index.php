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
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Detalle Ticket</h3>
							<span class="label label-pill label-danger">Cerrado</span>
							<span class="label label-pill label-primary">Nombre Usuario</span>
							<span class="label label-pill label-default">fecha creacion</span>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Detalle Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">
				<div class="row">
					<div class="col-lg-6">
						<fieldset class="form-gruop">
							<label for="categoria" class="form-label semibold">Categoria</label>
							<input type="text" class="form-control" id='categoria' name='categoria' readonly>
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-gruop">
							<label for="titulo" class="form-label semibold">Titulo</label>
							<input type="text" class="form-control" id='titulo' name='titulo' readonly>
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-gruop">
							<label for="descripcion" class="form-label semibold">Descripcion</label>
							<input type="text" class="form-control" id='descripcion' name='descripcion' readonly>
						</fieldset>
					</div>
				</div>
			</div>
        	<section class="activity-line" id='lbldetalle'>
				
			</section><!--.activity-line-->
			<div class="box-typical box-typical-padding">
				<p>
					Ingrese su consulta
				</p>
				<div class="row">
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputPassword1">Descripci&oacute;n</label>
							<div class="summernote-theme-1">
								<textarea class="summernote" name="descripcion_detalle" id='descripcion_detalle'></textarea>
							</div>
							<div class="col-lg-12 text-center">
								<button type='submit' name='action' value='Add' class="btn btn-rounded btn-inline btn-primary">Guardar</button>
							</div>
						</fieldset>
					</div>
				</div><!--.row-->
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->
<?php 
	require_once("../main/footer.php");
	echo "		<script src='detalleTicket.js'></script>
			</body>
		</html>";
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>

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
			<div class="box-tipical box-tipical-padding">
				<table class="table table-bordered table-striped table-vcenter js-datatable-full" id='tblTicket'>
					<thead>
						<th>No. Ticket</th>
						<th>Categoria</th>
						<th>titulo</th>
						<th>editar</th>
					</thead>
					<tbody>

					</tbody>
					<tfoot></tfoot>
				</table>
			</div>
			
		</div><!--.container-fluid-->
	</div><!--.page-content-->
<?php 
	require_once("../main/footer.php");
	echo "		<script src='consultarTicket.js'></script>
			</body>
		</html>";
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>

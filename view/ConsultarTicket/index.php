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
							<h3>Consultar Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Consultar Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-tipical box-tipical-padding">
				<table class="table table-bordered table-striped table-vcenter js-datatable-full" id='tblTicket'>
					<thead>
						<th style='width:10%;'>No. Ticket</th>
						<th style='width:15%;'>Categoria</th>
						<th class='d-none d-sm-table-cell' style='width:25%;'>Titulo</th>
						<th class='d-none d-sm-table-cell' style='width:5%;'>Estado</th>
						<th class='d-none d-sm-table-cell' style='width:10%;'>Fecha</th>
						<th class='d-none d-sm-table-cell' style='width:5%;'>editar</th>
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

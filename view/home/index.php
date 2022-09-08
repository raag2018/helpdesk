<?php 
	require_once("../../config/conexion.php");
	if(isset($_SESSION["id"])){
		require_once("../main/head.php");
?>
<body class="with-side-menu">
<?php require_once("../main/header.php");?>
	<div class="mobile-menu-left-overlay"></div>
    <?php require_once("../main/nav.php");?>
	<div class="page-content">
		<div class="container-fluid">
			Home
		</div><!--.container-fluid-->
	</div><!--.page-content-->
	
<?php
	 require_once("../main/footer.php");
	echo "		<script src='home.js'></script>
			</body>
		</html>";
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>
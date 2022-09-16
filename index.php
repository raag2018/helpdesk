<?php 
    require_once("config/conexion.php");
    if(isset($_POST["enviar"]) && $_POST["enviar"] == "si"){
        require_once("models/usuario.php");
        $usuario = new Usuario();
        $usuario->login();
    }    
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Helpdesk</title>
	<meta name='description' content='Calidad con visión de futuro'>
    <meta name='author' content='Universidad Dr. Andres Bello'>
    <link rel='icon' href='https://www.unab.edu.sv/wp-content/uploads/2016/11/cropped-favicon.ico-32x32.png' sizes='32x32'>
    <link rel='icon' href='https://www.unab.edu.sv/wp-content/uploads/2016/11/cropped-favicon.ico-192x192.png' sizes='192x192'>
    <link rel='apple-touch-icon-precomposed' href='https://www.unab.edu.sv/wp-content/uploads/2016/11/cropped-favicon.ico-180x180.png'>
    <meta name='msapplication-TileImage' content='https://www.unab.edu.sv/wp-content/uploads/2016/11/cropped-favicon.ico-270x270.png'>
    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <input type="hidden" id='id_rol' name='id_rol' value='2'>
                <form class="sign-box" method="POST" id="login_form">
                    <div class="sign-avatar">
                        <img src="public/img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title" id='lblTitulo'>Acceso Usuario</header>
                    <div class="form-group">
                        <input type="email" id="correo" name="correo" class="form-control" placeholder="E-Mail"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <!-- div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Mantener Conectado</label>
                        </div -->
                        <div class="float-right reset">
                            <a href="reset-password.html">Cambiar Password</a>
                        </div>
                        <div class="float-left reset">
                            <a href="#" id='btnSoporte'>Acceso Soporte</a>
                        </div>
                    </div>
                    <input type="hidden" name="enviar" value="si">
                    <button type="submit" class="btn btn-rounded">Acceder</button>
                    <!-- p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p -->
                </form>
            </div>
        </div>
    </div><!--.page-center-->
<script src="public/js/lib/jquery/jquery-3.2.1.min.js"></script>
<script src="public/js/lib/popper/popper.min.js"></script>
<script src="public/js/lib/tether/tether.min.js"></script>
<script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="public/js/app.js"></script>
<script src='index.js'></script>
</body>
</html>

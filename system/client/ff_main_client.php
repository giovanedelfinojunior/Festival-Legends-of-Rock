<?php

	$permissao = 1;
	include "../../security/authentication/ff_session_authentication.php";
	include "../../security/authentication/ff_permission_authentication.php";
	include "../../security/database/ff_connection_database.php";
	include "../../addons/php/ff_dboperations_php.php";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="author" content="Giovane Delfino Junior">
		<meta name="description" content="area restrita dos usuarios clientes">
		<meta charset="utf-8">
		<title>Legends of Rock</title>
		<link rel="stylesheet" href="../../layout/css/ff_layout_backend_css.css">
		<link rel="stylesheet" href="../../layout/css/ff_layout_client_css.css">
		<link rel='shortcut icon' href='../../layout/images/logo.jpg'>
		<script type="text/javascript" src="../../addons/js/ff_validate_js.js"></script>
	</head>
	<body>
		<header>
			<img src="../../layout/images/logo.jpg">
			<nav id='topbar'>
				<ul>
					<a href="ff_main_client.php?folder=reservation&file=ff_fmins_reservation&ext=php"><li><span class='icon ticket' ></span>Reserva de Ingressos</li></a>
					<a href="ff_main_client.php?folder=reservation&file=ff_view_reservation&ext=php"><li><span class='icon reservedticket' ></span>Ingressos reservados</li></a>
					<a href="ff_main_client.php?folder=profile&file=ff_view_profile&ext=php"><li><span class='icon profile' ></span>Seu Perfil</li></a>
				</ul>
			</nav>
			<a href="../../security/authentication/ff_logout_authentication.php"><span class='exit' title='Sair'></span></a>
		</header>
		<div id="content">
			<?php
			
				if((isset($_GET['folder']))&&(isset($_GET['file']))&&(isset($_GET['ext']))){
				
					if(!include $_GET['folder'].'/'.$_GET['file'].'.'.$_GET['ext']){	
					
						echo "Página não encontrada!";
		
					}
					
				}else{
				
					if(isset($_GET['msg'])){
					
						$g_msg = $_GET['msg'];
					
					}else{
					
						$g_msg = "Bem vindo Administrador";
					
					}
					include "ff_initial_client.html";
				}
			
			?>
		</div>
		<footer>
			&copy; Copyright 2014 Giovane Delfino Junior. Todos os direitos reservados.
		</footer>
	</body>
</html>

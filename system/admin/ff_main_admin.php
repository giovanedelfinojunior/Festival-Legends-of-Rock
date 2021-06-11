<?php

	$permissao = 0;
	include "../../security/authentication/ff_session_authentication.php";
	include "../../security/authentication/ff_permission_authentication.php";
	include "../../security/database/ff_connection_database.php";//conectando ao banco de dados,só aq precisa disso já que todas as outras paginas estao ligadas a essa;
	include "../../addons/php/ff_dboperations_php.php";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="author" content="Giovane Delfino Junior">
		<meta name="description" content="area restrita dos usuarios administradores">
		<meta charset="utf-8">
		<title>Administração - Pagina Inicial - Legends of Rock</title>
		<link rel="stylesheet" href="../../layout/css/ff_layout_backend_css.css">
		<link rel='shortcut icon' href='../../layout/images/logo.jpg'>
		<script type="text/javascript" src="../../addons/js/ff_validate_js.js"></script>
	</head>
	<body>
		<header>
			<img src="../../layout/images/logo.jpg">
			<h3>Administração - Legends of Rock</h3>
			<a href="../../security/authentication/ff_logout_authentication.php" title="Sair do sistema"><button type="button" class="btnlogout">Sair</button></a>
			<h4>Olá, <a href="#" title="Editar seus dados">Administrador</a></h4>
		</header>
		<div id="sidebar">
			<nav>
				<h4>Gestão de Conteúdo</h4>
				<ul>		
					<a href="ff_main_admin.php?folder=dates&file=ff_fmins_date&ext=php"><li>Registro de Data</li></a><!--enviar para ff_main_admin?pasta=nome da pasta em que o arquivo se encontra&arquivo=nome do arquivo&extenção=ex:php,html-->
					<a href="ff_main_admin.php?folder=bands&file=ff_fmins_band&ext=php"><li>Registro de Banda</li></a>
					<a href="ff_main_admin.php?folder=tickets&file=ff_fmins_ticket&ext=php"><li>Registro de Ingressos Disponíveis por Dia</li></a>
					<a href="ff_main_admin.php?folder=sponsors&file=ff_fmins_sponsor&ext=php"><li>Registro de Patrocinador</li></a>
				</ul>
				<h4>Gestão de Negócio</h4>
				<ul>
					<a href="ff_main_admin.php?folder=users&file=ff_fmins_user&ext=php"><li>Registro de Administrador</li></a>
					<a href="ff_main_admin.php?folder=reservations&file=ff_view_reservation&ext=php"><li>Declinar Reservas</li></a>
					<a href="ff_main_admin.php?folder=reports&file=ff_viewreservation_report&ext=php"><li>Relatório de Ingressos Reservados</li></a>
					<a href="ff_main_admin.php?folder=reports&file=ff_viewfinancial_report&ext=php"><li>Relatório Financeiro</li></a>
				</ul>
			</nav>
		</div>
		<div id="content">
			<?php
								
				if((isset($_GET['folder']))&&(isset($_GET['file']))&&(isset($_GET['ext']))){//verificar se existem valores GET na URL; 
					
					if(!include $_GET['folder']."/".$_GET['file'].".".$_GET['ext']){//se nao for incluído o arquivo, exibir mensagem de erro;
					
						echo "Página não encontrada!";
					
					}
					
				}else{						
						
					if(isset($_GET['msg'])){//verificando se existe mensagem de erro;
					
						$g_msg = $_GET['msg'];
					
					}else{
						
						$g_msg = "Bem vindo Administrador";
					
					}
					include "ff_initial_admin.php";//conectando a página com a mensagem de bem vindo;
				}
		

			?>
		</div>
		<footer>
			&copy; Copyright 2014 Giovane Delfino Junior. Todos os direitos reservados.
		</footer>
	</body>
</html>
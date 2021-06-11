<?php

	$permissao = 1;
	include "../../security/authentication/ff_session_authentication.php";
	include "../../security/authentication/ff_permission_authentication.php";

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
	</head>
	<body>
		<header>
			<img src="../../layout/images/logo.jpg">
			<nav id='topbar'>
				<ul>
					<a href="profile/ff_fmins_reservation.php"><li><span class='icon ticket' ></span>Reserva de Ingressos</li></a>
					<li><span class='icon reservedticket' ></span>Ingressos reservados</li>
					<li><span class='icon profile' ></span>Seu Perfil</li>
				</ul>
			</nav>
			<a href="../../security/authentication/ff_logout_authentication.php"><span class='exit' title='Sair'></span></a>
		</header>
		<div id="content">
			<h2> Aviso </h2>
			<?php

			$msg="Sua reserva foi efetuada!";
			$imagem="done_icon.png"; // alert_icon.png para erro.

			?>
			<div id='mensagem'>
				<h1><img src="../../layout/images/<?php echo $imagem ?>" height='60px' width='60px'> <?php echo $msg; ?></h1>
				<a href="#"><button type="button">Retornar</button></a>
			</div>
		</div>
		<footer>
			&copy; Copyright 2014 Giovane Delfino Junior. Todos os direitos reservados.
		</footer>
	</body>
</html>

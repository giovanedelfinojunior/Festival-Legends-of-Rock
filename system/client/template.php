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
					<a href="reservation/ff_fmins_reservation.php"><li><span class='icon ticket' ></span>Reserva de Ingressos</li></a>
					<li><span class='icon reservedticket' ></span>Ingressos reservados</li>
					<li><span class='icon profile' ></span>Seu Perfil</li>
				</ul>
			</nav>
			<a href="../../security/authentication/ff_logout_authentication.php"><span class='exit' title='Sair'></span></a>
		</header>
		<div id="content">
			<h2> Título</h2>
			<fieldset>
				<form name="#" method="post" action="#">
					<table>
						<tr>
							<td width="40%">Select:</td>
							<td>
								<select name="selselect">
									<option value="0">Escolha...</option>
									<option value="1">Opção 1</option>
									<option value="2">Opção 2</option>
									<option value="3">Opção 3</option>
								</select>
							</td>
						</tr>
						<tr>
							<td width="40%">Input de Texto:</td>
							<td><input type="text" name="txta" placeholder="aaaa-mm-dd" maxlength="10"></td>
						</tr>
						<tr>
							<td width="40%">Input de Texto:</td>
							<td><input type="text" name="txtb" placeholder="aaaa-mm-dd" maxlength="10"></td>
						</tr>

						<tr>
							<td colspan="2" align="center"><button type="reset">Limpar</button><button type="submit">Reservar</button></td>
						</tr>
					</table>
				</form>
			</fieldset>
		</div>
		<footer>
			&copy; Copyright 2014 Giovane Delfino Junior. Todos os direitos reservados.
		</footer>
	</body>
</html>

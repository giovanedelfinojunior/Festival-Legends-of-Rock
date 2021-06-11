<!DOCTYPE html>
<html>
	<head>
		<meta name="author" content="Giovane Delfino Junior">
		<meta name="description" content="area restrita dos usuarios administradores">
		<meta charset="utf-8">
		<title>Administração - Legends of Rock</title>
		<link rel="stylesheet" href="../../layout/css/ff_layout_backend_css.css">
		<link rel='shortcut icon' href='../../layout/images/logo.jpg'>
	</head>
	<body>
		<header>
			<img src="../../layout/images/logo.jpg">
			<h3>Administração - Legends of Rock</h3>
			<a href="#" title="Sair do sistema"><button type="button" class="btnlogout">Sair</button></a>
			<h4>Olá, <a href="#" title="Editar seus dados">Administrador</a></h4>
		</header>
		<div id="sidebar">
			<nav>
				<h4>Gestão de Conteúdo</h4>
				<ul>		
					<a href="#"><li class="active-menu">Registro de Data</li></a>
					<li>Registro de Banda</li>
					<li>Registro de Ingressos Disponíveis por Dia</li>
					<li>Registro de Patrocinador</li>
				</ul>
				<h4>Gestão de Negócio</h4>
				<ul>
					<li>Registro de Administrador</li>
					<li>Declinar Reservas</li>
					<li>Relatório de Ingressos Reservados</li>
					<li>Relatório Financeiro</li>
				</ul>
			</nav>
		</div>
		<div id="content">
			<fieldset>
				<legend>Modelo de Cadastro</legend>
				<form name="frmcaddate" method="post" action="#">
					<table>
						<tr>
							<td width="40%">Input de Texto:</td>
							<td><input type="text" name="txtdate" placeholder="aaaa-mm-dd" maxlength="10"></td>
						</tr>
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
							<td width="40%">Textarea</td>
							<td><textarea name="txtdescricao"></textarea></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><button type="reset">Limpar</button><button type="submit">Salvar</button></td>
						</tr>
					</table>
				</form>
			</fieldset>
			<h4>Registros</h4>
			<table border="1" width="550">
				<thead>
					<tr>
						<th width="15%">Campo 1</th>
						<th width="25%">Campo 2</th>
						<th width="30%">Campo 3</th>
						<th width="10%">Editar</th>
						<th width="10%">Excluir</th>
						<th width="10%">Declinar</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>V1</td>
						<td>Valor</td>
						<td>Valor</td>
						<td align="center"><a href="#" title="Editar registro"><img src="../../layout/images/edit.png"></a></td>
						<td align="center"><a href="#" title="Excluir registro"><img src="../../layout/images/delete.png"></a></td>
						<td align="center"><a href="#" title="Declinar reserva"><img src="../../layout/images/decline.png"></a></td>
					</tr>
					<tr>
						<td>V2</td>
						<td>Valor</td>
						<td>Valor</td>
						<td align="center"><a href="#" title="Editar registro"><img src="../../layout/images/edit.png"></a></td>
						<td align="center"><a href="#" title="Excluir registro"><img src="../../layout/images/delete.png"></a></td>
						<td align="center"><a href="#" title="Declinar reserva"><img src="../../layout/images/decline.png"></a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<footer>
			&copy; Copyright 2014 Giovane Delfino Junior. Todos os direitos reservados.
		</footer>
	</body>
</html>
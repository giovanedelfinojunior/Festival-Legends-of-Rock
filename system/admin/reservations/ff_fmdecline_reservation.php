<fieldset>
<?php

	$g_codigo = $_GET['codigo'];
?>
	<legend>Declinar Reserva</legend>
	<form name="frmdeclinar" method="post" action="ff_main_admin.php?folder=reservations&file=ff_decline_reservation&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">Código:</td>
				<td><input type="text" name="txtcodigo" value="<?php echo $g_codigo; ?>" readonly="readonly"></td>
			</tr>
			<tr>
				<td width="40%">*Motivo:</td>
				<td>
					<select name="selmotivo">
						<option value="">Selecione</option>
						<option value="D">Documentação Inválida</option>
						<option value="S">Dados Inválidos/Suspeitos</option>
						<option value="O">Outros</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="ff_main_admin.php?folder=reservations&file=ff_view_reservation&ext=php"><button type="button">Retornar</button><button type="submit">Declinar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
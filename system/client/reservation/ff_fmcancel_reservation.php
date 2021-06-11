<h2>Reservar Ingressos</h2>
<fieldset>
	<?php
	
		$g_cod = $_GET['codigo'];
		
	?>
	<form name="frmcanceladas" method="post" action="ff_main_client.php?folder=reservation&file=ff_cancel_reservation&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Código da Reserva:</td>
				<td><input type="text" name="txtcodigo" value="<?php echo $g_cod; ?>"  readonly="readonly"></td>
			</tr>
			<tr>
				<td width="40%">*Motivo:</td>
				<td>
					<select name="selmotivo">
						
						<option value="">Escolha...</option>
						<option value="F">Financeiro</option>
						<option value="I">Insatisfação</option>
						<option value="E">Evento mais importante</option>
						<option value="A">Adversidade familiar</option>
						<option value="O">Outros</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="ff_main_client.php?folder=reservation&file=ff_view_reservation&ext=php"><button type="button">Retornar</button></a><button type="submit">Cancelar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
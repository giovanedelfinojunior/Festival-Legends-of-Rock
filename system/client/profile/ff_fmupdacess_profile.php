<h2>Alterar Perfil de Acesso</h2>
<fieldset>
	<form name="frmcliente" method="post" action="ff_main_client.php?folder=profile&file=ff_updacess_profile&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Usuário:</td>
				<td><input type="text" name="txtusuario" value="<?php echo $_SESSION['usuario']; ?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td width="40%">*Senha:</td>
				<td><input type="password" name="pwdsenha" placeHolder="Digite sua nova senha"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="ff_main_client.php?folder=profile&file=ff_view_profile&ext=php"><button type="button">Retornar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php

	$conexao->close();
	
?>
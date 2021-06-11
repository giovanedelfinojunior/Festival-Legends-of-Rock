<?php 

	$g_id = $_GET['id'];
	
	$sql_sel_usuarios="SELECT login FROM usuarios WHERE id='".$g_id."'";
	
	$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);
	
	$sql_sel_usuarios_dados = $sql_sel_usuarios_resultado->fetch_array();
	
?>
<fieldset>
	<legend>Alteração de dados de Administrador</legend>
	<form name="frmrgtadm" method="post" action="ff_main_admin.php?folder=users&file=ff_upd_user&ext=php">
		<input type='hidden' name="hidid" value="<?php echo $g_id; ?>">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">Usuário:</td>
				<td><input type="text" name="txtnome" maxlength="50" value="<?php echo $sql_sel_usuarios_dados['login'] ?>"></td>
			</tr>
			<tr>
				<td width="40%">*Senha:</td>
				<td><input type="password" name="pwdsenha" maxlength="50"></td>
			</tr>					
			<tr>
				<td colspan="2" align="center"><a href="ff_main_admin.php?folder=users&file=ff_fmins_user&ext=php"><button type="button">Retornar</button></a><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
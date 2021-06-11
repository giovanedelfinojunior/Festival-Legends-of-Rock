<fieldset>
	<legend>Registro de Administrador</legend>
	<form name="frmrgtadm" method="post" action="ff_main_admin.php?folder=users&file=ff_ins_user&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Usuário:</td>
				<td><input type="text" name="txtnome" maxlength="50"></td>
			</tr>
			<tr>
				<td width="40%">*Senha:</td>
				<td><input type="password" name="pwdsenha" maxlength="50"></td>
			</tr>					
			<tr>
				<td colspan="2" align="center"><button type="reset">Limpar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php
	
	$sql_sel_usuarios = "SELECT id, login FROM usuarios WHERE permissao = '0' ";//selecionando colunas id e login da tabela usuários;
	
	$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);
?>
<h4>Administradores Registrados</h4>
<table border="1" width="550">
	<thead>
		<tr>
			<th width="70%">Usuário</th>
			<th width="10%">Editar</th>
			<th width="10%">Excluir</th>
		</tr>
	</thead>
	<tbody>
	
	<?php 
		$sql_sel_usuarios_resultado->num_rows;//num_rows armazena o resultado da consulta.
		if($sql_sel_usuarios_resultado->num_rows == 0){
	?>	

	 <tr>
			<td colspan='3'>Nenhum registro foi encontrado!</td>
	</tr>;
	
	<?php	
		}else{
				while ($sql_sel_usuarios_dados = $sql_sel_usuarios_resultado->fetch_array()) {
				$nome = $sql_sel_usuarios_dados['login'];
	?>
	
	<tr>
		<td><?php echo $nome; ?></td>
		<td align="center"><a href="ff_main_admin.php?folder=users&file=ff_fmupd_user&ext=php&id=<?php echo $sql_sel_usuarios_dados['id']; ?>" title="Editar registro"><img src="../../layout/images/edit.png"></a></td>
		<td align="center"><a href="ff_main_admin.php?folder=users&file=ff_del_user&ext=php&id=<?php echo $sql_sel_usuarios_dados['id']; ?>" title="Excluir registro" onClick="return deletar('usuário','<?php echo $nome; ?>')"><img src="../../layout/images/delete.png"></a></td>
	</tr>
	
	<?php } 
	}?>
		
	</tbody>
</table>
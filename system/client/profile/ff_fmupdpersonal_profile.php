<h2>Alterar Perfil Pessoal</h2>
<fieldset>
	<?php
		
		$sql_sel_clientes = "SELECT * FROM clientes WHERE usuarios_id='".$_SESSION['idUsuario']."'";
		$sql_sel_clientes_resultado = $conexao->query($sql_sel_clientes);
		$sql_sel_clientes_dados = $sql_sel_clientes_resultado->fetch_array();
	
	?>
	<form name="frmcliente" method="post" action="ff_main_client.php?folder=profile&file=ff_updpersonal_profile&ext=php">
		<input type="hidden" name="hidid" value="<?php echo $sql_sel_clientes_dados['id']; ?>">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Nome Completo:</td>
				<td><input type="text" name="txtnome" value="<?php echo $sql_sel_clientes_dados['nome']; ?>" maxlength="45"></td>
			</tr>
			<tr>
				<td width="40%">*Data de Nascimento:</td>
				<?php
				
					$data = $sql_sel_clientes_dados['nascimento'];
					$data = explode('-',$data);
					$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
					
				?>
				<td><input type="text" name="txtdata" value="<?php echo $org_data; ?>"></td>
			</tr>						
				<tr>			
					<td align='right'>*Tipo de Documento:</td> 
					<td>	
						<select name='seltipodoc' >
							<option value="1" <?php if($sql_sel_clientes_dados['tipo_doc'] == 1){ echo "selected"; }?>>CPF</option>	
							<option value="2" <?php if($sql_sel_clientes_dados['tipo_doc'] == 2){ echo "selected"; }?>>RG</option>
							<option value="3" <?php if($sql_sel_clientes_dados['tipo_doc'] == 3){ echo "selected"; }?>>Passaporte</option>	
						</select>
				</td>
			<tr>
				<td width="40%">*Número do Documento:</td>
				<td><input type="text" name="txtnumdoc" value="<?php echo $sql_sel_clientes_dados['num_doc']; ?>"></td>
			</tr>
			<tr>
				<td width="40%">*Telefone:</td>
				<td><input type="text" name="txttelefone" value="<?php echo $sql_sel_clientes_dados['telefone']; ?>"></td>
			</tr>
			<tr>
				<td width="40%">*E-mail:</td>
				<td><input type="text" name="txtemail" value="<?php echo $sql_sel_clientes_dados['email']; ?>"></td>
			</tr>

			<tr>
				<td colspan="2" align="center"><a href="ff_main_client.php?folder=profile&file=ff_view_profile&ext=php"><button type="button">Retornar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
	<?php
	
		$conexao->close();
		
	?>
</fieldset>
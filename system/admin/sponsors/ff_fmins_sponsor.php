<fieldset>
	<legend>Registro de Patrocinador</legend>
	<form name="frmrgtpatroc" method="post" action="ff_main_admin.php?folder=sponsors&file=ff_ins_sponsor&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Nome:</td>
				<td><input type="text" name="txtnome" maxlength="45"></td>
			</tr>
			<tr>
				<td width="40%">*Url da Imagem:</td>
				<td><textarea name="txaurlimg"  placeHolder="http://"></textarea></td>
			</tr>					
			<tr>
				<td colspan="2" align="center"><button type="reset">Limpar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php

$sql_sel_patrocinadores = "SELECT id, nome FROM patrocinadores";//selecionado as colunas id e nome da tabela patrocinadores;

$sql_sel_patrocinadores_resultado = $conexao-> query($sql_sel_patrocinadores);//consultando as colunas selecionadas da tabela patrocinadores;

?>
<h4>Patrocinadores Registrados</h4>
<table border="1" width="550">
	<thead>
		<tr>
			<th width="15%">ID</th>
			<th width="55%">Nome</th>
			<th width="10%">Editar</th>
			<th width="10%">Excluir</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
			if($sql_sel_patrocinadores_resultado->num_rows == 0){//se o numero de  linhas for igual a zero, nenhum registro foi encontrado; 
		
		?>
		
		<tr>
			<td colspan='4'>Nenhum registro foi encontrado!</td>
		</tr>
		
		<?php
		}else{//se mais de zero linhas, algum registro foi encontrado, e seu conteúdo precisa ser obtido;

				while($sql_sel_patrocinadores_dados = $sql_sel_patrocinadores_resultado->fetch_array()) {//Criando vetor para obter o conteúdo;
				$nome = $sql_sel_patrocinadores_dados['nome'];;
		?>
		
		<tr>
			<td><?php echo $sql_sel_patrocinadores_dados['id']; ?></td>
			<td><?php echo $nome; ?></td>
			<td align="center"><a href="ff_main_admin.php?folder=sponsors&file=ff_fmupd_sponsor&ext=php&id=<?php echo $sql_sel_patrocinadores_dados['id']; ?>" title="Editar registro"><img src="../../layout/images/edit.png"></a></td>
			<td align="center"><a href="ff_main_admin.php?folder=sponsors&file=ff_del_sponsor&ext=php&id=<?php echo $sql_sel_patrocinadores_dados['id'] ?>" title="Excluir registro" onClick="return deletar('patrocinador','<?php echo $nome; ?>')"><img src="../../layout/images/delete.png"></a></td>
		</tr>
		
		<?php
			}
		}
		$conexao->close();
		?>
	</tbody>
</table>
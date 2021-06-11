<fieldset>

	<?php
		
		$sql_sel_datas = "SELECT id, dia, descricao FROM datas";//selecionando as colunas id, dia e descricao da tabela datas;
		
		$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);//cosultando as colunadas selecionadas ta tabela;
		
	?>
	
	<legend>Registro de Data</legend>
	<form name="frmrgtdata" method="post" action="ff_main_admin.php?folder=dates&file=ff_ins_date&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Data:</td>
				<td><input type="text" name="txtdata" placeholder="DD/MM/AAAA" maxlength="10"></td>
			</tr>
			<tr>
				<td width="40%">*Descrição:</td>
				<td><textarea name="txadescricao" placeHolder="Breve Descrição"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"  placeHolder="Breve Descrição"><button type="reset">Limpar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<h4>Datas Registradas</h4>
<table border="1" width="550">
	<thead>
		<tr>
			<th width="15%">ID</th>
			<th width="25%">Data</th>
			<th width="30%">Descrição</th>
			<th width="10%">Editar</th>
			<th width="10%">Excluir</th>
		</tr>
	</thead>
	<tbody>
	
		<?php
		
			if($sql_sel_datas_resultado->num_rows == 0){//Verificando se estão vazios;
		
		?>
		
		<tr>
			<td colspan="5">Nenhum registro encontrado!</td>
		</tr>
		
		<?php
		
			}else{//se nao estiverem vazios, esse conteúdo irá para a tabela;
			
				while($sql_sel_datas_dados = $sql_sel_datas_resultado->fetch_array()){//Criando um vetor para coletar o conteúdo;
				
					$data = $sql_sel_datas_dados['dia'];
					$data = explode('-',$data);
					$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
					$nome = $org_data;
		?>
		<tr>
			<td><?php echo $sql_sel_datas_dados['id']; ?></td>
			<td><?php echo $org_data; ?></td>
			<td><?php echo $sql_sel_datas_dados['descricao']; ?></td>
			<td align="center"><a href="ff_main_admin.php?folder=dates&file=ff_fmupd_date&ext=php&id=<?php echo $sql_sel_datas_dados['id']; ?>" title="Editar registro"><img src="../../layout/images/edit.png"></a></td>
			<td align="center"><a href="ff_main_admin.php?folder=dates&file=ff_del_date&ext=php&id=<?php echo $sql_sel_datas_dados['id']; ?>" title="Excluir registro" onClick="return deletar('data','<?php echo $nome; ?>')"><img src="../../layout/images/delete.png"></a></td>
		</tr>
		<?php
			}
		}
		$conexao->close(); 
		?>

	</tbody>
</table>
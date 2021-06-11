<fieldset>
	<legend>Registro de Banda</legend>
	<form name="frmbanda" method="post" action="ff_main_admin.php?folder=bands&file=ff_ins_band&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Nome:</td>
				<td><input type="text" name="txtnome" maxlength="45"></td>
			</tr>
			<tr>
				<td width="40%">*Descrição:</td>
				<td><textarea name="txadescricao"  placeHolder="Breve descrição"></textarea></td>
			</tr>
			<tr>
				<td width="40%">*Url da Imagem:</td>
				<td><textarea name="txaurlimg"  placeHolder="http://"></textarea></td>
			</tr>
			<tr>
				<td width="40%">*Data do Evento:</td>
				<td>
					<select name="seldata">
						<option value="">-Escolha-</option>
						
						<?php

							
							$sql_sel_datas = "SELECT id,dia FROM datas ORDER BY dia ASC";
							$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);
							
							while($sql_sel_datas_dados = $sql_sel_datas_resultado->fetch_array()){//coletando os valores da consultado e colocando-os em um vetor,isso acontecerá enquando ouver conteúdo a ser coletado;
								
								$data = $sql_sel_datas_dados['dia'];
								$data = explode('-',$data);
								$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
						?>
						
								<option value="<?php echo $sql_sel_datas_dados['id']; //atribuindo o valor do id da data como valor?>"><?php echo $org_data; //exibindo o valor de dia no campo select?></option>
							
						<?php
						
							}
						
						?>
						
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><button type="reset">Limpar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<h4>Bandas Registradas</h4>
<table border="1" width="550">
	<thead>
		<tr>
			<th width="15%">ID</th>
			<th width="25%">ID Data</th>
			<th width="30%">Nome</th>
			<th width="10%">Editar</th>
			<th width="10%">Excluir</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			
			
			$sql_sel_bandas = "SELECT bandas.*,
									  datas.dia
							   FROM   bandas 
							   INNER JOIN datas ON(datas.id = bandas.datas_id)";//selecionando todas as colunas de bandas e a coluna dia na tabela datas;
			$sql_sel_bandas_resultado = $conexao->query($sql_sel_bandas);

		
			if($sql_sel_bandas_resultado->num_rows == 0){//se o numero de bandas registradas for igual a zero
		
		?>

		<tr>
			<td colspan = "5">Nenhum Registro Encontrado!</td>
		</tr>	
		
		<?php
		
			
			}else{//se o numero de bandas for maior que zero;
				while($sql_sel_bandas_dados = $sql_sel_bandas_resultado->fetch_array()){//enquanto houver valores, armazenar em um vetor até que nao aja mais nenhum;
				$nome = $sql_sel_bandas_dados["nome"];
		?>
		
		<tr>
			<td><?php echo $sql_sel_bandas_dados["id"];?></td>
			<td><?php echo $sql_sel_bandas_dados["datas_id"];?></td>
			<td><?php echo $nome; ?></td>
			<td align="center"><a href="ff_main_admin.php?folder=bands&file=ff_fmupd_band&ext=php&id=<?php echo $sql_sel_bandas_dados['id']; ?>" title="Editar registro"><img src="../../layout/images/edit.png"></a></td>
			<td align="center"><a href="ff_main_admin.php?folder=bands&file=ff_del_band&ext=php&id=<?php echo $sql_sel_bandas_dados['id']; ?>" title="Excluir registro" onClick="return deletar('banda','<?php echo $nome; ?>')"><img src="../../layout/images/delete.png"></a></td>
		</tr>
		
		<?php
		
				}//fechando while;
			}//fechando else;
			
			$conexao->close();//fechando a conexao;
		?>
		
	</tbody>
</table>
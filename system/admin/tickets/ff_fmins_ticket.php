<fieldset>
	<legend>Registro de Ingressos Disponíveis por Dia</legend>
	<form name="frmrgtingdia" method="post" action="ff_main_admin.php?folder=tickets&file=ff_ins_ticket&ext=php">
		<table>
		<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Data do Evento:</td>
				<td>
					<select name="seldata">
						<option value="">-Escolha-</option>
						<?php
						
							$sql_sel_datas = "SELECT id,dia FROM datas ORDER BY dia ASC";//selecionando as colunas id e dia na tabela datas em ordem ascendente(crescente) para exibir no campo select;
							$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);//consultando as colunas id e dia da tabela datas selecionadas anteriormente;
						
							while($sql_sel_datas_dados = $sql_sel_datas_resultado->fetch_array()){//enquanto ouver valores a serem armazenados,serao armazenados em vetores;
							
								$data = $sql_sel_datas_dados['dia'];
								$data = explode('-',$data);
								$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
						?>
						
								<option value="<?php echo $sql_sel_datas_dados['id']; ?>"><?php echo $org_data; ?></option>
						
						<?php
						
							}
						
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="40%">*Quantidade de Ingressos Normais:</td>
				<td><input type="text" name="txtqtdenormal" placeHolder="0000" maxlength="5"></td>
			</tr>
			<tr>
				<td width="40%">*Valor dos ingressos Normais:</td>
				<td><input type="text" name="txtvalornormal" placeHolder="000.00" maxlength="8"></td>
			</tr>
			<tr>
				<td width="40%">*Quantidade de Ingressos VIPs:</td>
				<td><input type="text" name="txtqtdevip" placeHolder="000" maxlength="5"></td>
			</tr>	
			<tr>
				<td width="40%">*Valor dos ingressos VIPs:</td>
				<td><input type="text" name="txtvalorvip" placeHolder="000.00" maxlength="8"></td>
			</tr>						
			<tr>
				<td colspan="2" align="center"><button type="reset">Limpar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<h4>Ingressos Disponiveis por Dia Registrados</h4>
<table border="1" width="550">
	<thead>
		<tr>
			<th width="15%">ID Data</th>
			<th width="15%">Qtde. Normais</th>
			<th width="30%">Valor Normais</th>						
			<th width="15%">Qtde. VIPs</th>
			<th width="30%">Valor VIPs</th>
			<th width="10%">Editar</th>
			<th width="10%">Excluir</th>
		</tr>
	</thead>
	<tbody>
	
		<?php
		
							
			$sql_sel_ingressos = "SELECT ingressosdisponiveis.*,
										 datas.dia
										 FROM ingressosdisponiveis
										 INNER JOIN datas ON(datas.id = ingressosdisponiveis.datas_id)";//selecionando todas as colunas da tabela ingrssodisponiveis e a coluna dia da tabela datas;
			$sql_sel_ingressos_resultado = $conexao->query($sql_sel_ingressos);//consultando as colunas selecionadas;
	
		
			if($sql_sel_ingressos_resultado->num_rows == 0){//se a consulta gerou 0 linhas;
		
		?>
		
		<tr>
			<td  colspan = "7">Nenhum Registro Encontrado!</td>
		</tr>
		
		<?php
		
			}else{//se a conssulta gerou mais que 0 linhas;
				while($sql_sel_ingressos_dados = $sql_sel_ingressos_resultado->fetch_array()){//armazenar valores em vetores;
				$nome = $sql_sel_ingressos_dados['datas_id'];
		?>
		 
		<tr>
			<td><?php echo $sql_sel_ingressos_dados['datas_id']; ?></td>
			<td><?php echo $sql_sel_ingressos_dados['qtde_normal']; ?></td>
			<td>R$ <?php echo number_format($sql_sel_ingressos_dados['valor_normal'],2,',','.'); ?></td>
			<td><?php echo $sql_sel_ingressos_dados['qtde_vip']; ?></td>
			<td>R$ <?php echo number_format($sql_sel_ingressos_dados['valor_vip'],2,',','.'); ?></td>
			<td align="center"><a href="ff_main_admin.php?folder=tickets&file=ff_fmupd_ticket&ext=php&id=<?php echo $sql_sel_ingressos_dados['id'] ?>" title="Editar registro"><img src="../../layout/images/edit.png"></a></td>
			<td align="center"><a href="ff_main_admin.php?folder=tickets&file=ff_del_ticket&ext=php&id=<?php echo $sql_sel_ingressos_dados['id']?>" title="Excluir registro" onClick="return deletar('ingressos disponiveis','<?php echo $nome; ?>')"><img src="../../layout/images/delete.png"></a></td>
		</tr>
		
		<?php
				}
			}
			$conexao->close();//fechando a conexao com o banco de dados;
		?>
	</tbody>
</table>
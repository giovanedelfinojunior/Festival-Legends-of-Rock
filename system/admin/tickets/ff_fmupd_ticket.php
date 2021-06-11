<fieldset>
	<?php
	
	$g_id = $_GET['id'];
		
	$sql_sel_ingressos = "SELECT id,datas_id,qtde_normal,valor_normal,qtde_vip,valor_vip FROM ingressosdisponiveis WHERE id='".$g_id."'";//selecionando colunas  id,qtde_normal,valor_normal,qtde_vip,valor_vip da tabela ingressosdisponiveis, onde id for igual ao id do elemento que será editado;
	$sql_sel_ingressos_resultado = $conexao->query($sql_sel_ingressos);//consultando as colunas selecionadas na tabela ingressos;
	$sql_sel_ingressos_dados = $sql_sel_ingressos_resultado->fetch_array();//coletando dados da consulta e colocando-os em vetores
	
	?>
	
	<legend>Registro de Ingressos Disponíveis por Dia</legend>
	<form name="frmrgtingdia" method="post" action="ff_main_admin.php?folder=tickets&file=ff_upd_ticket&ext=php">
		<input type="hidden" name="hidid" value="<?php echo $sql_sel_ingressos_dados['id']; ?>">
		<table>
		<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Data do Evento:</td>
				<td>
					<select name="seldata">
						<?php
						
							$sql_sel_datas = "SELECT id,dia FROM datas ORDER BY dia ASC";//selecionando o id e o dia(data) da tabela datas ordenando na ordem crescente para ser exibida no campo select;
							$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);//consultando as colunas selecionadas da tabela datas;
						
							while($sql_sel_datas_dados = $sql_sel_datas_resultado->fetch_array()){//armazenando valores da consulta em um vetor;
							
								$opc_selecionada = "";
							
								if($sql_sel_datas_dados['id'] == $sql_sel_ingressos_dados['datas_id']){//se o id da data é igual ao dia de ingrssos registrados;
								
									$opc_selecionada = "selected";
								
								}
											$data = $sql_sel_datas_dados['dia'];
											$data = explode('-',$data);
											$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];								
						?>
						
								<option value="<?php echo $sql_sel_datas_dados['id']; ?>" <?php echo $opc_selecionada;?>><?php echo $org_data; ?></option>
						
						<?php
					
							}
						
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="40%">*Quantidade de Ingressos Normais:</td>
				<td><input type="text" name="txtqtdenormal" value="<?php echo $sql_sel_ingressos_dados['qtde_normal']; ?>" maxlength="5"></td>
			</tr>
			<tr>
				<td width="40%">*Valor dos ingressos Normais:</td>
				<td><input type="text" name="txtvalornormal" value="<?php echo $sql_sel_ingressos_dados['valor_normal']; ?>" maxlength="8"></td>
			</tr>
			<tr>
				<td width="40%">*Quantidade de Ingressos VIPs:</td>
				<td><input type="text" name="txtqtdevip" value="<?php echo $sql_sel_ingressos_dados['qtde_vip']; ?>" maxlength="5"></td>
			</tr>	
			<tr>
				<td width="40%">*Valor dos ingressos VIPs:</td>
				<td><input type="text" name="txtvalorvip" value="<?php echo $sql_sel_ingressos_dados['valor_vip']; ?>" maxlength="8"></td>
			</tr>						
			<tr>
				<td colspan="2" align="center"><a href="ff_main_admin.php?folder=tickets&file=ff_fmins_ticket&ext=php"><button type="button">Retornar</button><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
	<?php
	
		$conexao->close();//fechando conexao com o banco de dados;
	
	?>
</fieldset>
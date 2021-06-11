<h2>Reservar Ingressos</h2>
<fieldset>
	<form name="frmreservas" method="post" action="ff_main_client.php?folder=reservation&file=ff_ins_reservation&ext=php">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Data:</td>
				<td>
					<select name="seldata">
						
						<option value="">Escolha...</option>
							
						<?php
						
												
							$sql_sel_datas = "SELECT datas.dia,
													 datas.id
											  FROM datas
											  INNER JOIN ingressosdisponiveis ON(datas.id = ingressosdisponiveis.datas_id)										  
											  ORDER BY dia ASC";
							$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);
	
						
							while($sql_sel_datas_dados = $sql_sel_datas_resultado->fetch_array()){
						
						?>
						
							<option value="<?php echo $sql_sel_datas_dados['id']; ?>"><?php echo $sql_sel_datas_dados['dia']; ?></option>
						
						<?php
						
							}
						
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="40%">*Qtde. Ingressos Normais:</td>
				<td><input type="text" name="txtqtdenormal" maxlength="1"></td>
			</tr>
			<tr>
				<td width="40%">*Qtde. Ingressos VIPs:</td>
				<td><input type="text" name="txtqtdevip" maxlength="1"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><button type="reset">Limpar</button><button type="submit">Reservar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<h3>Preço dos Ingressos</h3>
<fieldset>
	<table>
				<?php
					$sql_sel_ingressosdisponiveis = "SELECT ingressosdisponiveis.valor_normal,
															ingressosdisponiveis.valor_vip ,
															datas.dia
													FROM ingressosdisponiveis
													INNER JOIN datas ON(datas.id = ingressosdisponiveis.datas_id)
													ORDER BY datas.dia";
					$sql_sel_ingressosdisponiveis_resultado = $conexao->query($sql_sel_ingressosdisponiveis);
					
					if($sql_sel_ingressosdisponiveis_resultado->num_rows == 0){
					
						echo "O valor dos ingressos não está disponivel no momento!";
					
					}else{
				?>
						<thead>
							<th>Dia</th>
							<th>R$ Normal</th>
							<th>R$ VIP</th>
						</thead>
						<tbody>
				<?php
						while($sql_sel_ingressosdisponiveis_dados = $sql_sel_ingressosdisponiveis_resultado->fetch_array()){
							$data = $sql_sel_ingressosdisponiveis_dados['dia'];
							$data = explode('-',$data);
							$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
				?>
						<tr>
							<td><?php echo $org_data; ?></td>
							<td>R$ <?php echo number_format($sql_sel_ingressosdisponiveis_dados['valor_normal'],2,',','.'); ?></td>
							<td>R$ <?php echo number_format($sql_sel_ingressosdisponiveis_dados['valor_vip'],2,',','.'); ?></td>
						</tr>
				<?php	
						}
					}
					$conexao->close();
				?>
			</tbody>
			</table>
		</fieldset>
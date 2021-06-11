<h2>Reservas Realizadas</h2>
<br />
<table class="tabela_reservas">
	<thead>
		<tr>
			<th>Código</th>
			<th>Data</th>
			<th>Qtde. Normais</th>
			<th>Qtde. Vips</th>
			<th>Valor Total dos Ingressos Reservados</th>
			<th>Cancelar</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
	//selecionar todas as colunas da tabela reservas e a coluna dia da tabela datas;
	//consultar na tabela reservas;
	//como id de clientes é comum entre os dois(clientes e reservas) utilizamos ela nessa condição;
	//como id de ingressosdisponiveis é comum entre os dois(datas e ingressosdisponiveis) utilizamos ela nessa condição;
	//como id de datas é comum entre os dois(datas e ingressosdisponiveis) utilizamos ela nessa condição;
	//onde o id do usuario é igual ao id do usuario logado;
	$sql_sel_reservas = "SELECT ingressosdisponiveis.valor_normal,
								ingressosdisponiveis.valor_vip,
								reservas.*,
								datas.dia
						FROM reservas 
						INNER JOIN clientes ON(clientes.id = reservas.clientes_id)
						INNER JOIN ingressosdisponiveis ON(ingressosdisponiveis.id = reservas.ingressosdisponiveis_id)
						INNER JOIN datas ON(datas.id = ingressosdisponiveis.datas_id)
						WHERE clientes.usuarios_id='".$_SESSION['idUsuario']."'";
	$sql_sel_reservas_resultado = $conexao->query($sql_sel_reservas);
		
			if($sql_sel_reservas_resultado->num_rows == 0){
			
		?>
			<tr>
				<td colspan="5">Nenhuma reserva efetuada!</td>
			</tr>
		<?php
		
			}else{
				while($sql_sel_reservas_dados = $sql_sel_reservas_resultado->fetch_array()){
				
					$data = $sql_sel_reservas_dados['dia'];
					$data = explode('-',$data);
					$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
		?>
			<tr>
				<td width="15%"><?php echo $sql_sel_reservas_dados['codigo']; ?></td>
				<td width="15%"><?php echo $org_data; ?></td>
				<td width="15%"><?php echo $sql_sel_reservas_dados['qtde_normal']; ?></td>			
				<td width="15%"><?php echo $sql_sel_reservas_dados['qtde_vip']; ?></td>
				<?php
					$valor_total_normal = $sql_sel_reservas_dados['qtde_normal'] * $sql_sel_reservas_dados['valor_normal'];
					$valor_total_vip = $sql_sel_reservas_dados['qtde_vip'] * $sql_sel_reservas_dados['valor_vip'];
					$valor_total = $valor_total_normal + $valor_total_vip;
				?>
				<td width="15%">R$ <?php echo number_format($valor_total,2,',','.'); ?></td>			
				<td width="10%"><a href="ff_main_client.php?folder=reservation&file=ff_fmcancel_reservation&ext=php&codigo=<?php echo $sql_sel_reservas_dados['codigo']; ?>"><img src="../../layout/images/decline.png"></a></td>
			</tr>
		<?php
		
				}
			}
			$conexao->close();
		
		?>
	</tbody>
</table>
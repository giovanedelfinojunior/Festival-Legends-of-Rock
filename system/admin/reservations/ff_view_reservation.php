<h4>Reservas Efetuadas</h4>
<table border="1" width="1100">
	<thead>
		<tr>
			<th>Código</th>
			<th>Cliente</th>
			<th>Tipo do Documento</th>
			<th>Número do Documento</th>
			<th>Telefone</th>
			<th>E-mail</th>
			<th>Data do Evento</th>
			<th>Quant. Normais</th>
			<th>Quant. Vips</th>
			<th>Cancelar</th>
		<tr>
	</thead>
	<tbody>
		<?php
			
			$sql_sel_reservas = "SELECT reservas.*,clientes.*,datas.dia
								 FROM reservas
								 INNER JOIN clientes ON(clientes.id = reservas.clientes_id)
								 INNER JOIN ingressosdisponiveis ON(ingressosdisponiveis.id = reservas.ingressosdisponiveis_id)
								 INNER JOIN datas ON(datas.id = ingressosdisponiveis.datas_id)
								 ORDER BY codigo DESC";
			$sql_sel_reservas_resultado = $conexao->query($sql_sel_reservas);
			
			if($sql_sel_reservas_resultado->num_rows == 0){
		
		?>
		<tr>
			<td colspan="10">Nenhuma Reserva Efetuada!</td>
		</tr>
		<?php
		
			}else{
				while($sql_sel_reservas_dados = $sql_sel_reservas_resultado->fetch_array()){
				
					$tipo_doc = "";
				
					if($sql_sel_reservas_dados['tipo_doc'] == 1){
					
						$tipo_doc = "CPF";
					
					}else if($sql_sel_reservas_dados['tipo_doc'] == 2){
					
						$tipo_doc = "RG";
					
							}else{

								$tipo_doc = "Passaporte";
							
							}
				$data = $sql_sel_reservas_dados['dia'];
				$data = explode('-',$data);
				$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
					
		?>
		<tr>
			<td><?php echo $sql_sel_reservas_dados['codigo']; ?></td>
			<td><?php echo $sql_sel_reservas_dados['nome']; ?></td>
			<td><?php echo $tipo_doc; ?></td>
			<td><?php echo $sql_sel_reservas_dados['num_doc']; ?></td>
			<td><?php echo $sql_sel_reservas_dados['telefone']; ?></td>
			<td><?php echo $sql_sel_reservas_dados['email']; ?></td>
			<td><?php echo $org_data; ?></td>
			<td><?php echo $sql_sel_reservas_dados['qtde_normal']; ?></td>
			<td><?php echo $sql_sel_reservas_dados['qtde_vip']; ?></td>
			<td><a href="ff_main_admin.php?folder=reservations&file=ff_fmdecline_reservation&ext=php&codigo=<?php echo $sql_sel_reservas_dados['codigo'] ?>"><img src="../../layout/images/decline.png"></td>
		</tr>
		<?php
		
				}
			}
		
		?>
	</tbody>
</table>
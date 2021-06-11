<?php
		$_SESSION['pagina']="";
		$_SESSION['pagina']['titulo']="<h1>Ingressos Reservados</h1>";
				
		$qtde_total_disponibilizada = 0;
		$qtde_total_reservada = 0;
		
		$sql_sel_reservas =  "SELECT reservas.qtde_normal AS reserva_normal,
									 reservas.qtde_vip AS reserva_vip,
									 ingressosdisponiveis.qtde_normal,
									 ingressosdisponiveis.qtde_vip,
									 datas.dia
							  FROM reservas
							  INNER JOIN ingressosdisponiveis ON(ingressosdisponiveis.id = reservas.ingressosdisponiveis_id)
							  INNER JOIN datas ON(datas.id = ingressosdisponiveis.datas_id)
							  GROUP BY datas.dia";
		$sql_sel_reservas_resultado = $conexao->query($sql_sel_reservas);
		
		$_SESSION['pagina']['conteudo'] = "
				
			<table border='1' width='1100'>
			<thead>
				<tr>
					<th>Data</th>
					<th>Tipo</th>
					<th>Quantidade Disponibilizada</th>
					<th>Quantidade Reservada</th>
					<th>Quantidade Disponivel</th>
				<tr>
			</thead>
			<tbody>
		
		";
		
		if($sql_sel_reservas_resultado->num_rows == 0){
		
		$_SESSION['pagina']['conteudo'] .= "
			<tr><td colspan='5'>Nenhum Ingresso reservado!</td></tr>
		";	
		
		}else{
			while($sql_sel_reservas_dados = $sql_sel_reservas_resultado->fetch_array()){
		
				$data = $sql_sel_reservas_dados['dia'];
				$data = explode('-',$data);
				$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];

				$qtde_vip_disp = $sql_sel_reservas_dados['qtde_vip'] - $sql_sel_reservas_dados['reserva_vip'];
				$qtde_normal_disp = $sql_sel_reservas_dados['qtde_normal'] - $sql_sel_reservas_dados['reserva_normal'];
				
				$_SESSION['pagina']['conteudo'] .="	
			
				<tr><td rowspan='3' width='100'>".$org_data."</td></tr>
				<tr>
					<td>Normais</td>
					<td>".$sql_sel_reservas_dados['qtde_normal']."</td>
					<td>".$sql_sel_reservas_dados['reserva_normal']."</td>
					<td>".$qtde_normal_disp."</td>
				</tr>					
				<tr>
					<td>VIPS</td>
					<td>".$sql_sel_reservas_dados['qtde_vip']."</td>
					<td>".$sql_sel_reservas_dados['reserva_vip']."</td>
					<td>".$qtde_vip_disp."</td>
				</tr>
				";
				
					
				$qtde_total_disponibilizada = $qtde_total_disponibilizada + ($sql_sel_reservas_dados['qtde_normal'] + $sql_sel_reservas_dados['qtde_vip']); 
				$qtde_total_reservada = $qtde_total_reservada + ($sql_sel_reservas_dados['reserva_normal'] + $sql_sel_reservas_dados['reserva_vip']);
				
			}
			$qtde_total_disponivel = $qtde_total_disponibilizada - $qtde_total_reservada;
			$_SESSION['pagina']['conteudo'] .= "
			<tr>
				<th colspan='2'>Total:</th>
				<td>".$qtde_total_disponibilizada."</td>
				<td>".$qtde_total_reservada."</td>
				<td>".$qtde_total_disponivel."</td>
			</tr>
			";
				}
				
			$_SESSION['pagina']['conteudo'] .= "
		</tbody>
	</table>";
	
echo $_SESSION['pagina']['titulo'];
echo $_SESSION['pagina']['conteudo'];
?>
<?php if($sql_sel_reservas_resultado->num_rows > 0){ ?>
	<a href="../../addons/plugins/prgauxiliares/pdf/ff_construtorpdf_pdf.php"><img src="../../layout/images/imprimir.jpg"></a>
<?php } ?>
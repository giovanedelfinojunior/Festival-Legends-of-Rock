<?php
		$_SESSION['pagina']="";
		$_SESSION['pagina']['titulo']= "<h1>Estimativa de Ganho com Venda de Ingressos</h1>";
		
		//declarando variaveis;
		$ganho_estimado_vip = 0;
		$ganho_estimado_normal = 0;
		$ganho_atual_vip = 0;
		$ganho_atual_normal = 0;
		$ganho_aberto_vip = 0;
		$ganho_aberto_normal = 0;
		
		$total_ingressos = 0;
		$total_reservas = 0;
		$total_ganho_estimado = 0;
		$total_ganho_atual = 0;
		$total_ganho_aberto = 0;
		$sql_sel_reservas = "SELECT	ingressosdisponiveis.qtde_normal,	
									ingressosdisponiveis.qtde_vip,
									ingressosdisponiveis.valor_normal,
									ingressosdisponiveis.valor_vip,
									datas.dia,
									SUM(reservas.qtde_normal) AS reserva_normal,
									SUM(reservas.qtde_vip) AS reserva_vip
							FROM reservas
							INNER JOIN ingressosdisponiveis ON(ingressosdisponiveis.id = reservas.ingressosdisponiveis_id)
							INNER JOIN datas ON(datas.id = ingressosdisponiveis.datas_id)
							GROUP BY datas.dia";
		//selecionando colunas para tabela reservas;
		//SUM está somando a quantidade total de reservas efetuadas;
		//AS está mudando o nome das variáveis;
		//INNER JOIN está connectando tabelas em comum;
		//GROUP BY está agrupando por data;
		$sql_sel_reservas_resultado = $conexao->query($sql_sel_reservas);
			
		$_SESSION['pagina']['conteudo']= "
		
		<table border='1' width='1100'>
			<thead>
				<tr>
					<th>Data</th>
					<th>Tipo</th>
					<th>Valor do Ingresso</th>
					<th>Total de Ingressos</th>
					<th>Ingressos Reservados</th>
					<th>Ganho Estimado</th>
					<th>Ganho Atual</th>
					<th>Ganho em Aberto</th>
				</tr>
			</thead>
			<tbody>
		";
		
		if($sql_sel_reservas_resultado->num_rows == 0){//se nao existe valores nas tabelas consultadas;
			$_SESSION['pagina']['conteudo'].= "
				<tr><td colspan='8'>Nenhum Ingresso Vendido</td></tr>
			";
		
			}else{
				while($sql_sel_reservas_dados = $sql_sel_reservas_resultado->fetch_array()){
					
					$ganho_estimado_vip = $sql_sel_reservas_dados['qtde_vip'] * $sql_sel_reservas_dados['valor_vip'];
					$ganho_atual_vip = $sql_sel_reservas_dados['valor_vip'] * $sql_sel_reservas_dados['reserva_vip']; 
					$ganho_aberto_vip = $ganho_estimado_vip - $ganho_atual_vip;
					
					$ganho_estimado_normal = $sql_sel_reservas_dados['qtde_normal'] * $sql_sel_reservas_dados['valor_normal'];
					$ganho_atual_normal = $sql_sel_reservas_dados['valor_normal'] * $sql_sel_reservas_dados['reserva_normal']; 
					$ganho_aberto_normal = $ganho_estimado_normal - $ganho_atual_normal;
					
					$data = $sql_sel_reservas_dados['dia'];
					$data = explode('-',$data);
					$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
			
			$_SESSION['pagina']['conteudo'].= "
		
			<tr><td rowspan='3' width='100' >".$org_data."</td></tr>
			<!-- number_format valor,número de casas após a virgula,
			separador de casas antes e depois da virgula, separador minhas por exemplo(1.000.000,00)-->
			<tr>
				<td>Vips</td>
				<td>R$".number_format($sql_sel_reservas_dados['valor_vip'],2,',','.')."</td>
				<td>".$sql_sel_reservas_dados['qtde_vip']."</td>
				<td>".$sql_sel_reservas_dados['reserva_vip']."</td>
				<td>R$".number_format($ganho_estimado_vip,2,',','.')."</td>
				<td>R$".number_format($ganho_atual_vip,2,',','.')." </td>
				<td>R$".number_format($ganho_aberto_vip,2,',','.')."</td>
			</tr>
			
			<tr>
				<td>Normais</td>
				<td>R$".number_format($sql_sel_reservas_dados['valor_normal'],2,',','.')."</td>
				<td>".$sql_sel_reservas_dados['qtde_normal']."</td>
				<td>".$sql_sel_reservas_dados['reserva_normal']."</td>
				<td>R$".number_format($ganho_estimado_normal,2,',','.')."</td>
				<td>R$".number_format($ganho_atual_normal,2,',','.')."</td>
				<td>R$".number_format($ganho_aberto_normal,2,',','.')."</td>
			</tr>";
		
			
			//somando o valor total;
			$total_ingressos = $total_ingressos + ($sql_sel_reservas_dados['qtde_normal'] + $sql_sel_reservas_dados['qtde_vip']);
			$total_reservas = $total_reservas + ($sql_sel_reservas_dados['reserva_normal'] + $sql_sel_reservas_dados['reserva_vip']);
			$total_ganho_estimado = $total_ganho_estimado + ($ganho_estimado_normal + $ganho_estimado_vip);
			$total_ganho_atual = $total_ganho_atual + ($ganho_atual_vip + $ganho_atual_normal);	
			$total_ganho_aberto = $total_ganho_aberto + ($ganho_aberto_vip + $ganho_aberto_normal);
			
				}	
			
			$_SESSION['pagina']['conteudo'].= "
		
			<tr>
				<th colspan='3'>Total:</th>
				<td>".$total_ingressos." </td>
				<td>".$total_reservas."</td>
				<td>R$".number_format($total_ganho_estimado,2,',','.')."</td>
				<td>R$".number_format($total_ganho_atual,2,',','.')."</td>
				<td>R$".number_format($total_ganho_aberto,2,',','.')."</td>
			</tr>
			
			";
			}
			$conexao->close();	
			$_SESSION['pagina']['conteudo'].= "
				</tbody>
			</table>
			";
echo $_SESSION['pagina']['titulo'];
echo $_SESSION['pagina']['conteudo'];
?>
<?php if($sql_sel_reservas_resultado->num_rows > 0){ ?>
	<a href="../../addons/plugins/prgauxiliares/pdf/ff_construtorpdf_pdf.php"><img src="../../layout/images/imprimir.jpg"></a>
<?php } ?>
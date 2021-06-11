<?php
	
	$p_data = $_POST['seldata'];
	$p_qtdenormal = $_POST['txtqtdenormal'];
	$p_qtdevip = $_POST['txtqtdevip'];
	
	$msg = "";
	$imagem = "alert_icon.png";
	$url_retorno = "ff_main_client.php?folder=reservation&file=ff_fmins_reservation&ext=php";
	
	if($p_data == ""){
	
		$msg = "Preencha o campo Data!";
	
	}else if($p_qtdenormal == ""){
	
				$msg = "Preencha o campo Qtde. Ingressos Normais!";
		
			}else if($p_qtdevip == ""){
			
						$msg = "Preencha o campo Qtde. Ingressos Vips!";
					
					}else if(($p_qtdenormal > 4) || ($p_qtdevip > 4)){
						
							$msg = "É possivel reservar apenas 4 ingressos de cada tipo por dia!";
						
						}else{
						
							$sql_sel_clientes = "SELECT id FROM clientes WHERE usuarios_id='".$_SESSION['idUsuario']."'";
							$sql_sel_clientes_resultado = $conexao->query($sql_sel_clientes);
							$sql_sel_clientes_dados = $sql_sel_clientes_resultado->fetch_array();
							
							$sql_sel_ingressosdisponiveis = "SELECT * FROM ingressosdisponiveis WHERE datas_id='".$p_data."'";
							$sql_sel_ingressosdisponiveis_resultado = $conexao->query($sql_sel_ingressosdisponiveis);
							$sql_sel_ingressosdisponiveis_dados = $sql_sel_ingressosdisponiveis_resultado->fetch_array();
							
							$sql_sel_reservas = "SELECT * FROM reservas WHERE clientes_id='".$sql_sel_clientes_dados['id']."' AND ingressosdisponiveis_id='".$sql_sel_ingressosdisponiveis_dados['id']."'";
							$sql_sel_reservas_resultado = $conexao->query($sql_sel_reservas);
							
							if($sql_sel_reservas_resultado->num_rows > 0){
							
								$msg = "Você já reservou ingressos para esse dia";
							
							}else{
							
								$sql_sel_somareservas = "SELECT SUM(qtde_normal)AS soma_normais, SUM(qtde_vip)AS soma_vips FROM reservas WHERE ingressosdisponiveis_id='".$sql_sel_ingressosdisponiveis_dados['id']."'";
								$sql_sel_somareservas_resultado = $conexao->query($sql_sel_somareservas);
								$sql_sel_somareservas_dados = $sql_sel_somareservas_resultado->fetch_array();
								
								if($sql_sel_ingressosdisponiveis_dados['qtde_normal']-($sql_sel_somareservas_dados['soma_normais'] + $p_qtdenormal) < 0){
									
								$msg = "Não há ingressos normais disponiveis para esse dia!";
								
								}else if($sql_sel_ingressosdisponiveis_dados['qtde_vip']-($sql_sel_somareservas_dados['soma_vips']+ $p_qtdevip) < 0){
								
									$msg = "Não há ingressos vips disponiveis para esse dia!";
								
								}else{
							
									$tabela = "reservas";
									
									$dados = array(
									
										'clientes_id' => $sql_sel_clientes_dados['id'],
										'ingressosdisponiveis_id' => $sql_sel_ingressosdisponiveis_dados['id'],
										'qtde_normal' => $p_qtdenormal,
										'qtde_vip' => $p_qtdevip
									
									);
									
									$resultado = adicionar($tabela,$dados);
								
									if($resultado){

										$msg = "Reserva efetuada com sucesso!";
										$url_retorno= "ff_main_client.php?folder=reservation&file=ff_view_reservation&ext=php";
									
									}else{
										
										
										$msg="Erro ao efetuar reserva: ".$conexao->error;
									
									}
								}
							}
						}

?>
<h2> Aviso </h2>
<div id='mensagem'>
	<h1><img src="../../layout/images/<?php echo $imagem; ?>" height='60px' width='60px'> <?php echo $msg; ?> </h1>
	<a href="<?php echo $url_retorno; ?>"><button type="button">Retornar</button></a>
</div>
<?php

	$conexao->close();

?>
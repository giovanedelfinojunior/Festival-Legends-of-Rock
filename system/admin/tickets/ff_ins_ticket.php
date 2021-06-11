<?php
	/*Obtenção dos valores do formulário*/
	$p_data = $_POST['seldata'];
	$p_qtdenormal = $_POST['txtqtdenormal'];
	$p_valornormal = $_POST['txtvalornormal'];
	$p_qtdevip = $_POST['txtqtdevip'];
	$p_valorvip = $_POST['txtvalorvip'];
	/*Fim da obtenção de valores do formulário*/
	/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";
	if ($p_data == ""){//se o campo data do evento esta vazio;
		$msg = "Preencha o campo Data do Evento!";			
	}else if ($p_qtdenormal == ""){//se o campo data do evento esta vazio;						
				$msg = "Preencha o campo Quantidade de Ingressos Normais!";
			}else if ($p_valornormal == ""){//se o campo data do evento esta vazio;								
						$msg = "Preencha o campo Valor dos Ingressos Normais!";
					}else if ($p_qtdevip == ""){//se o campo Quantidade de Ingressos VIPs esta vazio;												
								$msg = "Preencha o campo Quantidade de Ingressos VIPs!";
							}else if ($p_valorvip == ""){//se o campo Valor dos ingrassos VIPs do evento esta vazio;														
										$msg = "Preencha o campo Valor dos Ingressos VIPs!";
									}else{//se todos o campos foram preenchidos; 
										
										$sql_sel_ingressos = "SELECT id FROM ingressosdisponiveis WHERE datas_id='".$p_data."' ";//selecionando a coluna id na tabela ingressosdisponiveis onde o id da data é igual ao da data selecionada no formulario;
										$sql_sel_ingressos_resultado = $conexao->query($sql_sel_ingressos);//consultando colunas selecionadas na tabela ingressosisponiveis; 
										
										if($sql_sel_ingressos_resultado->num_rows > 0){//se a consulta retornou mais de 0 linhas;
										
											$msg = "Os ingressos para esse dia já estão registrados!";
										
										}else{//se a consulta retornou 0 linhas;
										
											$tabela = "ingressosdisponiveis";
											
											$dados = array(
											
												'datas_id' => $p_data,
												'qtde_normal' => $p_qtdenormal,
												'valor_normal' => $p_valornormal,
												'qtde_vip' => $p_qtdevip,
												'valor_vip' => $p_valorvip
											
											);
											
											$resultado = adicionar($tabela,$dados);
											
											if($resultado){//se a insercao funcionou;
											
												$msg = "Ingressos registrados com sucesso!";
												$imagem = "ok.png";
											
											}else{//se a insercao nao funcionou;
											
												$msg = "Erro ao efetuar cadastro de ingressos: ".$conexao->error;//informando o erro ocorrido;
											
											}
										
										}
									
									}
	/*Fim da validação dos campos do formulário*/
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=tickets&file=ff_fmins_ticket&ext=php"><button type="button">Retornar</button></a>
</fieldset>
<?php

	$conexao->close();

?>

<?php
/*Obtenção valores do formluário*/
	$p_nome = $_POST['txtnome'];
	$p_descricao = $_POST['txadescricao'];
	$p_urlimg = $_POST['txaurlimg'];
	$p_data = $_POST['seldata'];
/*Fim da obtenção de valores do formulário*/
/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";
	
	if ($p_nome == ""){//se o campo Nome esta vazio;
	
		$msg = "Preencha o campo Nome Completo!";
		
	}else if ($p_descricao == ""){//se o campo Descricao esta vazio;
	
				$msg = "Preencha o campo Descrição!";
				
			}else if ($p_urlimg == ""){//se o campo Url da Imagem esta vazio;
			
						$msg = "Preencha o campo Url da Imagem!";
						
					}else if ($p_data == ""){//se o campo Data do Evento esta vazio;
					
								$msg = "Preencha o campo Data do Evento!";
								
							}else{//se todo o campos foram preenchidos;
							
								$sql_sel_bandas = "SELECT nome FROM bandas WHERE nome='".addslashes($p_nome)."'";//selecionar a coluna nome em bandas onde o nome for igual ao nome digitado;
								$sql_sel_bandas_resultado = $conexao->query($sql_sel_bandas);//consultando a coluna selecionada;
								
								if($sql_sel_bandas_resultado->num_rows > 0){//se a quantidade de bandas com esse mesmo nome for maior que zero;
									
									$msg = "Essa banda já está registrada"; 
								
								}else{//se a quantidade de nomes de bandas for igual a zero;
								
									$tabela = "bandas";

									$dados = array(
									
										'nome'	=> $p_nome,
										'descricao'	=> $p_descricao, 
										'url_imagem'	=> $p_urlimg,
										'datas_id'	=> $p_data
									);
									
									$resultado = adicionar($tabela, $dados);
														
									if($resultado){//se o INSERT for verdadeiro(deu certo);
									
										$imagem = "ok.png";
										$msg = "Banda registrada efetuado com sucesso!";
									
									}else{//se ele é falso(deu erro);
									
										$msg = "Erro ao efetuar o cadastro: ".$conexao->error;//informar o erro;
									
									}
								
								}
									
							}
/*Fim da validação dos campos do formulário*/
							$conexao->close();//fechando conexao com o banco de dados;
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=bands&file=ff_fmins_band&ext=php"><button type="button">Retornar</button></a>
</fieldset>
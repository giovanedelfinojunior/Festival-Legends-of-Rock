<?php
	/*Obtenção dos valores do formulário*/
	
	$p_nome = $_POST['txtnome'];
	$p_urlimg = $_POST['txaurlimg'];
	/*Fim da obtenção de valores do formulário*/
	/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";				
	if ($p_nome == ""){	//se é igual a vazio;
		$msg = "Preencha o campo Nome Completo!";
	}else if ($p_urlimg == ""){	//se é igual a vazio;		
				$msg = "Preencha o campo Url da Imagem!";
			}else{ 
				
				$sql_sel_patrocinadores = "SELECT nome FROM patrocinadores WHERE nome='".addslashes($p_nome)."'";//selecionando a coluna nome na tabela patrocinadores;
				
				$sql_sel_patrocinadores_resultado = $conexao->query($sql_sel_patrocinadores);//consultando a coluna nome na tabela patrocinadores;
				
				if($sql_sel_patrocinadores_resultado->num_rows > 0){//se o numero de linhas com esse mesmo nome for maior que zero,esse patrocinador ja existe;
					
					$msg = "Esse patrocinador ja está registrado!";		
	/*inserindo dados na tabela*/			
				}else{//se o numero de linhas com esse mesmo nome não for maior que zero;
										
					$tabela = "patrocinadores";
					
					$dados = array(
					
						'nome' => $p_nome,
						'url_logo' => $p_urlimg
					
					);
					
					$resultado = adicionar($tabela,$dados);
											
					if($resultado){
						$imagem = "ok.png"; 
						$msg 	= "Cadastro realizado com sucesso!";

					}else{//se a inserção nao funcionou,informe o erro;
					
						$msg = "Erro ao efetuar inserção: ".$conexao->error;
					
					}
				}
			
			}
	/*Fim da obtenção dos valores do formulário*/
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=sponsors&file=ff_fmins_sponsor&ext=php"><button type="button">Retornar</button></a>
</fieldset>

<?php	
$conexao->close(); 
?>
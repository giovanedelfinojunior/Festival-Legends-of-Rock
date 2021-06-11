<?php
	/*Obtenção dos valores do formulário*/
	$p_data = $_POST['txtdata'];
	$p_descricao = $_POST['txadescricao'];
	/*Fim da obtenção de valores do formulário*/
	/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";
	
	if ($p_data == ""){							
		$msg = "Preencha o campo Data!";
	}else if ($p_descricao == ""){									
				$msg = "Preencha o campo Descrição!";
			}else{ 
				
				$sql_sel_datas = "SELECT dia FROM datas WHERE dia='".$p_data."'";//selecionando a coluna dia na tabela data;
				
				$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);//consultando as colunas selecionadas;
				
				if($sql_sel_datas_resultado->num_rows > 0){//verificando se esta data é unica;
					
					$msg = "Essa data já está registrada!";//reposta se ela ja esta registrada;
					
				}else{
					
					$data = explode('/',$p_data);
					$p_data = $data['2'].'-'.$data['1'].'-'.$data['0'];
					
					$tabela = "datas";
					
					$dados = array(
					
						'dia' => $p_data,
						'descricao' => $p_descricao
					
					);
					
					$resultado = adicionar($tabela,$dados);
					
					if($resultado){//verificando se a inserção de dados na tabela datas aconeteceu;
					
						$msg = "Data registrada com sucesso";
						$imagem = "ok.png";//coletando imagem de ok; 									
						
					}else{
					
						$msg = "Erro ao efetuar o cadastro: ".$conexao->error;//mensagem de erro indicando o erro;
					
					}
				
				}
				
			}
	/*Fim da validação dos campos do formulário*/
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=dates&file=ff_fmins_date&ext=php"><button type="button">Retornar</button></a>
</fieldset>

<?php	
$conexao->close(); 
?>
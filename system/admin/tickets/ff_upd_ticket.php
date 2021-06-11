<?php
	/*Obtenção dos valores do formulário*/
	$p_data = $_POST['seldata'];
	$p_qtdenormal = $_POST['txtqtdenormal'];
	$p_valornormal = $_POST['txtvalornormal'];
	$p_qtdevip = $_POST['txtqtdevip'];
	$p_valorvip = $_POST['txtvalorvip'];
	$p_id = $_POST['hidid'];
	/*Fim da obtenção de valores do formulário*/
	/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";
	$url_retorno = "ff_main_admin.php?folder=tickets&file=ff_fmupd_ticket&ext=php&id='".$p_id."'";
	
		$sql_sel_ingressos = "SELECT id FROM ingressosdisponiveis WHERE datas_id='".$p_data."' AND id<>'".$p_id."'";//selecionando id na tabela ingressosdisponiveis onde id for diferente do id do elemento que esta sendo editado;	
		$sql_sel_ingressos_resultado = $conexao->query($sql_sel_ingressos);//consultando as colunas selecionadas dna tabela ingressosdisponiveis;
		
		if($sql_sel_ingressos_resultado->num_rows > 0){//se a consulta gerou mais de zero linhas;
		
			$msg = "Os ingressos para esse dia já estão registrados!";
		
		}else{//se a colta gerou 0 linhas;
		
				$tabela = "ingressosdisponiveis";
		
				$condicao = "id='".$p_id."'";
		
				$dados = array(
					
							'datas_id' => $p_data,
							'qtde_normal' => $p_qtdenormal,
							'valor_normal' => $p_valornormal,
							'qtde_vip' => $p_qtdevip,
							'valor_vip' => $p_valorvip
					
						);
				
				$resultado = editar($tabela,$dados,$condicao);
				
			if($resultado){//se a alteração funcionou;
			
				$msg = "Alteração efetuada com sucesso!";
				$imagem = "ok.png";
				$url_retorno = "ff_main_admin.php?folder=tickets&file=ff_fmins_ticket&ext=php";
			
			}else{//se houve erro ao efetuar a alteração dos dados,informe o erro;
			
				$msg = "Erro ao efetuar cadastro de ingressos: ".$conexao->error;
			
			}
		
		}
	/*Fim da validação dos campos do formulário*/
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="<?php echo $url_retorno; ?>"><button type="button">Retornar</button></a>
</fieldset>
<?php

	$conexao->close();

?>
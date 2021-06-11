<?php
	/*Obtenção dos valores do formulário*/
	$p_data = $_POST['txtdata'];
	$p_descricao = $_POST['txadescricao'];	
	$p_id = $_POST['hidid'];
	/*Fim da obtenção de valores do formulário*/
	/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";
	$url_retorno= "ff_main_admin.php?folder=dates&file=ff_fmupd_date&ext=php&id=".$p_id;//retornando o valor do id para a pagina de alteração de dados;

	$sql_sel_datas  = "SELECT dia FROM datas WHERE dia='".$p_data."' AND id <> '".$p_id."'";//selecionando dia na tabela datas;       				
	
	$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);//consultando coluna dia na tabela datas;
	
	if($sql_sel_datas_resultado->num_rows > 0){//se a consulta encontrou mais de 0 linhas com a mesma data fora desse id, o usuario ja existe;
	
		$msg = "Essa data já está registrada!";
	
	}else{//se nao foi encontrado a mesma ata em outra coluna;
	
		$data = explode('/',$p_data);
		$p_data = $data['2'].'-'.$data['1'].'-'.$data['0'];					
	
		$tabela = "datas";
		
		$condicao = "id='".$p_id."'";
		
		$dados = array(
		
			'dia' => $p_data,
			'descricao' => $p_descricao
		
		);
		
		$resultado = editar($tabela,$dados,$condicao);
		
		if($resultado){//verificando se a alteração aconteceu;
		
			$msg = "Alteração efetuada com sucesso";
			$imagem = "ok.png";
			$url_retorno = "ff_main_admin.php?folder=dates&file=ff_fmins_date&ext=php";//redirecionando para o formulário inicial da paginas datas registradas;
		
		}else{//se a alteração nao aconteceu;
		
			$msg = "Erro ao efetuar alteração: ".$conexao->error;//Informando o erro;
		
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
<?php
/*Obtenção valores do formluário*/
	$p_nome = $_POST['txtnome'];
	$p_descricao = $_POST['txadescricao'];
	$p_urlimg = $_POST['txaurlimg'];
	$p_data = $_POST['seldata'];
	$p_id = $_POST['hidid'];

/*Fim da obtenção de valores do formulário*/
/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";
	$url_retorno = "ff_main_admin.php?folder=bands&file=ff_fmupd_band&ext=php&id=".$p_id;

	$sql_sel_bandas = "SELECT nome FROM bandas WHERE nome='".addslashes($p_nome)."' AND id <> '".$p_id."'";//selecionar nome onde nome for igual ao digitado e id for diferente do id atual;
	
	$sql_sel_bandas_resultado = $conexao->query($sql_sel_bandas);//consultando a coluna selecionada;
	
	if($sql_sel_bandas_resultado->num_rows > 0){//se mais de 0 bandas tem esse nome;
	
		$msg = "Essa Banda já está registrada!";

	}else{//se nenhuma banda tem esse nome;
	
		$tabela = "bandas";
		
		$condicao = "id='".$p_id."'";
		
		$dados = array(
		
			'nome' => $p_nome,
			'descricao' => $p_descricao,
			'url_imagem' => $p_urlimg,
			'datas_id' => $p_data
		
		);
		
		$resultado = editar($tabela,$dados,$condicao);
		
		if($resultado){//se a alteração for verdadeira;
		
			$msg = "Alteração efetuada com sucesso!";
			$imagem = "ok.png";
			$url_retorno = "ff_main_admin.php?folder=bands&file=ff_fmins_band&ext=php";
		
		}else{//se a alteração nao for verdadeira;
		
			$msg = "Erro na alteração: ".$conexao->error;
		
		}
	
	}
			
/*Fim da validação dos campos do formulário*/
$conexao->close();
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="<?php echo $url_retorno ?>"><button type="button">Retornar</button></a>
</fieldset>
<?php
	
	$p_nome = $_POST['txtnome'];
	$p_urlimg = $_POST['txaurlimg'];
	$p_id = $_POST['hidid'];
	
	$msg = "";
	$imagem = "warning.png";
	$url_retorno = "ff_main_admin.php?folder=sponsors&file=ff_fmupd_sponsor&ext=php&id=".$p_id;//retornando o id;
		
	$sql_sel_patrocinadores = "SELECT nome FROM patrocinadores WHERE nome='".addslashes($p_nome)."' AND id <> '".$p_id."'";//selecionando a coluna nome na tabela patrocinadores;
	
	$sql_sel_patrocinadores_resultado = $conexao->query($sql_sel_patrocinadores);//consultando a coluna da tabela patrociadores;
	
	if($sql_sel_patrocinadores_resultado->num_rows > 0){//se a consulta gerou mais de 0 linhas com a mesma data fora desse id;
		
		$msg = "Esse patrocinador ja está registrado!";		
		
	}else{//se a consulta nao for maior que 0 linhas;
		
		$tabela = "patrocinadores";
		
		$condicao = "id='".$p_id."'";
		
		$dados = array(
		
			'nome' => $p_nome,
			'url_logo' => $p_urlimg
		
		);
		
		$resultado = editar($tabela,$dados,$condicao);
		
		if($resultado){//se a alteração foi efetuada com sucesso;
		
			$msg = "Alteração efetuada com sucesso!";
			$imagem = "ok.png";
			$url_retorno = "ff_main_admin.php?folder=sponsors&file=ff_fmins_sponsor&ext=php";
		
		}else{//se a alteração nao foi efetuada;
		
			$msg = "Erro na alteração :" .$conexao->error;//informando o erro;
		
		}
	
	}
	/*Fim da obtenção dos valores do formulário*/

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
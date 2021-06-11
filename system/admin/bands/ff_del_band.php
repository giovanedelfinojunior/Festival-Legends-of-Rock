<?php
/*Obtenção valores do formluário*/
	$g_id = $_GET['id'];
/*Fim da obtenção de valores do formulário*/
/*Validação dos campos do formulário*/
	$msg = "";
	$imagem = "warning.png";
	
	$tabela = "bandas";
	$condicao = "id='".$g_id."'";
	
	$resultado = deletar($tabela,$condicao);
	
	if($resultado){//se a exclusão for verdadeira;
	
		$msg = "Exclusão efetuada com sucesso!";
		$imagem = "ok.png";
	
	}else{//se a exclusão for falsa;
	
		$msg = "Erro ao efetuar exclusão: ".$conexao->error;//Exibir o erro;
	
	}
			
/*Fim da validação dos campos do formulário*/
$conexao->close();
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=bands&file=ff_fmins_band&ext=php"><button type="button">Retornar</button></a>
</fieldset>
<?php
	
	$g_id = $_GET['id'];//obtendo o valor do id por url;
	
	$msg = "";
	$imagem = "warning.png";
	
	$tabela = "patrocinadores";
	$condicao = "id='".$g_id."'";
	
	$resultado = deletar($tabela,$condicao);
	
	if($resultado){//se a exclusão e verdadeira(funcionou), informe o sucesso;
		
		$msg = "Exclusão efetuada com sucesso!";
		$imagem = "ok.png";
		
	}else{//se a exclusão é falsa(deu erro), informe o erro;
	
		$msg = "Erro ao efetuar exclusão: ".$conexao->error;
	
	}

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
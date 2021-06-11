<?php

	$p_senha = $_POST['pwdsenha'];
	
	$hash_senha = md5($salt.$p_senha);
					
	$id = $_SESSION['idUsuario'];
	
	$msg = "";
	$imagem = "alert_icon.png";
	$url_retornar = "ff_main_client.php?folder=profile&file=ff_fmupdacess_profile&ext=php";

	if($p_senha == ""){
	
		$msg = "Preencha o campo senha!";
	
	}else{
	
		$tabela = "usuarios";
		
		$condicao = "id='".$id."'";
		
		$dados = array(
			
			'senha' => $hash_senha
		
		);
		
		$resultado = editar($tabela,$dados,$condicao);
		
		if($resultado){

			$msg = "Alteração efetuada com sucesso!";
			$url_retornar = "ff_main_client.php?folder=profile&file=ff_view_profile&ext=php";
			$imagem = "done_icon.png";
		
		}else{
		
			$msg = "Erro ao efetuar alteração: ".$conexao->error;
		
		}
	}
	
?>
<h2> Aviso </h2>
<div id='mensagem'>
	<h1><img src="../../layout/images/<?php echo $imagem ?>" height='60px' width='60px'> <?php echo $msg; ?></h1>
	<a href="<?php echo $url_retornar ?>"><button type="button">Retornar</button></a>
</div>
<?php

	$conexao->close();

?>
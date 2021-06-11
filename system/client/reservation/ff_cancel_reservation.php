<?php
	
	$p_codigo = $_POST['txtcodigo'];
	$p_motivo = $_POST['selmotivo'];
	
	$imagem = "alert_icon.png";
	$url_retorno = "ff_main_client.php?folder=reservation&file=ff_fmcancel_reservation&ext=php&codigo=".$p_codigo."";
	$msg = "";
	
	if($p_motivo == ""){
	
		$msg="Preencha o campo Motivo";
	
	}else{
	
		$tabela = "canceladas";
		
		$dados = array(
		
			'motivo' => $p_motivo,
			'permissao_usuario' => 1
		
		);
		
			$resultado = adicionar($tabela,$dados);
		
		if($resultado){
		
			
			$tabela = "reservas";
			$condicao = "codigo='".$p_codigo."'";
			
			$resultado = deletar($tabela,$condicao);
			
			if($resultado){
			
				$msg = "Cancelamento efetuado com sucesso,qualquer dúvida entre em contato conosco!";
				$imagem = "done_icon.png";
				$url_retorno = "ff_main_client.php?folder=reservation&file=ff_view_reservation&ext=php";
			
			}else{
			
				$msg = "Erro ao efetuar cancelmanto: ".$conexao->error;
			
			}
		
		}else{
		
			$msg = "Erro ao efetuar cancelamento: ".$conexao->error;
		
		}
	
	}

?>
<h2> Aviso </h2>
<div id='mensagem'>
	<h1><img src="../../layout/images/<?php echo $imagem; ?>" height="60px" width="60px"/> <?php echo $msg; ?> </h1>
	<a href="<?php echo $url_retorno; ?>"><button type="button">Retornar</button></a>
</div>
<?php

	$conexao->close();

?>
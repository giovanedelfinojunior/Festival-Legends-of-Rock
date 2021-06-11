<fieldset>
<?php

	$p_codigo = $_POST['txtcodigo'];
	$p_motivo = $_POST['selmotivo'];
	
	$msg = "";
	$imagem = "warning.png";
	$url_retorno = "ff_main_admin.php?folder=reservations&file=ff_fmdecline_reservation&ext=php";
	
	if($p_motivo == ""){
	
		$msg = "Selecione um motivo!";
	
	}else{
								
		$tabela = "canceladas";

		$dados = array(
		
			'motivo'	=> $p_motivo,
			'permissao_usuario'	=> 0
			
		);
		
		$resultado = adicionar($tabela, $dados);
							
		if($resultado){
			
			$tabela = "reservas";
			$condicao = "codigo='".$p_codigo."'";
			
			$resultado = deletar($tabela,$condicao);
			
			if($resultado){//se a exclusão for verdadeira;
			
				$msg = "Exclusão efetuada com sucesso!";
				$url_retorno = "ff_main_admin.php?folder=reservations&file=ff_view_reservation&ext=php";
				$imagem = "ok.png";
				
			}else{
			
				$msg = "Erro ao efetuar exclusão: ".$conexao->error;
			
			}
		
		}else{
		
			$msg="Erro ao efetuar exclusão: ".$conexao->error;
		
		}
	
	}
	
	
?>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg; ?></p>
	<a href="<?php echo $url_retorno; ?>&codigo=<?php echo $p_codigo; ?>"><button type="button">Retornar</button></a>
</fieldset>
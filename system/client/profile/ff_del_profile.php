<?php
	
	$msg = "";
	$imagem = "alert_icon.png";
	
	$g_idcliente = $_GET['id'];
	
	$sql_sel_usuarios = "SELECT codigo FROM reservas WHERE clientes_id='".$g_idcliente."'";
	$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);
	
	if($sql_sel_usuarios_resultado->num_rows > 0){
	
		$msg = "Não é possível apagar esta conta pois existem registros de reservas assosciados a ela!";
	
	}else{
	
			$tabela = "clientes";
			$condicao = "usuarios_id='".$_SESSION['idUsuario']."'";
			
			$resultado = deletar($tabela,$condicao);

		if($resultado){
				
			$tabela = "usuarios";
			$condicao = "id='".$_SESSION['idUsuario']."'";
			
			$resultado = deletar($tabela,$condicao);
		
			if($resultado){
			
				header('location:../../security/authentication/ff_logout_authentication.php');
				
			}else{
			
				$msg = "Erro ao efetuar exclusão: ".$conexao->error;
				
			
			}
			
		}else{
		
			$msg = "Erro ao efetuar exclusão: ".$conexao->error;
		
		}
	
	}
	
?>
<h2> Aviso </h2>
<div id='mensagem'>
	<h1><img src="../../layout/images/<?php echo $imagem ?>" height='60px' width='60px'> <?php echo $msg; ?></h1>
<a href="ff_main_client.php?folder=profile&file=ff_view_profile&ext=php"><button type="button">Retornar</button></a>
</div>
<?php

	$conexao->close();

?>
<?php
	
	$g_id = $_GET['id'];//obtendo o valor do id por url;
	
	$msg = "";
	$imagem = "warning.png";
	
	$sql_sel_reservas = "SELECT codigo FROM reservas WHERE ingressosdisponiveis_id='".$g_id."'";
	$sql_sel_reservas_resultado = $conexao->query($sql_sel_reservas);
	
	if($sql_sel_reservas_resultado->num_rows > 0){
	
		$msg = "Não é possível excluir os ingressos disponíveis para esse dia, pois existem registros de reservas associados ele!";
	
	}else{
		
		$tabela = "ingressosdisponiveis";
		$condicao = "id='".$g_id."'";
		
		$resultado = deletar($tabela,$condicao);
		
		if($resultado){//se a exclusão e verdadeira(funcionou), informe o sucesso;
			
			$msg = "Exclusão efetuada com sucesso!";
			$imagem = "ok.png";
			
		}else{//se a exclusão é falsa(deu erro), informe o erro;
		
			$msg = "Erro ao efetuar exclusão: ".$conexao->error;
		
		}
		
	}
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=tickets&file=ff_fmins_ticket&ext=php"><button type="button">Retornar</button></a>
</fieldset>
<?php

	$conexao->close();//fechando a conexao com o banco de dados;

?>
<?php
	
	$g_id = $_GET['id'];//coletando o valor do id por url;

	$msg = "";
	$imagem = "warning.png";
	
	$sql_sel_bandas = "SELECT id FROM bandas WHERE datas_id='".$g_id."'";
	$sql_sel_bandas_resultado = $conexao->query($sql_sel_bandas);
	
	if($sql_sel_bandas_resultado->num_rows > 0){
	
		$msg = "Não é possível excluir essa data, pois existem bandas associadas a ela!";
	
	}
	
	$sql_sel_ingressosdisponiveis = "SELECT id FROM ingressosdisponiveis WHERE datas_id='".$g_id."'";
	$sql_sel_ingressosdisponiveis_resultado = $conexao->query($sql_sel_ingressosdisponiveis);
	
	if($sql_sel_ingressosdisponiveis_resultado->num_rows > 0){
	
		$msg = "Não é possível excluir esta data, pois existem ingressos disponíveis assosciados a ela!";
		
	}else{
		
		$tabela = "datas";
		
		$condicao = "id = '".$g_id."'";
		
		$resultado = deletar($tabela,$condicao);
		
		if($resultado){//se a exclusão aconteceu mesmo;
		
			$msg = "Exclusão efetuada com sucesso!";
			$imagem = "ok.png";
		
		}else{//se a exclusão nao aconteceu;
		
			$msg = "Erro ao fetuar exclusão: ".$conexao->error;//infomando o erro ocorrido;
		
		}
		
	}

?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=dates&file=ff_fmins_date&ext=php"><button type="button">Retornar</button></a>
</fieldset>

<?php	
$conexao->close();
?>
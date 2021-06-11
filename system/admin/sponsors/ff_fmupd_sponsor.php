<?php
	
	$g_id = $_GET['id'];//obtendo o id por url;
	
	$sql_sel_patrocinadores = "SELECT nome,url_logo FROM patrocinadores WHERE id='".$g_id."'";//selecionando as colunas nome e url_logo na tabela patrocinadores;
	
	$sql_sel_patrocinadores_resultado = $conexao->query($sql_sel_patrocinadores);//Consultando as colunas selecionadas na tabela patrocinadores;
	
	$sql_sel_patrocinadores_dados = $sql_sel_patrocinadores_resultado->fetch_array();//Criando vetor para conteúdo das colunas selecionadas;
	
?>
<fieldset>
	<legend>Alteração de Dados de Patrocinador</legend>
	<form name="frmrgtadm" method="post" action="ff_main_admin.php?folder=sponsors&file=ff_upd_sponsor&ext=php">
		<input type="hidden" name="hidid" value="<?php echo $g_id ?>">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Nome:</td>
				<td><input type="text" name="txtnome" maxlength="45" value="<?php echo $sql_sel_patrocinadores_dados['nome']; ?>"></td>
			</tr>								
			<td width="40%">*Url da Imagem:</td>
				<td><textarea name="txaurlimg"><?php echo $sql_sel_patrocinadores_dados['url_logo']; ?></textarea></td>
			</tr>				
			<tr>
				<td colspan="2" align="center"><a href="ff_main_admin.php?folder=sponsors&file=ff_fmins_sponsor&ext=php"><button type="button">Voltar</button></a><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php	
$conexao->close(); 
?>
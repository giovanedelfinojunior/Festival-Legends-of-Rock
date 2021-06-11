<?php
	
	$g_id = $_GET['id'];//coletando valor do id pela url;
	
	$sql_sel_datas = "SELECT dia,descricao FROM datas WHERE id='".$g_id."'";//Selecionando colunas dia e descricao da tabela datas;
	
	$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);//consultando as colunas dia e descricao na tabela datas;
	
	$sql_sel_datas_dados = $sql_sel_datas_resultado->fetch_array();//Criando vetor para o coneteúdo;

	$data = $sql_sel_datas_dados['dia'];
	$data = explode('-',$data);
	$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
	
?>
<fieldset>
	<legend>Registro de Data</legend>
	<form name="frmrgtdata" method="post" action="ff_main_admin.php?folder=dates&file=ff_upd_date&ext=php">
		<input type="hidden" name="hidid" value="<?php echo $g_id; ?>">
		<table>
			<h6>Todos os Campos com * são Obrigatórios</h6>
			<tr>
				<td width="40%">*Data:</td>
				<td><input type="text" name="txtdata" value="<?php echo $org_data; ?>" maxlength="10"></td>
			</tr>
			<tr>
				<td width="40%">*Descrição:</td>
				<td><textarea name="txadescricao"><?php echo $sql_sel_datas_dados['descricao']; ?></textarea></td>
			</tr>
			
			<?php	
			$conexao->close(); 
			?>

			<tr>
				<td colspan="2" align="center"><a href="ff_main_admin.php?folder=dates&file=ff_fmins_date&ext=php"><button type="button">Retornar</button></a><button type="submit">Salvar</button></td>
			</tr>
		</table>
	</form>
</fieldset>
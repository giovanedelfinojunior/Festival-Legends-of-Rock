			<fieldset>
			<?php

				$g_id = $_GET['id'];

				$sql_sel_bandas = "SELECT id, datas_id, nome, descricao, url_imagem FROM bandas WHERE id='".$g_id."'";//selecionando as colunas  id, datas_id e nome na tabela bandas;
				$sql_sel_bandas_resultado = $conexao->query($sql_sel_bandas);//consultando as colunas selecionadas na tabela bandas; 
				$sql_sel_bandas_dados = $sql_sel_bandas_resultado->fetch_array();//armazenando valores em vetores obtidos da consulta;

			?>
				<legend>Registro de Banda</legend>
				<form name="frmbanda" method="post" action="ff_main_admin.php?folder=bands&file=ff_upd_band&ext=php">
					<input type="hidden" name="hidid" value="<?php echo $g_id; ?>">
					<table>
						<h6>Todos os Campos com * são Obrigatórios</h6>
						<tr>
							<td width="40%">*Nome:</td>
							<td><input type="text" name="txtnome" value="<?php echo $sql_sel_bandas_dados['nome']; ?>" maxlength="45"></td>
						</tr>
						<tr>
							<td width="40%">*Descrição:</td>
							<td><textarea name="txadescricao"><?php echo $sql_sel_bandas_dados['descricao']; ?></textarea></td>
						</tr>
						<tr>
							<td width="40%">*Url da Imagem:</td>
							<td><textarea name="txaurlimg"><?php echo $sql_sel_bandas_dados['url_imagem']; ?></textarea></td>
						</tr>
						<tr>
							<td width="40%">*Data do Evento:</td>
							<td>
								<select name="seldata">
									<?php
														
										$sql_sel_datas = "SELECT id, dia FROM datas ORDER BY dia ASC";//selecionando as colunas id e dia na tabela datas,onde dia será exibido em ordem ascendente;		
										$sql_sel_datas_resultado = $conexao->query($sql_sel_datas);//consultando as colunas selecionadas da tabela datas;

										while($sql_sel_datas_dados = $sql_sel_datas_resultado->fetch_array()){//coletando os valores da consultado e colocando-os em um vetor,isso acontecerá enquando ouver conteúdo a ser coletado;

										$opc_selecionada = "";//Irá ajudar a selecionar a opção que deverá vir selecionada por padrão;
										
											if($sql_sel_datas_dados['id'] == $sql_sel_bandas_dados['datas_id']){//se as duas datas forem iguais;
										
												$opc_selecionada = "selected";
											
											}								
											$data = $sql_sel_datas_dados['dia'];
											$data = explode('-',$data);
											$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];
									?>
									
											<option value="<?php echo $sql_sel_datas_dados['id'];?>" <?php echo $opc_selecionada;?>><?php echo $org_data; //exibindo o valor de dia no campo select?></option>
										
									<?php
										
										}//fechando while;
										
										$conexao->close();
									?>
									
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center"><a  href="ff_main_admin.php?folder=bands&file=ff_fmins_band&ext=php"><button type="button">Retornar</button></a><button type="submit">Salvar</button></td>
						</tr>
					</table>
				</form>
			</fieldset>
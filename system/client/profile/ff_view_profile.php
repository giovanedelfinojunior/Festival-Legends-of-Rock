			<h2>Perfil</h2>
			<fieldset>
				<?php
					
					$sql_sel_clientes = "SELECT * FROM clientes WHERE usuarios_id='".$_SESSION['idUsuario']."'";
					$sql_sel_clientes_resultado = $conexao->query($sql_sel_clientes);
					$sql_sel_clientes_dados = $sql_sel_clientes_resultado->fetch_array();
					
				?>
				<table>
						<th colspan="2">Pessoal<a href="ff_main_client.php?folder=profile&file=ff_fmupdpersonal_profile&ext=php"><img src="../../layout/images/edit.png" title="Editar acesso"
						height="15px" width="15px" style="float:right"></a></th>
					<tr>
						<td>Nome:</td>
						<td><?php echo $sql_sel_clientes_dados['nome']; ?></td>
					</tr>
					<tr>
						<td>Data de Nascimento:</td>
						<?php
					
							$data = $sql_sel_clientes_dados['nascimento'];
							$data = explode('-',$data);
							$org_data = $data['2'].'/'.$data['1'].'/'.$data['0'];

						?>
						<td><?php echo $org_data; ?></td>
					</tr>	
					<tr>
						<td>
						
						<?php
						
							if($sql_sel_clientes_dados['tipo_doc'] == 1){
							
								echo "CPF:";
							
							}else if($sql_sel_clientes_dados['tipo_doc'] == 2){
							
								echo "RG:";
							
									}else{
							
										echo "Passaporte:";
							
									}
							$nome = $_SESSION['usuario'];
						
						?>
						
						</td>
						<td><?php echo $sql_sel_clientes_dados['num_doc']; ?></td>
					</tr>
					<tr>
						<td>Telefone:</td>
						<td><?php echo $sql_sel_clientes_dados['telefone']; ?></td>
					</tr>	
					<tr>
						<td>E-mail:</td>
						<td><?php echo $sql_sel_clientes_dados['email']; ?></td>
					</tr>
					
					<tr>
						<th colspan="2">Acesso<a href="ff_main_client.php?folder=profile&file=ff_fmupdacess_profile&ext=php"><img src="../../layout/images/edit.png" title="Editar acesso" 
						height="15px" width="15px" style="float:right"></a></th>
					<tr>
					
					<tr>
						<td>Usuário:</td>
						<td><?php echo $_SESSION['usuario']; ?></td>
					</tr>
					<tr>
						<td colspan="2"><a href="ff_main_client.php?folder=profile&file=ff_del_profile&ext=php&id=<?php echo $sql_sel_clientes_dados['id']; ?>" onClick="return deletar('usuário','<?php echo $nome; ?>')">Excluir Usuário<img src="../../layout/images/delete.png"></a></td>
					</tr>
				</table>
				<?php
				
					$conexao->close();
				
				?>
			</fieldset>
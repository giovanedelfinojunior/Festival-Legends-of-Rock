<div id='controle'>
	<u>
		<br /><br />
		Aviso!
	</u>
	<div id='conteudo'>
		<div id='caixaphp'>
				<?php
				
					$p_nome = $_POST['txtnome'];
					$p_data = $_POST['txtdata'];
					$p_tipodoc = $_POST['seltipodoc'];
					$p_numdoc = $_POST['txtnumerodoc'];
					$p_email = $_POST['txtemail'];
					$p_telefone = $_POST['txttelefone'];
					$p_usuario = $_POST['txtusuario'];
					$p_senha = $_POST['pwdsenha'];
					
					$hash_senha = md5($salt.$p_senha);
					
					$msg = "";
					$imagem = "warning.png";
					
					if($p_nome == ""){
						$msg=  "O campo Nome Completo deve ser preenchido!";
					}else if($p_data == ""){
								$msg=  "O Data de Nascimento campo  deve ser preenchido!";
							}else if($p_tipodoc == ""){
										$msg=  "O campo Tipo de documento deve ser preenchido!";
									}else if($p_numdoc == ""){
												$msg=  "O campo Número do Documento deve ser preenchido!";
											}else if($p_email == ""){
														$msg=  "O campo E-mail deve ser preenchido!";
													}else if($p_telefone == ""){
																$msg=  "O campo Telefone deve ser preenchido!";
															}else if($p_usuario == ""){
																		$msg=  "O campo Usuário deve ser preenchido!";
																	}else if($p_senha == ""){
																				$msg=  "O campo Senha deve ser preenchido!";
																			}else{
																				
																				$sql_sel_clientes = "SELECT tipo_doc,num_doc FROM clientes WHERE tipo_doc='".$p_tipodoc."' AND num_doc='".$p_numdoc."'";
																				
																				$sql_sel_clientes_resultado = $conexao->query($sql_sel_clientes);
																				
																				if($sql_sel_clientes_resultado->num_rows > 0){
																				
																					$msg = "Esse documento ja foi utilizado!";
																					
																				}else{
																					
																					$sql_sel_usuarios = "SELECT login FROM usuarios WHERE login='".addslashes($p_usuario)."'";
																					$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);
																					
																					if($sql_sel_usuarios_resultado->num_rows > 0){
																					
																						$msg = "Usuário já existe!";
																					
																					}else{
																					
																						$tabela = "usuarios";
																						
																						$dados = array(
																						
																							'login' => $p_usuario,
																							'senha' => $hash_senha,
																							'permissao' => 1
																						
																						);
																						
																						$resultado = adicionar($tabela, $dados);
																						
																						if($resultado){
																						
																							$data = explode('/',$p_data);
																							$p_data = $data['2'].'-'.$data['1'].'-'.$data['0'];					
												
																							$p_usuarios_id = $conexao->insert_id;//obtem o id(auto encremento) do ultimo usuário inserido;
																						
																							$tabela = "clientes";
																							
																							$dados = array(
																							
																								'usuarios_id' => $p_usuarios_id,
																								'nome' => $p_nome,
																								'nascimento' => $p_data,
																								'tipo_doc' => $p_tipodoc,
																								'num_doc' => $p_numdoc,
																								'telefone' => $p_telefone,
																								'email' => $p_email
																							
																							);
																							
																							$resultado = adicionar($tabela, $dados);
		
																								if($resultado){
																								
																									$msg = "Cadastro efetuado com sucesso!";
																									$imagem = "ok.png";																								
																								
																								}else{
																								
																									$msg = "Erro ao efetuar cadastro: ".$conexao->error;
																								
																								}
																						}else{
																				
																						$msg = "Erro ao efetuar cadastro: ".$conexao->error;
																						
																						}
																				
																					}
																				
																				}
																			
																			}
				?>
					
				<br />
				<img src="layout/images/<?php echo $imagem ?>">
				<p><?php echo $msg ?></p>
				
				<br /><br /><a href="index.php?folder=system/guest/client&file=ff_fmins_client&ext=html">
					<button>Voltar</button>
				</a>
		</div>
	</div>
</div>
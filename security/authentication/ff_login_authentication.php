<div id='controle'>
	<u>
		<br /><br />
		Aviso!
	</u>
	<div id='conteudo'>
		<div id='caixaphp'>
				<?php
				
					$p_nome = $_POST['txtnome'];
					$p_senha = $_POST['pwdsenha'];
					
					$hash_senha = md5($salt.$p_senha);
					
					$msg = "";
					$imagem = "warning.png";
					
					if($p_nome == ""){//se o campo nome estiver vazio;
					
						$msg = "O campo Nome de Usuário deve ser preenchido!";
								
					}else if($p_senha == ""){//se o campo senha estiver vazio;
					
								$msg = "O campo Senha deve ser preenchido!";
								
							}else{//se todos os campos foram preenchidos;
				
								$sql_sel_usuarios = "SELECT id, login, senha, permissao FROM usuarios WHERE login='".addslashes($p_nome)."' AND senha ='".$hash_senha."'";//selecionando colunas id, login, senha e permssao na tabela usuarios onde login e senha forem iguais aos digitados ;

								$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);//consultando  as colunas selecionadas;
								
								if($sql_sel_usuarios_resultado->num_rows > 0){//se algum registro com esse nome e senha foi encontrado;
									
									$sql_sel_usuarios_dados = $sql_sel_usuarios_resultado->fetch_array();//colocando valores em vetores;
									
									session_start();//iniciando sessão;
									
									$_SESSION['idUsuario']=$sql_sel_usuarios_dados['id'];//armazenando o id do usuario para sabermos quem está autenticado;
									
									$_SESSION['usuario']=$sql_sel_usuarios_dados['login'];//armazenando o nome de usuario para mostrarmos nas telas do back-end;
									
									$_SESSION['permissao']=$sql_sel_usuarios_dados['permissao'];//armazenando a permissao do usuario para saber que páginas ele podera acessar;
									
									$_SESSION['idSessao']= session_id();//armazenando id da sessão para futura implementação de segurança;
									
									if($_SESSION['permissao'] == 0){//se permissao igual a 0,será redirecionado ao back-end administrador;
									
										header('location: system/admin/ff_main_admin.php');//redirecionando ao back-end administrador;
									
									}else if($_SESSION['permissao'] == 1){//se permissao for igual a 1, será redirecionado ao back-end cliente;
									
										header ("location: system/client/ff_main_client.php");//redirecionando ao back-end do cliente;
										
										}else{//se permissao nao for nem 0 nem 1, recebe a mensagem de permissao invalida;
										
											$msg = "Permissão Invalida!";
										
										}
								
								}else{//se nenhum registro foi encontrado;
								
									$msg = "Dados Incorretos!";
								
								}
							
								$conexao->close();//fechando a conexao com o banco dee dados;
							}
							
				?>
				<br />
				<img src="layout/images/<?php echo $imagem?>">
				<p><?php echo $msg ?></p>
		</div>
	</div>
</div>
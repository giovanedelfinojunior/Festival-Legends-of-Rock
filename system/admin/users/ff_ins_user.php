<?php
	/*Obtenção dos valores do formulário*/
	$p_nome = $_POST['txtnome'];
	$p_senha = $_POST['pwdsenha'];
	/*Fim da obtenção de valores do formulário*/
	/*Validação dos campos do formulário*/
	
	$hash_senha = md5($salt.$p_senha);
	
	$msg = "";
	$imagem = "warning.png";
	
	if ($p_nome == ""){					
		$msg = "Preencha o campo Usuário!";
		
	}else if ($p_senha == ""){							
				$msg = "Preencha o campo Senha!";
			}else{ 
			
				$sql_sel_usuarios = "SELECT login FROM usuarios WHERE login = '".addslashes($p_nome)."'";
				
				$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);
				
				if($sql_sel_usuarios_resultado->num_rows > 0){
					$msg = "Esse usuario já está registrado!";
				} else {	

					$tabela = "usuarios";
					//$campo = array("login", "senha", "permissao");
					//$valores = array($usuario, $senha, $permissao);
					$dados = array(
						'login'	=> $p_nome,
						'senha'	=> $hash_senha, 
						'permissao'	=> 0
					);
					
					$resultado = adicionar($tabela, $dados);
										
					if($resultado){
					
						$msg = "Cadastro efetuado com sucesso";
						$imagem = "ok.png";
						
					}else{
							
						$msg = "Erro ao efetuar cadastro: ".$conexao->error;
						
					}
				}
				
			}
			$conexao->close();
	/*Fim validação dos campos do formulário*/
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=users&file=ff_fmins_user&ext=php"><button type="button">Retornar</button></a>
</fieldset>
<?php

	$p_usuario = $_POST['txtnome'];
	$p_senha = $_POST['pwdsenha'];
	$p_id = $_POST['hidid'];

	$hash_senha = md5($salt.$p_senha);
	
	$msg = "";
	$imagem = "warning.png";
	$url_retorno = "ff_main_admin.php?folder=users&file=ff_fmupd_user&ext=php&id=".$p_id;
	
	
	if($p_usuario == ""){
		$msg = "O campo Usuário deve ser preenchido!";
	}else if($p_senha == ""){
				$msg = "O campo senha deve ser preenchido!";
		}else{
			
			$sql_sel_usuarios = "SELECT login FROM usuarios WHERE login = '".addslashes($p_usuario)."' AND id <> '".$p_id."'";
			
			$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);
			
			if($sql_sel_usuarios_resultado->num_rows > 0){
				
				$msg = "Esse usuário já está registrado!";
				
			}else{
			
				$tabela = "usuarios";
				
				$condicao = "id='".$p_id."'";
				
				$dados = array(
					
						'login' => $p_usuario,
						'senha' => $hash_senha
					
						);
				
				$resultado = editar($tabela,$dados,$condicao);
				
				if($resultado){
				
					$msg = "Alteração realizada com sucesso!";
					$imagem = "ok.png";
					$url_retorno = "ff_main_admin.php?folder=users&file=ff_fmins_user&ext=php";
				
				}else{
				
					$msg = "Erro ao efetuar a alteração: ".$conexao->error;
				
				}
				
			}
		}
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="<?php echo $url_retorno; ?>"><button type="button">Retornar</button></a>
</fieldset>
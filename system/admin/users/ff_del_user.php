<?php
	
	$g_id = $_GET['id'];//estraindo o valor pela url;
	//declarando variáveis
	$msg = "";
	$imagem = "warning.png"; 
	
		$sql_sel_usuarios = "SELECT id FROM usuarios WHERE permissao='0'";/*selecionando id em usuarios 
													onde permissao igual a 0(permissao de administrador);*/
		$sql_sel_usuarios_resultado = $conexao->query($sql_sel_usuarios);//consultando o select acima;

		if($sql_sel_usuarios_resultado->num_rows == 1){//se o número de linhas da consulta for igual à 1;
		
			$msg = "Não foi possível efetuar a exclusão, pois esse usuário é o único administrador no momento!";
		
		}else{	
						
			$tabela = "usuarios";
			
			$condicao = "id = '".$g_id."'";
			
			$resultado = deletar($tabela, $condicao);

	
				}
				
			}else{//se nao;
				$msg = "Erro ao efetuar a exclusão: ".$conexao->error;
			}
		}	
	
?>
<fieldset>
	<legend>Aviso</legend>
	<img src="../../layout/images/<?php echo $imagem; ?>">
	<p><?php echo $msg;  ?></p>
	<a href="ff_main_admin.php?folder=users&file=ff_fmins_user&ext=php"><button type="button">Retornar</button></a>
</fieldset>
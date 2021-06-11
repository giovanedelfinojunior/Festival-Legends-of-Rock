<?php

	$p_nome = $_POST['txtnome'];
	$p_data = $_POST['txtdata'];
	$p_tipodoc = $_POST['seltipodoc'];
	$p_numdoc = $_POST['txtnumdoc'];
	$p_telefone = $_POST['txttelefone'];
	$p_email = $_POST['txtemail'];
	$p_id = $_POST['hidid'];
	
	$msg = "";
	$imagem = "alert_icon.png";
	$url_retorno = "ff_main_client.php?folder=profile&file=ff_fmupdpersonal_profile&ext=php";
	
	$sql_sel_clientes = "SELECT num_doc FROM clientes WHERE tipo_doc='".$p_tipodoc."' AND num_doc='".$p_numdoc."' AND id<>'".$p_id."'";
	$sql_sel_clientes_resultado = $conexao->query($sql_sel_clientes);
	
	if($p_nome == ""){
	
		$msg = "Preencha o campo Nome!";
	
	}else if($p_data == ""){
	
			$msg = "Preencha o campo Data!";
	
			}else if($p_numdoc == ""){

				$msg = "Preencha o campo Número do Documento!";

					}else if($p_telefone == ""){

						$msg = "Preencha o campo Telefone!";

							}else if($p_email == ""){
						
								$msg = "Preencha o campo E-mail!";
						
							}else{
	
								if($sql_sel_clientes_resultado->num_rows > 0){

									$msg = "Esse usuario já está cadastrado!";

								}else{
								
									$data = explode('/',$p_data);
									$p_data = $data['2'].'-'.$data['1'].'-'.$data['0'];					
								
									$tabela = "clientes";
									
									$condicao = "id='".$p_id."'";
									
									$dados = array(
										
										'nome' => $p_nome,
										'nascimento' => $p_data,
										'tipo_doc' => $p_tipodoc,
										'num_doc' => $p_numdoc,
										'telefone' => $p_telefone,
										'email' => $p_email
									
									);
									
									$resultado = editar($tabela,$dados,$condicao);
									
									if($resultado){
									
										$msg = "Alteração efetuada com sucesso!";
										$url_retorno = "ff_main_client.php?folder=profile&file=ff_view_profile&ext=php";
										$imagem = "ok.png";
									
									}else{

										$msg = "Erro ao efetuar alteração: ".$conexao->error;
									
									}
							
								}
							
							}

?>
<h2> Aviso </h2>
<div id='mensagem'>
	<h1><img src="../../layout/images/<?php echo $imagem ?>" height='60px' width='60px'> <?php echo $msg; ?></h1>
	<a href="<?php echo $url_retorno ?>"><button type="button">Retornar</button></a>
</div>
<?php

	$conexao->close();

?>
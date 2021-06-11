<?php

	include "ff_conf_database.php";

	$conexao = new mysqli($servidor, $usuario, $senha, $banco);
	
	if ($conexao -> connect_errno > 0){
		die("Não foi possivel conectar com o banco de dados:".$conexao -> $connect_error);
	}
	
	$conexao->set_charset('utf8');

?>
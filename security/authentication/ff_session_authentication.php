<?php

	session_start();
	
	if (!isset($_SESSION['idSessao'])){
	
		header('location: //127.0.0.1/legends_of_rock/security/authentication/ff_logout_authentication.php');
		exit;
	
	} else if ($_SESSION['idSessao']!=session_id()){
				
				header('location: //127.0.0.1/legends_of_rock/security/authentication/ff_logout_authentication.php');
				exit;
				
			}

?>
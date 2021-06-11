<?php

	if($permissao != $_SESSION['permissao']){
		
		if($_SESSION['permissao'] == 0){
		
			header ("location: //127.0.0.1/legends_of_rock/system/admin/ff_main_admin.php?msg=Você não ter permissão para acessar a página exigida!");
			exit;
		
		}else if($_SESSION['permissao'] == 1){
		
					header ("location: //127.0.0.1/legends_of_rock/system/client/ff_main_client.php");		
					exit;
				
				} else {
				
					header ("location: //127.0.0.1/security/anthentication/ff_logout_authentication.php");
					exit;
					
				}
	
	}

?>
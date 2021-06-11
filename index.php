<?php

	include "security/database/ff_connection_database.php";
	include "addons/php/ff_dboperations_php.php";

?>

<!DOCTYPE html>
<html lang='pt-br'>
	<head>
		<title>Home</title>
		<meta charset='utf-8' />
		<meta name='author' content='Giovane Delfino Junior' />
		<meta name='description' content='Festival de rock' />
		<meta name='keywords' content='Festival, rock' />
		<link rel='stylesheet' href='layout/css/ff_frontend_css.css' >
		<link rel='shortcut icon' href='layout/images/logo.jpg'>
		<script type='text/javascript' src="addons/js/ff_validate_js.js"></script>
	</head>
	<body>
		<div id='tudo'>
			<div id='logo'></div>
			<header>
					Legends of Rock					
					<br />			
					<form name='frmlogin' method='post' onsubmit='return validalogin()' action='index.php?folder=security/authentication&file=ff_login_authentication&ext=php'>	
						<input type='text' name='txtnome' size='30' value='' placeHolder='Nome de Usuário' ><input type='password' name='pwdsenha' size='30' value='' placeHolder='Senha' ><button type='submit'>Entrar</button>
					</form>
			</header>
			<nav>
				<ul>
					<a href='index.php'>
						<li>
							Home
						</li>
					</a>
					<a href='index.php?folder=system/guest/pages&file=ff_info_pages&ext=html'>
						<li>
							Informações
						</li>
					</a>
					<a href='index.php?folder=system/guest/pages&file=ff_lineup_pages&ext=html'>
						<li>
							Atrações
						</li>
					</a>
					<a href='index.php?folder=system/guest/pages&file=ff_schedule_pages&ext=html'>
						<li>
							Programação
						</li>
					</a>
					<a href='index.php?folder=system/guest/client&file=ff_fmins_client&ext=html'>
						<li>
							Cadastro
						</li>
					</a>
				</ul>
			</nav>
			<?php
			
				if((isset($_GET['folder']))&&(isset($_GET['file']))&&(isset($_GET['ext']))){
				
					if(!include $_GET['folder'].'/'.$_GET['file'].'.'.$_GET['ext']){
					
						echo "Página não encontrada";
					
					}
				
				}else{
				
					include "system/guest/pages/ff_initial_pages.html";
				
				}
			
			?>
			<footer>	
				<h4>Patrocinadores</h4>
				<div id="patrocinio">
					<?php
						$sql_sel_patrocinadores= "SELECT nome,url_logo FROM patrocinadores";
						$sql_sel_patrocinadores_resultado = $conexao->query($sql_sel_patrocinadores);
						if($sql_sel_patrocinadores_resultado->num_rows == 0){
						
							echo "Nenhum patrocinador cadastrado!";
						
						}else{
							while($sql_sel_patrocinadores_dados = $sql_sel_patrocinadores_resultado->fetch_array()){
					?>
								<div class='patrocinador'>
									<img class='imgpatroc' src='<?php echo $sql_sel_patrocinadores_dados['url_logo']; ?>'>
									<div class='nomepatroc'><?php echo $sql_sel_patrocinadores_dados['nome']; ?></div>
								</div>
								
					<?php
							}
						}
					?>
				</div>
				&copy; 2014 Desenvolvido por Giovane Delfino Junior. Todos os direitos reservados.
			</footer>
		</div>
	</body>
</html>
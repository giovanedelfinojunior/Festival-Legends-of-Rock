<html>
	<head>
		<meta name="author" content="escola sistemica">
		<meta name="description" content="area restrita dos usuarios administradores">
		<meta charset="utf-8">
		<title>Administração - Legends of Rock</title>
		<link rel="stylesheet" href="../../layout/css/ff_layout_backend_css.css">
	</head>
	<body>
		<header>
			<img src="../../layout/images/logo.jpg">
			<h3>Administração - Legends of Rock</h3>
			<a href="#" title="Sair do sistema"><button type="button" class="btnlogout">Sair</button></a>
			<h4>Olá, <a href="#" title="Editar seus dados">Administrador</a></h4>
		</header>
		<div id="sidebar">
			<nav>
				<h4>Gestão de Conteúdo</h4>
				<ul>		
					<a href="#"><li class="active-menu">Registro de Data</li></a>
					<li>Registro de Banda</li>
					<li>Registro de Ingressos Disponíveis por Dia</li>
					<li>Registro de Patrocinador</li>
				</ul>
				<h4>Gestão de Negócio</h4>
				<ul>
					<li>Registro de Administrador</li>
					<li>Declinar Reservas</li>
					<li>Relatório de Ingressos Reservados</li>
					<li>Relatório Financeiro</li>
				</ul>
			</nav>
		</div>
		<div id="content">
			<?php
				/* :: Recebendo os dados do formulário :: */
				
				/* As duas linhas abaixo estão em comentário para que não gere erro ao acessar o arquivo, mas que fique claro
				   para você que essa página recebe via POST os dados de um formulário.
					$p_nome 	= $_POST['txtnome'];
					$p_datanasc = $_POST['txtdatanasc']; 
				*/
				$p_nome = "";
				$p_datanasc = "";

				/* :: Criando variáveis auxiliares :: */
				/* Abaixo criamos uma variável chamada $msg, com valor vazio. Essa variável conterá as mensagens que serão
				 * exibidas para o usuário. A variável inicia com valor vazio, e dentro de cada condição atribuímos um valor
				 * para ela, de acordo com a necessidade.
				 */
				$msg = "";
				/* Nas telas de validação de cadastro, exibimos uma imagem juntamente com a mensagem para o usuário. Por padrão,
				 * nos casos de erro (campos preenchidos incorretamente) exibimos uma imagem de alerta, que pode ser encontrada
				 * em layout/images/warning.png. Mas quando tudo está preenchido CORRETAMENTE, é interessante exibir uma imagem
				 * de alerta para o usuário? Não! O mais interessante seria exibir uma mensagem relativa à sucesso da operação,
				 * e é o que estamos fazendo na linha [62], onde estamos alterando o valor da variável imagem para ok.png (a imagem)
				 * pode ser consultada em layout/images/ok.png). Assim, em todas as mensagens, a imagem exibida será warning.png,
				 * exceto na mensagem de sucesso, onde será exibida a imagem ok.png.
				 */
				$imagem = "warning.png";

				/* :: Realizando a validação dos dados recebidos :: */
				if ($p_nome == ""){ // Se o nome estiver em branco
					$msg = "Preencha o campo Nome Completo!";
				}else if ($p_datanasc == ""){ // Se a data de nascimento estiver em branco
					$msg = "Preencha o campo Data de Nascimento!";
				}else{ // Se tudo estiver ok
					$imagem = "ok.png"; // Trocamos a imagem a ser carregada, afinal se tudo ocorreu corretamente, porque exibir um sinal de alerta?
					$msg 	= "Cadastro realizado com sucesso!";
				}

				/* Agora observe o código dentro das tags <fieldset>. 
  				 * Se estiver com alguma dúvida a respeito do que está acontecendo, lembre-se:
  				 * O PHP CONSEGUE MANIPULAR O HTML!
				 */
			?>
			<fieldset>
				<legend>Aviso</legend>
				<img src="../../layout/images/<?php echo $imagem; //Aqui escrevemos o nome da imagem a ser exibida, que pode ser warning.png ou ok.png. ?>">
				<p><?php echo $msg; //Por fim, escrevemos a mensagem a ser exibida para o usuário. ?></p>
				<a href="#"><button type="button">Retornar</button></a>
			</fieldset>
		</div>
		<footer>
			&copy; Copyright 2014 Escola Sistêmica. Todos os direitos reservados.
		</footer>
	</body>
</html>
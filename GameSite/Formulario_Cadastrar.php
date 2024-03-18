<?php
	header("Content-type: text/html; charset=utf-8")
?>

<HTML>

	<HEAD>
	
			<TITLE>Cadastrar</TITLE>

			<link rel="stylesheet" href="style.css">
			
	</HEAD>

	
<BODY>
	
	<div class="Cadastro">

		<H1>Faça seu Cadastro</H1>
		
		<form name="cadastro" action="Cadastrar.php" method="post">
		
			Login: <input type="text" name="nome"> <br><br>

			Email: <input type="text" name="email"> <br><br>
			
			Senha: <input type="password" name="senha"> <br><br>


			<button><input="submit"> Cadastrar </button>

			<br><br>

			<a href="Formulario_Logar.php"> Já possuo uma conta </a>
						
		</form>

	</div>
	
</BODY>

</HTML>
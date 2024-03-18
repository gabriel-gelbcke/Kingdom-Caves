<?php
	header("Content-type: text/html; charset=utf-8")
?>

<HTML>

	<HEAD>
	
			<TITLE>Login</TITLE>

			<link rel="stylesheet" href="style.css">
			
	</HEAD>

	
<BODY>
	
	<div class="Login">

		<H1>Fazer Login</H1>
		
		<form name="aluno" action="Logar.php" method="post">
		
			Login: <input type="text" name="login"> <br><br>
			
			Senha: <input type="password" name="senha"> <br><br>
			
			
			<button><type="submit" value="entrar" id="entrar" name="entrar"> Login </button>

			<br><br>

 			<a href="Formulario_Cadastrar.php"> Não possuo uma conta </a>
						
		</form>

	</div>
	
</BODY>

</HTML>
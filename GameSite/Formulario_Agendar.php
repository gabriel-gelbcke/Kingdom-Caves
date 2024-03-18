<?php

include('conexao.php');

include('verifica_login.php');

$login = $_SESSION['usuario'];

/////////////////////////////DADOS/////////////////////////////

$query = sprintf("SELECT user, email, senha, id_usuario FROM usuario WHERE user = '$login'");

$dados = mysqli_query($conn, $query) or die(mysqli_error());

$userr = $_SESSION['usuario'];

$linha = mysqli_fetch_assoc($dados);

/////////////////////////////////////////////////////////////////

header("Content-type: text/html; charset=utf-8")

?>

<link rel="stylesheet" href="style.css"/>

<link rel="stylesheet" href="css_pagina.css"/>


<html>
    <head>
        <title>Pagina Inicial</title>     
    </head>
  
    <body>

  <nav class="dp-menu" align="center">

	<ul>
	
	<li><a>Ola, <?php echo $linha['user']?></a>
    
    </li>
										 
	<li class="dp-cat"><a href="Formulario_Agendar.php">Agendar Tarefa</a>
    
    </li>
	
	<li class="dp-cat"><a href="Index.php">Lista de Tarefas</a>
    
    </li>

    <li class="dp-cat"><a href="Logout.php">Sair</a>
    
    </li>
	
	</ul>

</nav>

<?php
	header("Content-type: text/html; charset=utf-8")
?>

<HTML>

	<HEAD>
	
			<TITLE>Agendar</TITLE>

			<link rel="stylesheet" href="style.css">

            <link rel="stylesheet" href="css_pagina.css"/>
			
	</HEAD>

	
<BODY>

<br><br>

        <h1 align="center">Agendar Tarefa</h1>

<br><br>

<div>
		
	<form name="agendar" action="Agendar.php" method="post">
		
        <div  class="Titulo">

			Titulo: <input type="text" name="titulo"> <br><br>

        </div>

        <div  class="Data">

			Data: <input type="date" name="datee"> <br><br>

        </div>

        <div  class="Hora">

            Hora: <input type="time" name="horaa"> <br><br>

        </div>

			<button class="Agendar" href="index.php"> Agendar </button>
						
	</form>

</div>

</BODY>

</HTML>
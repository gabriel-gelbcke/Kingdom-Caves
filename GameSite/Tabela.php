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

<?php
  
$result = mysqli_query($conn, "SELECT id_save, user, titulo, dataa, hora  FROM save_status ORDER BY id_save DESC");

?>

<html>
    <head>
        <title>Pagina Inicial</title>
    </head>
  
    <body>

<br><br>

<h1 align="center">Tarefas</h1>

<br><br>

        <table class="table" align="center" width="100%">
            <tr>
                <th class="first" width="25%">Usuario</th>
                <th class="first" width="25%">Titulo</th>
                <th class="first" width="25%">Data</th>
                <th class="first" width="25%">Hora</th>
            </tr>
  
<?php

/* Fetch Rows from the SQL query */
if (mysqli_num_rows($result) ) {
    while ($row = mysqli_fetch_array($result) ) {
        echo "<tr>
        <td>{$row['user']}</td>
        <td>{$row['titulo']}</td>
        <td>{$row['dataa']}</td>
        <td>{$row['hora']}</td>
        </tr>
        ";
    }
}
?>

</body>

</html>
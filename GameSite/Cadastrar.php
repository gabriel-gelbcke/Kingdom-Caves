<?php
include('conexao.php');

//$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

//verificar se houve conexão
if (mysqli_connect_errno())
{
    echo "1"; //Erro #1
    exit();
}

if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT nome FROM usuario WHERE nome = '{$nome}'";
$sql2 = "SELECT email FROM usuario WHERE email = '{$email}'";


$query = $conn->query($sql);
$query2 = $conn->query($sql2);

if (mysqli_num_rows($query) > 0) {
    ?>
        <link rel="stylesheet" href="style.css">

        <br><br>

        <div class="Cadastrado">
            
        Erro 2: Já existe um usuário com este nome.

        <br><br>

        <form method="get" action="index.php">

        <button type="submit" style="width:150px; height:50px; font-size:1.5rem;">Voltar</button>

        </form>

        </div>

    <?php
    exit();

}else if (mysqli_num_rows($query2) > 0) {
    ?>
        <link rel="stylesheet" href="style.css">

        <br><br>

        <div class="Cadastrado">
            
        Erro 3: Já existe um usuário com este email.

        <br><br>

        <form method="get" action="index.php">

        <button type="submit" style="width:150px; height:50px; font-size:1.5rem;">Voltar</button>

        </form>

        </div>

    <?php
    exit();

}else{
    $data = date("d/m/Y"); 
    $inserirConta = "INSERT INTO usuario (ID_usuario, adm, inativo, nome, email, senha, dataCria) VALUES (NULL,'0','0','$nome','$email','$senha', '$data')";
    //$inserirSaveStatus = "INSERT INTO savestatus (ID_save, nome, pos_x, pos_y, pos_z, dinheiro, vida) VALUES (NULL, '$nome', '-7,43', '-2,506656', '-0,06', '100', '100')";
    $inserirEstatisticas = "INSERT INTO estatisticas (ID_estatistica, nome, VezesZerou, Minutos, Segundos, Terminou, Soma) VALUES (NULL, '$nome', '0', '0', '0', '0', '0')";

    mysqli_query($conn, $inserirConta) or die ("4"); //Erro #4
    //mysqli_query($conn, $inserirSaveStatus) or die ("5"); //Erro #4
    mysqli_query($conn, $inserirEstatisticas) or die ("6"); //Erro #4
    echo("0");

    // $data = date("d/m/Y"); 
    // $inserirConta = "INSERT INTO usuario (ID_usuario, adm, inativo, nome, email, senha, dataCria) VALUES (NULL,'0','0','$nome','$email','$senha', '$data')";
    // $inserirSaveStatus = "INSERT INTO savestatus (ID_save, nome, pos_x, pos_y, pos_z, dinheiro, vida) VALUES (NULL, '$nome', '-7,43', '-2,506656', '-0,06', '100', '100')";
    // $inserirEstatisticas = "INSERT INTO estatisticas (ID_estatistica, nome, tempoJogo, kills, bossKills, record1, record2, record3, conquistas) VALUES (NULL, '$nome', '0', '0', '0', '0', '0', '0', '0')";

    // mysqli_query($conn, $inserirConta) or die ("4"); //Erro #4
    // mysqli_query($conn, $inserirSaveStatus) or die ("5"); //Erro #4
    // mysqli_query($conn, $inserirEstatisticas) or die ("6"); //Erro #4
    
    $_SESSION['usuario'] = $nome;
	header('Location: index.php');
	exit();
}
?>














<?php

/*

require ('conexao.php');

$usuario = $_POST['nome'];

$email = $_POST['email'];

$senha = $_POST['senha'];

$sql = "INSERT INTO `usuario` (`ID_usuario`, `adm`, `nome`, `email`, `senha`) VALUES (NULL, '0', '$nome', '$email', '$senha')";

header("Content-type: text/html; charset=utf-8");


mysqli_query($conn, $sql);


    if ($sql)
    {
        $_SESSION['usuario'] = $nome;
	    header('Location: dashboard.php');
	    exit();
    }

*/
?>
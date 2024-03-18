<?php
session_start();
include('conexao.php');

if(empty($_POST['nome']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['nome']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$queryUser = sprintf("SELECT * FROM usuario WHERE nome = '$usuario' and senha = '$senha'");

$dadosUser = mysqli_query($conn, $queryUser);

$linhaUser = mysqli_fetch_assoc($dadosUser);

//////////////////////////////////////////

$query = "select * FROM usuario where nome = '$usuario' and senha = '$senha'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);



if($row <= 0) {
    ?>
        <link rel="stylesheet" href="style.css">

        <br><br>

        <div class="Cadastrado">
            
        Erro 1: Nome de usuário ou senha incorretos.

        <br><br>

        <form method="get" action="index.php">

        <button type="submit" style="width:150px; height:50px; font-size:1.5rem;">Voltar</button>

        </form>

        </div>

    <?php
    exit();


    } else {

    $inativo = $linhaUser['inativo'];
    
    if($inativo == 1) {
            ?>
                <link rel="stylesheet" href="style.css">
        
                <br><br>
        
                <div class="Cadastrado">
                    
                Erro 6: Usuário inativado!
        
                <br><br>
        
                <form method="get" action="index.php">
        
                <button type="submit" style="width:150px; height:50px; font-size:1.5rem;">Voltar</button>
        
                </form>
        
                </div>
        
            <?php
            exit();

                    } else {
                    $_SESSION['usuario'] = $usuario;
                    header('Location: dashboard.php');
                    exit();
                    }
        }
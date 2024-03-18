<?php
include('conexao.php');

include('verifica_login.php');

$login = $_SESSION['usuario'];

$pesquisa = $_SESSION['pesquisa'];

$queryUser = sprintf("SELECT * FROM usuario WHERE nome = '$pesquisa'");

$dadosUser = mysqli_query($conn, $queryUser);

$linhaUser = mysqli_fetch_assoc($dadosUser);

if ($linhaUser['inativo'] == 0)
    {
        $inativar = "UPDATE usuario SET inativo = '1' WHERE usuario.nome = '$pesquisa'";

        mysqli_query($conn, $inativar);
    }else{
        $ativar = "UPDATE usuario SET inativo = '0' WHERE usuario.nome = '$pesquisa'";

        mysqli_query($conn, $ativar);
    }

    

    header('Location: dashboard.php#topo');
    exit();


?>
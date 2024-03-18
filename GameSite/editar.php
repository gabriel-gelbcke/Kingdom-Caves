<?php
include('conexao.php');

include('verifica_login.php');

$login = $_SESSION['usuario'];

$pesquisa = $_SESSION['pesquisa'];

$queryUser3 = sprintf("SELECT * FROM usuario WHERE nome = '$pesquisa'");

$dadosUser3 = mysqli_query($conn, $queryUser3);

$linhaUser3 = mysqli_fetch_assoc($dadosUser3);

$adm3 = $linhaUser3['adm'];

//echo $pesquisa;


if(!empty($_POST['email']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $queryUser = sprintf("SELECT * FROM usuario WHERE nome = '$pesquisa'");

    $dadosUser = mysqli_query($conn, $queryUser);

    $linhaUser = mysqli_fetch_assoc($dadosUser);

    $email2 = $linhaUser['email'];

    $sql2 = "SELECT email FROM usuario WHERE email = '{$email}'";

    $query2 = $conn->query($sql2);

    if ($email == $email2)
    {
        ?>
            <link rel="stylesheet" href="style.css">
    
            <br><br>
    
            <div class="Cadastrado">
                
            Erro 5: Você já tem esse email
    
            <br><br>
    
            <form method="get" action="dashboard.php#topo">
    
            <button type="submit" style="width:150px; height:50px; font-size:1.5rem;">Voltar</button>
    
            </form>
    
            </div>
    
        <?php
        exit();
    }

    if (mysqli_num_rows($query2) > 0) 
    {
        ?>
            <link rel="stylesheet" href="style.css">
    
            <br><br>
    
            <div class="Cadastrado">
                
            Erro 3: Já existe um usuário com este email.
    
            <br><br>
    
            <form method="get" action="dashboard.php#topo">
    
            <button type="submit" style="width:150px; height:50px; font-size:1.5rem;">Voltar</button>
    
            </form>
    
            </div>
    
        <?php
        exit();
    
    }else{

    $inserirEmail = "UPDATE usuario SET email = '$email' WHERE usuario.nome = '$pesquisa'";

    mysqli_query($conn, $inserirEmail);
    
    }

}

if(!empty($_POST['adm']))
{
    $adm = mysqli_real_escape_string($conn, $_POST['adm']);

    if ($adm == 1)
    {
    $inserirSenha = "UPDATE usuario SET adm = '1' WHERE usuario.nome = '$pesquisa'";
    mysqli_query($conn, $inserirSenha);
    $adem = "1";
    }

    if ($adm == 2)
    {
    $inserirSenha = "UPDATE usuario SET adm = '0' WHERE usuario.nome = '$pesquisa'";
    mysqli_query($conn, $inserirSenha);
    $adem = "0";
    }

}

if(!empty($_POST['senha']))
{
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $inserirSenha = "UPDATE usuario SET senha = '$senha' WHERE usuario.nome = '$pesquisa'";

    mysqli_query($conn, $inserirSenha);

}

if(!empty($_POST['email']))
{
    header('Location: dashboard.php#zipo');
    exit();
}

if(!empty($_POST['adm']))
{
    if ($adem != $adm3)
    {
    header('Location: dashboard.php#zipo');
    exit();
    }
}

if(!empty($_POST['senha']))
{
    header('Location: dashboard.php#zipo');
    exit();
}


if(!empty($_POST['dinheiro']))
{
    $dinheiro = mysqli_real_escape_string($conn, $_POST['dinheiro']);

    $inserirDinheiro = "UPDATE savestatus SET dinheiro = '$dinheiro' WHERE savestatus.nome = '$pesquisa'";

    mysqli_query($conn, $inserirDinheiro);

}

if(!empty($_POST['tempoJogo']))
{
    $tempoJogo = mysqli_real_escape_string($conn, $_POST['tempoJogo']);

    $inserirtempoJogo = "UPDATE estatisticas SET tempoJogo = '$tempoJogo' WHERE estatisticas.nome = '$pesquisa'";

    mysqli_query($conn, $inserirtempoJogo);

}

if(!empty($_POST['elim']))
{
    $elim = mysqli_real_escape_string($conn, $_POST['elim']);

    $inserirElim = "UPDATE estatisticas SET kills = '$elim' WHERE estatisticas.nome = '$pesquisa'";

    mysqli_query($conn, $inserirElim);

}

if(!empty($_POST['bossElim']))
{
    $bossElim = mysqli_real_escape_string($conn, $_POST['bossElim']);

    $inserirBossElim = "UPDATE estatisticas SET bossKills = '$bossElim' WHERE estatisticas.nome = '$pesquisa'";

    mysqli_query($conn, $inserirBossElim);

}

if(!empty($_POST['record1']))
{
    $record1 = mysqli_real_escape_string($conn, $_POST['record1']);

    $inserirRecord1 = "UPDATE estatisticas SET record1 = '$record1' WHERE estatisticas.nome = '$pesquisa'";

    mysqli_query($conn, $inserirRecord1);

}

if(!empty($_POST['record2']))
{
    $record2 = mysqli_real_escape_string($conn, $_POST['record2']);

    $inserirRecord2 = "UPDATE estatisticas SET record2 = '$record2' WHERE estatisticas.nome = '$pesquisa'";

    mysqli_query($conn, $inserirRecord2);

}

if(!empty($_POST['record3']))
{
    $record3 = mysqli_real_escape_string($conn, $_POST['record3']);

    $inserirRecord3 = "UPDATE estatisticas SET record3 = '$record3' WHERE estatisticas.nome = '$pesquisa'";

    mysqli_query($conn, $inserirRecord3);

}

header('Location: dashboard.php#zipo');

exit();

?>
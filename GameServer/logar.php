<?php
include('conexao.php');

//$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

//verificar se houve conexão

$nome = $_POST["nome"];
$senha = $_POST["senha"];

///////INFORMACOES TABELA USUARIO

$query = "SELECT senha, email FROM usuario WHERE nome = '$nome' and senha = '$senha'";

$result = mysqli_query($conn, $query);

$linha = mysqli_fetch_assoc($result);

$row = mysqli_num_rows($result);

///////INFORMACOES TABELA SAVESTATUS

$query2 = "SELECT VezesZerou, Minutos, Segundos, Terminou FROM estatisticas WHERE nome = '$nome'";

$dados = mysqli_query($conn, $query2);

$linha2 = mysqli_fetch_assoc($dados);

///////////////////////////////////////////////////////////

if($row <= 0) {
    echo "2"; //Erro #2 
    exit();
    
}else{
    //INFORMACOES POST
    echo "0";
    echo "\t";
    //email
    echo $linha['email'];
    echo "\t";
    //dinheiro
    echo $linha2['VezesZerou'];
    echo "\t";
    //pos_x
    echo $linha2['Segundos'];
    echo "\t";
    //pos_y
    echo $linha2['Minutos'];
    echo "\t";
    //pos_z
    echo $linha2['Terminou'];
}



?>
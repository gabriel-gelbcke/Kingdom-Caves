<?php
include('conexao.php');

$nome = $_POST["nome"];

$query2 = "SELECT VezesZerou, Minutos, Segundos, Terminou FROM estatisticas WHERE nome = '$nome'";

$dados = mysqli_query($conn, $query2);

$linha2 = mysqli_fetch_assoc($dados);

    //INFORMACOES POST
    echo $linha['Segundos'];
    echo "\t";
    //dinheiro
    echo $linha2['Segundos'];
    echo "\t";

    echo $linha2['Minutos'];
    echo "\t";

    echo $linha2['Terminou'];
    echo "\t";

    echo $linha2['VezesZerou'];
?>
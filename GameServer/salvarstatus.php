<?php
include('conexao.php');

$nome = $_POST["nome"];
$minutosAtual = $_POST["minutosAtual"];
$segundosAtual = $_POST["segundosAtual"];
$minutosAntes = $_POST["minutosAntes"];
$segundosAntes = $_POST["segundosAntes"];

$slash = 0;

$somaAtual = $minutosAtual . $segundosAtual;
$somaAntes = $minutosAntes . $segundosAntes;

if ($segundosAtual < 10)
{
    $somaAtual = $slash . $somaAtual;
}


///////INFORMACOES TABELA USUARIO

$query = "SELECT senha, email FROM usuario WHERE nome = '$nome' and senha = '$senha'";

$result = mysqli_query($conn, $query);

$linha = mysqli_fetch_assoc($result);

$row = mysqli_num_rows($result);

///////INFORMACOES TABELA SAVESTATUS

$query2 = "SELECT VezesZerou, Minutos, Segundos, Terminou FROM estatisticas WHERE nome = '$nome'";

$dados = mysqli_query($conn, $query2);

$linha2 = mysqli_fetch_assoc($dados);

$Vezes = $linha2['VezesZerou'];

$NovaVezes = $Vezes + 1;

if ($somaAntes <= 0)
{
$inserirEstatisticas = "UPDATE `estatisticas` 
SET `VezesZerou` = '1', `Minutos` = '$minutosAtual', `Segundos` = '$segundosAtual', `Terminou` = '1', `Soma` = '$somaAtual' 
WHERE `estatisticas`.`nome` = '$nome'";
}
else if ($somaAtual < $somaAntes)
{
$inserirEstatisticas = "UPDATE `estatisticas` 
SET `VezesZerou` = '$NovaVezes', `Minutos` = '$minutosAtual', `Segundos` = '$segundosAtual', `Terminou` = '1', `Soma` = '$somaAtual' 
WHERE `estatisticas`.`nome` = '$nome'";
}else 
{
$inserirEstatisticas = "UPDATE `estatisticas` 
SET `VezesZerou` = '$NovaVezes' 
WHERE `estatisticas`.`nome` = '$nome'";
}

echo $nome;
echo "\t";
echo $nome;
echo "\t";
echo $nome;


mysqli_query($conn, $inserirEstatisticas);
?>
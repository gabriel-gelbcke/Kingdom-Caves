<?php
include('conexao.php');

//$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

//verificar se houve conexão
if (mysqli_connect_errno())
{
    echo "1"; //Erro #1
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
    echo "2"; //Erro #2
    exit();

}else if (mysqli_num_rows($query2) > 0) {
    echo "3"; //Erro #3
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
}
?>
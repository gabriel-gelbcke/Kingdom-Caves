<?php
include('conexao.php');

//include('verifica_login.php');
session_start();

//$login = $_SESSION['usuario'];

//////////////////////////////////////////////////////////////////




/////////////////////////////FDS?//////////////////////////////////

$queryUsuarios = "SELECT COUNT(ID_usuario) AS qtd_usuarios FROM usuario";

$Qtd_Usuarios = mysqli_query($conn, $queryUsuarios);

$rowUsuarios = mysqli_fetch_assoc($Qtd_Usuarios);

$QuantidadeColunas = $rowUsuarios['qtd_usuarios'];
// $QuantidadeColunas = "12";

$_SESSION['Quantidade'] = $QuantidadeColunas;

$extra = "0";

$QuantidadeStart = intval($QuantidadeColunas/10);
$QuantidadeStart2 = ($QuantidadeColunas/10);

if ($QuantidadeStart2 > $QuantidadeStart)

$extra = "1";

$QuantidadeStart = intval($QuantidadeColunas/10 + $extra);


$QuantidadeStart3 = $QuantidadeStart - 1;


if (isset($_GET['paginaPost']))
{
  $_SESSION['NMpagina'] = $_GET['paginaPost'];
  
}else if (!isset($_SESSION['NMpagina'])){
  $_SESSION['NMpagina'] = 1;
}

if ($_SESSION['NMpagina'] == 1){
  $comeco = 0;
}else{
  $PagDiv = $_SESSION['NMpagina'];
  $PagDiv2 = $PagDiv - 1;
  $comeco = $PagDiv2*10;
}

$_SESSION['QntdStart'] = $QuantidadeStart;

/////////////////////////////USUARIOS//////////////////////////////////


// ASC LIMIT 10 OFFSET $limite"

/////////////////////////////DADOS USUARIO/////////////////////////////

// $queryUser = sprintf("SELECT * FROM usuario WHERE nome = '$login'");

// $dadosUser = mysqli_query($conn, $queryUser);

// $linhaUser = mysqli_fetch_assoc($dadosUser);

///////////////////////////////////////////////////////////////////////





?>

<!-- ****************ESTILO PÁGINA**************** -->

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Kingdom Caves</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="css_pagina.css"/>
    <br>
    <div style="background-color: white; height:3.5rem; border-radius:20px 20px 0% 0%;">
    <h2 class="d-flex justify-content-center"><b>Melhores Tempos<b></h2>
    </div>

    <div class="d-flex justify-content-center">
    <div style="width:95%;">
    <hr  style="margin-top: 0rem; margin-bottom: 1rem; border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);"></hr>
    </div>
</div>

<div class="">

            <table class="table" style='position: fixed; z-index:1000; background-color:white;'>
            <tr class=''>
                <th class="first" width="30%">Posição</th>
                <th class="first" width="30%">Nome</th>
                <th class="first" width="30%">Record</th>
            </tr>
            </table>

            <table class="table">
            <tr class=''>
                <th class="first" width="30%">Posição</th>
                <th class="first" width="30%">Nome</th>
                <th class="first" width="30%">Record</th>
            </tr>

<script>
  function pepe()
  {
    document.getElementById("pesquisarBotao").click();
  }
</script>

            <?php
$nivel = "1";

$colunas = "1";

$result2 = mysqli_query($conn, "SELECT *  FROM usuario");

$result3 = mysqli_query($conn, "SELECT *  FROM estatisticas ORDER BY SOMA ASC LIMIT 10 OFFSET $comeco");

if (mysqli_num_rows($result2) ) {
    while ($row2 = mysqli_fetch_array($result3)) {

        // if ($colunas >= 11){}
        $row = mysqli_fetch_array($result2);
        if ($row2['Segundos'] <= 9)
        {
          $zeroS = "0";
        }else{
          $zeroS = "";
        }
        if ($row2['Soma'] <= 0)
        {

        }else{
        echo "<tr>
        <td width='30%'><a style='cursor: context-menu;'>{$nivel} °</a></td>
        <td width='30%'>
        <a style='color: blue; cursor: context-menu;'>{$row2['nome']}</a>
        </td>
        <td width='30%' style='cursor: context-menu;'>{$row2['Minutos']}:{$zeroS}{$row2['Segundos']}</td>
        </tr>
        ";
        $nivel ++;
        $colunas ++;
      }
    }
}




?>
</table>

</div>
<div style="background-color: white; height:3.5rem; border-radius:20px 20px 0% 0%;"></div>
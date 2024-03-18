<?php
include('conexao.php');

include('verifica_login.php');

$login = $_SESSION['usuario'];

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

$result2 = mysqli_query($conn, "SELECT *  FROM usuario ORDER BY ID_usuario ASC LIMIT 10 OFFSET $comeco");
// ASC LIMIT 10 OFFSET $limite"

/////////////////////////////DADOS USUARIO/////////////////////////////

$queryUser = sprintf("SELECT * FROM usuario WHERE nome = '$login'");

$dadosUser = mysqli_query($conn, $queryUser);

$linhaUser = mysqli_fetch_assoc($dadosUser);

///////////////////////////////////////////////////////////////////////



if ($linhaUser['adm'] == 0){
    header('Location: dashboard.php');
	exit();
}

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


<div class="">

            <table class="table" style='position: fixed; z-index:1000; background-color:white;'>
            <tr class=''>
                <th class="first" width="25%">ID</th>
                <th class="first" width="25%">Nome</th>
                <th class="first" width="25%">Status</th>
                <th class="first" width="25%">Adm</th>
            </tr>
            </table>

            <table class="table">
            <tr class=''>
                <th class="first" width="25%">ID</th>
                <th class="first" width="25%">Nome</th>
                <th class="first" width="25%">Status</th>
                <th class="first" width="25%">Adm</th>
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

if (mysqli_num_rows($result2) ) {
    while ($row = mysqli_fetch_array($result2) ) {

        // if ($colunas >= 11){}

        if ($row['inativo'] == 1){$statos = "<a style='cursor: context-menu; color: red;'>inativo</a>";}else{$statos = "<a style='cursor: context-menu; color: green;'>ativo</a>";}

        if ($row['adm'] == 1){$ademe = "<a style='cursor: context-menu; color: green;'>sim</a>";}else{$ademe = "<a style='cursor: context-menu; color: red;'>não</a>";}

        echo "<tr>
        <td width='25%'><a style='cursor: context-menu;'>{$row['ID_usuario']}</a></td>
        <td width='25%'>
        <script> 
        function teste$nivel()
        {
          top.location.href = 'dashboard.php?usuarioPesquisa={$row['nome']}#zipo';
        }
        </script>
        <a onClick='teste$nivel()' class='' style='color: blue; cursor: pointer;'><u>{$row['nome']}</u></a>
        </td>
        <td width='25%'>{$statos}</td>
        <td width='25%'>{$ademe}</td>
        </tr>
        ";
        $nivel ++;
        $colunas ++;
        
    }
}




?>
</table>
</div>
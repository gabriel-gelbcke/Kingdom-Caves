<?php
include('conexao.php');

include('verifica_login.php');

if (!isset($_SESSION['logado']))
{
  $_SESSION['logado'] = "1";
}

// require('usuarios.php');

$login = $_SESSION['usuario'];
?>

<script>

  function aparecerInfo()
  {
    document.getElementById("infos-basic").style = "display:block";
    document.getElementById("infos-basic2").style = "display:block";
  }

</script>

<?php
//$um = $_POST['usuarioPesquisa'];
//$dois = $_SESSION['pesquisa'];


if(!isset($_SESSION['pesquisa'])) 
{
  $usuario = $login;
}

if(isset($_GET['usuarioPesquisa'])) 
{ 
  $usuario = $_GET['usuarioPesquisa'];
  $_SESSION['pesquisa'] = $usuario;
}else


if(isset($_POST['usuarioPesquisa'])) 
{
  $usuario = $_POST['usuarioPesquisa'];
  $_SESSION['pesquisa'] = $usuario;
}else if(isset($_SESSION['pesquisa'])){
  $usuario = $_SESSION['pesquisa'];
}

/////////////////////////////USUARIOS/////////////////////////////

$result2 = mysqli_query($conn, "SELECT *  FROM usuario ORDER BY ID_usuario ASC");

/////////////////////////////DADOS USUARIO/////////////////////////////

$queryUser = sprintf("SELECT * FROM usuario WHERE nome = '$login'");

$dadosUser = mysqli_query($conn, $queryUser);

$linhaUser = mysqli_fetch_assoc($dadosUser);

/////////////////////////////DADOS USUARIO PESQUISA/////////////////////////////

$queryUser2 = sprintf("SELECT * FROM usuario WHERE nome = '$usuario'");

$dadosUser2 = mysqli_query($conn, $queryUser2);

$linhaUser2 = mysqli_fetch_assoc($dadosUser2);

/////////////////////////////DADOS SAVE-STATUS/////////////////////////////

$querySaves = sprintf("SELECT * FROM estatisticas WHERE nome = '$usuario'");

$dadosSaves = mysqli_query($conn, $querySaves);

$linhaSaves = mysqli_fetch_assoc($dadosSaves);

$VezesZerou = $linhaSaves['VezesZerou'];

$Minutos = $linhaSaves['Minutos'];

$Segundos = $linhaSaves['Segundos'];

// $DinheiroPlaceHolder = $linhaSaves['dinheiro'];

// $Dinheiro = $linhaSaves['dinheiro'];




/////////////////////////////////////////////////////////////////


?>

<html lang="en">

  <head>

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


    <!-- Additional CSS Files -->
    

  </head>

<body>

    
  <!-- Sub Header -->
  <div class="sub-header">
    
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">

        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a  href="index.php" class="logo">
                          Kingdom Caves
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul  class="nav">

                    <?php
                    if ($linhaUser['adm'] == 1){echo "<li ><a style='cursor: context-menu;'>Olá, ADM "; echo $linhaUser['nome']; echo"</a></li>";}else
                    {echo "<li><a style='cursor: context-menu;'>Olá, "; echo $linhaUser['nome']; echo"</a></li>";}
                    ?> 

                                  <li class='has-sub'>
                                    <a href='javascript:void(0)'>Minha Conta</a>
                                      <ul class='sub-menu'>
                                        <li><a href='index.php'>Home</a></li>
                                        <li><a href='logout.php'>Deslogar</a></li>
                                      </ul>
                                  </li>

                          <!-- <li class="scroll-to-section"><a type="button" class="bota" data-toggle="modal" data-target="#modalLoginForm">Login</a></li> -->

                      </ul>        

                      
                      <a class="menu-trigger">
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                      
                  </nav>
              </div>
              
          </div>
          
      </div>
  </header>





<!-- *************** SCRIPT FONTE *************** -->
  <style>
a.example0 {
  padding: 0.1rem;
}

h3.example {
  padding: 20px;
}

@media screen and (min-width: 1701px) {
  h3.example {
    font-size: 3.7rem;
  }
}

@media screen and (max-width: 1700px) {
  h3.example {
    font-size: 3.5rem;
  }
}

h3.example2 {
  padding: 20px;
}

@media screen and (min-width: 1701px) {
  h3.example2 {
    font-size: 4.7rem;
  }
}

@media screen and (max-width: 1700px) {
  h3.example2 {
    font-size: 5rem;
  }
}
</style>

<!-- *************** SCRIPT BOTÕES EDIT *************** -->
<script>
function Cancel_Edit()
{
window.location.pathname = 'GameSite/cancelaEdit.php';
}

function Edit_Infos()
{
document.getElementById("editInfos").style = "display:none";
document.getElementById("confirmInfos").style = "display:block";
document.getElementById("cancelarInfos").style = "display:block; cursor: pointer;";

// document.getElementById("editEstatisticas").style = "display:none";

document.getElementById("setaAdm").style = "display:block";
document.getElementById("inputAdm").style = "display:block";

document.getElementById("setaEmail").style = "display:block";
document.getElementById("inputEmail").style = "display:block";

document.getElementById("setaSenha").style = "display:block";
document.getElementById("inputSenha").style = "display:block";

var vamo1 = document.querySelectorAll("[id='opa1']");

for(var i = 0; i < vamo1.length; i++) 
vamo1[i].style.display='block';

}

function Edit_Estatisticas()
{
document.getElementById("editEstatisticas").style = "display:none";
document.getElementById("confirmEstatisticas").style = "display:block";
document.getElementById("cancelarEstatisticas").style = "display:block; cursor: pointer;";

document.getElementById("editInfos").style = "display:none";

document.getElementById("setaDim").style = "display:block";
document.getElementById("inputDim").style = "display:block";
document.getElementById("maxDim").style = "display:block; font-size: 1.2rem; color: #5a5a5a;";

document.getElementById("setaTempo").style = "display:block";
document.getElementById("inputTempo").style = "display:block";
document.getElementById("maxTempo").style = "display:block; font-size: 1.2rem; color: #5a5a5a;";

document.getElementById("setaElim").style = "display:block";
document.getElementById("inputElim").style = "display:block";
document.getElementById("maxElim").style = "display:block; font-size: 1.2rem; color: #5a5a5a;";

document.getElementById("setaBossElim").style = "display:block";
document.getElementById("inputBossElim").style = "display:block";
document.getElementById("maxBossElim").style = "display:block; font-size: 1.2rem; color: #5a5a5a;";

document.getElementById("setaRecord1").style = "display:block";
document.getElementById("inputRecord1").style = "display:block";
document.getElementById("maxRecord1").style = "display:block; font-size: 1.2rem; color: #5a5a5a;";

document.getElementById("setaRecord2").style = "display:block";
document.getElementById("inputRecord2").style = "display:block";
document.getElementById("maxRecord2").style = "display:block; font-size: 1.2rem; color: #5a5a5a;";

document.getElementById("setaRecord3").style = "display:block";
document.getElementById("inputRecord3").style = "display:block";
document.getElementById("maxRecord3").style = "display:block; font-size: 1.2rem; color: #5a5a5a;";
}
</script>




<!-- *************** CORPO PÁGINA *************** -->

<section id="estatisticas" class="our-facts2">


<div style="height: 7rem;">
<?php
if ($linhaUser['adm'] == 1){echo "<h3 class='example card-text d-flex justify-content-center' style='padding-top: 50px; color: white;'><b style='cursor: context-menu;'>ADM DASHBOARD</b></h3>";}else
{echo "<h3 class='example card-text d-flex justify-content-center' style='padding-top: 50px; color: white;'><b style='cursor: context-menu;'>DASHBOARD</b></h3>";}
?>                       
</div>
<div id="topo"></div>
  <div class="d-flex justify-content-center" style=" padding-top: 9rem;">                          
    
  <div class="card" style="width: 80rem; border:2px; border-radius:20px;">
  <div class="card-body">

  <div class='col-lg-15'>

  
<?php

if ($linhaUser['adm'] == 1){echo "




<div class='container' style='padding-top: 1.5rem;'>
    <div class='row'>
      <div class='col'>
        <div class='md-form d-flex justify-content-center mb-5'>
          <p id='zip' class='card-text d-flex justify-content-left' style='padding-top: 0rem; font-size: 2rem; padding-left: 1.8rem;'>
            <b>USUÁRIOS</b>
          </p>
        </div>
      </div>

      <div class='col'>
        <div class='md-form d-flex justify-content-center mb-5'>
          <p id='zip' class='card-text d-flex justify-content-left' style='padding-top: 0rem; font-size: 2rem; padding-left: 1.8rem;'>
            <b>PESQUISAR USUÁRIO</b>
          </p>
        </div>
      </div>
    </div>

    <div class='row'>
      <div class='col' style='padding-left: 2rem;'>
        <iframe id='RHIFRAME1' scrolling='no' frameborder='0' align='center' width='100%' src='usuarios.php' style=' height:29rem; border:2px solid grey;'> </iframe>
      </div>

      <div class='col'>
      <form id='formPesquisa' method='post' action='dashboard.php#zipo'>
      <p id='zip' class='card-text d-flex justify-content-center' style='padding-top: 5rem; padding-left: 0rem;'> 
      <a style='padding-top: 1.3rem; padding-right: 1.3rem; font-size: 2.5rem;'><b>NOME</b></a> 
      <input name='usuarioPesquisa' type='text' style='font-size: 2.5rem; width:25rem; display:block; padding-left: 0.5rem;'></input>
      </p>

      <p id='zip' class='card-text d-flex justify-content-center' style='padding-top: 5rem; padding-left: 0rem;'> 
      <a style='padding-top: 1.3rem; padding-right: 1.3rem; font-size: 2.5rem;'></a> 
      <button type='submit' class='btn btn-secondary' style='border:2px; border-radius:2rem; font-size: 2.5rem; width:20rem; display:block; padding-left: 0.5rem;'><b>PESQUISAR</b></button>
      </p>
      
      </form>
      
      </div>
      <a id='zipo' style='padding-top:0.5rem;'></a>
    </div>


";} ?>
<?php
if (isset($_SESSION['Quantidade']) && $linhaUser['adm'] == 1) {
if ($_SESSION['Quantidade'] >=10) {
echo"
<div class='row'>
      <div class='col'>
        <div class='md-form d-flex justify-content-center mb-2'>
          <p id='' class='card-text d-flex justify-content-left' style='padding-top: 0rem; font-size: 2rem; padding-left: 1.8rem;'>
          ";
              $pag = "1";
              $numero = "1";
              
              echo "<a class='btn' style='d-flex justify-content-center; font-size:1.5rem; cursor: context-menu;'> < </a>";
              
              if (isset($_SESSION['QntdStart'])){
                while ($numero <= $_SESSION['QntdStart']) {
                  echo "
                  <script> 
                    function teste$pag()
                    {
                      var parent = window.parent;
                      var iframe = parent.document.getElementById('RHIFRAME1');//RHIFRAME1 is the capitalization of the name of the iframe that needs to be refreshed in the dashboard
                      iframe.contentWindow.location = 'usuarios.php?paginaPost={$numero}';
                    }
                  </script>
                  <a onClick='teste$pag()' class='btn' style='d-flex justify-content-center; font-size:1.5rem; color: blue; cursor: pointer;'>{$numero}</a>";
                  $pag ++; 
                  $numero ++;
                }
              }
              echo "<a class='btn' style='d-flex justify-content-center; font-size:1.5rem; cursor: context-menu;'> > </a>";
            
              echo" 
          </p>
        </div>
      </div>

      <div class='col'>
        <div class='md-form d-flex justify-content-center mb-5'>
          <p id='' class='card-text d-flex justify-content-left' style='padding-top: 0rem; font-size: 2rem; padding-left: 1.8rem;'>
            <b></b>
          </p>
        </div>
      </div>
    </div>
</div>
";
}
}
?>

</div>

    <div id='infos-basic' style='padding-top: 1.2rem; display: none;'>
    <?php if ($linhaUser['adm'] == 1){
    echo "<hr style='margin-top: 2.5rem; margin-bottom: 1rem; border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);'></hr>";
  }?>
    <div id="zup" class="md-form d-flex justify-content-center mb-5 " style="padding-top: 1.5rem;">
    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 2rem; padding-left: 1.8rem;"><b>
    <span class='example0'><?php $noume = $linhaUser2['nome']; echo strtoupper($noume);?></span>
    <?php if ($linhaUser['adm'] == 1)
    {
      if ($linhaUser2['inativo'] == 0)
        {echo "<a class='example0' style='color: green'>(ativo)</a> "; echo "<a class='example0' href='ativar.php' style='color:#33ccff;'><u>inativar</u></a>"; } 
          else 
          {echo "<a class='example0' style='color: red'>(inativo)</a> "; echo "<a class='example0' href='ativar.php' style='color:#33ccff;'><u>ativar</u></a>";} 
    
    }
    ?> &#160;
  </b></p><br>
    </div>

    

    <form id='formInfos' method='post' action='editar.php'>
    <p class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 2rem; padding-left: 1rem;">
    <?php if ($linhaUser['adm'] == 1){echo " &#160;&#160; <a id='editInfos' style='display:block; cursor: pointer;'><u style='color:#33ccff;' onClick='Edit_Infos()'>EDITAR</u></a>
    <button id='confirmInfos' class='' type='submit' style='display:none;'><u style='background-color:white; color:#33ccff; font-size: 1.8rem;'>CONFIRMAR EDIÇÃO</u></button>
    &#160; &#160;<a onClick='Cancel_Edit()' id='cancelarInfos' style='cursor: pointer; display:none;'><u onClick='Cancel_Edit()' style='background-color:white; color:red; font-size: 1.8rem;'>CANCELAR</u></a>";}?>
    </p><br>

    
    <div class="md-form d-flex justify-content-left mb-5 " style="padding-top: 0.5rem;">
    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 2rem; padding-left: 1.8rem;"
    ><b>INFORMAÇÕES</b>
    </p><br>
    </div>

    <!-- <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);"></hr><br> -->
   

    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.4rem; padding-left: 1.8rem;"
    >Ultimo login: &#160;<u>12/09/2022</u></p><br>



<!-- <input name='adm' type='number' min='0' max='1' placeholder='$adm' style='width:10rem; display:none;'></input> -->

    <p id="zipo2" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;"
    >User ID: <?php echo $linhaUser2['ID_usuario'];?></p><br>

    <p id="zipo2" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;"
    >Nome de Usuário: <?php echo $linhaUser2['nome'];?></p><br>

    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;"
    >Email: <?php $email = $linhaUser2['email']; echo $email;?><?php if ($linhaUser['adm'] == 1){
    echo " <a id='setaEmail' style='display:none;'> &#160; ->&#160; &#160;</a> <a id='opa1' style='display:none;'></a> 
    
    <input id='inputEmail' name='email' type='email' min='1' max='98999' placeholder='$email' style='width:1rem; display:none;'></input> &#160;";}?></p><br>

<p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;"
    >Senha: <?php $senha = $linhaUser2['senha']; echo $senha;?> &#160; <?php if ($linhaUser['adm'] == 1){
    echo " <a id='setaSenha' style='display:none;'>-></a> &#160; &#160; 
    <input id='inputSenha' name='senha' type='password' min='1' max='98999' placeholder='$senha' style='width:10rem; display:none;'></input> &#160;";}?></p><br>

<?php if ($linhaUser['adm'] == 1){ echo "<p id='zip' class='card-text d-flex justify-content-left' style='padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;'
    >Adm:";} ?> <?php $adm = $linhaUser2['adm']; if ($adm == 1)
    {$ademe = 'sim'; $opcao1 = "<option value='1'>Sim</option>"; $opcao2 = "<option value='2'>Não</option>";}else
    {$ademe = 'não'; $opcao1 = "<option value='2'>Não</option>"; $opcao2 = "<option value='1'>Sim</option>";};if ($linhaUser['adm'] == 1){ echo $ademe;}?> &#160; <?php if ($linhaUser['adm'] == 1){
    echo " <a id='setaAdm' style='display:none;'>-></a> &#160; &#160;
    <select id='inputAdm' id='cars' name='adm' style='width:10rem; display:none;'>
    $opcao1
    $opcao2
    </select>
     &#160;";}?></p><?php if ($linhaUser['adm'] == 1){ echo"<br>";}?>

  </div>

  <div id="infos-basic2" style="display:none;">

  <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);"></hr>

  <p class="card-text d-flex justify-content-left" style="padding-top: 1rem; font-size: 2rem; padding-left: 1rem;">

    </p><br>
    
    <div class="md-form d-flex justify-content-left mb-5 " style="padding-top: 0.5rem;">
    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 2rem; padding-left: 1.8rem;"
    ><b>ESTATISTICAS</b></p><br>
    </div>

    <!-- <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);"></hr><br> -->

    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;"
    >Vezes Que Zerou: <?php echo $VezesZerou; ?> &#160;</p><br>

    <?php

    $CutM = 0;
    $CutS = 0;

    ?>


    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;"
    >Tempo Record: <?php if ($Minutos <= 9){echo $CutM;} echo $Minutos, ":"; if ($Segundos <= 9){echo $CutS;} echo $Segundos;?> &#160;</p><br>

    
    <p id="zip" class="card-text d-flex justify-content-left" style="padding-top: 0rem; font-size: 1.5rem; padding-left: 1.8rem;"
    >Criação da Conta: <?php echo $linhaUser2['dataCria']; ?> &#160;</p><br>

    </form>

    <!-- <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);"></hr>--><br> 

    </div>

</div>
</div>
  </section>

  <section class="contact-us3" id="contact">
  
    <div class="footer">
      <p>Copyright © 2022 Kingdom Caves, Ltd. All Rights Reserved.</p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="vendor/bootstrap/js/jv3.js"></script>

    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>

    <?php

    if(isset($_POST['usuarioPesquisa']) || isset($_SESSION['pesquisa']))
    {
      echo "<script> aparecerInfo(); </script>";
    }

    if ($linhaUser['adm'] == 0)
    {
      echo "<script> aparecerInfo(); </script>";
    }
    ?>

    <?php
    if (!isset($_SESSION['refresh'])){$_SESSION['refresh'] = 0;}
    if ($_SESSION['refresh'] == 0){$_SESSION['refresh'] = 1; echo"<script>window.top.location.reload();</script>";}
    if (isset($_SESSION['refresh'])){$refresh = $_SESSION['refresh'];}
    ?>

</body>
</html>
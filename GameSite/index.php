<?php
include('conexao.php');
session_start();

//QUERY DO USUARIO
$queryUser = sprintf("SELECT * FROM usuario");

$dadosUser = mysqli_query($conn, $queryUser);

$linhaUser = mysqli_fetch_assoc($dadosUser);

/*

echo $linhaUser['nome'];
echo "<br>";
echo $linhaUser['senha'];
echo "<br>";
echo $linhaUser['email'];
echo "<br>";

*/

//QUERY QTD PLAYERS
$queryUsuarios = "SELECT COUNT(ID_usuario) AS qtd_usuarios FROM usuario";

$Qtd_Usuarios = mysqli_query($conn, $queryUsuarios);

$rowUsuarios = mysqli_fetch_assoc($Qtd_Usuarios);

$QuantidadePlayers = $rowUsuarios['qtd_usuarios'];


//QUERY PRIMEIRA CONTA
// $PrimeiraConta = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT nome, dataCria FROM usuario WHERE dataCria = (SELECT MIN(dataCria) FROM usuario)'));

// //QUERY MAIS DINHEIRO
// $MaisDinheiro = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT nome, dinheiro FROM savestatus WHERE dinheiro = (SELECT MAX(dinheiro) FROM savestatus)'));

// //QUERY MAIS MONSTROS
// $MaisMonstros = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT nome, kills FROM estatisticas WHERE kills = (SELECT MAX(kills) FROM estatisticas)'));

// //QUERY MAIS BOSSES
// $MaisBoss = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT nome, bosskills FROM estatisticas WHERE bosskills = (SELECT MAX(bosskills) FROM estatisticas)'));

//QUERY MAIS ZEROU
$MaisZerou = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT nome, VezesZerou FROM estatisticas WHERE VezesZerou = (SELECT MAX(VezesZerou) FROM estatisticas)'));

if (isset($MaisZerou['VezesZerou']))
{
  $Vezes = ($MaisZerou['VezesZerou']);
}

// if($TempoJogo>=60) {$TempoJogo = round(($TempoJogo/60)).' H'; } else {$TempoJogo = round(($TempoJogo)).' Minutos'; }

//QUERY MAIS CONQUISTAS
// $MaisConquistas = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT nome, conquistas FROM estatisticas WHERE conquistas = (SELECT MAX(conquistas) FROM estatisticas)'));

// //IFS (K)
// if($Dinheiro>1000) {$Dinheiro = round(($Dinheiro/1000),1).' K'; }
// if($mediaDinheiro>1000) {$mediaDinheiro = round(($mediaDinheiro/1000),1).' K'; }


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
                      <!-- <a href="index.html" class="logo"> -->
                        <a style='cursor: context-menu;' onClick="fa()" class="logo">  
                          Kingdom Caves
                      </a>
                    <script> 
                    
                    
                    </script>

                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                        
                          <li class="scroll-to-section"><a href="#top" class="active"></a></li>
                          
                          <li class="has-sub">
                            <a href="javascript:void(0)">Redes Sociais</a>
                            <ul class="sub-menu">
                                <li><a target="blank" href="https://instagram.com">Instagram</a></li>
                                <li><a target="blank" href="https://discord.com">Discord</a></li>
                            </ul>
                          </li>
                          <?php
                          if (isset($_SESSION['logado']))
                          {
                            if ($_SESSION['logado'] == 1)
                            echo "<script>
                            function IrDash()
                            {
                              window.top.location = 'dashboard.php#topo';
                            }
                            </script>";

                            

                            echo "<li class='has-sub'>
                                    <a href='javascript:void(0)'>Minha Conta</a>
                                      <ul class='sub-menu'>
                                        <li class='scroll-to-section'><a id='modass' type='button' class='bota' onClick='IrDash()'>Dashboard</a></li>
                                        <li ><a href='logout.php'>Deslogar</a></li>
                                      </ul>
                                  </li>";
                            }else{
                              echo "<li class='scroll-to-section'><a id='modass' type='button' class='bota' data-toggle='modal' data-target='#modalLoginForm' onClick='YesAccount()'>Fazer Login</a></li>";
                            }
                          ?>
                          
                                



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
  <!-- ***** Header Area End ***** -->


  <!-- Button trigger modal -->


    <!----------------------------------------------------------------------------------------------------- ***** MODAL USUARIO ***** -->
<script>
function NoAccount()
{
document.getElementById("formu-log").reset();

document.getElementById("formu-log").style = "display:none";
document.getElementById("formu-reg").style = "display:block";

document.getElementById("botaoNao").style = "display:none";
document.getElementById("botaoSim").style = "display:block";

document.getElementById("botaoLogar").style = "display:none";
document.getElementById("botaoRegistrar").style = "display:block";

document.getElementById("TextoTitle").innerHTML = "Faça seu Registro";

}

function YesAccount()
{
document.getElementById("formu-reg").reset();

document.getElementById("formu-log").style = "display:block";
document.getElementById("formu-reg").style = "display:none";

document.getElementById("botaoNao").style = "display:block";
document.getElementById("botaoSim").style = "display:none";

document.getElementById("botaoLogar").style = "display:block";
document.getElementById("botaoRegistrar").style = "display:none";

document.getElementById("TextoTitle").innerHTML = "Faça seu Login";

}
</script>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">

  <div class="modal-content ">
    <div class="md-form mb-3"></div>
    <div class="modal-header text-center ">
      
      <h4 id="TextoTitle" class="modal-title w-100 font-weight-bold ">Faça seu Login</h4>
      
    </div>

    <div class="modal-body mx-3">

    <!-- FORMULÁRIO LOGAR -->
    <form id="formu-log" name="Logar" action="Logar.php" method="post" style="display:block;">

      <div class="md-form mb-4">
      <label class="d-flex justify-content-center mb-4" data-error="wrong" data-success="right" for="defaultForm-pass">Usuario</label>
      <input id="nameInput" name="nome" type="text" class="form-control validate mb-4" placeholder="USUARIO">
      </div>

      <div class="md-form mb-4">
        <label class="d-flex justify-content-center mb-4" data-error="wrong" data-success="right" for="defaultForm-pass">Senha</label>
        <input id="senhaInput" name="senha" type="password" class="form-control validate mb-4" placeholder="SENHA">
      </div>

      <div class="md-form d-flex justify-content-center mb-4">
        <button id="botaoLogar" type="submit" class="btn btn-primary btn-lg" style="display:block;">Logar</button>
      </div>

    </form>
    <!-- FORMULÁRIO LOGAR -->

    <!-- FORMULÁRIO REGISTRAR -->
    <form id="formu-reg" name="Logar" action="cadastrar.php" method="post" style="display:none;">

      <div class="md-form mb-4">
      <label class="d-flex justify-content-center mb-4" data-error="wrong" data-success="right" for="defaultForm-pass">Usuario</label>
      <input id="nameInput" name="nome" type="text" class="form-control validate mb-4" placeholder="USUARIO">
      </div>

      <div class="md-form mb-4">
        <label class="d-flex justify-content-center mb-4" data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
        <input id="emailInput" name="email" type="email" pattern="[^ @]*@[^ @]*" placeholder="EMAIL" required="" class="form-control validate">
      </div>

      <div class="md-form mb-4">
        <label class="d-flex justify-content-center mb-4" data-error="wrong" data-success="right" for="defaultForm-pass">Senha</label>
        <input id="senhaInput" name="senha" type="password" class="form-control validate mb-4" placeholder="SENHA">
      </div>

      <div class="md-form d-flex justify-content-center mb-4">
        <button id="botaoRegistrar" type="submit" class="btn btn-primary btn-lg" style="display:block;">Registrar</button>
      </div>

    </form>
    <!-- FORMULÁRIO REGISTRAR -->

      <div class="md-form d-flex justify-content-center">
        <a class="btn btn-default d-flex justify-content-center" href="#" role="button">Esqueci a senha</a>
        <a id="botaoNao" class="btn btn-default" data-toggle="modal" onClick="NoAccount()" style="display:block;">Não tenho uma conta</a>
        <a id="botaoSim" class="btn btn-default" data-toggle="modal" onClick="YesAccount()" style="display:none;">Já possuo uma conta</a>
      </div>

    </div>
    <div class="modal-footer d-flex justify-content-center">
      <div class="md-form mb-3">
      </div>
    </div>
  </div>

    

</div>
</div>

<section id="tops" class="upcoming-meetings3">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Top 10 Players do Server</h6>
          </div>
        </div>
        
        <div class="col-lg-12">
          <div class="row">

          <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                <!-- <div style="background-color: white; height:3.5rem; border-radius:20px 20px 0% 0%;"></div> -->
                  
                  <iframe id='RHIFRAME1' scrolling='no' frameborder='0' align='center' width='100%' src='topZerou.php' style='border-radius:20px 20px 20px 20px; height:35rem; border:2px solid grey;'> </iframe>
                  <!-- <a><img src="assets/images/meeting-04.jpg" alt="Student Training"></a> -->
                </div>
                <div class="">
                  <!-- <div class="date">
                    <h6>Top <span>1</span></h6>
                  </div> -->
                  <!-- <a><h5><?php echo ucfirst($MaisTempo['nome']) ;?></h5></a>
                  <b><?php echo $TempoJogo;?></b> -->
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                <!-- <div style="background-color: white; height:3.5rem; border-radius:20px 20px 0% 0%;"></div> -->
                  
                  <iframe id='RHIFRAME1' scrolling='no' frameborder='0' align='center' width='100%' src='topRecord.php' style='border-radius:20px 20px 20px 20px; height:35rem; border:2px solid grey;'> </iframe>
                  <!-- <a><img src="assets/images/meeting-04.jpg" alt="Student Training"></a> -->
                </div>
                <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);"></hr>
                <div class="">
                  <!-- <div class="date">
                    <h6>Top <span>1</span></h6>
                  </div> -->
                  <!-- <a><h5><?php //echo ucfirst($MaisTempo['nome']) ;?></h5></a>
                  <b><?php //echo $TempoJogo;?></b> -->
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    
  </section>

<section id="tops" class="upcoming-meetings2">
    <div class="container">
      <div class="row">

      <div class="col-lg-12">
          <div class="section-heading">
            <h6>Requistidos do Sistema</h6>
          </div>
        </div>
</div>
</div>
</section>
<section id="requisito" class="apply-now" id="apply">
        <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h3>Requisitos Mínimos</h3>
                <p>Processador: Intel® Pentium G2030<br>Memória: 4gb<br>Vídeo: Intel® HD Graphics<br>Armazenamento: 1gb HD</p>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h3>Requisitos Recomendados</h3>
                <p>Processador: Intel® Core i3 2100<br>Memória: 8gb<br>Vídeo: Nvidia® Gt 710<br>Armazenamento: 2gb SSD</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>


  <section id="estatisticas" class="our-facts3">

<div style="height: 7rem;">
<h3 class="example card-text d-flex justify-content-center" style="padding-top: 50px; color: white;">Download</h3>                         
                            </div>

<div class="d-flex justify-content-center" style=" padding-top: 2rem;">                          
  
<div class="card" style="width: 40rem;">
<div class="card-body">
  <h3 id="obrigado" class="card-text d-flex justify-content-center" style="padding-top: 2rem;"></h3>
  
  <p id="zip" class="card-text d-flex justify-content-center" style="padding-top: 0.5rem; font-size: 1.2rem;">Kingdom Caves.zip (v2.8)</p>
  <div class="md-form d-flex justify-content-center mb-5 " style="padding-top: 1.5rem;">
      <button onclick="verifydownload()" id="botao" type="submit" class="enabled btn btn-primary btn-lg" style="width: 80%;" ><a > Fazer Download </a></button>
      <a id="downloadPath" href="exemplo.txt" download style="display:none;"></a>
  </div>
  <div class="text-center">
  <p id="zip" class="card-text" style="padding-top: 0.5rem; font-size: 0.9rem;">*É necessário um <a href="https://www.win-rar.com/" target="_blank">programa</a> para descompactar o arquivo antes de jogar*</p>
</div>

</div>
</div>
</section>
  

  







  <section class="contact-us" id="contact">

    <div class="footer2">
      <p>Copyright © 2022 Kingdom Caves, Ltd. All Rights Reserved.</p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>

    <script src="vendor/bootstrap/js/jv1.js"></script>
    <script src="vendor/bootstrap/js/jv2.js"></script>
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

<style>
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


  
<script>
function verifydownload()
{
document.getElementById("downloadPath").click()

const botao = document.getElementById("botao");
document.getElementById("zip").style = 'padding-top: 3.4rem; font-size: 1.2rem;';
document.getElementById("obrigado").innerHTML = "Muito obrigado por baixar!";

botao.className = "disabled btn btn-primary btn-lg";
zip.styleName = "disabled btn btn-primary btn-lg";


}
</script>

</body>

</body>
</html>
<?php
include('conexao.php');

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

<body style="background-color:#221e1e">


    
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
                      <a href="index.php" class="logo">
                          Kingdom Caves
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                        
                          <li><a href="index.php">Página Inicial</a></li>



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




  <!-- ***** Main Banner Area Start ***** -->

  <!-- ***** Main Banner Area End ***** -->

  <!-- Modal -->



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


  <section id="estatisticas" class="our-facts3">

  <div style="height: 7rem;">
  <h3 class="example card-text d-flex justify-content-center" style="padding-top: 50px; color: white;">Download</h3>                         
                              </div>

  <div class="d-flex justify-content-center" style=" padding-top: 9rem;">                          
    
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

  <section class="contact-us2" id="contact">
  
    <div class="footer">
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

</body>

</body>
</html>
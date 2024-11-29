<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="UserStyle.css">
    <link href="fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet">
    <title>MIRATHY</title>
</head>
<body>

    <!--Navbar-->
    <?php include "Navbar.inc.php"; ?>
  <!--/Navbar-->

<!--Mask-->
  <div id="intro" class="view hm-black-strong" style="opacity:100%;position: relative;overflow:auto;">
    <div class="container-fluid full-bg-img d-flex align-items-center justify-content-center" >
      <div class="row d-flex justify-content-center">
       <div class="col-md-12 text-center" style="padding-bottom: 100px;"> 
        <br>

      <!--Heading-->
      <h2 class="display-3 font-bold white-text mb-2">MIRATHY</h2>
      
      <!--Divider-->
      <hr class="hr-light">

      <!--Description-->
  
      <h3 class="white-text my-4">Découvrez votre historique de calcul d'héritage.</h3>

<?php include "historique.php";?>

       </div>
      </div>
    </div>
  </div>
<!--/Mask-->



<!--Main-->
<main class="mt-5">
  <div class="container-fluid">
  
    <section id="contact">
      <!-- Heading -->
      <!--<h2 class="mb-5 font-weight-bold text-center">CONTACT NOUS</h2>-->

    </section>

  </div>

</main>

<!--/Main-->
    
          <!-- Footer -->
<footer class="bg-dark text-center text-white" style="  position: relative;
bottom: 0;
  width: 100%;
  z-index: 999;">
  <!-- Grid container -->
  <div class="container p-4">
    <div class="text-left">
      <h2>MIRATHY</h2>
    </div>
    <!-- Section: Social media -->
    <section class="mb-4">
      <h5 id="Social-Med" class="text-uppercase">Info: Suiver Nous sur Social media</h5>
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://fr-fr.facebook.com" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/twitter" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/?hl=fr" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.Linkedin.com" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

    </section>
    <!-- Section: Social media -->

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
        MIRATHY met à votre disposition cet espace distingué pour faciliter les services 
        qu'elle fournit à ses visiteurs et faciliter la calcul d'héritage.
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row d-flex justify-content-center">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Comment Calculer</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <p>Pour vous calculer sur l'espace MIRATHY,
              vous devez répondre au questions de formulaire</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Contacter Nous</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <p>N'oubliez pas de communiquer avec nous en envoyant un message
                via Facebook, Twitter, Instagram ou vous pouvez nous contacer sur Mail,Télé,...
              </p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Restez connecté</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <p>Ne ratez aucune actualité concernant votre bien</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="http://www.fsr.ac.ma/">Tous droits réservés par MIRATHY</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

        
    <!--JS-->
    <script>
         function rowClick(defuntID){
         window.location.href = 'historiqueDefunt.html.php?id=' + defuntID;
                }
    </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>
</body>
</html>

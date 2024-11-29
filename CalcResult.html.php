<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
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
          <h3 class="white-text my-4">Part Des Héritiers</h3>
          <div class="reminder-container">
            <!--<div class="reminder-note">
              <p><strong>NB :</strong> Merci de vous assurer que les proches saisis sont vivants.</p>
            </div>-->
          </div>
          <!-- PHP -->
          <?php
            include "fractions.php";
            include "printrow.inc.php";
            include "translate.inc.php";
            echo '
            <form action="enregistrer.php" method="POST">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Relation au Défunt</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nature d\'héritage</th>
                    <th scope="col">Portion en fraction</th>
                    <th scope="col">Portion</th>
                    <th scope="col">La valeur de la part en Dirhams</th>
                  </tr>
                </thead>';
            $table_fard = $_SESSION['fard'];
            $table_taasib = $_SESSION['taasib'];
            $heirs = $table_fard + $table_taasib;
            $asl = $_SESSION['asl'];
            $tp = new fraction(0);
            $heir_info = array();
            foreach ($heirs as $key => $value) {
              $n = translate($value['name'], $names);
              $t = $value['type'];
              $p = new Fraction($value['portion_num'],$value['portion_den']);
              $r = $value['ration'];
              $nb = $value['number'];
              $res = $value['result'];
              PrintRow($n, $t,$p, $r, $nb, $res, $asl, $heir_info);
              $tp = fractions::add($p,$tp);
            }
            $_SESSION['heir_info'] = $heir_info;
            echo '<tr><th>TOTAL</th><td colspan="3"></td><td>'.Fractions::toString($tp).'</td><td>'.$asl .'</td><td>'.$_SESSION['inheritance'].'</td></tr>
              </table>
              <div class="d-grid gap-2 col-6 mx-auto">
              <input type="submit" value="Enregistrer" name="enregistrer">
</div>
            </form>';
if (isset($_SESSION['msg_enr'])){
 echo '<br> <div class="reminder-note"><p><strong>NB :</strong>'.$_SESSION['msg_enr'].'</p></div>';
 $_SESSION['msg_enr']=null;
}
          ?>
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
<footer class="bg-dark text-center text-white" style="position: relative; bottom: 0; width: 100%; z-index: 999;">
  <!-- Grid container -->
  <div class="container p-4">
    <div class="text-left">
      <h2>MIRATHY</h2>
    </div>
    <!-- Section: Social media -->
    <section class="mb-4">
      <h5 id="Social-Med" class="text-uppercase">Info: Suivez-nous sur les réseaux sociaux</h5>
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://fr-fr.facebook.com" role="button"><i class="fab fa-facebook-f"></i></a>
      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/twitter" role="button"><i class="fab fa-twitter"></i></a>
      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com" role="button"><i class="fab fa-google"></i></a>
      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/?hl=fr" role="button"><i class="fab fa-instagram"></i></a>
      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.Linkedin.com" role="button"><i class="fab fa-linkedin-in"></i></a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
        Le Calculatrice met à votre disposition cet espace distingué pour faciliter les services qu'elle fournit à ses visiteurs et faciliter le calcul d'héritage.
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row d-flex justify-content-center">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Comment s'inscrire</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <p>Pour vous inscrire sur l'espace MIRATHY, vous devez cliquer sur "S'inscrire".</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Nous contacter</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <p>N'oubliez pas de communiquer avec nous en envoyant un message via la plate-forme ou vous pouvez nous contacter par e-mail, téléphone, etc.</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Restez connecté</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <p>Ne manquez aucune informations concernant votre héritage.</p>
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
    © 2023 Tous droits réservés par FSR
  </div>
</footer>
<!-- Footer -->



</body>
</html>

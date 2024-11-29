<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>َLogin Secrétaire</title>
    <link rel="stylesheet" href="log-s.css">
  </head>
  <body>

    <!--Navbar-->
    <?php include "Navbar.inc.php"; ?>
  <!--/Navbar-->

  <!--Mask-->
  <div id="intro" class="view hm-black-strong" >
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
       <div class="col-5 text-center mx-auto">

        <br>

      <!--Heading-->
      <h2 class="display" style="cursor: pointer;">Connectez-vous à votre compte</h2>
      
      <!--Divider-->
      <hr class="hr-light">

       </div>
      </div>
    </div>

  </div>
<!--/Mask-->

<!-- Login -->
<form class="box"  method="POST">
  <h1>Login</h1>
  <input type="text" name="user_name" placeholder="Nom Utilisateur">
  <input type="password" name="password" placeholder="Mot de passe">
  <input type="submit" name="submit" value="Connecter">
</form>
<!-- /Login -->



<!-- Footer -->
<footer class="section-footer">

  <!-- Copyright -->
  <div class="text-center p-3">
    © 2023 Copyright : Tous droits réservés par MIRATHY.com
  </div>
  <!-- /Copyright -->
</footer>
  <!--/footer-->


    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
    crossorigin="anonymous"></script>
  </body>
  
</html>

<?php
include('Layout.php');


if(isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $check1 = $connection->prepare("SELECT * FROM users WHERE user_name = :user_name");
    $check1->bindParam(":user_name", $user_name);
    $check1->execute();

    if($check1->rowCount() > 0) {
        $user = $check1->fetch(PDO::FETCH_ASSOC);
        $hashedPasswordFromDB = $user['password'];

        if(password_verify($password, $hashedPasswordFromDB)) {
            $_SESSION["autorise"] = "oui";
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_id'] = $user['user_id'];
              $prevPage = $_GET['prevPage'] ?? 'index.html.php';
    header("Location: " . $prevPage);
    exit;
          }
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert" style="position:absolute;top:115px;left:5%;width:80%;text-align:center;">
                Login ou mot de passe incorrect !
            </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert" style="position:absolute;top:115px;left:5%;width:80%;text-align:center;">
            Utilisateur introuvable !
        </div>';
    }

              
?>
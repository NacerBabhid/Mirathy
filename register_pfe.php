<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link href="fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
<?php include "Navbar.inc.php"; ?>
       <!--/Navbar-->
       <!-- header -->
   <div class="register">
       <div class="logo">
           <div class="logo-img">
               <h1><img src="logo_her.png"  alt="Mirathy LOGO" width="300" height="220"  /></h1>
           </div>
       </div>
       <div class="form">
           <form method="POST">
               <h1>INSCRIPTION</h1>
               <p class="free">C'est totalement gratuit</p>
               <input type="text" name="user_name" placeholder="Nom d'utilisateur">
               <input type="text" name="Nom" placeholder="Votre Nom">
               <input type="text" name="Prenom" placeholder="Votre Prénom">
               <input type="email" name="AdrM" placeholder="Adresse Mail">
               <input type="text" name="Tele" placeholder="06123...">
               <input type="text" name="Profession" placeholder="Profession">
               <input type="password" name="password" placeholder="Mot de passe">
               <div class="term">
                <input type="checkbox" required />
                <p>J'accepte toutes les conditions d'utilisation de cette application et m'engage à respecter les délais.</p>
               </div>
                <input type="submit" name="submit" value="Créer un compte">
                <a href="loginn.html.php">Je suis déjà membre</a>
           </form>
       </div>
   </div>
   <!--/header-->
   <!-- Footer -->
<footer class="section-footer">
    <div class="text-center p-3">
      © 2023 Tous droits réservés par MIRAHTY.com
    </div>
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
include('layout.php');
$erreur = "";

if(isset($_POST['submit'])){
  if(empty($_POST['user_name'])){
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Saisir Le nom_utilisateur !!!</div>';
  }
  else if(empty($_POST['Nom'])){
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Saisir Le Nom !!!</div>';
  }
  else if(empty($_POST['Prenom'])){
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Saisir Le Prénom !!!</div>';
  } 
  else if(empty($_POST['AdrM'])){
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Saisir l\'Adresse Mail !!!</div>';
  }
  else if(empty($_POST['AdrM'])){
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">
        Saisir une adresse e-mail valide !!!
    </div>';
} else if(!filter_var($_POST['AdrM'], FILTER_VALIDATE_EMAIL)) {
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">
        Adresse e-mail invalide !!!
    </div>';
}
  else if(empty($_POST['Tele'])){
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Saisir Le Numéro de téléphone !!!</div>';
  }
  else if(empty($_POST['Profession'])){
    $erreur = "<div class='alert alert-danger' role='alert' style='position:absolute;top:95px;left:5%;width:80%;text-align:center;'>Saisir La profession !!!</div>";
  }
  else if(empty($_POST['password'])){
    $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Saisir Le Mot de passe !!!</div>';
  }
  else{
    $checkuser_name = $connection->prepare("SELECT * FROM users WHERE user_name = :user_name");
    $user_name = $_POST['user_name'];
    $checkuser_name->bindParam(":user_name", $user_name);
    $checkuser_name->execute();

    if($checkuser_name->rowCount() > 0){
      $erreur = '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Ce compte existe déjà !!!</div>';
    }
    else{
      $user_name = $_POST['user_name'];
      $name = $_POST['Nom'];
      $fname = $_POST['Prenom'];
      $mail = $_POST['AdrM'];
      $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $Tele = $_POST['Tele'];
      $prof = $_POST['Profession'];

      $addUser = $connection->prepare("INSERT INTO users (user_name, Nom, prenom, email, password, tel, profession, role) VALUES (:user_name, :Nom, :prenom, :AdrM, :password, :Tele, :Profession, 'Utilsateur')");
      $addUser->bindParam(":user_name", $user_name);
      $addUser->bindParam(":Nom", $name);
      $addUser->bindParam(":prenom", $fname);
      $addUser->bindParam(":AdrM", $mail);
      $addUser->bindParam(":password", $pwd);
      $addUser->bindParam(":Tele", $Tele);
      $addUser->bindParam(":Profession", $prof);

      if($addUser->execute()){
        echo '<div class="alert alert-success" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Compte créé avec succès</div>';
      }
      else{
        echo '<div class="alert alert-danger" role="alert" style="position:absolute;top:95px;left:5%;width:80%;text-align:center;">Erreur 404 !!! Veuillez réessayer à nouveau</div>';
      }
    }
  }
}

if(!empty($erreur)){
  echo $erreur;
}
?>

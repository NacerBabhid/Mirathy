<?php 
if($_SERVER["PHP_SELF"]=="/Mirathy-app/enregistrer.php"){
  $prev = "/Mirathy-app/CalcResult.html.php";
}else {
  $prev = $_SERVER["PHP_SELF"];
}

echo ' <!--Navbar-->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
   <div class="container-fluid">
    <a class="navbar-brand" href="#intro"><img src="logo_her.png" alt="MIRATHY LOGO" width="140" height="50" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-auto">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#intro">ACCEUIL<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="loginn.html.php?prevPage='. $prev.'">SE CONNECTER <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="register_pfe.php?prevPage='. $prev.'">S\'INSCRIRE <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#Social-Med">À PROPRE <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>
  <!--/Navbar-->';
?>
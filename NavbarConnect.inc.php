<?php 
echo '<header>
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
          <a class="nav-link" href="index.html.php">ACCEUIL<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="historique.html.php">HISTORIQUE <span class="sr-only">(current)</span></a>
        </li>
<!--<li class="nav-item active">
          <a class="nav-link" href="register_pfe.php">S\'INSCRIRE <span class="sr-only">(current)</span></a>
        </li> -->
        <li class="nav-item active">
          <a class="nav-link" href="deconnexion.php">SE DÉCONNECTER<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- nom d\'utilisateur -->
<span class="navbar-text" style="position : relative; top: 30%;left: 3%; display: flex; align-items: center;">
<i class="fas fa-user-circle fa-2x" style="margin-right: 5px;"></i> <p style="margin: 0;"></p>'?>
<?php

if (isset($_SESSION['user_name'])) {
echo " ".$_SESSION['user_name'];
}
echo '</span>
<!-- /nom d\'utilisateur -->
</header>';
?>
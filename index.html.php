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
  
      <h3 class="white-text my-4">Bienvenue dans votre espace de Calcul d'héritge</h3>
      <div class="reminder-container">
      <div class="reminder-note">
        <p><strong>NB :</strong> Merci de vous assurer que les proches saisis sont vivants.</p>
      </div>
    </div>     
<form class="box" action="calc.php" name="register" method="post" style="margin:100px 50px auto 50px;">
<div id="inheritance">
    <label for="nom">Le nom du défunt (optionnel)?</label>
      <input class="custom-select" name="nom" type="text" id="nom"/>
    </select>
  </div>

  <div id="inheritance">
    <label for="prenom">Le prenom du défunt (optionnel)?</label>
      <input class="custom-select" name="prenom" type="text" id="prenom"/>
    </select>
  </div>
  <div id="inheritance">
    <label for="inheritance">La somme heritable (optionnel)?</label>
      <input class="custom-select" name="inheritance" type="number" id="inheritance" min="0" value="0"/>
    </select>
  </div>

  <label for="gender">Sexe du décédé:</label>
  <select class="custom-select" name="gender" id="gender" onchange="showNextSection()">
    <option value="">Choisir le sexe</option>
    <option value="male">Homme</option>
    <option value="female">Femme</option>
  </select>
  
  <div id="wife-section" style="display: none">
    <label for="wife">Nombre d'époux:</label>
    <select class="custom-select" name="wife" id="wife" onchange="showNextSection()">
      <option value="">Choisir le nombre d'époux</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>
  <div id="husband-section" style="display: none">
    <label for="husband">La décédée a t elle un époux?</label>
    <select class="custom-select" name="husband" id="husband" onchange="showNextSection()">
      <option value="">Choisir l'état de l'époux</option>
      <option value="alive">Oui</option>
      <option value="dead">Non</option>
    </select>
  </div>
  
  <div id="father-section" style="display: none">
    <label for="father">Le père est-il vivant?</label>
    <select class="custom-select" name="father" id="father" onchange="showNextSection()">
      <option value="">Choisir l'état du père</option>
      <option value="alive">Oui</option>
      <option value="dead">Non</option>
    </select>
  </div>
  
  <div id="grandfather-section" style="display: none">
    <label for="grandfather">Le grand-père est-il vivant?</label>
    <select class="custom-select" name="grandfather" id="grandfather" onchange="showNextSection()">
      <option value="">Choisir l'état du grand-père</option>
      <option value="alive">Oui</option>
      <option value="dead">Non</option>
    </select>
  </div>
  
  <div id="mother-section" style="display: none">
    <label for="mother">La mère est-elle vivante?</label>
    <select class="custom-select" name="mother" id="mother" onchange="showNextSection()">
      <option value="">Choisir l'état de la mère</option>
      <option value="alive">Oui</option>
      <option value="dead">Non</option>
    </select>
  </div>
  
  <div id="grandmother-section" style="display: none">
    <label for="grandmother">La grand-mère est-elle vivante?</label>
    <select class="custom-select" name="grandmother" id="grandmother" onchange="showNextSection()">
      <option value="">Choisir l'état de la grand-mère</option>
      <option value="alive">Oui</option>
      <option value="dead">Non</option>
    </select>
  </div>
  
  <div id="fathers-mother-section" style="display: none">
    <label for="fathers-mother">La mère du père est-elle vivante?</label>
    <select class="custom-select" name="fathersmother" id="fathers-mother" onchange="showNextSection()">
      <option value="">Choisir l'état de la mère du père</option>
      <option value="alive">Oui</option>
      <option value="dead">Non</option>
    </select>
  </div>
  
  <div id="sons-section" style="display: none">
    <label for="sons">Nombre de fils?</label>
        <input class="custom-select" name="sons" type="number" id="sons" onchange="showNextSection()" min="0" step="1" />
  </div>

  <div id="daughters-section" style="display: none">
    <label for="daughters">Nombre de filles?</label>
        <input class="custom-select" name="daughters" type="number" id="daughters" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="grandsons-section" style="display: none">
    <label for="grandsons">Nombre de petits-fils?</label>
        <input class="custom-select" name="grandsons" type="number" id="grandsons" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="granddaughters-section" style="display: none">
    <label for="granddaughters">Nombre de petites-filles?</label>
        <input class="custom-select" name="granddaughters" type="number" id="granddaughters" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="half-siblings-m-section" style="display: none">
    <label for="half-siblings-m">Nombre de demi frères et soeurs de la part du mère?</label>
        <input class="custom-select" name="halfsiblingsm" type="number" id="half-siblings-m" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="brothers-section" style="display: none">
    <label for="brothers">Nombre de frères?</label>
        <input class="custom-select" name="brothers" type="number" id="brothers" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="sisters-section" style="display: none">
    <label for="sisters">Nombre de soeurs?</label>
        <input class="custom-select" name="sisters" type="number" id="sisters" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="half-brothers-section" style="display: none">
    <label for="half-brothers">Nombre de demi frères (frères de la part du père)?</label>
        <input class="custom-select" name="halfbrothers" type="number" id="half-brothers" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="half-sisters-section" style="display: none">
    <label for="half-sisters">Nombre de demi soeurs (soeurs de la part du père)</label>
        <input class="custom-select" name="halfsisters" type="number" id="half-sisters" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="nephews-section" style="display: none">
    <label for="nephews">Nombre de neveux (les fils des frères)?</label>
        <input class="custom-select" name="nephews" type="number" id="nephews" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="half-nephews-section" style="display: none">
    <label for="half-nephews">Nombre de fils des demi frères?</label>
        <input class="custom-select" name="halfnephews" type="number" id="half-nephews" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="uncles-section" style="display: none">
    <label for="uncles">Nombre d'oncles (frères du père)?</label>
        <input class="custom-select" name="uncles" type="number" id="uncles" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="half-uncles-section" style="display: none">
    <label for="half-uncles">Nombre de demi frères du père</label>
        <input class="custom-select" name="halfuncles" type="number" id="half-uncles" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="cousins-section" style="display: none">
    <label for="cousins">Nombre de cousin (fils des frères du père)?</label>
        <input class="custom-select" name="cousins" type="number" id="cousins" onchange="showNextSection()" min="0" step="1"/>
  </div>

  <div id="half-cousins-section" style="display: none">
    <label for="half-cousins">Nombre de demi cousins (fils des demi frères du père)</label>
        <input class="custom-select" name="halfcousins" type="number" id="half-cousins" onchange="showNextSection()" min="0" step="1"/>
  </div>
  
  
    <input type="submit" name="submit" value="Envoyer">
  </form>
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
        Le Calculatrice met à votre disposition cet espace distingué pour faciliter les services 
        qu'elle fournit à ses visiteurs et faciliter la calcul d'heritage.
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
              <p>Pour vous inscrire sur l'espace MIRATHY,
              vous devez clicker sur s'inscrire</p>
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
                via la plate-form ou vous pouvez nous contacer sur Mail,Télé,...
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
    <a class="text-white" href="http://www.fsr.ac.ma/">Tous droits réservés par FSR</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

        
    <!--JS-->
    <script>function showNextSection() {
      const gender = document.getElementById("gender").value;
      const wife = document.getElementById("wife");
      const wifeSection = document.getElementById("wife-section");
      const husband = document.getElementById("husband");
      const husbandSection = document.getElementById("husband-section");
      const father = document.getElementById("father");
      const fatherSection = document.getElementById("father-section");
      const grandfather = document.getElementById("grandfather");
      const grandfatherSection = document.getElementById("grandfather-section");
      const mother = document.getElementById("mother");
      const motherSection = document.getElementById("mother-section");
      const grandmother = document.getElementById("grandmother");
      const grandmotherSection = document.getElementById("grandmother-section");
      const fathersMother = document.getElementById("fathers-mother");
      const fathersMotherSection = document.getElementById("fathers-mother-section");
      const sons = document.getElementById("sons");
      const sonsSection = document.getElementById("sons-section");
      const daughters = document.getElementById("daughters");
      const daughtersSection = document.getElementById("daughters-section");
      const grandsons = document.getElementById("grandsons");
      const grandsonsSection = document.getElementById("grandsons-section");
      const granddaughters = document.getElementById("granddaughters");
      const granddaughtersSection = document.getElementById("granddaughters-section");
      const halfsiblingsm = document.getElementById("half-siblings-m");
      const halfsiblingsmSection = document.getElementById("half-siblings-m-section");
      const brothers = document.getElementById("brothers");
      const brothersSection = document.getElementById("brothers-section");
      const sisters = document.getElementById("sisters");
      const sistersSection = document.getElementById("sisters-section");
      const halfbrothers = document.getElementById("half-brothers");
      const halfbrothersSection = document.getElementById("half-brothers-section");
      const halfsisters = document.getElementById("half-sisters");
      const halfsistersSection = document.getElementById("half-sisters-section");
      const nephews = document.getElementById("nephews");
      const nephewsSection = document.getElementById("nephews-section");
      const halfnephews = document.getElementById("half-nephews");
      const halfnephewsSection = document.getElementById("half-nephews-section");
      const uncles = document.getElementById("uncles");
      const unclesSection = document.getElementById("uncles-section");
      const halfuncles = document.getElementById("half-uncles");
      const halfunclesSection = document.getElementById("half-uncles-section");
      const cousins = document.getElementById("cousins");
      const cousinsSection = document.getElementById("cousins-section");
      const halfcousins = document.getElementById("half-cousins");
      const halfcousinsSection = document.getElementById("half-cousins-section");
  
  
    // Show wife section if gender is male
    if (gender === "male") {
      wifeSection.style.display = "block";
      husbandSection.style.display = "none";
      husband.value = "";
    } 
    else if (gender ==="female") {
      wifeSection.style.display = "none";
      husbandSection.style.display = "block";
      wife.value = "";
    }
    else{
      wifeSection.style.display = "none";
      husbandSection.style.display = "none";
      wife.value = "";
      husband.value = "";
    }
   
    // Show father section if wife section or husband section is filled out
    if ((wife.value)||(husband.value)) {
      fatherSection.style.display = "block";
    } 
    
    else {
      fatherSection.style.display = "none";
      father.value = "";
  
    }
    // Show grandfather section if father is dead
    if (document.getElementById("father").value === "dead") {
      grandfatherSection.style.display = "block";
    } else {
      grandfatherSection.style.display = "none";
      grandfather.value = "";
    }
    
    // Show mother section if grandfather section is filled out or father is alive
    if (father.value =="alive" || grandfather.value) {
      motherSection.style.display = "block";
    } else {
      motherSection.style.display = "none";
      mother.value = "";
    }
    
    // Show grandmother section if mother is dead
    if (mother.value === "dead") {
      grandmotherSection.style.display = "block";
       // Show father's mother section if mother's mother section is filled out and father is dead
     if (grandmother.value && father.value === "dead") {
       fathersMotherSection.style.display = "block";
     } else {
      fathersMotherSection.style.display = "none";
      fathersMother.value = "";
     }
    } else {
      grandmotherSection.style.display = "none";
      grandmother.value = "";
      fathersMotherSection.style.display = "none";
      fathersMother.value = "";
    }
    
    // Show sons and daughters sections if mother alive or father's mother is filled or father alive and gramdmother is filled
    if (mother.value==="alive" || (father.value === "alive" && grandmother.value) || fathersMother.value){
      sonsSection.style.display = "block";
      daughtersSection.style.display = "block";   
    } else {
      sonsSection.style.display = "none";
      sons.value = "";
      daughtersSection.style.display = "none";
      daughters.value = "";
    }
    //Show grandsons if sons number is 0
    if(sons.value==="0" && daughters.value){
      grandsonsSection.style.display = "block";
      //Show granddaughters if sons 0 and daughters <2
      if((daughters.value < 2 || grandsons.value > 0)&& grandsons.value){
          granddaughtersSection.style.display = "block";
      } else{
          granddaughtersSection.style.display = "none";
          granddaughters.value = "";
      }
    } else{
      grandsonsSection.style.display = "none";
      grandsons.value = "";
      granddaughtersSection.style.display = "none";
      granddaughters.value = "";
    }  
    //Show half siblings from mother
    if(daughters.value==="0" && granddaughters.value==="0" && grandsons.value==="0" && grandfather.value==="dead"){
      halfsiblingsmSection.style.display = "block";
    } else{
      halfsiblingsmSection.style.display = "none";
      halfsiblingsm.value = "";
    }
    //show brothers and sisters
    if(grandsons.value==="0" && grandfather.value==="dead" ){
      brothersSection.style.display = "block";
      sistersSection.style.display = "block";
    } else{
      brothersSection.style.display = "none";
      brothers.value = "";
      sistersSection.style.display = "none";
      sisters.value = "";
    }
    //show half brothers and half sisters
    if(brothers.value==="0" && (sisters.value === "0" || (daughters.value === "0" && granddaughters.value === "0"))){
      halfbrothersSection.style.display = "block";
      if(sisters.value < 2 || halfbrother > 0){
        halfsistersSection.style.display = "block";
      } else{
        halfsistersSection.style.display = "none";
        halfsisters.value = "";
      }
    } else{
      halfbrothersSection.style.display = "none";
      halfbrothers.value = "";
      halfsistersSection.style.display = "none";
      halfsisters.value = "";
    }
    //show nephews
    if(halfbrothers.value === "0" && halfsisters.value && (halfsisters.value === "0" || (daughters.value === "0" && granddaughters.value === "0"))){
      nephewsSection.style.display = "block";
    } else{
      nephewsSection.style.display = "none";
      nephews.value = "";
    }
    //show half nephews
    if(nephews.value === "0"){
      halfnephewsSection.style.display = "block";
    } else{
      halfnephewsSection.style.display = "none";
      halfnephews.value = "";
    }
    //show uncles
    if(halfnephews.value === "0"){
      unclesSection.style.display = "block";
    } else{
      unclesSection.style.display = "none";
      uncles.value = "";
    }
    //show half uncles
    if(uncles.value === "0"){
      halfunclesSection.style.display = "block";
    } else{
      halfunclesSection.style.display = "none";
      halfuncles.value = "";
    }
    //show cousins
    if(halfuncles.value === "0"){
      cousinsSection.style.display = "block";
    } else{
      cousinsSection.style.display = "none";
      cousins.value = "";
    }
    //show half cousins
    if(cousins.value === "0"){
      halfcousinsSection.style.display = "block";
    } else{
      halfcousinsSection.style.display = "none";
      halfcousins.value = "";
    }
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
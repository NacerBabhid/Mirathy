<?php
  include "fractions.php";  
  include "connexion_PDO.inc.php";
  $defunt_id = $_GET['id'];
  
  $pdo = connectMyDB();
  try{
    $query = "SELECT * FROM defunts WHERE defunt_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array($defunt_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $asl = $row['asl'];
  
    echo'<h2>Information du defunts:</h2></br>';
    echo'<table class="table table-striped">
          <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>sexe</th>
            <th>Héritage</th>
            <th>Al Asl</th>
          </tr>';
    echo'<tr><th>'.(($row['nom']!="")?$row['nom']:"N/A").'</th><th>'.(($row['prenom']!="")?$row['prenom']:"N/A").'</th><th>'.$row['sexe'].'</th><th>'.$row['heritage'].'</th><th>'.$row['asl'].'</th></tr></table>';
  }catch (PDOException $e){
    echo "An error occurred: ".$e->getMessage();
  }
  
  try{
    $query = "SELECT * FROM heritiers WHERE defunt_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array($defunt_id));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo'<h3>Informations des heritiers:</h3></br>';
    echo'<table class="table table-striped"><tr><th>Relation avec le défunt</th><th>nom</th><th>Prenom</th><th>Nature d\'heitage</th><th>Portion en fraction</th><th>Portion entière</th><th>Resultat</th></tr>';
    foreach($rows as $row){
    echo'<tr><th>'.$row['relation'].'</th><th>'.(($row['nom']!="")?$row['nom']:"N/A").'</th><th>'.(($row['prenom']!="")?$row['prenom']:"N/A").'</th><th>'.$row['type_heritage'].'</th><th>'.Fractions::toString(new fraction($row['portion_int'],$asl)).'</th><th>'.$row['portion_int'].'</th><th>'.$row['resultat'].'</th></tr>';
    }
    echo'</table>';
  }catch (PDOException $e){
    echo "An error occurred: ".$e->getMessage();
  }
  

  ?>
  
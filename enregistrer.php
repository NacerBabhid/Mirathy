<?php

include "connexion_PDO.inc.php";
include "CalcResult.html.php";
if(!isset($_SESSION['autorise'])){
    $_SESSION['msg_enr'] = 'Il faut s\'authentifier pour sauvgarder les données';

}else{
$user_id = $_SESSION['user_id'];//cette ligne est à remplaçait par le code si dessous
/*use Illuminate\Support\Facades\Auth;

$user_id = Auth::id();*/
if(!$_SESSION['saved']){
    //recuperation des information du defunt
    $nom_def = $_SESSION['nom_def'];
    $prenom_def = $_SESSION['prenom_def'];
    $sexe = $_SESSION['sexe'];
    $heritage =$_SESSION['inheritance'];
    $asl =$_SESSION['asl'];
    //recuperation des information des heritiers
    $table_heritiers = $_SESSION['heir_info'];

    $pdo = connectMyDB();
    $query = "INSERT INTO defunts (nom,prenom,sexe,heritage,user_id,asl) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($query);

    $values = [$nom_def,$prenom_def,$sexe,$heritage,$user_id,$asl];

    if ($stmt->execute($values)){
        echo 'Les données du defunt sont enregistrés avec succées.';
        $def_id = $pdo->lastInsertId();
    }
    else{
        echo 'Erreur: '.$stmt->errorInfo()[2];
    }


    $query ="INSERT INTO heritiers (nom,prenom,portion_int,relation,type_heritage,resultat,defunt_id,nombre) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    foreach($table_heritiers as $key => $value){
        $values = [$_POST['nom'.$key],$_POST['prenom'.$key],$value['ration'],$key,$value['type'],$value['resultat'],$def_id,$value['nombre']];
        if ($stmt->execute($values)){
            $_SESSION['msg_enr']='Les données des heritiers sont enregistrés avec succées.';
        }
        else{
            echo 'Erreur: '.$stmt->errorInfo()[2];
        }
    }
    $_SESSION['saved'] = true;
}
else{
    $_SESSION['msg_enr']='Les données sont déja sauvegrader';
}
}
?>
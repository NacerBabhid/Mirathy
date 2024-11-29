<?php
session_start();
include "fractions.php";
class heir{
  public static $correct = true;
  public static $type;
  public static $inheritance;
  public static $rest;
  public $name;
  public $number;
  public $inherits;
  public $portion;//the portion that each heir is intitled to depending on hajb e.g 1/2 1/3 1/4
  public $ration;//ration is the integer representation of the portion after finding the asl of the issue and correcting the issue if needed
  public $taasib;//boolean that indicates whether an heir is aasib or not
  public $Tportion;//this is the equivelant to portions for aasib, but it's a whole number. since some asib heirs can have twice the portion as other asibs (case for most brothers and sisters)
  public $result;
  
  function __construct($name,$number,$inherits){
    $this->name = $name;
    $this->number = $number;
    $this->inherits = $inherits;
    $this->portion = new Fraction(0);
    $this->taasib = false;
    $this->ration = 0;
    $this->Tportion = $number;//since some asib heirs can have twice the portion as other asibs (case for most brothers and sisters)
    self::$type = 'normal';
    //$this->share = false;
  }
  public static function setCor($bool){
    self::$correct = $bool;
  }
  function setNumber($n){
    $this->number = $n;
  }
  function setTPortion($p){
    $this->Tportion = $p*$this->number;
  }
  function setPortion($n,$d = 1){
    $this->portion = new Fraction($n,$d);
  }
  function setResult($r){
    $this->result = $r;
  }
  function setTaasib($bool){
    $this->taasib = $bool;
  }
  public static function setInheritance($in){
    self::$inheritance = $in;
    self::$rest = self::$inheritance;
  }
  public static function getIn(){
    return self::$inheritance;
  }
  public static function getC(){
    return self::$correct;
  }
  public static function setType($t){
    self::$type = $t;
  }
  function setRation($r){
    $this->ration = $r;
  }
  function getRes(){
    return $this->result;
  }
  function getR(){
    return $this->ration;
  }
  function getName(){
    return $this->name;
  }
  function getTpor(){
    return $this->Tportion;
  }
  function getT(){
    return $this->taasib;
  }
  function getP(){
    return $this->portion;
  }
  function getN(){
    return $this->number;
  }
  function getI(){
    return $this->inherits;
  }
  function __toString(){
    return "number: $this->number , inherits: $this->inherits";
  }
}
$heirs = array("father","grandfather","mother",
"sons","daughters","grandsons","granddaughters","halfsiblingsm","brothers",
"sisters","halfbrothers","halfsisters","nephews","halfnephews"
,"uncles","halfuncles","cousins","halfcousins");
$fard = array();
$taasib = array();
if(isset($_POST['submit'])){
  if(isset( $_POST['firstname'])){
    $_SESSION['nom_def'] = $_POST['firstname'];
  }else{
    $_SESSION['nom_def']= "";
  }
  if(isset($_POST['submit'])){
    if(isset( $_POST['lastname'])){
      $_SESSION['prenom_def'] = $_POST['lastname'];
    }else{
      $_SESSION['prenom_def']= "";
    }
  if(isset($_POST['inheritance'])) heir::setInheritance($_POST['inheritance']);
  else heir::setInheritance(0);

  if($_POST['gender']=='male'){
    $_SESSION['sexe']='Homme';
    if($_POST['wife']>0) $wife = new heir('wife',$_POST['wife'],true);
    else $wife = new heir('wife',0,false);
    $husband = new heir('husband',0,false);
  }
  else{
    $_SESSION['sexe']='Femme';
    if($_POST['husband']=='alive') $husband = new heir('husband',1,true);
    else $husband = new heir('husband',0,false);
    $wife = new heir('wife',0,false);
   }
  if($husband->getI())array_push($fard,$husband);
  elseif($wife->getI()) array_push($fard,$wife);
  //grandmothers
  if($_POST['grandmother']=='alive' && $_POST['fathersmother']=='alive'){
    $grandmothers = new heir('grandmothers',2,true);
    $grandmother = new heir('grandmother',0,false);
    $fathersmother = new heir('fathersmother',0,false);
    array_push($fard,$grandmothers);
  }
  else{
    if($_POST['grandmother']=='alive'){
      $grandmother = new heir('grandmother',1,true);
      $fathersmother = new heir('fathersmother',0,false);
      $grandmothers = new heir('grandmothers',0,false);
      array_push($fard,$grandmother);
    }
    elseif($_POST['fathersmother']=='alive') {
      $fathersmother = new heir('fathersmother',1,true);
      $grandmother = new heir('grandmother',0,false);
      $grandmothers = new heir('grandmothers',0,false);
      array_push($fard,$fathersmother);
    }
    else {
      $grandmother = new heir('grandmother',0,false);
      $fathersmother = new heir('fathersmother',0,false);
      $grandmothers = new heir('grandmothers',0,false);
    }
      
  }
  foreach($heirs as $values){
    $n = $_POST[$values];
    if($n =='0' || $n =='dead' || $n == ""){
      $$values = new heir($values,0,false);
    }
    elseif ($n == 'alive') {
      $$values = new heir($values,1,true); 
    }
    else{
      $$values = new heir($values,$n,true);
    }
  }
  //descendants
  $m_des= $sons->getN() + $grandsons->getN();
  $f_des = $daughters->getN() + $granddaughters->getN();
  $des=$f_des+$m_des;
  //husband's portion
  if($husband->getI()){
    if ($des) $husband->setPortion(1,4);
    else $husband->setPortion(1,2);
  }
  //wife's portion
  if($wife->getI()){
    if ($des) $wife->setPortion(1,8);
    else $wife->setPortion(1,4);
  }
  //father's portion
  if($father->getI()){
    if (!$des) $father->setTaasib(true);   
    elseif($m_des) $father->setPortion(1,6);
    elseif($f_des){
      $father->setPortion(1,6);
      $father->setTaasib(true);
    }
     
  }
  //mother's portion
  if($mother->getI()){
    if (!$des && ($brothers->getN()+$sisters->getN()+$halfsiblingsm->getN()+$halfbrothers->getN()+$halfsisters->getN())<2){
      $mother->setPortion(1,3);
      if($father->getT()&&($father->getP()->getNumerator()==0)&&($wife->getI()||$husband->getI())){
        $father->setTPortion(2);
        $mother->setPortion(0);
        $mother->setTaasib(true);
      }
    } 
    
    else{
      $mother->setPortion(1,6);
    }
  }
  //grandfather's portion
  if($grandfather->getI()){
    if (!$des) $grandfather->setTaasib(true);
    elseif($f_des){
      $grandfather->setPortion(1,6);
      $grandfather->setTaasib(true);
    }
    else $grandfather->setPortion(1,6);
  }
  //grandmother's portion
  if($grandmother->getI()){
    $grandmother->setPortion(1,6);
    }
  if($fathersmother->getI()){
      $fathersmother->setPortion(1,6);
  }
  if($grandmothers->getI()){
    $grandmothers->setPortion(1,6);
    $grandmothers->setNumber(2);
  }

  //sons' portions
  if($sons->getI()){
    $sons->setTaasib(true);
  }
  //daughters' portions
  if($daughters->getI()){
    if($sons->getN()>0){
      $daughters->setTaasib(true);
      $sons->setTPortion(2);}
    elseif($daughters->getN()==1)$daughters->setPortion(1,2);
    else $daughters->setPortion(2,3);
  }
  //grandsons' portions
  if($grandsons->getI()){
    $grandsons->setTaasib(true);
    if($granddaughters->getI()){}
  }
  //granddaughters' portions
  if($granddaughters->getI()){
    if($grandsons->getN()>0){
      $granddaughters->setTaasib(true);
      $grandsons->setTPortion(2);}
    elseif($granddaughters->getN()==1 && $daughters->getN()==0)$granddaughters->setPortion(1,2);
    elseif($granddaughters->getN()>1 && $daughters->getN()==0) $granddaughters->setPortion(2,3);
    else $granddaughters->setPortion(1,6);
  }
  //half siblings from mother portions
  if($halfsiblingsm->getI()){
    if($halfsiblingsm->getN()>1){
      $halfsiblingsm->setPortion(1,3);
    }
    else{
      $halfsiblingsm->setPortion(1,6);
    }
  }
  //brothers portions
  if($brothers->getI()){
    $brothers->setTaasib(true);
  }
  //sisters portions
  if($sisters->getI()){
    if($brothers->getI()){
      $sisters->setTaasib(true);
    }
    elseif($daughters->getI()||$granddaughters->getI()){
      $sisters->setTaasib(true);
    }
    elseif($sisters->getN()>=2){
      $sisters->setPortion(2,3);
    }
    else{
      $sisters->setPortion(1,2);
    }
  }
  //half brothers' portions
  if($halfbrothers->getI()){
    $halfbrothers->setTaasib(true);
  }
  //half sisters' portions
  if($halfsisters->getI()){
    if($halfbrothers->getI()){
      $halfsisters->setTaasib(true);
      $halfbrothers->setTPortion(2);
    }
    elseif(($daughters->getI()||$granddaughters->getI())&&(!$sisters->getI())){
      $halfsisters->setTaasib(true);
    }
    elseif($sisters->getI()){
      $halfsisters->setPortion(1,6);
    }
    elseif($halfsisters->getN()>=2){
      $halfsisters->setPortion(2,3);
    }
    else{
      $halfsisters->setPortion(1,2);
    }
  }
  //nephews portions
  if($nephews->getI()){
    $nephews->setTaasib(true);
  }
  //halfnephews portions
  if($halfnephews->getI()){
    $halfnephews->setTaasib(true);
  }
  //uncles portions
  if($uncles->getI()){
    $uncles->setTaasib(true);
  }
  //halfuncles portions
  if($halfuncles->getI()){
    $halfuncles->setTaasib(true);
  }
  //cousins portions
  if($cousins->getI()){
    $cousins->setTaasib(true);
  }
  //halfcousins portions
  if($halfcousins->getI()){
    $halfcousins->setTaasib(true);
  }
  //add heirs to the fard table
  foreach($heirs as $value){
    if(($$value->getP()->getNumerator())!=0){
      array_push($fard,$$value);
    }
    if($$value->getT()){
      array_push($taasib,$$value);
    }
  }
  //distribution
  $asl = 1;
  //calculating asl lmas2ala
  foreach($fard as $value){
    $asl = Fractions::lcm($asl,$value->getP()->getDenominator());
  }
  //rations, it's the actual cut that each heir will get out of the inheritance after deviding by the asl
  $totalRations=0;//this variable will help test the type of mas2ala, it's the total of rations of foroud
  foreach($fard as $value){
    $r = ($asl*$value->getP()->getNumerator())/$value->getP()->getDenominator();
    $value->setRation($r);
    $totalRations += $r;
  }
//-----------------
  $cor1=true;
  $cor2=true;  
  $rest = $asl-$totalRations;
  if(count($taasib)==0){
    if($rest>0) heir::setType('Aaoul');
    elseif($rest<0) heir::setType('Rad');
    $asl = $totalRations;
  }
//conditions for the problem to be considered correct or not 
    $totalPortions=0;
    $totalAsib=0;
    foreach($taasib as $value){
      $totalPortions += $value->getTpor();
      $totalAsib += $value->getN();
    }
    if($totalPortions!=0){
      if($rest % $totalPortions != 0) $cor1=false;
      else $cor1=true;
    }
    foreach($fard as $value){
      if(($value->getR() % $value->getN())!=0){
        $cor2=false;
        break;}
      else{$cor2=true;}
    }
//correcting the problem if it isn't correct
    if($cor1==false || $cor2==false){
      $tmp = 1;
      foreach($fard as $value){
        $tmp = Fractions::lcm($tmp,$value->getN());
      }
      if(count($taasib)!=0){
        $tmp = Fractions::lcm($tmp,$totalPortions);
      }
    
    $asl *= $tmp;
    foreach($fard as $value){
      $newR = $value->getR()*$tmp;
      $value->setRation($newR);
    }
      $newrest =$rest*$tmp;
    foreach($taasib as $value){
      $value->setTPortion(($newrest/$totalPortions)*($value->getTpor())/$value->getN());
    }
  }

  //distribute the inheritance values
  $rations = heir::getIn()/$asl;
  foreach($fard as $value){
    $value->setResult($rations*$value->getR());
  }
  foreach($taasib as $value){
    $value->setResult($value->getTpor()*$rations);
  }
  echo"as7ab al foroud ";
  foreach($fard as $value){
    //echo "name : ".$value->getName()." | nombre : ".$value->getN()." | portion : ".$value->getP()->toString()." | ration : ".$value->getR()." | result : ".$value->getRes()." </br>";
    $prop_fard['name'] = $value->getName();
    $prop_fard['number'] = $value->getN();
    $prop_fard['portion_num'] = $value->getP()->getNumerator();
    $prop_fard['portion_den'] = $value->getP()->getDenominator();
    $prop_fard['ration'] = $value->getR();
    $prop_fard['result'] = $value->getRes();
    $prop_fard['type'] = 'fard';
    $table_fard[$value->getName()] = $prop_fard;
  }
  if(count($fard)!=0)$_SESSION['fard'] = $table_fard;
  else $_SESSION['fard'] =array();
  echo"as7ab ataasib ";
  foreach($taasib as $value){
    //echo "name : ".$value->getName()." | nombre : ".$value->getN()." | portion : ".fractions::toString(new Fraction($value->getTpor(),$asl)) ." | taasib : ".$value->getT()." | ration : ".$value->getTpor()." | result : ".$value->getRes()." </br>";
    $prop_taasib['name'] = $value->getName();
    $prop_taasib['number'] = $value->getN();
    $prop_taasib['ration'] = $value->getTpor();
    $prop_taasib['portion_num'] = $value->getTpor();
    $prop_taasib['portion_den'] = $asl;
    $prop_taasib['result'] = $value->getRes();
    $prop_taasib['type'] = 'taasib';
    $table_taasib[$value->getName()] = $prop_taasib;
  }
  if(count($taasib)!=0)$_SESSION['taasib'] = $table_taasib;
  else $_SESSION['taasib'] = array();
  $_SESSION['asl'] =$asl ;
  $_SESSION['inheritance'] = $_POST['inheritance'];
  $_SESSION['saved'] = false ;
  header('Location: CalcResult.html.php');
} }
?>
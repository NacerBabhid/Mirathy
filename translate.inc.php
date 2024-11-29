<?php
$names = array('husband'=>'époux','wife'=>'épouse','grandmother'=>'grand-mère maternelle',
    'fathersmother'=>'grand-mère paternelle','father'=>'père','grandfather'=>'grand-père paternel',
    'mother'=>'mère','sons'=>'fils','daughters'=>'fille','grandsons'=>'petit-fils','granddaughters'=>'petite-fille','halfsiblingsm'=>'demi frères et soeurs maternaux',
    'brothers'=>'frère','sisters'=>'soeur','halfbrothers'=>'demi-frère','halfsisters'=>'demi-soeur','nephews'=>'neveu','halfnephews'=>'demi-neveu',
    'uncles'=>'oncle','halfuncles'=>'demi-oncle','cousins'=>'cousin','halfcousins'=>'demi-cousin');
function translate($name,$tab){
    $nom = $tab[$name];
    return $nom;
}
?>
<?php
    function PrintRow($nom,$type,$portion,$ration,$nombre,$resultat,$asl,&$table){
        if($nom == 'grandmothers'){      
            $pm = Fractions::multiply($portion,new fraction(1,2));
            PrintRow('grand-mère maternelle','fard',$pm,($ration/2),1,($resultat/2),$asl,$table);
            PrintRow('grand-mère paternelle','fard',$pm,($ration/2),1,($resultat/2),$asl,$table); 
        }
        elseif($nombre>1){
                $rationi = $ration/$nombre;
                $portioni = Fractions::multiply($portion,new fraction(1,$nombre));
                for($i = 0 ; $i < $nombre ; $i++ ){    
                    PrintRow(($nom.($i+1).""),$type,$portioni,$rationi,1,($resultat/$nombre),$asl,$table);
                    }
                }
        else{ // $portion->toString(); //Fractions::toString($portion);
            echo '<tr><td>'.$nom.'</td><td><input type="text name="nom'.$nom.'"></td>
        <td><input type="text" name="prenom'.$nom.'"></td><td>'.$type.'</td><td>'.Fractions::toString(new fraction($ration,$asl)).
        '</td><td>'.$ration.'</td><td>'.number_format($resultat,2).'</td></tr>';
            $table[$nom] = array('ration'=>$ration,'type'=>$type,'resultat'=>$resultat,'nombre'=>$nombre);
        }
    }

?>
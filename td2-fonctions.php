<?php

//Exo 1
function plusGrand(int|float $n1, int|float $n2) : int|float {
    if($n1 > $n2){
        return $n1;
    } else return $n2;
}


//Exo2


function decrementerAZero(int $max, int $div = 2) : string {
    $machin = "";
    for ($i = $max; $i >= 0; $i--){
        if ($i%$div == 0) {
            $machin .= "$i divisible par div \n";
        } else $machin .= "$i \n";
    }
    return $machin;
}


//Exo 3
function pouissance(int $x, int $n) : int {
    $i = 1;
    $nb = $x;
    while($i < $n) {
        $nb = $nb * $x;
        $i++;
    }
    return $nb;
}


//Exo 4

function switcheuse(int|float $a1, int|float $a2, int|float $a3): string{
    $reponse = "";
    switch($a1) {
        case($a1 == 1) : 
            $reponse = "Résultat : " . plusGrand($a2, $a3);
            break;
        
        case($a1 == 2) :
            if (is_float($a2)){
                $entier = (int)$a2;
                $reponse = "Valeur 1 float changée \n" . decrementerAZero($entier, $a3);
            }
            if (is_float($a3)){
                $entier = (int)$a3;
                $reponse = "Valeur 2 float changée \n" . decrementerAZero($a2, $entier);
            }
            if (is_float($a2) | is_float($a3)){
                $entier1 = (int)$a2;
                $entier2 = (int)$a3;
                $reponse = "Valeurs float changées \n" . decrementerAZero($entier1, $entier2);
            }
            if (!is_float($a2) && !is_float($a3)){
                $reponse = "Valeurs float changées \n" . decrementerAZero($a2, $a3);
            }
            break;
        
        case($a1 == 3) :
            if (is_float($a2)){
                $entier = (int)$a2;
                $reponse = "Valeur 1 float changée \n" . pouissance($entier, $a3);
            }
            if (is_float($a3)){
                $entier = (int)$a3;
                $reponse = "Valeur 2 float changée \n" . pouissance($a2, $entier);
            }
            if (is_float($a2) | is_float($a3)){
                $entier1 = (int)$a2;
                $entier2 = (int)$a3;
                $reponse = "Valeurs float changées \n" . pouissance($entier1, $entier2);
            }
            if (!is_float($a2) && !is_float($a3)){
                $reponse = "Valeurs float changées \n" . pouissance($a2, $a3);
            }
            break;
        
        default : 
            $reponse = "Le premier argument doit être comprit entre 1 et 3";
            break;
    }
    return $reponse;
}

print switcheuse(2, 15.9, 3);

?>
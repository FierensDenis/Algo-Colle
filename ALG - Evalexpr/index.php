<?php
error_reporting(E_ERROR | E_PARSE);

//////////////////////////

function calcul(&$array, $i){
$value = null;
        if($array[$i] == "*"){
            $value = $array[$i-1] * $array[$i+1];
        }
        if($array[$i] == "/"){
            $value = $array[$i-1] / $array[$i+1];
        }
        if($array[$i] == "+"){
            $value = $array[$i-1] + $array[$i+1];
        }
        if($array[$i] == "-"){
            $value = $array[$i-1] - $array[$i+1];
        }   
             
        //delete
        array_splice($array, $i, 1);
        array_splice($array, $i-1, 1);
        array_splice($array, $i-1, 1);

        //add
        array_splice($array, $i-1, 0, $value);
}

//////////////////////////
//On ne peut pas mettre de lettres
//gerer les nombres a plusieurs index en faisant
//-on push tout dans un tableau avec preg_match
//-on ajoute les symboles avant et apres chaque nombres
//on peut additionner diviser soustraire et multiplier
//il gere les priorités de multiplication et de division
//////////////////////////

function eval_expr($str){
    $array = [];
    //si il y a des erreurs
    for($i = 0; $i < strlen($str); $i++){
        if(preg_match("#[a-zA-Z]#", $str[$i])){
            return 'You cant use a-z/A-Z';
        }
    }

    //une fois qu'on a un tableau avec des int et des symboles commencer les priorités
    //mauvais car ne garde pas les dizaines etc
    // for($i= 0 ; $i < strlen($str); $i++){
    //     if(preg_match("#[0-9]#", $str[$i])){
    //         $array[$i] = intval($str[$i]);
    //     }
    //     else{
    //         $array[$i] = $str[$i];
    //     }
    // }

    preg_match_all("#[0-9]+#", $str, $int);
    preg_match_all("#[*/+-]+#", $str, $symbole);
//     print_r($int[0]);
//     print_r($symbole[0]);
//     print_r($array);
// var_dump(sizeof($int[0])*2);
    for($i=0; $i < sizeof($int[0]); $i++){
        array_push($array, $int[0][$i], $symbole[0][$i]);
    }
    array_pop($array);
    // print_r($array);

    //d'abord les * et /
    for($i=0 ; $i < sizeof($array); $i++){
        if($array[$i] == "*"){
        calcul($array, $i);
        }
        if($array[$i] == "/"){
            calcul($array, $i);
        }
    }

    
    while(in_array('*', $array)){
        for($i=0 ; $i < sizeof($array); $i++){
            if($array[$i] == "*"){
            calcul($array, $i);
            }
            if($array[$i] == "/"){
                calcul($array, $i);
            }
        }
    } 

    $y=sizeof($array);

    while($y > 2){
        if($array[1] == "+"){
            calcul($array, 1);
        }
        if($array[1] == "-"){
            calcul($array, 1);
        }

        $y=sizeof($array);
    }

    return $array[0];
}

// $tab = "30+10/2+13+13/2";   

// echo eval_expr($tab);
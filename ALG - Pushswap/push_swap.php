<?php

// Echange les elements mit en parametre
function sa(Array &$array){
    $save = $array[0];
    $array[0] = $array[1];
    $array[1] = $save;
    echo 'sa';
};

function sb(Array &$array){
    $save = $array[0];
    $array[0] = $array[1];
    $array[1] = $save;
    echo 'sb';
};

function sc(Array &$array_la, Array &$array_lb){
    sa($array_la);
    sb($array_lb);
    echo 'sc';
};

// function pa(Array &$array_la, Array &$array_lb){
//     if(!empty($array_lb[0])){
//         array_unshift($array_la, $array_lb[0]);
//         array_shift($array_lb);
//         echo 'pa ';
//     }
//     else{ 
//     }
// }
function pa(Array &$array_la, Array &$array_lb){
    // if(!empty($array_lb[0])){
    //     array_unshift($array_la, $array_lb[0]);
    //     array_shift($array_lb);
    //     echo 'pa ';
    // }
    // else{ 
    // }

    array_unshift($array_la, $array_lb[0]);
    array_shift($array_lb);


    // echo 'pa ';
}

//prend le premier ele de la -> premiere pos de lb
// function pb(Array &$array_la, Array &$array_lb){
//     if(isset($array_la[0])){
//         array_unshift($array_lb, $array_la[0]);
//         array_shift($array_la);
//         echo 'pb ';
//     }
//     else{
//         echo 'probleme';
//         die;
//     }
// }

function pb(Array &$array_la, Array &$array_lb){

    array_unshift($array_lb, $array_la[0]);
    array_shift($array_la);

    echo 'pb ';
}

//le premier devient de dernier
function ra(Array &$array_la){
    for($i = 0; $i < sizeof($array_la) -1; $i++){
        $save = $array_la[$i];
        $array_la[$i] = $array_la[$i+1];
        $array_la[$i+1] = $save;
    }
    echo 'ra ';
}

// function ra(Array &$array_la){
//     $val = array_shift($array_la);
//     array_push($array_la, $val);
//     echo 'ra ';
// }

function rb(Array &$array_lb){
    for($i = 0; $i < sizeof($array_lb) -1; $i++){
        $save = $array_lb[$i];
        $array_lb[$i] = $array_lb[$i+1];
        $array_lb[$i+1] = $save;
    }
}

function rr(&$array_la, &$array_lb){
    ra($array_la);
    rb($array_lb);
}

function rra(Array &$array_la){
    for($i = sizeof($array_la) -1; $i > 0; $i--){
    $save = $array_la[$i];
    $array_la[$i] = $array_la[$i-1];
    $array_la[$i-1] = $save;
    }
}

function rrb(Array &$array_lb){
    for($i = sizeof($array_lb) -1; $i > 0; $i--){
    $save = $array_lb[$i];
    $array_lb[$i] = $array_lb[$i-1];
    $array_lb[$i-1] = $save;
    }
}

function rrr(&$array_la, &$array_lb){
    rra($array_la);
    rrb($array_lb);
}

/////////////////////
//script start here//
/////////////////////

$tab1 = [];

function pushswap(&$tab1){

    $echo = "";
    $tab2 = [];

    //On la dans lb en faisant un tri
    do{ 
        //if la valeur est la valeur la plus petite du tableau, alors on push dans list2
        if($tab1[0] == min($tab1)){
            //prend le premier element de la et le place au debut de lb
            pb($tab1,$tab2);
        }
        else{
            //parcour de list1 du debut a la fin
            ra($tab1);
        }
    }
    while(empty($tab1) !== true);

    //lb dans la avec le tri deja fait
    do{
        pa($tab1, $tab2);
        $echo .= 'pa ';
    }
    while(empty($tab2) !== true);
    echo trim($echo);
    echo "\n";

}

//argv to table
for($i=1; $i < sizeof($argv); $i++){
    $tab1[$i-1] = intval($argv[$i]);
}

$checkiford = null;

for($i = 0; $i < sizeof($tab1) -1; $i++){
    if($tab1[$i] > $tab1[$i+1]){
        $checkiford = $tab1[$i];
    }
}

if($checkiford !== null){
    pushswap($tab1);
}
else{
    echo "\n";
}
<?php

function pa(Array &$array_la, Array &$array_lb){
    array_unshift($array_la, $array_lb[0]);
    array_shift($array_lb);
}

function pb(Array &$array_la, Array &$array_lb){
    array_unshift($array_lb, $array_la[0]);
    array_shift($array_la);
}

//le premier devient de dernier
function ra(Array &$array_la){
    for($i = 0; $i < sizeof($array_la) -1; $i++){
        $save = $array_la[$i];
        $array_la[$i] = $array_la[$i+1];
        $array_la[$i+1] = $save;
    }
}

//pb ra pb ra pb pb pa pa pa pa
//ra pb ra pb ra pb pb pa pa pa pa

$tmp = [5, 1, 3, 2];
// var_dump($tmp[0] == min($tmp));
$b = [];


ra($tmp);
print_r($tmp);

pb($tmp, $b);
print_r($tmp);

ra($tmp);
print_r($tmp);

pb($tmp, $b);
print_r($tmp);

ra($tmp);
print_r($tmp);

pb($tmp, $b);
print_r($tmp);

pb($tmp, $b);
print_r($tmp);

pa($tmp, $b);
print_r($tmp);

pa($tmp, $b);
print_r($tmp);

pa($tmp, $b);
print_r($tmp);

pa($tmp, $b);
print_r($tmp);
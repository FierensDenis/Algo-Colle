<?php

$array = [15, 8, 42, 4, 16, 23];

// Echange les elements mit en parametre
function swap_elem(Array &$array , int $index1 , int $index2 ){
    
    $save = $array[$index1];
    $array[$index1] = $array[$index2];
    $array[$index2] = $save;

    echo 'swap element';
    echo "\n";
};

// Trie le tableau dans l'ordre croissant
function bubble_sort_array( Array &$array){
    for($y = 0; $y < sizeof($array)-1; $y++){
        for($i = 0; $i < sizeof($array) -1; $i++){
            if($array[$i] > $array[$i+1]){
                $save = $array[$i];
                $array[$i] = $array[$i+1];
                $array[$i+1] = $save;
            }
        }
    }
    echo 'trie ordre croissant';
    echo "\n";
    print_r($array);
};

//Prends le premier élément de la liste et le met à la fin de la liste (ra et rb dans le projet)
function rotate_left(&$array){
    for($i = 0; $i < sizeof($array) -1; $i++){
        $save = $array[$i];
        $array[$i] = $array[$i+1];
        $array[$i+1] = $save;
    }

    echo 'rotate left';
    echo "\n";
}

//Prends le dernier élément de la liste et le met au début de la liste (rra et rrb)
function rotate_right(&$array){
    for($i = sizeof($array) -1; $i > 0; $i--){
        $save = $array[$i];
        $array[$i] = $array[$i-1];
        $array[$i-1] = $save;
    }

    echo 'rotate right';
    echo "\n";
}

function my_amazing_sorter(Array &$array){
    rotate_left($array);
    swap_elem($array, 0, 1);
    rotate_left($array);
    swap_elem($array, 0, 1);

    rotate_left($array);
    rotate_left($array);
    rotate_left($array);
    swap_elem($array, 0, 1);

    rotate_right($array);
    swap_elem($array, 0, 1);
    rotate_right($array);
    rotate_right($array);
}

// my_amazing_sorter($array);

////////////////////////////////////////////////////////////////////////////////////////

//AVEC DEUX LISTES
$list1 = [1,2,3,4];
$list2 = [];

function push(&$list1, &$list2){
    array_unshift($list2, $list1[0]);
    unset($list1[0]);

    print_r($list1);
    print_r($list2);
}

function pop(&$list1, &$list2){
    if(!empty($list2[0])){
    array_unshift($list1, $list2[0]);
    unset($list2[0]);
    }
    else{
        echo 'list2 n a pas de valeur';
    }

    print_r($list1);
    print_r($list2);
}

function rotate(&$list1, &$list2){
    array_push($list2, $list1[0]);
    unset($list1[0]);

    print_r($list1);
    print_r($list2);
}

// Fonction qui trie selon le sujet

function sort_numbers(Array &$array1, Array &$array2){

}
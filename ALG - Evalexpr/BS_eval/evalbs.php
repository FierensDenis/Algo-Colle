<?php
// reucp les chiffre
// $str = " abcd32__hello 18 _3";

// function find_digits($str){
//     preg_match_all('#[0-9]+#', $str, $int);

//     for($i= 0; $i < sizeof($int[0]); $i++){
//         echo $int[0][$i];
//     }
// }

// $str = " abcd32__hello 18 _3";
// // recup les nombres
// function find_nums($str){
//     preg_match_all('#[0-9]+#', $str, $int);

//     var_dump($int);
// }

$str = " abcd32__hello 18 _3";

function add_nums($str){
    preg_match_all('#[0-9]+#', $str, $int);
    
    // var_dump($int);
    $val = 0;

    for($i= 0; $i < sizeof($int[0]); $i++){
        $val += $int[0][$i];
    }

    echo $val;
}



// find_digits($str); // = > 32183
// find_nums ( $str ) ; // = > 32 , 18 , 3

add_nums($str); // = > 53

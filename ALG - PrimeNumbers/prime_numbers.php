<?php

function prime_numbers($n){
//On declare les variables
    $flag =1;
    $i =2;

//si n est inferieur a 2, on stop
    if($n <= 1){
        return false;
    }

//On repeat tant que i est inferieur a []??=tableau?? OU inferieur a $n
    for($i; $i <= $n/2 ;$i++){
        if($n%$i == 0){
            $flag = 0;
        }
    }

    if($flag == 0){
        return false;
    }

    return true;
}

/////////////////////////////////////////////////////
// function prime_numbersA($n)
// {
//     $flag =1;
//     $i =2;
    
//     if($n <= 1){
//         return false;
//     }

//     while($i < ($n/2)+1){
//         $n = ($n/2)+1;
//         echo"$n";
//     }

//     if($n%$i == 0){
//         $flag=0;
//     }

//     if($flag == 0){
//         return false;
//     }

//     return true;
// }

// var_dump(prime_numbersA(7));
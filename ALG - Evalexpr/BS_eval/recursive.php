<?php

// $n = 5;

// function sum_n($n){
//     $a=0;
//     while($n != 0){
//         $a += $n;
//         $n--;
//     }
//     echo $a;
// }

// sum_n($n);

// $n = 5;

// function rec_sum_n($n){
//     if($n != 0){
//         $n += rec_sum_n($n - 1);
//     } else if ($n == 0){
//         return 0;
//     }
//     return $n;
// }

// echo rec_sum_n($n); // = > 5+4+3+2+1+0 = 15

function is_prime($n){
    echo $n . "\n";
    if($n == 1){
        return 'false';
    }
    if(is_float($n)){
        return 'true';
    }
    else{
        return is_prime($n/2);
    }
}

echo is_prime (17) ; // = > true
echo is_prime (32) ; // = > false


function facto($n)
{
     if ($n==1) return 1;
     else {
        return $n*facto($n-1);
    }
} 
//  echo "factorielle =",facto(150);

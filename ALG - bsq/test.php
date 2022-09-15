<?php
/////////////////STEP///////////////////
//1 Recuperer le tableau 
//2 le diviser en plusieurs sous tableau qui sont des lignes array(array();array())...
//3 Check chaque case en stockant une valeur qui correspond au nombre de case (a chaque croix, i++)

// $tab=
// |x x . . O .|
// |x x x . . .|
// |x O . . . .|
// |. . . . . .|
// |. . . . O .|

//on vient check    $tab[0][0]; $tab[0][1]; $tab[1][0]; $tab[1][1]; 
//si on rajoute +1  $tab[1][1]; $tab[1][2]; $tab[2][1]; $tab[2][2]; $tab[2][2];
//mauvaise tech

//************** */

//AVANT DE PLACER LES CROIX, on check PUIS on place les croix

// $tab=
// |x x x . O .|
// |x x x . . .|
// |x O x . . .|
// |. . . . . .|
// |. . . . O .|

//on check avec X Y
// x=0 y=0 tab[y][x] xi=0 yi=0

// 
////on vient check    $tab[0][0]; $tab[0][1];
//                    $tab[1][0]; $tab[1][1];
//if(nbr=4)  x+1 Y++

// PHASE DE CHECK //
////on vient check    $tab[0][0]; $tab[0][1]; $tab[0][2]; 
//                    $tab[1][0]; $tab[1][1]; $tab[1][2];
//                    $tab[1][0]; $tab[1][1]; $tab[1][2];
//if(y == yi)
//                    $tab[2][0]; $tab[1][1]; $tab[1][2];
///////////////////////////////////////

//open file in read/write
$file = fopen("$argv[1]", "r+");

//get the content
$file_content = file_get_contents("$argv[1]");

//check when there is a line break
$tab= explode("\n",$file_content);

//delete first and last on tab to get the grid
//delete first
array_splice($tab, 0,1);
//delete last
array_splice($tab, -1);

// var_dump($tab);
//ON PUSH TOUT DANS UN TABLEAU EN CHANGEANT LES VALEURS
$tab1 = [];

$y =  sizeof($tab);
$x =  strlen($tab[0]); 


for($i = 0; $i < $y; $i++){
    for($j = 0; $j < $x; $j++){
        if($tab[$i][$j] == 'o'){
            $tab1[$i][$j] = 0;
        }
        else{
            $tab1[$i][$j] = 1;
        }
    }
}


//////////////////////////////////////////////////////////////////////////////


function findMaxSquare($tab, $y, $x)
{
    $array = array(array()) ;
 
//ON PUSH tab DANS UN ARRAY

    //push la premiere colonne
    for($col = 0; $col < $y; $col++){
        $array[$col][0] = $tab[$col][0];
        // echo $array[$col][0];
    }
     
    //push la premiere ligne
    for($row = 0; $row < $x; $row++){
        $array[0][$row] = $tab[0][$row];
        // echo $array[0][$row];    
    }
    
    //if entries !=0 get the min(parent) and +1 to get the max value
    for($col = 1; $col < $y; $col++)
    {
        for($row = 1; $row < $x; $row++)
        {
            if($tab[$col][$row] == 1){
                $array[$col][$row] = min($array[$col][$row - 1],  $array[$col - 1][$row],  $array[$col - 1][$row - 1]) + 1;
            }
            else{
                $array[$col][$row] = 0;
            }
        }
    }

//////////////////////////////////////////////////////////////
// 
// |0 1 1 0 0 1|
// |1 1 1 1 0 1|
// |1 1 1 0 0 1|
// |1 1 1 1 1 1|
// |0 1 0 1 1 1|

//we get the first row and column
//we add all 0
//then we get the parents top,left, top-left and we add +1 to the lowest value of the 3.

// |0 1 1 0 0 1|
// |1       0  |
// |1     0 0  |
// |1          |
// |0   0      |

//lets try it column by column
// |0 1 1 0 0 1|
// |1 1 2 1 0 1|
// |1 2 2 0 0 1|
// |1 2 3 1 1 1|
// |0 1 0 1 2 2|

//now we get the highest value on $tab[3][2]


///////////////////////////////////////////////////////////////

    $max_of_array = $array[0][0];
    $max_col = 0;
    $max_row = 0;

    for($col = 0; $col < $y; $col++)
    {
        for($row = 0; $row < $x; $row++)
        {
        if($max_of_array < $array[$col][$row])
        {
            //on recup l'index de la valeur la plus haute
            $max_of_array = $array[$col][$row];
            $max_col = $col;
            $max_row = $row;
        }
        }            
    }
     
    //we get the highest value and we go parents by parents to get the last value and change the square
    //max col =9; max array =6 ==3 9>3 6tours
    for($col = $max_col; $col > $max_col - $max_of_array; $col--){
        //maxrow =5  - maxarray = 6 ==-1  5>1 6tours
        for($row = $max_row; $row > $max_row - $max_of_array; $row--){
            $tab[$col][$row] = "\e[0;31;44mX\e[0m";
        }
    }

    //on remet tout en ordre
    for($i = 0; $i < $y; $i++){
        for($j = 0; $j < $x; $j++){
            if($tab[$i][$j] === 0){
                $tab[$i][$j] = 'o';
            }
            if($tab[$i][$j] === 1){
                $tab[$i][$j] = ".";
            }
        }
    }

    
    for($col = 0; $col < $y; $col++){
        for($row = 0; $row < $x; $row++){
            echo $tab[$col][$row];
            // echo "\e[0;31;44mMerry Christmas!\e[0m\n";

        }
        echo "\n";
    }
}
 
findMaxSquare($tab1, $y, $x);
// echo "\e[0;31;44mMerry Christmas!\e[0m\n";
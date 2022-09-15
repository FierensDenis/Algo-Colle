<?php

// $TableArgs=getopt("i:s:p:r",["output-image:","output-style:","recursive","padding"]);
// $nomdufichier = 'test';

// foreach($argv as $key => $value){
//     if($value == '-i'){
//         $number = array_search('-i', $argv);
//         if($argv[$number+1][0] == '-'){
//         $nomdufichier = 'sprite.css';
//         }
//         else$nomdufichier = $argv[$number+1];
//     }
// }

// echo "$nomdufichier \n \n" ;
// // 
// $a='123';

// var_dump(ctype_digit($a));

// if(ctype_digit($a) !== false){
//     $a='1';
// }
// echo $a;
// var_dump(ctype_digit($a));

// var_dump(file_get_contents(end($argv)));

// function generate_html($array1, $css_file_name) {
//     $html_file_name = "index.html";
//     $file1 = fopen($html_file_name, 'w+');
//     $content1 = "<!DOCTYPE html>\n";
//     $content1 .= "<html lang=\"en\">\n";
//     $content1 .= "<head>\n";
//     $content1 .= "\t<link rel=\"stylesheet\" href=\"$css_file_name\">\n";
//     $content1 .= "\t<title>Document</title>\n";
//     $content1 .= "</head>\n";
//     $content1 .= "<body>\n";
//     $size1 = count($array1);
//     for($i = 0; $i < $size1; $i++) {
//         $string1 = rtrim($array1[$i], ".png");
//         $string1 = "sprite-".str_replace("/", "-", $string1);
//         $content1 .= "\t<p class=\"$string1\"></p>\n";
//     }
//     $content1 .= "<body>\n\n";
//     file_put_contents($html_file_name, $content1);
//     fclose($file1);
// }



//var_dump($argc);
//var_dump($argv);
#!/usr/bin/php
<?php

function my_merge_image($dossier){

$table1=getopt("i:s:r",["output-image:","output-style:","recursive"]);

$recursiveornot;
function recursiveOrNot(&$recursiveornot, $table1, $dossier, &$img_path){
    if(array_key_exists("recursive",$table1)){
        $recursiveornot = my_recursive_scandir($dossier, $img_path);
    }
    elseif(array_key_exists("r",$table1)){
        $recursiveornot = my_recursive_scandir($dossier, $img_path);
    }
    else{
        $recursiveornot = my_scandir($dossier, $img_path);
    }
}

$sprite="sprite.png";
function name_sprite_img(&$sprite, $table1){  
    if(array_key_exists("output-image",$table1)){
        $sprite = $table1["output-image"];
        $sprite .= ".png";
    }
    if(array_key_exists("i",$table1)){
        $sprite = $table1["i"];
        $sprite .= ".png";
    }
}

$styleCss="style.css";
function name_css_file(&$styleCss, $table1){
    if(array_key_exists("output-style",$table1)){
        $styleCss = $table1["output-style"];
        $styleCss .= ".css";
     }
    if(array_key_exists("s",$table1)){
       $styleCss = $table1["s"];
       $styleCss .= ".css";
    }
}

$fichier=[];
function my_scandir($dossier, &$img_path){
    if(is_dir($dossier)){
        $dir=opendir($dossier);
        while(($file = readdir($dir)) !==false ){
            if($file !='.' && $file != '..'){
                if(preg_match('#.png#',$file))
                $img_path[] = $dossier. '/' . $file;
            }
        }
        closedir($dir);
    }
}

function my_recursive_scandir($dossier, &$img_path){
    if (is_dir($dossier) && $handle = opendir($dossier)){
        while (($entry = readdir($handle)) !== false){
            if ($entry != '.' && $entry != '..'){
                if (preg_match('#.png#', $entry)){
                    $img_path[] = $dossier . '/' . $entry;
                }
                my_recursive_scandir($dossier . '/' . $entry, $img_path);
            }
        }
        closedir($handle);
    }
}

$tab=[];
function table_with_heightwidth($tablefichier, &$tabletaille){
 
    for($i=0;$i < sizeof($tablefichier);$i++){
        list($width,$height) = getimagesize($tablefichier[$i]);
        array_push($tabletaille,$width,$height);
    }
    return $tabletaille;
}

$x=0;
function size_of_X($tabletaille, &$x){
    for ($i=0; $i < sizeof($tabletaille); $i++){
        if($x <= $tabletaille[$i]){
            $x = $tabletaille[$i];
        }
        else{
            $x;
        }
    $i++;
    }
}

$y=0;
function size_of_Y($tabletaille, &$y){
    for ($i=1; $i < sizeof($tabletaille); $i++){
        $y += $tabletaille[$i];
        $i++;
    }
}

$tableNameImg=[];
function create_img(&$fichier, &$tableNameImg){
    for($i=0; $i< sizeof($fichier);$i++){
        $tableNameImg[]=$fichier[$i];
        $fichier[$i] = imagecreatefromstring(file_get_contents($fichier[$i]));
    }
}

$fond;
$background;
function create_background(&$fond , &$background,$x, $y){
    $fond = imagecreatetruecolor($x,$y);
    $background = imagecolorallocatealpha($fond, 0, 0, 0, 127);//127=transparence complète
    imagefill($fond, 0, 0, $background);
    imagealphablending($fond,false);
    imagesavealpha($fond, true);
}

function fond_image_concatene($fichier, $fond, $tab, $sprite){
    $calculHeight=0;
        for($i=0;$i < sizeof($fichier) ;$i++){
            $a=$i*2;
            $b=($i*2)+1;

            if($i==0){
            imagecopy($fond, $fichier[$i],0,0,0,0,$tab[$a],$tab[$b]);
            }

            else{
            imagecopy($fond, $fichier[$i],0,$calculHeight,0,0,$tab[$a],$tab[$b]);
            }
            $calculHeight += $tab[$b];
        }
    imagepng($fond, "$sprite");
}

function generate_CSS($fichier, $tab, $styleCss, $sprite, $x, $y){
    $spritecss=".sprite, ";

    for($i=0; $i< count($fichier);$i++){
        $spritecss .= ".sprite$i, ";
    }
    $spritecss = rtrim($spritecss, ", ");

    $spritecss .="{
            background: url($sprite) 0 0;
            width:".$x."px;
            height:".$y."px;\n}\n";

    $calculHeight1=0;

    for($i=0;$i< sizeof($fichier);$i++){

        $a=$i*2;
        $b=($i*2)+1;

        $chemin=$sprite;
        $long=$tab[$a];
        $large=$tab[$b];

        $spritecss .= ".sprite$i {
            background-position: 0 -".$calculHeight1."px;
            width:".$long."px;
            height:".$large."px;\n}\n";

            $calculHeight1 += $tab[$b];
            file_put_contents("$styleCss", $spritecss);
    }
}
///////////////////////////////////////////////
    name_sprite_img($sprite,$table1);
    name_css_file($styleCss,$table1);
    recursiveOrNot($recursiveornot, $table1, $dossier, $fichier);
    //var_dump($fichier);
    table_with_heightwidth($fichier, $tab);
    size_of_X($tab, $x);
    size_of_Y($tab, $y);
    create_img($fichier, $tableNameImg);
    create_background($fond ,$background,$x, $y);
    fond_image_concatene($fichier, $fond, $tab, $sprite);
    generate_CSS($fichier, $tab, $styleCss, $sprite, $x, $y);

   //print_r($fichier);
}

my_merge_image(end($argv));
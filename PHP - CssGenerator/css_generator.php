#!/usr/bin/php
<?php

//faire en sorte que : Si un Arg = Null ou [0]="-" , ignorer et $value=ParDefaut;

function ERROR_args(&$TableArgs,&$sprite, &$styleCss,&$padding){
    global $argv;

    foreach($TableArgs as $key => $value){
    // argument i / outputimage
        if(array_key_exists("i",$TableArgs)){
            if($TableArgs["i"][0] === "-" || $TableArgs["i"] == end($argv)){
                $sprite ="sprite.png";
            }
        }
        
        if(array_key_exists("output-image",$TableArgs)){
            if($TableArgs["output-image"][0] === "-" || $TableArgs["output-image"] == end($argv)){
                $sprite ="sprite.png";
            }
        }
    // argument s / outputstyle
        if(array_key_exists("s",$TableArgs)){
            if($TableArgs["s"][0] === "-" || $TableArgs["s"] == end($argv)){
                $styleCss ="style.css";
            }
        }
        if(array_key_exists("output-style",$TableArgs)){
            if($TableArgs["output-style"][0] === "-" || $TableArgs["output-style"] == end($argv)){
                $styleCss ="style.css";
            }
        }
    //foreach
        if ($value == "-r"){
            $value=trim($value, "\-");
            $TableArgs[$key=$value]=NULL;
        }

        if ($value == "--recursive"){
            $value=trim($value, "\--");
            $TableArgs[$key=$value]=NULL;
        }

        if ($value == "-p"){
            $count=array_search("-p", $argv);
            $padding=0;
            if($argv[$count+1][0] == '-'){
                $padding = 0;
            }
            if(ctype_digit($argv[$count+1]) !== false){
                $padding = $argv[$count+1];
            }
        }

        if ($value == "--padding"){
            $count=array_search("--padding", $argv);
            $padding=0;
            if($argv[$count+1][0] == '-'){
                $padding = 0;
            }
            if(ctype_digit($argv[$count+1]) !== false){
                $padding = $argv[$count+1];
            }
        }
    }
}

function ERROR_FILE($dossier, $TablePNG){
    if(!is_dir($dossier)){
        echo "Ajouter un dossier contenant des PNG '.png' \n";
        exit;
    }
    if ($TablePNG == false){
        echo "Le dossier ne contient pas de PNG \n";
        exit;
    }
}

function recursiveOrNot(&$recursiveornot, $TableArgs, $dossier, &$img_path){
    if(array_key_exists("recursive",$TableArgs)){
        $recursiveornot = my_recursive_scandir($dossier, $img_path);
    }
    elseif(array_key_exists("r",$TableArgs)){
        $recursiveornot = my_recursive_scandir($dossier, $img_path);
    }
    else{
        $recursiveornot = my_scandir($dossier, $img_path);
    }
}

function name_sprite_img(&$sprite, $TableArgs){  
    global $argv;
    if(array_key_exists("output-image",$TableArgs)){
        $sprite = $TableArgs["output-image"];
        $sprite .= ".png";
    }
    if(array_key_exists("i",$TableArgs)){
        $sprite = $TableArgs["i"];
        $sprite .= ".png";
    }
}

function name_css_file(&$styleCss, $TableArgs){
    if(array_key_exists("output-style",$TableArgs)){
        $styleCss = $TableArgs["output-style"];
        $styleCss .= ".css";
     }
    if(array_key_exists("s",$TableArgs)){
       $styleCss = $TableArgs["s"];
       $styleCss .= ".css";
    }
}

function padding(&$padding, $TableArgs){
    if(array_key_exists("padding",$TableArgs)){
        $padding = (int)$TableArgs["padding"];
     }
    if(array_key_exists("p",$TableArgs)){
        $padding = (int)$TableArgs["p"];
    }
}

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
    if (is_dir($dossier) && $dir = opendir($dossier)){
        while (($file = readdir($dir)) !== false){
            if ($file != '.' && $file != '..'){
                if (preg_match('#.png#', $file)){
                    $img_path[] = $dossier . '/' . $file;
                }
                my_recursive_scandir($dossier . '/' . $file, $img_path);
            }
        }
        closedir($dir);
    }
}

function table_with_heightwidth($tablefichier, &$tabletaille){
    for($i=0;$i < sizeof($tablefichier);$i++){
        list($width,$height) = getimagesize($tablefichier[$i]);
        array_push($tabletaille,$width,$height);
    }
    return $tabletaille;
}

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

function size_of_Y($tabletaille, &$y, $padding){
    for ($i=1; $i < sizeof($tabletaille); $i++){
        $y += $tabletaille[$i] + $padding;
        $i++;
    }
    $y -= $padding;
}

function create_img(&$TablePNG, &$tableNameImg){
    for($i=0; $i< sizeof($TablePNG);$i++){
        $tableNameImg[]=$TablePNG[$i];
        $TablePNG[$i] = imagecreatefromstring(file_get_contents($TablePNG[$i]));
    }
}

function create_background(&$SpriteImg , &$backgroundColor,$x, $y){
    $SpriteImg = imagecreatetruecolor($x,$y);
    $backgroundColor = imagecolorallocatealpha($SpriteImg, 0, 0, 0, 127);//127=transparence complète
    imagefill($SpriteImg, 0, 0, $backgroundColor);
    imagealphablending($SpriteImg,false);
    imagesavealpha($SpriteImg, true);
}

function fond_image_concatene($TablePNG, $SpriteImg, $TableXY, $sprite, $padding){
    $calculHeight=0;
        for($i=0;$i < sizeof($TablePNG) ;$i++){
            $a=$i*2;
            $b=($i*2)+1;
            $c=$TableXY[$b]+$padding;

            if($i==0){
            imagecopy($SpriteImg, $TablePNG[$i],0,0,0,0,$TableXY[$a],$c);
            }

            else{
            imagecopy($SpriteImg, $TablePNG[$i],0,$calculHeight,0,0,$TableXY[$a],$c);
            }
            $calculHeight += $c;
        }
    imagepng($SpriteImg, "$sprite");
}

function generate_CSS($TablePNG, $TableXY, $styleCss, $sprite, $x, $y, $padding){
    $spritecss=".sprite, ";
    
    for($i=0; $i< count($TablePNG);$i++){
        $spritecss .= ".sprite$i, ";
    }
    $spritecss = rtrim($spritecss, ", ");

    $spritecss .="{
            background: url($sprite) 0 0;
            background-repeat: no-repeat;
            width:".$x."px;
            height:".$y."px;\n}\n";

    $calculHeight1=0;

    for($i=0;$i< sizeof($TablePNG);$i++){

        $a=$i*2;
        $b=($i*2)+1;

        $chemin=$sprite;
        $long=$TableXY[$a];
        $large=$TableXY[$b];

        $spritecss .= ".sprite$i {
            background-position: 0 -".$calculHeight1."px;
            width:".$long."px;
            height:".$large."px;\n}\n";

        $calculHeight1 += $TableXY[$b] + $padding;
        file_put_contents("$styleCss", $spritecss);
    }
}

/////////////////////MAIN FUNCTION//////////////////////////
function my_merge_image($dossier){

$TableArgs=getopt("i:s:p:r",["output-image:","output-style:","recursive","padding:"]);
$sprite="sprite.png";    
$styleCss="style.css";   
$padding=0;
$recursiveornot;
$TablePNG=[];
$TableXY=[];
$x=0;
$y=0;
$tableNameImg=[];
$SpriteImg;
$backgroundColor;

    name_sprite_img($sprite,$TableArgs);
    name_css_file($styleCss,$TableArgs);
    padding($padding, $TableArgs);
        ERROR_args($TableArgs,$sprite, $styleCss, $padding);   
    recursiveOrNot($recursiveornot, $TableArgs, $dossier, $TablePNG);
        ERROR_FILE($dossier,$TablePNG);
    table_with_heightwidth($TablePNG, $TableXY);
    size_of_X($TableXY, $x);
    size_of_Y($TableXY, $y, $padding);
    create_img($TablePNG, $tableNameImg);
    create_background($SpriteImg ,$backgroundColor,$x, $y);
    fond_image_concatene($TablePNG, $SpriteImg, $TableXY, $sprite, $padding);
    generate_CSS($TablePNG, $TableXY, $styleCss, $sprite, $x, $y, $padding);
}

my_merge_image(end($argv));
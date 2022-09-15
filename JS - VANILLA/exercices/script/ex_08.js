var color =[];
for(let i=0; i < document.getElementsByTagName('canvas').length; i++){
    color.push(getComputedStyle(document.getElementsByTagName('canvas')[i]).backgroundColor)
}

var black =0;
var purple=0;
var olive =0;
var orange=0;

function countOccur(value){
    for(var i =0; i<color.length; i++)
        if(color[i] == 'rgb(0, 0, 0)'){
            black++;
        }
        else if(color[i] == 'rgb(128, 0, 128)'){
            purple++;
        }
        else if (color[i] == 'rgb(128, 128, 0)'){
            olive++;
        }
        else if (color[i] == 'rgb(255, 165, 0)'){
            orange++;
        }
}

countOccur(color);

    for(let i=0;i<orange;i++){
        document.getElementsByTagName('canvas')[i].style.backgroundColor="rgb(255, 165, 0)";
    }
    for(let i=orange;i<orange+purple;i++){
        document.getElementsByTagName('canvas')[i].style.backgroundColor="rgb(128, 0, 128)";
    }
    for(let i=orange+purple;i<orange+purple+black;i++){
        document.getElementsByTagName('canvas')[i].style.backgroundColor="rgb(0, 0, 0)";
    }
    for(let i=orange+purple+black;i<orange+purple+black+olive;i++){
        document.getElementsByTagName('canvas')[i].style.backgroundColor="rgb(128, 128, 0)";
    }

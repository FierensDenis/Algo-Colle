var canvas = document.querySelector('canvas');
var canvasParent = document.querySelector('footer > div');
var divtext = document.getElementsByTagName('div')[3];


canvasParent.style.position = 'relative';
canvas.style.position = 'fixed';
canvas.style.transform = "translate(-70%,-50%)";

function move(e){

    var x = e.clientX;
    var y = e.clientY;

    canvas.style.left = x + "px";
    canvas.style.top= y + "px";


    divtext.textContent = "Nouvelles coordonnées => {x: " + (x -392 ) + ", y: " + (y-206  ) + "}";

    console.log(e.pageX)
    if(x < 395){
        canvas.style.left ="397px";
        canvas.removeEventListener("mousemove", move)
    }
    if(x >1070){
        canvas.style.left ="1069px";
        canvas.removeEventListener("mousemove", move)
    }
    else if(y < 209){
        canvas.style.top="210px";
        canvas.removeEventListener("mousemove", move)
    }
    else if(y > 246){
        canvas.style.top="245px"
        canvas.removeEventListener("mousemove", move)
    }
}

canvas.addEventListener('mousedown', e => {
    canvas.addEventListener("mousemove", move);
    // canvas.style.backgroundColor = 'blue';
});

document.addEventListener('mouseup', function stop(e) {
    canvas.removeEventListener("mousemove", move);
    // canvas.style.backgroundColor = 'red';
});
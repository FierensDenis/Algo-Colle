var canvas = document.querySelector('canvas');
var pause  = document.getElementsByTagName('button')[0]; 
var stop   = document.getElementsByTagName('button')[1];
var mute   = document.getElementsByTagName('button')[2];

const audio = new Audio('triangle.ogg');

        context = canvas.getContext("2d");

        context.beginPath();
        context.moveTo(6,6);
        context.lineTo(14,10);
        context.lineTo(6,14);
        context.closePath();

        context.fillStyle = 'white';
        context.fill();

        context.strokeStyle = 'white';
        context.stroke();

    canvas.addEventListener('click', function click(){
        audio.play();
    })
    pause.addEventListener('click', function pause(){
        audio.pause();
    })
    stop.addEventListener('click', function stop(){
        audio.currentTime = 0;
        audio.pause();
    })
    mute.addEventListener('click', function mute(){
        if(audio.muted == false)
        {
            audio.muted = true;
        }
        else if(audio.muted == true)
        {
            audio.muted = false;
        }
    })
var div = document.querySelector('footer > div');
localStorage.setItem("pangolin","https:/www.webacademie.org/wp-content/uploads/2019/11/LOGO-WEBACADEMIE-2019-QUADRI-2048x367.png");
var nameStorage = localStorage.getItem('pangolin');

var percent = 100;
var a = 0; 
var b = 0;

div.innerHTML="<img src=" + nameStorage + " width=" + percent + "% height=" + percent + "% alt='img'>";

var func = function(){
    if (a == 2){
        console.log('ok')
    }
    else{
        a = 0;
        b= 1;
    }
}
var func1 = function(){
    if (a == 2){
        console.log('okok');
    }
    else{
        a = 1;
        b= 0;
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////
var test = function(){
    clearTimeout(MAIN)
    localStorage.clear();
    div.innerHTML="";
    a=2;
}

function MAIN (){
    console.log(a);
    console.log(b);
    console.log(percent);
    if(a == 1){
        if(percent < 100){
            percent++;
            div.innerHTML="<img src=" + nameStorage + " width=" + percent + "% height=" + percent + "% alt='img'>"; 
        }
    }

    if(b == 1){   
        if(percent !== 0){  
            percent--;
            div.innerHTML="<img src=" + nameStorage + " width=" + percent + "% height=" + percent + "% alt='img'>";
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////
    div.addEventListener('mouseenter',func)
    div.addEventListener('mouseleave',func1)
    div.addEventListener('click',()=>{
        div.removeEventListener('mouseenter', func)
        div.removeEventListener('mouseleave', func1)
        clearTimeout(MAIN)
        console.log('azercazerazcreaczrazercazerc')
        localStorage.clear();
        div.innerHTML="";
        a=2;
        b=2;
    })

if(a !== 2){
setTimeout(MAIN,100);}
}
MAIN()
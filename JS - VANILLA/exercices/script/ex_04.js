var a="";
document.addEventListener("keydown", touche);

function touche(e){
    a += (e.key);
    var b = a.substr(-42,42);
    document.querySelector('footer > div').innerHTML = b;
}
window.onload = function (){
    let plus    = document.getElementsByTagName('button')[0];
    let moins   = document.getElementsByTagName('button')[1];
    let tabSelect = document.querySelector('select');

    let taille = 16;
    let phrase = document.querySelector('body');

    plus.addEventListener('click',function upsize(){
        taille++;
        phrase.style.fontSize = taille + 'px';
    });

    moins.addEventListener('click',function downsize(){
        taille--;
        phrase.style.fontSize = taille + 'px';
    });

    // tabSelect.addEventListener('click', () => {
    //    document.body.style.backgroundColor = tabSelect.value;

    // });

    tabSelect.addEventListener('change', () => {
       document.body.style.backgroundColor = tabSelect.value;
    });
}
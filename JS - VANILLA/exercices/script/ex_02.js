let div = document.querySelector('footer > div');
let i = 0;

div.textContent = i;
div.addEventListener('click', Clique);

function Clique(){
    i+=1;
    div.innerHTML = i;
}
var div = document.querySelector('footer > div');

localStorage.setItem("Image","https:/www.webacademie.org/wp-content/uploads/2019/11/LOGO-WEBACADEMIE-2019-QUADRI-2048x367.png");
var nameStorage = localStorage.getItem('Image');

if(nameStorage == null){
    div.innerHTML = 'Error';
}
else div.innerHTML="<img src=" + nameStorage + " width=500 alt='img'>";
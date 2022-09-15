var lien = document.querySelector('footer > div > a');
var a= document.getElementsByTagName('a')[0];
var div = document.getElementsByTagName('div')[2];
var footer = document.querySelector('footer');


var date = new Date();
var addOneDay = date.setDate(date.getDate()+1);
var exp = "; expires="+date.toGMTString();
console.log(exp);
var div2 = document.createElement('div');
//Si le cookie n'existe pas... if document.value == true;
console.log(document.cookie);

if(document.cookie == 'acceptsCookies=true'){
    div.textContent="";
    div2.innerHTML = "<button>Supprimer le cookie</button>";
    footer.appendChild(div2);
    
    document.querySelector('button').onclick = function(){  
    document.cookie = "acceptsCookies=true; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    history.go();
    }
}

a.onclick = function(){
    document.cookie = "acceptsCookies=true; expires="+ exp;
    div.textContent="";
    div2.innerHTML = "<button>Supprimer le cookie</button>";
    footer.appendChild(div2);

    document.querySelector('button').onclick = function(){  
    document.cookie = "acceptsCookies=true; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    history.go();
    }
}

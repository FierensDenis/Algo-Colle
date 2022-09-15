let div = document.querySelector('footer > div');

function dialogue()
    {
        div.addEventListener('click',function click(){
            let name = prompt('Quel est votre nom?');
                if (name)
                {
                    if(confirm("Etes vous sûr que "+name+" est votre nom?"))
                    {
                        alert("Bonjour " + name + " !");
                        div.textContent="Bonjour " + name + " !";
                        return;
                    }
                    // else
                    // {
                    //     return click();
                    // }
                }
                else
                {
                    return click();
                }
        });
    }
dialogue();

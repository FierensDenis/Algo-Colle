    var div = document.querySelector('footer > div');

    function Hero(phrase, classe, nbr1, nbr2){
        this.phrase = phrase;
        this.classe = classe;
        this.nbr1   = nbr1;
        this.nbr2   = nbr2;

        this.phrase = phrase.charAt(0).toUpperCase() + phrase.slice(1);

        this.toString = () => {
            let newP = document.createElement('p');
            newP.textContent = "Je suis " + this.phrase + " le " + this.classe +", j'ai " + this.nbr1 + " points d'intelligence et " + this.nbr2 + " points de force !";
            div.append(newP)
        }
    }

    var mage = new Hero("amadeus", "mage", 10, 3);
    var guerrier = new Hero("pontius", "guerrier", 3, 10);

    mage.toString();
    guerrier.toString();
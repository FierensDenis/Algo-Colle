var event = new Event('pangolin');
var table = ['blue','red','green','yellow','violet','aqua','greenyellow','royalblue','gold','cyan'];
var div = document.querySelector('footer > div');

div.addEventListener('pangolin', function(e){
    console.log('pangolin');
})

var i = 0;

div.addEventListener('click',function(){

    div.addEventListener("pangolin", test);
    function test(){
        i++;
        div.style.backgroundColor=table[i];
        if(i==10){
            i=0;
        }
        setTimeout(test,200);
    }
    div.dispatchEvent(event);
})
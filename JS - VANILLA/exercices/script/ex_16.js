// // //first -> INCLUDE le fichier php ?
// // //Second -> lancer le localhost ?
// // //check comme ca marche
// // //essayer de recup les messages de php ?

// // //lier les fichier,
// // //afficher le message succes ou erreur 


// // //UNE api permet d'echanger entre un APP et une BASE DE DONNEE 
// // //PHP recupere l'element dans la base de donnée

// // // //on veut UPLOADER 

// // // //Recuperer l'image dans JS (en gros faire un return de la fonction outJson)
// // var valider = document.querySelectorAll('footer > div > form > input')[1];
// // // var div = document.querySelectorAll('footer > div')[1];


// // valider.addEventListener('mouseover',test)
// // function test(){
// //     div.textContent='okok'
// // }

// // // console.log(valider)
// // // console.log(div)

// // document.querySelector('form')
// // console.log(document.querySelector('form')

// // // //add event form
// // // //add event click
// // event prevent default

// // //bloque l'envoie e.preventdefault pour ne pas envoyer le form
// // //Recuperer les donnes du form
// // renvoyer en ajax une promesse
// // const maPremierePromesse = new Promise((resolve, reject) => {});

// function maFonctionAsynchrone(url, data) {
   
//     return new Promise((resolve, reject) => {
//         const xhr = new XMLHttpRequest();
//         xhr.open("POST",url);
//         xhr.onload = () => resolve(xhr.responseText);
//         xhr.onerror = () => reject(xhr.statusText);
//         xhr.send(data);
//     });
// }

// function onsenfou(){

//     let form = document.querySelector('form');
//     let form2 = document.getElementById('test').files;
//     let data = new FormData();
//     data.append('test', form2);

//     console.log(form);
//     console.log(data);
//     form.addEventListener('submit', (e) => {
//         e.preventDefault();

//         maFonctionAsynchrone("upload.php", data).then(function (response) {
//             console.log(response)
//         }).catch(function (catchError) {
//             console.log(catchError)
//         })
//     })
// }
// onsenfou();

//   //ajouter les NAME en JS
// //alt + fleche
// can i use

  let form = document.querySelector('form');
  let div = document.querySelectorAll('div')[3];
//   let inputFile = form.querySelector("input[type-file]");
    let inputFile = form.querySelector('input');
  console.log(inputFile)

  form.setAttribute('method',"POST");
  form.setAttribute('enctype', "multipart/form-data");
  form.setAttribute('id', "formulaire");

  inputFile.setAttribute('name', "SelectedFile");
  inputFile.setAttribute('accept',"image/png, image/jpeg, image/jpg")
//   inputFile.setAttribute('multiple');

  form.addEventListener('submit', (e)=>{
      e.preventDefault();

    let data = inputFile.files[0];

    let formData = new FormData();
    formData.append("SelectedFile", data);

    maFonctionAsynchrone("upload.php", formData).then(function(response){
        div.innerHTML = response;
    }).catch(function(error){
        div.innerHTML= error;
    })
  })


function maFonctionAsynchrone(url, data){
    return new Promise((resolve,reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url);
        xhr.onload = () => resolve(xhr.responseText);
        xhr.onerror = () => reject(xhr.statusText);
        xhr.send(data);
    });
}
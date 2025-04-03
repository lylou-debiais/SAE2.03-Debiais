

let templateFile = await fetch('./component/NewMovie/newmovie.html');
let template = await templateFile.text();


let NewMovie = {};

NewMovie.format = function(){
    let html = template;
    return html;
}


/** NewMenuForm.autoFill
 * 
 * Remplit automatiquement les champs d'un formulaire avec les données d'un menu.
 * @param {string} menu.name - Le nom de l'entrée du menu.
 * @param {string} menu.year - Le nom du plat principal du menu.
 * @param {string} menu.description - Le nom du dessert du menu.
 * @param {string} movie.director - Le nom du réalisateur du menu.
 * @param {string} movie.image - L'URL de l'image du menu.
 * @param {string} movie.trailer - L'URL de la bande-annonce du menu.
 * @param {string} movie.min_age - L'âge minimum recommandé pour le menu.
 * @param {string} movie.length - La durée du menu.
 * @param {string} movie.id_categorie - L'identifiant de la catégorie du menu.
 * 
 */
NewMovie.autoFill = function(menu){
    let inputName = form.querySelector("input[name=name]");
    let inputYear = form.querySelector("input[name=year]");
    let inputDescription = form.querySelector("input[name=description]");
    let inputDirector = form.querySelector("input[name=directeur]");
    let inputImage = form.querySelector("input[name=image]");
    let inputTrailer = form.querySelector("input[name=trailer]");
    let inputMinAge = form.querySelector("input[name=age]");
    let inputLength = form.querySelector("input[name=longueur]");
    let inputCategorie = form.querySelector("select[name=categorie]");
    inputName.value = menu.name;
    inputYear.value = menu.year;
    inputDescription.value = menu.description;
    inputDirector.value = menu.director;
    inputImage.value = menu.image;
    inputTrailer.value = menu.trailer;
    inputMinAge.value = menu.min_age;
    inputLength.value = menu.length;
    inputCategorie.value = menu.id_categorie;
    
}

export {NewMovie};


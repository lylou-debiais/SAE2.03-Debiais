let HOST_URL = "https://mmi.unilim.fr/~debiais7/SAE2.03-Debiais";//"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataFavoris = {};


DataFavoris.request = async function($id){
    // fetch permet d'envoyer une requête HTTP à l'URL spécifiée. 
    // L'URL est construite en concaténant HOST_URL à "/server/script.php?direction=" et la valeur de la variable dir. 
    // L'URL finale dépend de la valeur de HOST_URL et de dir.
    let answer = await fetch(HOST_URL + "/server/script.php?todo=favoris&id=" + $id);
    // answer est la réponse du serveur à la requête fetch.
    // On utilise ensuite la méthode json() pour extraire de cette réponse les données au format JSON.
    // Ces données (data) sont automatiquement converties en objet JavaScript.
    let data = await answer.json();
    // Enfin, on retourne ces données.
    return data;
}

DataFavoris.add = async function (fdata) {
    // fetch possède un deuxième paramètre (optionnel) qui est un objet de configuration de la requête HTTP:
    //  - method : la méthode HTTP à utiliser (GET, POST...)
    //  - body : les données à envoyer au serveur (sous forme d'objet FormData ou bien d'une chaîne de caractères)
    let config = {
        method: "POST", // méthode HTTP à utiliser
        body: fdata // données à envoyer sous forme d'objet FormData
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addfavoris", config);
    let data = await answer.json();
    return data;
}

export {DataFavoris};
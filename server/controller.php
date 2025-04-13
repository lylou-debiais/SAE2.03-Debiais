<?php

/** ARCHITECTURE PHP SERVEUR  : Rôle du fichier controller.php
 * 
 *  Dans ce fichier, on va définir les fonctions de contrôle qui vont traiter les requêtes HTTP.
 *  Les requêtes HTTP sont interprétées selon la valeur du paramètre 'todo' de la requête (voir script.php)
 *  Pour chaque valeur différente, on déclarera une fonction de contrôle différente.
 * 
 *  Les fonctions de contrôle vont éventuellement lire les paramètres additionnels de la requête, 
 *  les vérifier, puis appeler les fonctions du modèle (model.php) pour effectuer les opérations
 *  nécessaires sur la base de données.
 *  
 *  Si la fonction échoue à traiter la requête, elle retourne false (mauvais paramètres, erreur de connexion à la BDD, etc.)
 *  Sinon elle retourne le résultat de l'opération (des données ou un message) à includre dans la réponse HTTP.
 */

/** Inclusion du fichier model.php
 *  Pour pouvoir utiliser les fonctions qui y sont déclarées et qui permettent
 *  de faire des opérations sur les données stockées en base de données.
 */

 require("model.php");


 function readController(){
    
    $movie = getMovies();
    return $movie;
}

function readMovieDetailController(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['id'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    // Récupération des paramètres de la requête
    $id = $_REQUEST['id'];

    $movie = getMovieDetail($id);
    return $movie;
}
function readCategoryController(){
      

    $movie = getCategory();
    return $movie;
}

function readMovieCategoryController(){
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['cat'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }
    // Récupération des paramètres de la requête
    $id = $_REQUEST['cat'];
      
    $movie = getMovieCategory($id);
    return $movie;
}

function postController(){
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['name']) || !isset($_REQUEST['year']) || !isset($_REQUEST['description']) || 
        !isset($_REQUEST['image']) || !isset($_REQUEST['trailer']) || !isset($_REQUEST['id_category']) ||
        !isset($_REQUEST['min_age']) || !isset($_REQUEST['director']) || !isset($_REQUEST['length'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }


    // Récupération des paramètres de la requête


    $name = $_REQUEST['name'];
    $year = $_REQUEST['year'];
    $description = $_REQUEST['description'];
    $image = $_REQUEST['image'];
    $trailer = $_REQUEST['trailer'];
    $id_category = $_REQUEST['id_category'];
    $min_age = $_REQUEST['min_age'];
    $director = $_REQUEST['director'];
    $length = $_REQUEST['length'];

    $result = postMovies($name, $year, $description, $image, $trailer, $id_category, $min_age, $director, $length);
    return $result;
}


function postProfileController(){
    
    // if (!isset($_REQUEST['name']) || !isset($_REQUEST['age'])) {
    //     echo json_encode('[error] Missing parameters');
    //     http_response_code(400);
    //     exit();
    // }
    

    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $avatar = isset($_REQUEST['avatar']) ? $_REQUEST['avatar'] : null;

    $result = postProfile($name, $avatar, $age);
    return $result;
}

function readProfileController(){
      

    $profile = getProfile();
    return $profile;
}

function readProfileIdController(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['id'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    $id = $_REQUEST['id'];

    $profile = getProfileId($id);
    return $profile;
}

function readAgeController(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['id'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    $id = $_REQUEST['id'];

    $profile = getAge($id);
    return $profile;
}

function readMovieAge(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['age'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    $age = $_REQUEST['age'];

    $movies = getmovieage($age);
    return $movies;
}

function readMovieAgeCat(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['age']) || !isset($_REQUEST['cat'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    $age = $_REQUEST['age'];
    $cat = $_REQUEST['cat'];

    $movies = getmovieagecat($age, $cat);
    return $movies;
}

function ModifProfileController(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['id']) || !isset($_REQUEST['name']) || !isset($_REQUEST['age'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    // Récupération des paramètres de la requête
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $avatar = isset($_REQUEST['avatar']) ? $_REQUEST['avatar'] : null;

    $result = ModifProfile($id, $name, $avatar, $age);
    return $result;
}

function readFavorisController(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['id'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    // Récupération des paramètres de la requête
    $id = $_REQUEST['id'];

    $result = getFavoris($id);
    return $result;
}

function postFavorisController(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['id_profil']) || !isset($_REQUEST['id_movie'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    // Récupération des paramètres de la requête
    $id_profil = $_REQUEST['id_profil'];
    $id_movie = $_REQUEST['id_movie'];

    $result = postFavoris($id_profil, $id_movie);
    return $result;
}

function deleteFavorisController(){
    
    // Vérification des paramètres de la requête
    if (!isset($_REQUEST['id_profil']) || !isset($_REQUEST['id_movie'])) {
        echo json_encode('[error] Missing parameters');
        http_response_code(400); // 400 == "Bad request"
        exit();
    }

    // Récupération des paramètres de la requête
    $id_profil = $_REQUEST['id_profil'];
    $id_movie = $_REQUEST['id_movie'];

    $result = deleteFavoris($id_profil, $id_movie);
    return $result;
}
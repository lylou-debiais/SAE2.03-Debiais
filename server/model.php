<?php
/**
 * Ce fichier contient toutes les fonctions qui réalisent des opérations
 * sur la base de données, telles que les requêtes SQL pour insérer, 
 * mettre à jour, supprimer ou récupérer des données.
 */

/**
 * Définition des constantes de connexion à la base de données.
 *
 * HOST : Nom d'hôte du serveur de base de données, ici "localhost".
 * DBNAME : Nom de la base de données
 * DBLOGIN : Nom d'utilisateur pour se connecter à la base de données.
 * DBPWD : Mot de passe pour se connecter à la base de données.
 */
define("HOST", "localhost");
define("DBNAME", "debiais7");
define("DBLOGIN", "debiais7");
define("DBPWD", "debiais7");

/**
 * Fonction pour récupérer les noms et images des films depuis la base de données.
 *
 * @return array Tableau d'objets contenant les noms et images des films.
 */
function getMovies() {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT id, name, image FROM Movie ";

    $answer = $cnx->query($sql);

    // Récupère les résultats de la requête sous forme d'objets
    $res = $answer->fetchAll(PDO::FETCH_OBJ);

    return $res; // Retourne les résultats
}

function getMovieDetail($id) {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT Movie.*, Category.name AS category_name 
            FROM Movie 
            INNER JOIN Category ON Movie.id_category = Category.id 
            WHERE Movie.id = $id";

    $answer = $cnx->query($sql);

    // Récupère les résultats de la requête sous forme d'objets
    $res = $answer->fetchAll(PDO::FETCH_OBJ);

    return $res; // Retourne les résultats
}

function getCategory() {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT * FROM Category";

    $answer = $cnx->query($sql);

    // Récupère les résultats de la requête sous forme d'objets
    $res = $answer->fetchAll(PDO::FETCH_OBJ);

    return $res; // Retourne les résultats
}
function getMovieCategory($id) {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT Movie.*, Category.name AS category_name 
        FROM Movie 
        INNER JOIN Category ON Movie.id_category = Category.id
        WHERE Category.id = $id
        ORDER BY Category.id";

    $answer = $cnx->query($sql);

    // Récupère les résultats de la requête sous forme d'objets
    $res = $answer->fetchAll(PDO::FETCH_OBJ);

    return $res; // Retourne les résultats
}

function postMovies($name, $year, $description, $image, $trailer, $id_category, $min_age, $director, $length) {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour envoyé un film
    $sql = "INSERT INTO Movie (name, year, description, image, trailer, id_category, min_age, director, length) VALUES (:name, :year, :description, :image, :trailer, :id_category, :min_age, :director, :length)";

    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);

    
    // Lie les paramètres à la valeur
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':trailer', $trailer);
    $stmt->bindParam(':id_category', $id_category);
    $stmt->bindParam(':min_age', $min_age);
    $stmt->bindParam(':director', $director);
    $stmt->bindParam(':length', $length);

    // Exécute la requête SQL
    $stmt->execute();
    // Récupère le nombre de lignes affectées par la requête
    $res = $stmt->rowCount();
    return $res; // Retourne le nombre de lignes affectées
    // Si la requête a réussi, le nombre de lignes affectées sera 1.
    // Si la requête a échoué, le nombre de lignes affectées sera 0.

}


function postProfile($name, $avatar, $age) {

    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sqlCheck = "SELECT * FROM Profile WHERE nom = :nom";
    $stmtCheck = $cnx->prepare($sqlCheck);
    $stmtCheck->bindParam(':nom', $name);
    $stmtCheck->execute();
    if ($stmtCheck->fetch(PDO::FETCH_ASSOC)) {
        return 0;
    }
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "INSERT INTO Profile (nom, avatar, age) VALUES (:nom, :avatar, :age)";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':nom', $name);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':age', $age);
    $stmt->execute();
    return $stmt->rowCount();
}

function getProfile() {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT * FROM Profile";

    $answer = $cnx->query($sql);

    // Récupère les résultats de la requête sous forme d'objets
    $res = $answer->fetchAll(PDO::FETCH_OBJ);

    return $res; // Retourne les résultats
}

function getAge($id) {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT age FROM Profile WHERE id = :id";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ)->age; // Retourne l'âge
}

function getmovieage($age) {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT * FROM Movie WHERE min_age <= :age";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $age);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ); // Retourne les résultats
}

function getmovieagecat($age, $cat) {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les noms et images des films
    $sql = "SELECT * FROM Movie WHERE min_age <= :age AND id_category = :cat";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':cat', $cat);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ); // Retourne les résultats
}
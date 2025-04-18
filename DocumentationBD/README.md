SAE 203 : Partie Base de Données




 Modifications sur la base :

Itérations 5 : Avoir un formulaire pour ajouter des profils utilisateur
J’ai dû créer une table Profils pour pouvoir ajouter des profils à la base de données, afin que chaque personne puisse avoir son espace personnel avec son nom, son âge, et, si elle le souhaite, une photo de profil. J’ai donc créé une table Profils liée à la table Movies (les films), pour que les films proposés soient adaptés en fonction du profil, notamment de l’âge.
Itérations 9 : Pouvoir ajouter des films à une liste de favoris par profil utilisateur
J’ai dû créer une table Favoris afin de permettre aux utilisateurs, via leur profil, d’ajouter des films à leur liste de favoris. J’ai donc mis en place une association entre les tables Movies (les films) et Profils, pour que les favoris soient spécifiques à chaque profil.

Itérations 11 :
J’ai ajouté une colonne 'mise_en_avant' de type booléen dans la table Movies, pour indiquer si un film est mis en avant (1 pour oui, 0 pour non).

Explications de toutes les requête sql : 

getMovies()
•	Requête SQL : SELECT id, name, image FROM Movie
•	But : Récupère tous les films, avec leur id, nom et image.
•	Utilité : Affichage d'une liste de films (comme une galerie).

getMovieDetail($id)
•	Requête SQL : Jointure entre Movie et Category.
SELECT Movie.*, Category.name AS category_name 
FROM Movie 
INNER JOIN Category ON Movie.id_category = Category.id 
WHERE Movie.id = $id
•	But : Récupère les détails d’un film spécifique (via $id) ainsi que le nom de sa catégorie.
getCategory()
•	Requête SQL : SELECT * FROM Category
•	But : Récupère toutes les catégories de films.

getMovieCategory($id)
•	Requête SQL :
SELECT Movie.*, Category.name AS category_name 
FROM Movie 
INNER JOIN Category ON Movie.id_category = Category.id
WHERE Category.id = $id
ORDER BY Category.id
•	But : Récupère tous les films appartenant à une catégorie spécifique.

getProfile() / getProfileId($id)
•	getProfile() récupère tous les profils.
•	getProfileId($id) récupère un seul profil via son id (paramétré correctement avec prepare()).

getAge($id)
•	Requête SQL : SELECT age FROM Profile WHERE id = :id
•	But : Récupère uniquement l'âge du profil concerné.

getmovieage($age)
•	Requête SQL : SELECT * FROM Movie WHERE min_age <= :age
•	But : Récupère les films autorisés pour l'âge donné (contrôle parental).

getmovieagecat($age, $cat)
•	Requête SQL : SELECT * FROM Movie WHERE min_age <= :age AND id_category = :cat
•	But : Même logique que ci-dessus, mais filtrée aussi par catégorie.

getFavoris($id)
•	Requête SQL :
SELECT Movie.id, Movie.name, Movie.image
FROM Favoris 
INNER JOIN Movie ON Favoris.id_movie = Movie.id 
WHERE Favoris.id_profils = :id
•	But : Récupère les films favoris d’un profil.


postMovies(...)
•	Requête SQL : INSERT INTO Movie (...) VALUES (...)
•	Utilise prepare() et bindParam() →  Sécurisé.
•	But : Ajouter un film dans la base de données.

postProfile(...)
•	Étapes :
1.	Vérifie si un profil avec le même nom existe (SELECT * WHERE nom = :nom)
2.	S’il n’existe pas, l’ajoute (INSERT INTO Profile)
•	But : Évite les doublons de profils.

postFavoris($id_profile, $id_movie)
•	Requête SQL : INSERT INTO Favoris (id_profils, id_movie) VALUES (:id_profils, :id_movie)
•	But : Ajouter un film aux favoris d’un utilisateur.

ModifProfile(...)
•	Requête SQL :
UPDATE Profile SET nom = :name, avatar = :avatar, age = :age WHERE id = :id
•	But : Met à jour les infos d’un profil existant.

deleteFavoris($id_profile, $id_movie)
•	Requête SQL :
DELETE FROM Favoris WHERE id_profils = :id_profils AND id_movie = :id_movie
•	But : Retire un film des favoris d’un utilisateur.

getMovieEnAvant()
•	Requête SQL :
SELECT id, name, image, description  FROM Movie  WHERE mise_en_avant = 1
•	But : permet de récupérer la liste des films mis en avant dans la base de données. Ces films peuvent être affichés en priorité sur une page d’accueil ou dans une section spéciale.


 

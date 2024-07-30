<?php
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

$AllStudent = [];

if (isset($_GET['search']) && !empty($_GET['search'])) {
    // Récupération de la valeur de recherche en veillant à échapper les caractères spéciaux
    $searchStudent = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');

    // Requête SQL pour rechercher les étudiants correspondant au matricule ou au nom
    $query = 'SELECT  id_student, fname, lname, birth, email, nationality, program, profil, session_year, sexe, matricule FROM students WHERE matricule LIKE :search OR fname LIKE :search OR email LIKE :search OR nationality LIKE :search OR program LIKE :search ORDER BY id_student DESC';

    // Préparation de la requête avec un paramètre lié pour protéger contre les attaques par injection SQL
    $statement = $conn->prepare($query);
    $statement->bindValue(':search', '%' . $searchStudent . '%');

    // Exécution de la requête
    if ($statement->execute()) {
        // Récupération des résultats dans un tableau associatif
        $AllStudent = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        die('Erreur lors de l\'exécution de la requête.');
    }
}
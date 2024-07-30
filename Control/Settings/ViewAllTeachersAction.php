<?php
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

// Pagination variables
$perPage = 5; // Nombre d'enseignants à afficher par page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Numéro de page actuelle

// Calculer l'offset pour la requête SQL
$offset = ($page - 1) * $perPage;

// Requête pour récupérer les enseignants avec la pagination
$statement = $conn->prepare('SELECT * FROM teachers LIMIT :perPage OFFSET :offset');
$statement->bindValue(':perPage', $perPage, PDO::PARAM_INT);
$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
$statement->execute();

$teachers = $statement->fetchAll(PDO::FETCH_ASSOC);

// Requête pour compter le nombre total d'enseignants
$countStatement = $conn->query('SELECT COUNT(*) FROM teachers');
$totalTeachers = $countStatement->fetchColumn();

// Calculer le nombre total de pages
$totalPages = ceil($totalTeachers / $perPage);

?>
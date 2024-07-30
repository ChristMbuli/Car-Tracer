<?php
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

$pageSize = 5; // Nombre d'éléments par page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Numéro de page courante, par défaut la première page

// Compter le nombre total d'étudiants
$countQuery = $conn->prepare('SELECT COUNT(*) AS total FROM students WHERE session_year = ?');
$countQuery->execute(array($_SESSION['year']));
$totalStudents = $countQuery->fetch()['total'];

// Calculer le nombre total de pages
$totalPages = ceil($totalStudents / $pageSize);

// Limiter la requête pour obtenir uniquement les étudiants de la page courante
$offset = ($page - 1) * $pageSize;
$studentsQuery = $conn->prepare('SELECT * FROM students WHERE session_year = ? ORDER BY id_student DESC LIMIT ?, ?');
$studentsQuery->bindValue(1, $_SESSION['year'], PDO::PARAM_STR);
$studentsQuery->bindValue(2, $offset, PDO::PARAM_INT);
$studentsQuery->bindValue(3, $pageSize, PDO::PARAM_INT);
$studentsQuery->execute();
$students = $studentsQuery->fetchAll();
?>
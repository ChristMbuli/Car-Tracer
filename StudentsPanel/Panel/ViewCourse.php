<?php
require_once 'Connexion.php';


//Afficher les programmes
$AllCourses = $conn->prepare('SELECT * FROM courses WHERE program = ?');
$AllCourses->execute(array($_SESSION['program']));


?>
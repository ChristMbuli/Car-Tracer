<?php
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

//Afficher les programmes
$AllProgram = $conn->prepare('SELECT * FROM programs');
$AllProgram->execute();

//Afficher les programmes
$AllPrograms = $conn->prepare('SELECT * FROM programs');
$AllPrograms->execute();

//Afficher les teachers
$AllTeacher = $conn->prepare('SELECT * FROM teachers');
$AllTeacher->execute();

//Afficher les courses
$AllCourses = $conn->prepare('SELECT * FROM courses');
$AllCourses->execute();

?>
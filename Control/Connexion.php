<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {

    $conn = new PDO('mysql:host=localhost;dbname=university;charset=utf8;', 'root', '');

} catch (Exception $e) {
    die('Erreur de connexion: ' . $e->getMessage());
}
?>
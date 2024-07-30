<?php
// Inclusion du fichier de connexion
require_once (dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php');

// Initialisation des variables
$msgError = "";

if (isset($_GET['class'])) {
    // Décodage de la classe depuis la requête GET
    $Class = urldecode($_GET['class']);

    // Préparation de la requête SQL pour vérifier si des élèves existent dans la classe spécifiée
    $ifClassExiste = $conn->prepare('SELECT * FROM students WHERE program = ?');
    $ifClassExiste->execute(array($Class));

    if ($ifClassExiste->rowCount() > 0) {
        // Si des étudiants sont trouvés dans la classe spécifiée
        $allStudents = $ifClassExiste->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Si aucun étudiant n'est trouvé dans la classe spécifiée
        $msgError = "Aucun élève trouvé !";
    }
} else {
    // Si aucun paramètre de classe n'est passé
    $msgError = "Erreur lors de la sélection !";
}
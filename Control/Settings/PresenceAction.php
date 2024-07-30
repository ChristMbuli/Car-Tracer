<?php
// Inclusion du fichier de connexion
require_once (dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php');

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si les données nécessaires sont présentes
    if (isset($_POST['options']) && isset($_GET['class'])) {
        // Récupération des valeurs du formulaire
        $presence = $_POST['options'];
        $class = $_GET['class'];
        $session = $_SESSION['year'];

        // Vérification si une entrée pour la classe et la date actuelle existe dans la table de présence
        $checkPresence = $conn->prepare('SELECT * FROM presences WHERE program = ? AND day = CURRENT_DATE');
        $checkPresence->execute([$class]);

        // Si une entrée existe
        if ($checkPresence->rowCount() > 0) {
            // Modifier les statuts de présence ou d'absence existants
            $updatePresence = $conn->prepare('UPDATE presences SET present = ?, absent = ? WHERE id_student = ? AND program = ? AND day = CURRENT_DATE');

            foreach ($presence as $studentId => $status) {
                $present = ($status == 'present') ? 1 : 0;
                $absent = ($status == 'absent') ? 1 : 0;
                $updatePresence->execute([$present, $absent, $studentId, $class]);
            }

            // Message de confirmation
            $msgSuccess = "Les données de présence ont été mises à jour avec succès.";
        } else {
            // Insérer de nouvelles données de présence
            $insertPresence = $conn->prepare('INSERT INTO presences (id_student, program, day, present, absent, session) VALUES (?, ?, CURRENT_DATE, ?, ?, ?)');

            foreach ($presence as $studentId => $status) {
                $present = ($status == 'present') ? 1 : 0;
                $absent = ($status == 'absent') ? 1 : 0;
                $insertPresence->execute([$studentId, $class, $present, $absent, $session]);
            }

            // Message de confirmation
            $msgSuccess = "Les données de présence ont été enregistrées avec succès.";
        }
    } else {
        // Message d'erreur si des données nécessaires sont manquantes
        $msgError = "Erreur : les données nécessaires sont manquantes.";
    }
}
?>
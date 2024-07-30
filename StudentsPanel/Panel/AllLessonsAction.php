<!--  ------------------------------ ->
<?php
require_once 'Connexion.php';


//Recuper le nom du cours
if (isset($_GET['id']) and !empty($_GET['id'])) {

    $IdTheCourse = $_GET['id'];


    // Récupérer tous les leçons qui appartient au cours qui est a URL
    $getAllLessons = $conn->query('SELECT id_lesson, name_lesson, lessons FROM lessons WHERE id_courses = ?');
    $getAllLessons->execute(array($IdTheCourse));

    // Vérifier s'il y a des leçons disponibles
    if ($getAllLessons->rowCount() > 0) {
        echo '<h2>Liste des cours :</h2>';

        // Afficher la liste des cours
        echo '<ul>';
        while ($coursData = $getAllCours->fetch()) {
            $coursId = $coursData['id_lesson'];
            $coursPath = $coursData['lessons'];
            $coursTitre = $coursData['name_lesson'];

            // Obtenir l'extension du fichier
            $extension = pathinfo($coursPath, PATHINFO_EXTENSION);

            // Déterminer l'image correspondante à l'extension du fichier
            $image = '';
            switch ($extension) {
                case 'pdf':
                    $image = 'pdf.png';
                    break;
                case 'pptx':
                    $image = 'pptx.png';
                    break;
                case 'docx':
                    $image = 'word.png';
                    break;
                default:
                    $image = 'default.png'; // Image par défaut pour les autres types de fichiers
                    break;
            }

            echo '<li>';
            echo '<a href="home.php?id=' . $coursId . '">';
            echo '<img src="../../images/' . $image . '" alt="' . $extension . '" height="20px" width="20px" >';
            echo $coursTitre;
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Aucun cours disponible.';
    }
}
?>
<?php
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

// Vérifier si le bouton "enregistrer" est appuyé
if (isset($_POST['addlessons'])) {
    // Vérifier si les champs ne sont pas vides
    if (!empty($_POST['programs']) && !empty($_POST['cours']) && !empty($_POST['namelessons']) && !empty($_FILES['lessons']['name'])) {

        $programs = htmlspecialchars($_POST['programs']);
        $course = htmlspecialchars($_POST['cours']);
        $namelessons = htmlspecialchars($_POST['namelessons']);

        $date = $_SESSION['year'];

        // Vérifier le type de fichier
        $allowedTypes = array('pdf', 'doc', 'docx', 'ppt', 'pptx'); // Types de fichiers autorisés
        $fileExt = strtolower(pathinfo($_FILES['lessons']['name'], PATHINFO_EXTENSION)); // Extension du fichier

        if (in_array($fileExt, $allowedTypes)) {
            // Chemin de destination pour enregistrer le fichier
            $lessonsPath = 'uploads/' . $_FILES['lessons']['name'];

            // Déplacer le fichier vers le dossier de destination
            move_uploaded_file($_FILES['lessons']['tmp_name'], $lessonsPath);

            // Insérer le cours et son titre dans la table
            $InsertLessons = $conn->prepare('INSERT INTO lessons(name_lesson, lessons, id_courses, program, session_year) VALUES(?, ?, ?, ?, ?)');
            $InsertLessons->execute(array($namelessons, $lessonsPath, $course, $programs, $date));

            $successMsg = "Le cours a été ajouté avec succès.";
        } else {
            $errorMsg = "Le format du fichier n'est pas autorisé. Veuillez choisir un fichier PDF, Word ou PowerPoint.";
        }
    } else {
        $errorMsg = "Veuillez remplir tous les champs.";
    }
}
?>
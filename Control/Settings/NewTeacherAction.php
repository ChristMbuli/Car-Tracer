<?php
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

// Condition pour verifier si le button "add" a été appuyer 
if (isset($_POST['add'])) {
    //section pour verifier si les champs du formulais pour ajouter un nouveau prof  ne sont pas vide
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['course']) && !empty($_POST['contact']) && !empty($_FILES['profil']['name']) && !empty($_POST['nationality']) && !empty($_POST['program']) && !empty($_POST['sex'])) {

        //stocker les informations entrée au formulaire dans les variables
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $course = htmlspecialchars($_POST['course']);
        $contact = htmlspecialchars($_POST['contact']);
        $nationality = htmlspecialchars($_POST['nationality']);
        $program = htmlspecialchars($_POST['program']);
        $sex = htmlspecialchars($_POST['sex']);
        $date = $_SESSION['year'];
        ///////////////////////////////////////////

        // Obtenez l'année en cours
        $currentYear = $_SESSION['year'];

        // Générez une lettre aléatoire entre A et Z
        $randomLetter = chr(rand(65, 90));

        // Générez un nombre aléatoire entre 100 et 999
        $randomNumber = rand(100, 999);

        // Combinez l'année en cours, la lettre aléatoire et le nombre aléatoire pour former le matricule
        $matricule = $randomLetter . $randomNumber . '/' . $currentYear;


        // inserer le profil de student 
        $picture = $_FILES['profil']['name'];
        $picture_tmp = $_FILES['profil']['tmp_name'];
        $picture_path = 'images/' . $picture;
        move_uploaded_file($picture_tmp, $picture_path);


        //La requette poutr inserer les formation du formulaire dans la table
        $InsertTeachers = $conn->prepare('INSERT INTO teachers(fname, lname, sexe, matricule, email, cours, program, profil, session_year) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $InsertTeachers->execute(array($fname, $lname, $sex, $matricule, $contact, $course, $program, $picture_path, $date));


        $SuccessMsg = "Teacher register successfully";
    } else {
        $msgError = "Please fill in all fields.";
    }
}


?>
<?php
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;
//Section pour verifier si l'id Teacher est entre dans le parametre de URL
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //stocker Id de TEacher dans une variable
    $IdTheTeacher = $_GET['id'];


    //Section pour voir si l'id entrée correspond à un student dans la table
    $ReqTeacherExiste = $conn->prepare('SELECT * FROM teachers WHERE id_teacher = ?');
    $ReqTeacherExiste->execute(array($IdTheTeacher));

    if ($ReqTeacherExiste->rowCount() > 0) {

        //Recuper tous les donnée et le stocker dans une variable sous forme d'un tableau avec la methode fetch()
        $TeacherInfos = $ReqTeacherExiste->fetch();

        //Stocker les donnée dans les varibles correspondant

        $fname = $TeacherInfos['fname'];
        $lname = $TeacherInfos['lname'];
        $email = $TeacherInfos['email'];
        $sexe = $TeacherInfos['sexe'];
        $cours = $TeacherInfos['cours'];
        $profil = $TeacherInfos['profil'];
        $prog = $TeacherInfos['program'];
        $matricule = $TeacherInfos['matricule'];


    } else {
        $errorMsg = 'No Teacher found';
    }
} else {
    $errorMsg = 'Teacher selection error';
}


?>
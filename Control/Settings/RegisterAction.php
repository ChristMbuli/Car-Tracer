<?php
session_start();
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

// Section pour valider le formulaire d'inscription admin
if (isset($_POST['register'])) {

    //Verifier si l'admin à remplis tous les champs du formulaire
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])) {

        //Stocker les donnée entrée dans les variable
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $adminMdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $date_session = date('Y');

        // Section pour verifier si l'admin existe déjà dans la plateforme
        $ifAdminExists = $conn->prepare('SELECT username FROM admins WHERE username = ?');
        $ifAdminExists->execute(array($pseudo));

        if ($ifAdminExists->rowCount() == 0) {

            // Section pour inserer les donnée de l'admin dans la base de donnée
            $insertAdmin = $conn->prepare('INSERT INTO admins (fname , lname, username, mdp, session_year) VALUES (?, ?, ?, ?, ?)');
            $insertAdmin->execute(array($fname, $lname, $pseudo, $adminMdp, $date_session));

            // Section permet de recuperer les donnée de l'admin authentifier
            $reqAdminInfos = $conn->prepare('SELECT id_admin, fname, lname, username, session_year FROM admins WHERE fname = ? AND username = ? AND session_year = ?');
            $reqAdminInfos->execute(array($fname, $pseudo, $date_session));

            //stocker les informations admin dans un tableau  dans une variable 
            $sessionAdminInfos = $reqAdminInfos->fetch();

            //Section pour authentifier l'admin sur la plateforme avec les session
            $_SESSION['admin'] = true;
            $_SESSION['id'] = $sessionAdminInfos['id_admin'];
            $_SESSION['firstname'] = $sessionAdminInfos['fname'];
            $_SESSION['lastname'] = $sessionAdminInfos['lname'];
            $_SESSION['pseudo'] = $sessionAdminInfos['username'];
            $_SESSION['year'] = $sessionAdminInfos['session_year'];


            header('Location: AdminLogin.php');
        } else {
            $msgError = "Account error";
        }
    } else {
        $msgError = "Fill in all fields...";
    }
}


?>
<?php
session_start();
$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;

// Section pour valider le formulaire d'inscription admin
if (isset($_POST['connexion'])) {
    //Verifier si l'admin à remplis tous les champs du formulaire
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {

        //Stocker les donnée entrée dans les variable
        $Pseudo = htmlspecialchars($_POST['pseudo']);
        $Mdp = htmlspecialchars($_POST['mdp']);

        //Verifier si le peuso de l'admin existe
        $checkIfAdmin = $conn->prepare('SELECT * FROM admins WHERE username = :pseudo');
        $checkIfAdmin->execute(array('pseudo' => $Pseudo));


        if ($checkIfAdmin->rowCount() > 0) { // la méthode rowcount nous permet de compter les nombre des donnée entré par l'admin

            $adminInfos = $checkIfAdmin->fetch(); //recuperer toutes les infos admin est stocker dans un tabelau

            //Section pour verifier si le mot de passe entrer par l'admin correspond à celui de la BD
            if (password_verify($Mdp, $adminInfos['mdp'])) {

                //Section pour authentifier l'admin sur la plateforme avec les session
                $_SESSION['admin'] = true;
                $_SESSION['id'] = $adminInfos['id_admin'];
                $_SESSION['firtsname'] = $adminInfos['fname'];
                $_SESSION['lastname'] = $adminInfos['lname'];
                $_SESSION['pseudo'] = $adminInfos['username'];
                $_SESSION['year'] = $adminInfos['session_year'];

                //Si les information entrée sont correct, on fait la redirection vers la page d'accueil
                header('Location: index.php');

            } else {
                $msgError = "Your password is incorrect";
            }

        } else {
            $msgError = "your email is incorrect";
        }

    } else {
        $msgError = "Account not found";
    }
}
?>
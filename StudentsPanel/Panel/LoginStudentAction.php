<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'Connexion.php';

// Section pour valider le formulaire de connexion admin
if (isset($_POST['connexion'])) {
    // Vérifier si l'admin a rempli tous les champs du formulaire
    if (!empty($_POST['matricule']) && !empty($_POST['program'])) {
        // Stocker les données entrées dans des variables
        $mat = htmlspecialchars($_POST['matricule']);
        $prog = htmlspecialchars($_POST['program']);

        // Vérifier si le programme et le matricule de l'étudiant existent
        $checkIfStudent = $conn->prepare('SELECT * FROM students WHERE program = :program AND matricule = :matricule');
        $checkIfStudent->execute(array('program' => $prog, 'matricule' => $mat));

        if ($checkIfStudent->rowCount() > 0) { // Vérifier si des données correspondantes existent
            $studentInfos = $checkIfStudent->fetch(); // Récupérer toutes les informations de l'étudiant et les stocker dans un tableau

            // Vérifier si le matricule correspond à celui enregistré dans la base de données
            if ($mat === $studentInfos['matricule']) {
                // Authentifier l'étudiant sur la plateforme avec les sessions
                $_SESSION['students'] = true;
                $_SESSION['id'] = $studentInfos['id_student'];
                $_SESSION['firstname'] = $studentInfos['fname'];
                $_SESSION['lastname'] = $studentInfos['lname'];
                $_SESSION['matricule'] = $studentInfos['matricule'];
                $_SESSION['year'] = $studentInfos['session_year'];
                $_SESSION['profil'] = $studentInfos['profil'];
                $_SESSION['program'] = $studentInfos['program'];

                // Redirection vers la page d'accueil
                header('Location: index.php');
                exit;
            } else {
                $msgError = "Your number is incorrect";
            }
        } else {
            $msgError = "Your program is incorrect";
        }
    } else {
        $msgError = "please complete all fields";
    }
}
?>
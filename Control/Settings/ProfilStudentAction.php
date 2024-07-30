<?php

$route = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Connexion.php';
include $route;
//sortir d'un dossier puis acceder au dossier vendor
require __DIR__ . '/../vendor/autoload.php';


//Section pour verifier si l'id du student est entre dans le parametre de URL
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //stocker Id du student dans une variable
    $IdTheStudent = $_GET['id'];
    // $IdOwnerHouse = $_GET['id_owner'];

    //Section pour voir si l'id entrée correspond à un student dans la table
    $ReStudentExiste = $conn->prepare('SELECT * FROM students WHERE id_student = ?');
    $ReStudentExiste->execute(array($IdTheStudent));

    if ($ReStudentExiste->rowCount() > 0) {

        //Recuper tous les donnée et le stocker dans une variable sous forme d'un tableau avec la methode fetch()
        $StudentInfos = $ReStudentExiste->fetch();

        //Stocker les donnée dans les varibles correspondant

        $fname = $StudentInfos['fname'];
        $lname = $StudentInfos['lname'];
        $email = $StudentInfos['email'];
        $sexe = $StudentInfos['sexe'];
        $nation = $StudentInfos['nationality'];
        $birth = $StudentInfos['birth'];
        $profil = $StudentInfos['profil'];
        $prog = $StudentInfos['program'];
        $matricule = $StudentInfos['matricule'];

        // Génération du contenu du QR code
        $qrCodeContent = $fname . ' ' . $lname . ' - ' . json_encode([
            'Nom:' => $lname,
            'Prenom: ' => $fname,
            'email' => $email,

        ]);

        // Génération du QR code
        $qrCode = new chillerlan\QRCode\QRCode(new chillerlan\QRCode\QROptions([
            'outputType' => chillerlan\QRCode\QRCode::OUTPUT_IMAGE_PNG,
        ]));

        // Chemin où le fichier QR code sera sauvegardé
        $qrCodeImagePath = __DIR__ . '/img/qrcode.png';


        // Génération et sauvegarde du fichier QR code
        $qrCode->render($qrCodeContent, $qrCodeImagePath);



    } else {
        $errorMsg = 'No student found';
    }

} else {
    $errorMsg = 'Student selection error';
}

//Recuoperer la presence

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $IdTheStudent = $_GET['id'];

    // Requête pour récupérer les données de présence de l'étudiant depuis la table 'presence'
    $fetchPresence = $conn->prepare('SELECT * FROM presences WHERE id_student = ?');
    $fetchPresence->execute([$IdTheStudent]);

    // Initialisation du tableau des événements pour le calendrier
    $events = [];

    // Récupération des données de présence de l'étudiant
    while ($presence = $fetchPresence->fetch()) {
        // Ajout des événements de présence et d'absence dans le tableau des événements
        if ($presence['present'] == 1) {
            $events[] = [
                'title' => 'Présent',
                'start' => $presence['day']
            ];
        } elseif ($presence['absent'] == 1) {
            $events[] = [
                'title' => 'Absent',
                'start' => $presence['day']
            ];
        }
    }
}

?>
<?php 
    session_start();
    
    //Section pour verifier si student n'est pas authentifier avec la session auth tu le renvoie dans la page login.php
    if(!isset($_SESSION['students'])){
        
        header('Location: loginstudent.php');
    }

?>
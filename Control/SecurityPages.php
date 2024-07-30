<?php 
    session_start();
    
    //Section pour verifier si l'admin n'est pas authentifier avec la session auth tu le renvoie dans la page login.php
    if(!isset($_SESSION['admin'])){
        
        header('Location: AdminLogin.php');
    }

?>
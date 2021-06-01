<?php
require('controller/accountController.php');
require_once('model/EntryManager.php');

if(session_id() == '') {
    session_start();
}
try {
    if(!isset($_GET['action'])) {
        if(isset($_GET['session-state']) AND $_GET['session-state'] == 'init-session') {
            echo session_id() .' ' . $_SESSION['pseudo'];

            if(!isset($_SESSION['pseudo'])) {
                if(session_id() !== '') {
                    unset($_SESSION['pseudo']);
                    session_destroy();
                }
            }
            //si il y une session ouverte, on la detruit
        }
        goToAdminInterface();
    }
    else {
        if($_GET['action'] == 'connection') {
            if(!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                connection($_POST['pseudo'], $_POST['pass']);
            }
            // else {
                // throw new Exception('Tout les champs ne sont pas remplis !');
            // }
        }

        elseif($_GET['action'] == 'registration') {
            if(!empty($_POST['reg_pseudo'])) {
                registration($_POST['reg_pseudo'], $_POST['reg_mail'], $_POST['reg_pass'], $_POST['reg_pass_repeat']);
            }
            // else {
                // throw new Exception('Veuillez renseigner un pseudo !');
            // }
        }

        elseif($_GET['action'] == 'deconnection') {
            deconnection();
        } 

        elseif($_GET['action'] == 'add-project') {
            // -> on recuperer les données
            $opManager = new EntryManager();
            $affectedLines = $opManager->recordEntry();
        }

        elseif($_GET['action'] == 'suppr-project') {
            $opManager = new EntryManager();
            $affectedLines = $opManager->deleteEntry($_GET['id']);
        }

        elseif($_GET['action'] == 'edit-project') {
            $opManager = new EntryManager();
            $affectedLines = $opManager->updateEntry($_GET['id']);
        }
    }

    goToAdminInterface();

} catch(Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
}


?>
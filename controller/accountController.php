<?php
require_once('model/AccountManager.php');
require_once('controller/frontController.php');
// CONTROLLER
if(session_id() == '') {
    session_start();
}

function goToAdminInterface() {
    // header('Location: index.php?action=go-site');
    require_once('view/parts/accounts-template.php');
}

function deconnection() {
    unset($_SESSION['pseudo']);
    session_destroy();

    goToAdminInterface();
}

function connection($pseudo, $pass) {
    $accountManager = new AccountDatabaseManager();
    $logsDb = $accountManager->getLogs($pseudo);

    if($data = $logsDb->fetch()) {
        if($pass == $data['pass']) {
            $_SESSION['pseudo'] = $pseudo;
        }    
        else {    
            $_POST['log-error'] = 'Wrong password or pseudo';
        }
    }
    else { 
        $_POST['log-error'] = 'Wrong password or pseudo';
    }     
    goToAdminInterface();
}

function registration($pseudo, $mail, $pass, $pass_repeat) {
    $accountManager = new AccountDatabaseManager();
    $logsDb = $accountManager->getLogs($pseudo);

    if($pass != $pass_repeat) {
        $_POST['log-error'] = 'The two passwords must be identical';
    }
    elseif($data = $logsDb->fetch()) {
        $_POST['log-error'] = 'This pseudo is not available';
    }
    else {
        $accountManager->insertLogs($pseudo, $mail, $pass);
        $_SESSION['pseudo'] = $pseudo; 
    }
    goToAdminInterface();

}


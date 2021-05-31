<?php
require_once('globals.php');

class AccountDatabaseManager {
    public $basename;
    public $tablename;
    public $dbPDO;

    public function __construct() {
        $this->basename = $GLOBALS['basename'];
        $this->tablename = $GLOBALS['log-tablename'];
        $this->dbPDO = $this->connectBase();
    }

    protected function connectBase() {
        try {
            $pdoConnect = new PDO("mysql:host=" . $GLOBALS['servername'] . ";dbname=" . $this->basename . ";charset=utf8", $GLOBALS['username'], $GLOBALS['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur connect base: ' . $e->getMessage());
        }
        return $pdoConnect;
    }

    public function getLogs($pseudo) {
        $req = $this->dbPDO->prepare("SELECT pseudo, pass FROM $this->tablename WHERE pseudo = :pseudo");
        $req->execute(array('pseudo' => $pseudo));
        return $req;
    }

    public function insertLogs($pseudo, $mail, $pass) {
        $req = $this->dbPDO->prepare("INSERT INTO $this->tablename(pseudo, mail, pass) VALUES(:pseudo, :mail, :pass)");
        $affectedLine = $req->execute(array(
            'pseudo' => $pseudo,
            'mail' => $mail,
            'pass' => $pass
        ));
        return $affectedLine;
    }
}
?>
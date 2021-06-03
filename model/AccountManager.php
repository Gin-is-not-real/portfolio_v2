<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/FORM_PROJETS/portfolio_v2/globals.php');

class AccountDatabaseManager {
    private $hostname;
    private $basename;
    private $logTablename;
    public $dbPDO;

    public function __construct() {
        $this->hostname = $GLOBALS['hostname'];
        $this->username = $GLOBALS['username'];
        $this->password = $GLOBALS['password'];
        $this->basename = $GLOBALS['basename'];
        $this->logTablename = $GLOBALS['log-tablename'];
        $this->dbPDO = $this->connectBase();
    }

    protected function connectBase() {
        try {
            $pdoConnect = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->basename . ";charset=utf8", $this->username, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur connect base: ' . $e->getMessage());
        }
        return $pdoConnect;
    }

    public function getLogs($pseudo) {
        $req = $this->dbPDO->prepare("SELECT pseudo, pass FROM $this->logTablename WHERE pseudo = :pseudo");
        $req->execute(array('pseudo' => $pseudo));
        return $req;
    }

    public function insertLogs($pseudo, $mail, $pass) {
        $req = $this->dbPDO->prepare("INSERT INTO $this->logTablename(pseudo, mail, pass) VALUES(:pseudo, :mail, :pass)");
        $affectedLine = $req->execute(array(
            'pseudo' => $pseudo,
            'mail' => $mail,
            'pass' => $pass
        ));
        return $affectedLine;
    }
}
?>
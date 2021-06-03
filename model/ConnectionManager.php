<?php
// require_once('globals.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/FORM_PROJETS/portfolio_v2/globals.php');

// $path = $_SERVER['DOCUMENT_ROOT'];

class ConnectionManager {
    protected $hostname;
    protected $username;
    protected $password;

    protected $basename;
    protected $tablename;
    public $dbPDO;

    public function __construct() {
        $this->hostname = $GLOBALS['hostname']; 
        $this->username = $GLOBALS['username'];
        $this->password = $GLOBALS['password'];
        $this->basename = $GLOBALS['basename'];
        $this->tablename = $GLOBALS['tablename'];

        $this->dbPDO = $this->connectBase();
    }

    public function connectServer() {
        try {
            $db = new PDO("mysql:host=" . $this->hostname, $this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur connect server: ' . $e->getMessage());
        }
        return $db;
    }

    protected function connectBase() {
        try {
            $pdoConnect = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->basename . ";charset=utf8", $this->username, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur connect base: ' . $e->getMessage());
        }
        return $pdoConnect;
    }
}




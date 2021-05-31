<?php
// require('../globals.php');
$host = 'localhost';
$username = 'admin';
$password = 'admin';
$basename = 'portfolio';
$tablename = 'projects';

class ConnectionManager {
    public $host = 'localhost';
    public $username = 'admin';
    public $password = 'admin';
    public $basename = 'portfolio';
    public $tablename = 'projects';
    public $dbPDO;

    public function __construct() {
        // $this->basename = $basename;
        // $this->tablename = $tablename;
        // $this->username = $username;
        // $this->password = $password;
        $this->dbPDO = $this->connectBase();
    }

    public function connectServer() {
        try {
            $db = new PDO("mysql:host=localhost", $this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur connect server: ' . $e->getMessage());
        }
        return $db;
    }

    protected function connectBase() {
        try {
            $pdoConnect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->basename . ";charset=utf8", $this->username, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur connect base: ' . $e->getMessage());
        }
        return $pdoConnect;
    }
}




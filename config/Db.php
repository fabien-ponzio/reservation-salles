<?php
class Bdd
{
    private $host;
    private $username;
    private $password;
    private $database;
    public $db;
    /**
     * 
     */
    public function __construct()
    {   
    $this->host = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->database = "newproject";
    }

    public function connectDb()
    {
        try {
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
            return $this->db;

        }
        catch(PDOException $e) {
            die('<h1>impossible de se connecter à la bdd');

        }
    }
}




?>
<?php


namespace Model;


use PDO;

class DBConnection
{
    private $dsn;
    private $username;
    private $password;
    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=boxfetch_cf;charset=utf8";
        $this->username = "root";
        $this->password = "12345";
    }

    public function connect(): PDO
    {
        try {
            return new PDO($this->dsn, $this->username, $this->password);
        } catch (\PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            die();
        }
    }
}

//$db = new DBConnection();
//$db->connect();
<?php

class Database {
  
    //private $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    
    private $host = "us-cdbr-iron-east-03.cleardb.net";
    private $db_name = "heroku_2d049a44072bae8";
    private $username = "ba50087e68d632";
    private $password = "f1fba2bc3eb028b";
    public $conn;

    public function getConnection() {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}

?>
<?php

class Database {

    private $url = '';
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct(){
        $this->url =  parse_url(getenv("CLEARDB_DATABASE_URL"));
    }
    
    public function getConnection() {
            
        $this->host = $url["host"];
        $this->db_name = substr($url["path"], 1);
        $this->username = $url["user"];
        $this->password = $url["pass"];
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
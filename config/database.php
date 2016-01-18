<?php

class Database {

    private $url;
    //private $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    private $host = $url["host"];
    private $db_name = substr($url["path"], 1);
    private $username = $url["user"];
    private $password = $url["pass"];
    public $conn;

    public function __construct(){
        $this->url =  parse_url(getenv("CLEARDB_DATABASE_URL"));
    }
    
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
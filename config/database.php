<?php

class Database {

    public $url;
    public $host;
    public $db_name;
    public $username;
    public $password;
    public $conn;

    public function __construct(){
        $this->url =  parse_url(getenv("CLEARDB_DATABASE_URL"));
        $this->db_name = substr($this->url["path"], 1);
        $this->username = $this->url["user"];
        $this->password = $this->url["pass"];    
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
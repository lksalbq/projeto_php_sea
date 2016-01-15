<?php

class Database {

    public $conn;

    public function getConnection() {
        if (getenv("CLEARDB_DATABASE_URL")) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $db_name = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];


            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }

            return $this->conn;
        } else {
            die('Erro ao estabelecer conexão com o banco de dados!');
        }
    }

}

?>
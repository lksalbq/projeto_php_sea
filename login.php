<?php
//classse login


class Login {

    private $conn;
    private $table_name = "login";
 
  
    public $usuario;
    public $senha;
    public $nivel;
    public $fkFuncionario;

 
    public function __construct($db){
        $this->conn = $db;
    }
    
    //cria um login
    function create(){
 

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    usuario = ?, senha = ?, nivel = ?, fkFuncionario = ?";
        
    
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(1, $this->usuario);
        $stmt->bindParam(2, $this->senha);
        $stmt->bindParam(3, $this->nivel);
        $stmt->bindParam(4, $this->fkFuncionario);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }       
        
        
    }
    
    //verifica se o usuario existe na tabela login
    
    function logando(){
     
 
    $query = "SELECT *
   
                FROM login
            WHERE
                usuario = ? and
                senha = ?
            LIMIT
                1";
 
    $stmt = $this->conn->prepare( $query );
    
    $stmt->bindParam(1, $this->usuario);
    $stmt->bindParam(2, $this->senha);
    
    $stmt->execute();
    
    return $stmt;
    }
    
    //recupera o nivel de acesso do usuario
    
    function recuperaNivel(){
     
 
    $query = "SELECT *
   
                FROM login
            WHERE
                usuario = ? and
                senha = ?
            LIMIT
                1";
 
    $stmt = $this->conn->prepare( $query );
    
    $stmt->bindParam(1, $this->usuario);
    $stmt->bindParam(2, $this->senha);
    
    $stmt->execute();
    
    return $stmt->fetch();
    }
}

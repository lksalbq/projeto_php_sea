<?php

//classe endereco do funcionario
class Endereco{
 
    
    private $conn;
    private $table_name = "endereco";

    public $id;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cidade;
    public $uf;
    public $cep;

 
    public function __construct($db){
        $this->conn = $db;
    }
 
 
    function create(){
 
 
 
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    logradouro = ?, numero = ?, complemento = ?, bairro = ?, cidade = ?,
                    uf = ?, cep = ?";
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(1, $this->logradouro);
        $stmt->bindParam(2, $this->numero);
        $stmt->bindParam(3, $this->complemento);
        $stmt->bindParam(4, $this->bairro);
        $stmt->bindParam(5, $this->cidade);
        $stmt->bindParam(6, $this->uf);
        $stmt->bindParam(7, $this->cep);

 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
     
    }
    
    //retorna o id do endereco para ser inserido no funcionario
    
    public function retornaID(){
        
   
         $query = "SELECT idendereco FROM
                    " . $this->table_name . "
                  WHERE
                  logradouro = ?  and cep = ? limit 1";
                

        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(1, $this->logradouro);
        $stmt->bindParam(2, $this->cep);
        
        if($stmt->execute()){
            return $stmt->fetch();
        }else{
            return false;
        }
        
    }
}

?>   
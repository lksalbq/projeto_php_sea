<?php

//classe funcionario

class Funcionario {

    private $conn;
    private $table_name = "funcionario";
    public $matricula;
    public $nome;
    public $sexo;
    public $dataNascimento;
    public $dataAdmissao;
    public $rg;
    public $cpf;
    public $fkEndereco;
    public $fkCargo;

    public function __construct($db) {
        $this->conn = $db;
    }
    //cria um funcionario
    
    function create() {

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    matricula = ?, nome = ?, sexo = ?, dataNascimento = ?, dataAdmissao = ?, rg = ?,
                    cpf = ?, fkEndereco = ?, fkCargo = ?";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->matricula);
        $stmt->bindParam(2, $this->nome);
        $stmt->bindParam(3, $this->sexo);
        $stmt->bindParam(4, $this->dataNascimento);
        $stmt->bindParam(5, $this->dataAdmissao);
        $stmt->bindParam(6, $this->rg);
        $stmt->bindParam(7, $this->cpf);
        $stmt->bindParam(8, $this->fkEndereco);
        $stmt->bindParam(9, $this->fkCargo);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    //verifica a numero de matricula, caso exista retorna falso e o funcionario não é inserido
    public function verificaMatricula() {
        $query = "SELECT matricula FROM
                    " . $this->table_name . "
                  WHERE
                  matricula = ?  limit 1";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->matricula);

        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }
    
    //lê todos os funcionarios
    function readAll() {


        $query = "SELECT matricula, nome,cpf,fkCargo "
                . "FROM funcionario "
                . "ORDER BY fkCargo";


        $stmt = $this->conn->prepare($query);


        $stmt->execute();

        return $stmt;
    }
    
    //conta quantos funcionarios existem 
    public function countAll() {

        $query = "SELECT matricula FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }
    
    //lê um funcionario para a tabela lista_funcionarios
    function readOne() {

        $query = "SELECT
                 nome
                FROM funcionario
            WHERE
                matricula = ?
            LIMIT
                0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->matricula);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        $this->nome = $row['nome'];
    }
    
    //faz um update em funcionario caso ele seja editado
    function update() {

        $query = "UPDATE 
                funcionario
            SET 
                nome = :nome
            WHERE
                matricula = :matricula";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':matricula', $this->matricula);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    //deleta o funcionario de acordo com a matrícula
    function deletar() {

        $query = " DELETE FROM funcionario, endereco, cargo
                    USING funcionario
                    INNER JOIN endereco INNER JOIN cargo
                    WHERE funcionario.fkendereco = endereco.idendereco
                    AND funcionario.fkCargo = cargo.idcargo
                    AND funcionario.matricula = ?";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->matricula);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>
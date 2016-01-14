<?php
//classe cargo do funcionario
class Cargo {

    private $conn;
    private $table_name = "cargo";
    
    public $idcargo;
    public $nomeCargo;
    public $salario;

    public function __construct($db) {
        $this->conn = $db;
    }
    
    //cria um cargo
    function create() {


        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nomeCargo = ?, salario = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->nomeCargo);
        $stmt->bindParam(2, $this->salario);



        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    //retorna o ID do cargo para ser inserido na tabela funcionario
    public function retornaID() {


        $query = "SELECT idcargo FROM
                    " . $this->table_name . "
                  WHERE
                  nomeCargo = ? limit 1";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->nomeCargo);


        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }
    
    //Lê um cargo para ser editado na editar_funcionarios.php
    function readOne() {

        $query = "SELECT
                 nomeCargo, salario
                FROM cargo
            WHERE
                idcargo = ? 
            LIMIT
                0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idcargo);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        $this->nomeCargo = $row['nomeCargo'];
        $this->salario = $row['salario'];
    }
    
    //lê todos os cargos para serem inseridos na tabela lista_funcionarios.php
    
    function readAll(){
 

    $query = "SELECT idcargo, nomeCargo,salario "
            . "FROM cargo "
            . "ORDER BY idcargo";
 
 
    $stmt = $this->conn->prepare( $query );
     

    $stmt->execute();
     
    return $stmt;
    }
    
    
    //faz o update do cargo caso ele seja editado
    function update(){

    $query = "UPDATE 
                cargo
            SET 
                nomeCargo = :nomeCargo,
                salario = :salario
                
            WHERE
                idCargo = :idCargo";
 
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':nomeCargo', $this->nomeCargo);
    $stmt->bindParam(':salario', $this->salario);
    $stmt->bindParam(':idCargo', $this->idcargo);
    
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
}

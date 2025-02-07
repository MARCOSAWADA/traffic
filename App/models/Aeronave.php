<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/traffic/App/db/Database.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/_PROJETOS/traffic/App/db/Database.php';


class Aeronave {
    private $conn;
    private $id;
    private $modelo;
    private $capacidade;
    private $status;

    public function __construct($id = null) {
        $this->conn = (new Database())->conectar();
        if ($id) {
            $this->id = $id;
            $this->carregarDados();
        }
    }


    public function setModelo($modelo) { $this->modelo = $modelo; }
    public function setCapacidade($capacidade) { $this->capacidade = $capacidade; }
    public function setStatus($status) { $this->status = $status; }


    public function getId() { return $this->id; }
    public function getModelo() { return $this->modelo; }
    public function getCapacidade() { return $this->capacidade; }
    public function getStatus() { return $this->status; }


    private function carregarDados() {
        $sql = "SELECT * FROM aeronave WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($dados) {
            $this->modelo = $dados['modelo'];
            $this->capacidade = $dados['capacidade'];
            $this->status = $dados['status'];
        }
    }


    public function salvar() {
        $sql = "INSERT INTO aeronave (modelo, capacidade, status) VALUES (:modelo, :capacidade, :status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':modelo', $this->modelo);
        $stmt->bindParam(':capacidade', $this->capacidade);
        $stmt->bindParam(':status', $this->status);
        
        return $stmt->execute();
    }


    public function atualizar() {
        $sql = "UPDATE aeronave SET modelo = :modelo, capacidade = :capacidade, status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':modelo', $this->modelo);
        $stmt->bindParam(':capacidade', $this->capacidade);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }


    public function deletar() {
        $sql = "DELETE FROM aeronave WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }


    public function listar() {
        $sql = "SELECT * FROM aeronave";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<?php
// Caminho absoluto para o Database.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/PrOjEtO/traffic/App/db/Database.php';

class Piloto {
    private $conn;
    private $id;
    private $nome;
    private $licenca;
    private $horas_voo;

    public function __construct($id = null) {
        $this->conn = (new Database())->conectar();
        if ($id) {
            $this->id = $id;
            $this->carregarDados();
        }
    }

   
    public function setNome($nome) { $this->nome = $nome; }
    public function setLicenca($licenca) { $this->licenca = $licenca; }
    public function setHorasVoo($horas_voo) { $this->horas_voo = $horas_voo; }


    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getLicenca() { return $this->licenca; }
    public function getHorasVoo() { return $this->horas_voo; }


    private function carregarDados() {
        $sql = "SELECT * FROM piloto WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($dados) {
            $this->nome = $dados['nome'];
            $this->licenca = $dados['licenca'];
            $this->horas_voo = $dados['horas_voo'];
        }
    }


    public function salvar() {
        $sql = "INSERT INTO piloto (nome, licenca, horas_voo) VALUES (:nome, :licenca, :horas_voo)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':licenca', $this->licenca);
        $stmt->bindParam(':horas_voo', $this->horas_voo);
        
        return $stmt->execute();
    }


    public function atualizar() {
        $sql = "UPDATE piloto SET nome = :nome, licenca = :licenca, horas_voo = :horas_voo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':licenca', $this->licenca);
        $stmt->bindParam(':horas_voo', $this->horas_voo);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }


    public function deletar() {
        $sql = "DELETE FROM piloto WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }


    public function listar() {
        $sql = "SELECT * FROM piloto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

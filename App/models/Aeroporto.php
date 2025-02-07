<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/traffic/App/db/Database.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/_PROJETOS/traffic/App/db/Database.php';

class Aeroporto {
    private $conn;
    private $id;
    private $nome;
    private $codigo;
    private $localizacao;

    public function __construct($id = null) {
        $this->conn = (new Database())->conectar();
        if ($id) {
            $this->id = $id;
            $this->carregarDados();
        }
    }


    public function setNome($nome) { $this->nome = $nome; }
    public function setCodigo($codigo) { $this->codigo = $codigo; }
    public function setLocalizacao($localizacao) { $this->localizacao = $localizacao; }


    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getCodigo() { return $this->codigo; }
    public function getLocalizacao() { return $this->localizacao; }


    private function carregarDados() {
        $sql = "SELECT * FROM aeroporto WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($dados) {
            $this->nome = $dados['nome'];
            $this->codigo = $dados['codigo'];
            $this->localizacao = $dados['localizacao'];
        }
    }


    public function salvar() {
        $sql = "INSERT INTO aeroporto (nome, codigo, localizacao) VALUES (:nome, :codigo, :localizacao)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':localizacao', $this->localizacao);
        
        return $stmt->execute();
    }


    public function atualizar() {
        $sql = "UPDATE aeroporto SET nome = :nome, codigo = :codigo, localizacao = :localizacao WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':localizacao', $this->localizacao);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }


    public function deletar() {
        $sql = "DELETE FROM aeroporto WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }


    public function listar() {
        $sql = "SELECT * FROM aeroporto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

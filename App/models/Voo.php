<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/_PrOjEtOs/traffic/App/db/Database.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/_PROJETOS/trafego-aereo/App/db/Database.php';

class Voo {
    private $conn;
    private $id;
    private $id_aeronave;
    private $id_origem;
    private $id_destino;
    private $horario_partida;
    private $horario_chegada;
    private $id_piloto;

    public function __construct($id = null) {
        $this->conn = (new Database())->conectar();
        if ($id) {
            $this->id = $id;
            $this->carregarDados();
        }
    }


    public function setIdAeronave($id_aeronave) { $this->id_aeronave = $id_aeronave; }
    public function setIdOrigem($id_origem) { $this->id_origem = $id_origem; }
    public function setIdDestino($id_destino) { $this->id_destino = $id_destino; }
    public function setHorarioPartida($horario_partida) { $this->horario_partida = $horario_partida; }
    public function setHorarioChegada($horario_chegada) { $this->horario_chegada = $horario_chegada; }
    public function setIdPiloto($id_piloto) { $this->id_piloto = $id_piloto; }


    public function getId() { return $this->id; }
    public function getIdAeronave() { return $this->id_aeronave; }
    public function getIdOrigem() { return $this->id_origem; }
    public function getIdDestino() { return $this->id_destino; }
    public function getHorarioPartida() { return $this->horario_partida; }
    public function getHorarioChegada() { return $this->horario_chegada; }
    public function getIdPiloto() { return $this->id_piloto; }


    private function carregarDados() {
        $sql = "SELECT * FROM voo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($dados) {
            $this->id_aeronave = $dados['id_aeronave'];
            $this->id_origem = $dados['id_origem'];
            $this->id_destino = $dados['id_destino'];
            $this->horario_partida = $dados['horario_partida'];
            $this->horario_chegada = $dados['horario_chegada'];
            $this->id_piloto = $dados['id_piloto'];
        }
    }


    public function salvar() {
        $sql = "INSERT INTO voo (id_aeronave, id_origem, id_destino, horario_partida, horario_chegada, id_piloto) 
                VALUES (:id_aeronave, :id_origem, :id_destino, :horario_partida, :horario_chegada, :id_piloto)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_aeronave', $this->id_aeronave);
        $stmt->bindParam(':id_origem', $this->id_origem);
        $stmt->bindParam(':id_destino', $this->id_destino);
        $stmt->bindParam(':horario_partida', $this->horario_partida);
        $stmt->bindParam(':horario_chegada', $this->horario_chegada);
        $stmt->bindParam(':id_piloto', $this->id_piloto);
        
        return $stmt->execute();
    }


    public function atualizar() {
        $sql = "UPDATE voo SET id_aeronave = :id_aeronave, id_origem = :id_origem, id_destino = :id_destino, 
                horario_partida = :horario_partida, horario_chegada = :horario_chegada, id_piloto = :id_piloto 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_aeronave', $this->id_aeronave);
        $stmt->bindParam(':id_origem', $this->id_origem);
        $stmt->bindParam(':id_destino', $this->id_destino);
        $stmt->bindParam(':horario_partida', $this->horario_partida);
        $stmt->bindParam(':horario_chegada', $this->horario_chegada);
        $stmt->bindParam(':id_piloto', $this->id_piloto);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    
    public function deletar() {
        // Deleta o voo baseado no ID
        $sql = "DELETE FROM voo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute(); // Retorna true se a operação for bem-sucedida
    }


    public function listar() {
        $sql = "SELECT voo.id, aeronave.modelo AS aeronave, aeroporto_origem.nome AS origem, aeroporto_destino.nome AS destino, 
                        voo.horario_partida, voo.horario_chegada, piloto.nome AS piloto
                FROM voo
                JOIN aeronave ON voo.id_aeronave = aeronave.id
                JOIN aeroporto AS aeroporto_origem ON voo.id_origem = aeroporto_origem.id
                JOIN aeroporto AS aeroporto_destino ON voo.id_destino = aeroporto_destino.id
                JOIN piloto ON voo.id_piloto = piloto.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

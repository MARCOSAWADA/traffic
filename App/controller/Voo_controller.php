<?php
require_once '../db/Database.php';
require_once '../models/Voo.php';

class VooController {
    public function __construct() {
        // Certifique-se de que o form está passando a ação
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            
            switch ($action) {
                case 'cadastrar':
                    $this->cadastrarVoo($_POST['horario_partida'], $_POST['horario_chegada'], $_POST['id_aeronave'], $_POST['id_origem'], $_POST['id_destino'], $_POST['id_piloto']);
                    break;

                case 'editar':
                    $this->editarVoo($_POST['id'], $_POST['horario_partida'], $_POST['horario_chegada'], $_POST['id_aeronave'], $_POST['id_origem'], $_POST['id_destino'], $_POST['id_piloto']);
                    break;

                case 'excluir':
                    $this->excluirVoo($_POST['id']);
                    break;

                default:
                    echo "Ação não reconhecida.";
                    break;
            }
        }
    }


    public function cadastrarVoo($horario_partida, $horario_chegada, $id_aeronave, $id_origem, $id_destino, $id_piloto) {
        $voo = new Voo();
        $voo->setHorarioPartida($horario_partida);
        $voo->setHorarioChegada($horario_chegada);
        $voo->setIdAeronave($id_aeronave);
        $voo->setIdOrigem($id_origem);
        $voo->setIdDestino($id_destino);
        $voo->setIdPiloto($id_piloto);

        if ($voo->salvar()) {
            header("Location: ../views/voo/cadastrar_voo.php?status=sucesso");
        } else {
            header("Location: ../views/voo/cadastrar_voo.php?status=erro");
        }
    }


    public function editarVoo($id, $horario_partida, $horario_chegada, $id_aeronave, $id_origem, $id_destino, $id_piloto) {
        $voo = new Voo($id);
        $voo->setHorarioPartida($horario_partida);
        $voo->setHorarioChegada($horario_chegada);
        $voo->setIdAeronave($id_aeronave);
        $voo->setIdOrigem($id_origem);
        $voo->setIdDestino($id_destino);
        $voo->setIdPiloto($id_piloto);

        if ($voo->atualizar()) {
            header("Location: ../views/voo/editar_voo.php?id=" . $id . "&status=sucesso");
        } else {
            header("Location: ../views/voo/editar_voo.php?id=" . $id . "&status=erro");
        }
    }


    public function excluirVoo($id) {
        $voo = new Voo($id);

        if ($voo->deletar()) {
            
            header('Location: ../views/voo/listar_voos.php?status=sucesso');
        } else {
            
            header('Location: ../views/voo/listar_voos.php?status=erro');
        }
    }
}

// Cria uma instância do controlador para processar as ações
new VooController();
?>

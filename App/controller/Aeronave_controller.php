<?php
require_once '../db/Database.php';
require_once '../models/Aeronave.php';

class AeronaveController {
    public function __construct() {
        // Verifica qual ação está sendo chamada (cadastrar, editar, excluir)
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            
            switch ($action) {
                case 'cadastrar':
                    $this->cadastrarAeronave($_POST['modelo'], $_POST['capacidade'], $_POST['status']);
                    break;

                case 'editar':
                    $this->editarAeronave($_POST['id'], $_POST['modelo'], $_POST['capacidade'], $_POST['status']);
                    break;

                case 'excluir':
                    $this->excluirAeronave($_POST['id']);
                    break;

                default:
                    echo "Ação não reconhecida.";
                    break;
            }
        }
    }

    public function cadastrarAeronave($modelo, $capacidade, $status) {
        $aeronave = new Aeronave();
        $aeronave->setModelo($modelo);
        $aeronave->setCapacidade($capacidade);
        $aeronave->setStatus($status);

        if ($aeronave->salvar()) {
            header("Location: ../views/aeronave/cadastrar_aeronave.php?status=sucesso");
        } else {
            header("Location: ../views/aeronave/cadastrar_aeronave.php?status=erro");
        }
    }

    public function editarAeronave($id, $modelo, $capacidade, $status) {
        $aeronave = new Aeronave($id);
        $aeronave->setModelo($modelo);
        $aeronave->setCapacidade($capacidade);
        $aeronave->setStatus($status);

        if ($aeronave->atualizar()) {
            header('Location: ../views/aeronave/editar_aeronave.php?id=' . $id . '&status=sucesso');
        } else {
            header('Location: ../views/aeronave/editar_aeronave.php?id=' . $id . '&status=erro');
        }
    }

    public function excluirAeronave($id) {
        $aeronave = new Aeronave($id);

        if ($aeronave->deletar()) {

            header('Location: ../views/aeronave/excluir_aeronave.php?id=' . $id . '&status=sucesso');

        } else {
            header('Location: ../views/aeronave/excluir_aeronave.php?id=' . $id . '&status=erro');

        }
    }
}

// Cria uma instância do controlador para processar as ações
new AeronaveController();
?>

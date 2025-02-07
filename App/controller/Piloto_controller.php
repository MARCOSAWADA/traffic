<?php
require_once '../db/Database.php';
require_once '../models/Piloto.php';

class PilotoController {
    public function __construct() {

        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            
            switch ($action) {
                case 'cadastrar':
                    $this->cadastrarPiloto($_POST['nome'], $_POST['licenca'], $_POST['horas_voo']);
                    break;

                case 'editar':
                    $this->editarPiloto($_POST['id'], $_POST['nome'], $_POST['licenca'], $_POST['horas_voo']);
                    break;

                case 'excluir':
                    $this->excluirPiloto($_POST['id']);
                    break;

                default:
                    echo "Ação não reconhecida.";
                    break;
            }
        }
    }

    public function cadastrarPiloto($nome, $licenca, $horas_voo) {
        $piloto = new Piloto();
        $piloto->setNome($nome);
        $piloto->setLicenca($licenca);
        $piloto->setHorasVoo($horas_voo);

        if ($piloto->salvar()) {
            header("Location: ../views/piloto/cadastrar_piloto.php?status=sucesso");
        } else {
            header("Location: ../views/piloto/cadastrar_piloto.php?status=sucesso");
        }
    }

    public function editarPiloto($id, $nome, $licenca, $horas_voo) {
        $piloto = new Piloto($id);
        $piloto->setNome($nome);
        $piloto->setLicenca($licenca);
        $piloto->setHorasVoo($horas_voo);

        if ($piloto->atualizar()) {
            header('Location: ../views/piloto/editar_piloto.php?id=' . $id . '&status=sucesso');
        } else {
            header('Location: ../views/piloto/editar_piloto.php?id=' . $id . '&status=erro');
        }
    }

    public function excluirPiloto($id) {
        $piloto = new Piloto($id);
    
        if ($piloto->deletar()) {
            
            header('Location: ../views/piloto/excluir_piloto.php?id=' . $id . '&status=sucesso');

        } else {
            header('Location: ../views/piloto/excluir_piloto.php?id=' . $id . '&status=erro');

        }
    }
}


new PilotoController();
?>

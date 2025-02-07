<?php
require_once '../db/Database.php';
require_once '../models/Aeroporto.php';

class AeroportoController {
    public function __construct() {

        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            
            switch ($action) {
                case 'cadastrar':
                    $this->cadastrarAeroporto($_POST['nome'], $_POST['codigo'], $_POST['localizacao']);
                    break;

                case 'editar':
                    $this->editarAeroporto($_POST['id'], $_POST['nome'], $_POST['codigo'], $_POST['localizacao']);
                    break;

                case 'excluir':
                    $this->excluirAeroporto($_POST['id']);
                    break;

                default:
                    echo "Ação não reconhecida.";
                    break;
            }
        }
    }

    public function cadastrarAeroporto($nome, $codigo, $localizacao) {
        $aeroporto = new Aeroporto();
        $aeroporto->setNome($nome);
        $aeroporto->setCodigo($codigo);
        $aeroporto->setLocalizacao($localizacao);

        if ($aeroporto->salvar()) {
            header("Location: ../views/aeroporto/cadastrar_aeroporto.php?status=sucesso");
        } else {
            header("Location: ../views/aeroporto/cadastrar_aeroporto.php?status=erro");
        }
    }

    public function editarAeroporto($id, $nome, $codigo, $localizacao) {
        $aeroporto = new Aeroporto($id);
        $aeroporto->setNome($nome);
        $aeroporto->setCodigo($codigo);
        $aeroporto->setLocalizacao($localizacao);

        if ($aeroporto->atualizar()) {
            header('Location: ../views/aeroporto/editar_aeroporto.php?id=' . $id . '&status=sucesso');
        } else {
            header('Location: ../views/aeroporto/editar_aeroporto.php?id=' . $id . '&status=erro');
        }
    }

    public function excluirAeroporto($id) {
        $aeroporto = new Aeroporto($id);
    
        if ($aeroporto->deletar()) {
            header('Location: ../views/aeroporto/excluir_aeroporto.php?id=' . $id . '&status=sucesso');
        } else {
            header('Location: ../views/aeroporto/excluir_aeroporto.php?id=' . $id . '&status=erro');
        }
        exit;
    }
}

new AeroportoController();
?>

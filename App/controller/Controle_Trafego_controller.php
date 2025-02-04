<?php
// Incluindo os modelos necessários
require_once '../../models/Aeronave.php';
require_once '../../models/Aeroporto.php';
require_once '../../models/Piloto.php';
require_once '../../models/Voo.php';


if (isset($_POST['action'])) {

    $id_aeronave = isset($_POST['id_aeronave']) ? $_POST['id_aeronave'] : '';
    $id_origem = isset($_POST['id_origem']) ? $_POST['id_origem'] : '';
    $id_destino = isset($_POST['id_destino']) ? $_POST['id_destino'] : '';
    $horario_partida = isset($_POST['horario_partida']) ? $_POST['horario_partida'] : '';
    $horario_chegada = isset($_POST['horario_chegada']) ? $_POST['horario_chegada'] : '';
    $id_piloto = isset($_POST['id_piloto']) ? $_POST['id_piloto'] : '';
    $id_voo = isset($_POST['id']) ? $_POST['id'] : '';

    if ($_POST['action'] == 'cadastrar') {
        $voo = new Voo();
        $voo->setIdAeronave($id_aeronave);
        $voo->setIdOrigem($id_origem);
        $voo->setIdDestino($id_destino);
        $voo->setHorarioPartida($horario_partida);
        $voo->setHorarioChegada($horario_chegada);
        $voo->setIdPiloto($id_piloto);

        if ($voo->cadastrar()) {
            header('Location: ../../views/voo/cadastrar_voo.php?status=sucesso');
        } else {
            header('Location: ../../views/voo/cadastrar_voo.php?status=erro');
        }
    }


    if ($_POST['action'] == 'editar') {
        if (!empty($id_voo)) {
            $voo = new Voo($id_voo);
            $voo->setIdAeronave($id_aeronave);
            $voo->setIdOrigem($id_origem);
            $voo->setIdDestino($id_destino);
            $voo->setHorarioPartida($horario_partida);
            $voo->setHorarioChegada($horario_chegada);
            $voo->setIdPiloto($id_piloto);

            if ($voo->editar()) {
                header('Location: ../../views/voo/editar_voo.php?id=' . $id_voo . '&status=sucesso');
            } else {
                header('Location: ../../views/voo/editar_voo.php?id=' . $id_voo . '&status=erro');
            }
        }
    }


    if ($_POST['action'] == 'excluir') {
        if (!empty($id_voo)) {
            $voo = new Voo($id_voo); 
            if ($voo->excluir()) {
                header('Location: ../../views/voo/listar_voos.php?status=sucesso');
            } else {
                header('Location: ../../views/voo/listar_voos.php?status=erro');
            }
        }
    }
} else {
    
    header('Location: ../../views/voo/listar_voos.php');
}
?>

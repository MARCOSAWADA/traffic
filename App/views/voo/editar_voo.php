<?php
require_once '../../models/Voo.php';
require_once '../../models/Aeronave.php';
require_once '../../models/Aeroporto.php';
require_once '../../models/Piloto.php';

if (isset($_GET['id'])) {
    $id_voo = $_GET['id'];
    $voo = new Voo($id_voo);
} else {
    echo "Voo não encontrado.";
    exit;
}


$aeronaves = (new Aeronave())->listar();
$aeroportos = (new Aeroporto())->listar();
$pilotos = (new Piloto())->listar();

$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Voo</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1 style="color: #ff7f00;">Editar Voo</h1>
            <p style="color: #f8f9fa;">Atualize as informações do voo abaixo.</p>
        </header>


        <form action="../../controller/Voo_controller.php" method="post" style="max-width: 600px; margin: 0 auto;">
            <div style="margin-bottom: 15px;">
                <label for="id_aeronave" style="color: #f8f9fa;">Aeronave:</label>
                <select name="id_aeronave" id="id_aeronave" required style="width: 100%; padding: 10px; background-color: #333; color: #f8f9fa; border: 1px solid #444;">
                    <option value="">Selecione uma Aeronave</option>
                    <?php foreach ($aeronaves as $aeronave): ?>
                        <option value="<?php echo $aeronave['id']; ?>" <?php echo $aeronave['id'] == $voo->getIdAeronave() ? 'selected' : ''; ?>>
                            <?php echo $aeronave['modelo']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="id_origem" style="color: #f8f9fa;">Aeroporto Origem:</label>
                <select name="id_origem" id="id_origem" required style="width: 100%; padding: 10px; background-color: #333; color: #f8f9fa; border: 1px solid #444;">
                    <option value="">Selecione um Aeroporto de Origem</option>
                    <?php foreach ($aeroportos as $aeroporto): ?>
                        <option value="<?php echo $aeroporto['id']; ?>" <?php echo $aeroporto['id'] == $voo->getIdOrigem() ? 'selected' : ''; ?>>
                            <?php echo $aeroporto['nome']; ?> (<?php echo $aeroporto['codigo']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="id_destino" style="color: #f8f9fa;">Aeroporto Destino:</label>
                <select name="id_destino" id="id_destino" required style="width: 100%; padding: 10px; background-color: #333; color: #f8f9fa; border: 1px solid #444;">
                    <option value="">Selecione um Aeroporto de Destino</option>
                    <?php foreach ($aeroportos as $aeroporto): ?>
                        <option value="<?php echo $aeroporto['id']; ?>" <?php echo $aeroporto['id'] == $voo->getIdDestino() ? 'selected' : ''; ?>>
                            <?php echo $aeroporto['nome']; ?> (<?php echo $aeroporto['codigo']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="horario_partida" style="color: #f8f9fa;">Horário de Partida:</label>
                <input type="datetime-local" name="horario_partida" id="horario_partida" value="<?php echo $voo->getHorarioPartida(); ?>" required style="width: 100%; padding: 10px; background-color: #333; color: #f8f9fa; border: 1px solid #444;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="horario_chegada" style="color: #f8f9fa;">Horário de Chegada:</label>
                <input type="datetime-local" name="horario_chegada" id="horario_chegada" value="<?php echo $voo->getHorarioChegada(); ?>" required style="width: 100%; padding: 10px; background-color: #333; color: #f8f9fa; border: 1px solid #444;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="id_piloto" style="color: #f8f9fa;">Piloto:</label>
                <select name="id_piloto" id="id_piloto" required style="width: 100%; padding: 10px; background-color: #333; color: #f8f9fa; border: 1px solid #444;">
                    <option value="">Selecione um Piloto</option>
                    <?php foreach ($pilotos as $piloto): ?>
                        <option value="<?php echo $piloto['id']; ?>" <?php echo $piloto['id'] == $voo->getIdPiloto() ? 'selected' : ''; ?>>
                            <?php echo $piloto['nome']; ?> (Licença: <?php echo $piloto['licenca']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <input type="hidden" name="id" value="<?php echo $voo->getId(); ?>">
                <button type="submit" name="action" value="editar" style="background-color: #ff7f00; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">Salvar Alterações</button>
            </div>
        </form>


        <div style="text-align: center; margin-top: 20px;">
            <a href="listar_voos.php" style="color: #ff7f00;">Voltar para a lista de voos</a>
        </div>
    </div>


    <?php if ($status == 'sucesso'): ?>
        <script>
            alert('Alterações salvas com sucesso!');
            setTimeout(function() {
                window.location.href = 'listar_voos.php'; 
            }, 3000);
        </script>
    <?php elseif ($status == 'erro'): ?>
        <script>
            alert('Erro ao salvar alterações. Tente novamente.');
        </script>
    <?php endif; ?>
</body>
</html>

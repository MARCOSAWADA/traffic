<?php
require_once '../../models/Voo.php';
require_once '../../models/Aeronave.php';
require_once '../../models/Aeroporto.php';
require_once '../../models/Piloto.php';

if (isset($_GET['id'])) {
    $id_voo = $_GET['id'];
    $voo = new Voo($id_voo);  // Carrega os dados do voo
} else {
    echo "Voo não encontrado.";
    exit;
}

// Recuperando as aeronaves, aeroportos e pilotos
$aeronaves = (new Aeronave())->listar();
$aeroportos = (new Aeroporto())->listar();
$pilotos = (new Piloto())->listar();

$status = isset($_GET['status']) ? $_GET['status'] : '';  // Verifica o status na URL
?>

<h2>Editar Voo</h2>

<form action="../../controller/Voo_controller.php" method="post">
    <div>
        <label for="id_aeronave">Aeronave:</label>
        <select name="id_aeronave" id="id_aeronave" required>
            <option value="">Selecione uma Aeronave</option>
            <?php foreach ($aeronaves as $aeronave): ?>
                <option value="<?php echo $aeronave['id']; ?>" <?php echo $aeronave['id'] == $voo->getIdAeronave() ? 'selected' : ''; ?>>
                    <?php echo $aeronave['modelo']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="id_origem">Aeroporto Origem:</label>
        <select name="id_origem" id="id_origem" required>
            <option value="">Selecione um Aeroporto de Origem</option>
            <?php foreach ($aeroportos as $aeroporto): ?>
                <option value="<?php echo $aeroporto['id']; ?>" <?php echo $aeroporto['id'] == $voo->getIdOrigem() ? 'selected' : ''; ?>>
                    <?php echo $aeroporto['nome']; ?> (<?php echo $aeroporto['codigo']; ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="id_destino">Aeroporto Destino:</label>
        <select name="id_destino" id="id_destino" required>
            <option value="">Selecione um Aeroporto de Destino</option>
            <?php foreach ($aeroportos as $aeroporto): ?>
                <option value="<?php echo $aeroporto['id']; ?>" <?php echo $aeroporto['id'] == $voo->getIdDestino() ? 'selected' : ''; ?>>
                    <?php echo $aeroporto['nome']; ?> (<?php echo $aeroporto['codigo']; ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="horario_partida">Horário de Partida:</label>
        <input type="datetime-local" name="horario_partida" id="horario_partida" value="<?php echo $voo->getHorarioPartida(); ?>" required>
    </div>

    <div>
        <label for="horario_chegada">Horário de Chegada:</label>
        <input type="datetime-local" name="horario_chegada" id="horario_chegada" value="<?php echo $voo->getHorarioChegada(); ?>" required>
    </div>

    <div>
        <label for="id_piloto">Piloto:</label>
        <select name="id_piloto" id="id_piloto" required>
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
        <button type="submit" name="action" value="editar">Salvar Alterações</button>
    </div>
</form>

<p><a href="listar_voos.php">Voltar para a lista de voos</a></p>

<!-- Exibe a mensagem de sucesso ou erro -->
<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Alterações salvas com sucesso!');
        setTimeout(function() {
            window.location.href = 'listar_voos.php';  // Redireciona após 3 segundos
        }, 3000);
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao salvar alterações. Tente novamente.');
    </script>
<?php endif; ?>

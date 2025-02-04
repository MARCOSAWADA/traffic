<?php
require_once '../../models/Aeronave.php';
require_once '../../models/Aeroporto.php';
require_once '../../models/Piloto.php';

// Recuperando todos os registros cadastrados
$aeronaves = (new Aeronave())->listar();
$aeroportos = (new Aeroporto())->listar();
$pilotos = (new Piloto())->listar();

// Caso haja algum status vindo pela URL, definimos a variável $status.
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<h2>Cadastrar Voo</h2>

<form action="../../controller/Voo_controller.php" method="post">
    <div>
        <label for="id_aeronave">Aeronave:</label>
        <select name="id_aeronave" id="id_aeronave" required>
            <option value="">Selecione uma Aeronave</option>
            <?php foreach ($aeronaves as $aeronave): ?>
                <option value="<?php echo $aeronave['id']; ?>"><?php echo $aeronave['modelo']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="id_origem">Aeroporto Origem:</label>
        <select name="id_origem" id="id_origem" required>
            <option value="">Selecione um Aeroporto de Origem</option>
            <?php foreach ($aeroportos as $aeroporto): ?>
                <option value="<?php echo $aeroporto['id']; ?>"><?php echo $aeroporto['nome']; ?> (<?php echo $aeroporto['codigo']; ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="id_destino">Aeroporto Destino:</label>
        <select name="id_destino" id="id_destino" required>
            <option value="">Selecione um Aeroporto de Destino</option>
            <?php foreach ($aeroportos as $aeroporto): ?>
                <option value="<?php echo $aeroporto['id']; ?>"><?php echo $aeroporto['nome']; ?> (<?php echo $aeroporto['codigo']; ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="horario_partida">Horário de Partida:</label>
        <input type="datetime-local" name="horario_partida" id="horario_partida" required>
    </div>
    <div>
        <label for="horario_chegada">Horário de Chegada:</label>
        <input type="datetime-local" name="horario_chegada" id="horario_chegada" required>
    </div>
    <div>
        <label for="id_piloto">Piloto:</label>
        <select name="id_piloto" id="id_piloto" required>
            <option value="">Selecione um Piloto</option>
            <?php foreach ($pilotos as $piloto): ?>
                <option value="<?php echo $piloto['id']; ?>"><?php echo $piloto['nome']; ?> (Licença: <?php echo $piloto['licenca']; ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit" name="action" value="cadastrar">Cadastrar Voo</button>
    </div>
</form>

<p><a href="../../views/voo/listar_voos.php">Mostrar a lista de voos</a></p>

<!-- Script para exibir a mensagem de sucesso ou erro -->
<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Voo cadastrado com sucesso!');
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao cadastrar voo. Tente novamente.');
    </script>
<?php endif; ?>

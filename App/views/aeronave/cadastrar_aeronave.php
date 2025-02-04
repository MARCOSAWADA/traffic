<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<h2>Cadastrar Aeronave</h2>

<form action="../../controller/Aeronave_controller.php" method="post">
    <div>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" required placeholder="Modelo da Aeronave">
    </div>
    <div>
        <label for="capacidade">Capacidade:</label>
        <input type="number" name="capacidade" id="capacidade" required placeholder="Capacidade da Aeronave">
    </div>
    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="em voo">Em Voo</option>
            <option value="em solo">Em Solo</option>
            <option value="manutenção">Manutenção</option>
        </select>
    </div>
    <div>
        <button type="submit" name="action" value="cadastrar">Cadastrar</button>
    </div>
</form>

<p><a href="../../views/aeronave/listar_aeronaves.php">Mostrar a lista de aeronaves</a></p>

<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Aeronave cadastrada com sucesso!');
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao cadastrar aeronave. Tente novamente.');
    </script>
<?php endif; ?>

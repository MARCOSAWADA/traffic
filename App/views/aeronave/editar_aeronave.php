<?php
require_once '../../models/Aeronave.php';

if (isset($_GET['id'])) {
    $id_aeronave = $_GET['id'];
    $aeronave = new Aeronave($id_aeronave);
} else {
    echo "Aeronave não encontrada.";
    exit;
}

$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<h2>Editar Aeronave</h2>

<form action="../../controller/Aeronave_controller.php" method="post">
    <div>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="<?php echo $aeronave->getModelo(); ?>" required>
    </div>
    <div>
        <label for="capacidade">Capacidade:</label>
        <input type="number" name="capacidade" id="capacidade" value="<?php echo $aeronave->getCapacidade(); ?>" required>
    </div>
    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="em voo" <?php echo $aeronave->getStatus() == 'em voo' ? 'selected' : ''; ?>>Em Voo</option>
            <option value="em solo" <?php echo $aeronave->getStatus() == 'em solo' ? 'selected' : ''; ?>>Em Solo</option>
            <option value="manutenção" <?php echo $aeronave->getStatus() == 'manutenção' ? 'selected' : ''; ?>>Manutenção</option>
        </select>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $aeronave->getId(); ?>">
        <button type="submit" name="action" value="editar">Salvar Alterações</button>
    </div>
</form>

<p><a href="listar_aeronaves.php">Voltar para a lista de aeronaves</a></p>

<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Aeronave atualizada com sucesso!');
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao atualizar aeronave. Tente novamente.');
    </script>
<?php endif; ?>

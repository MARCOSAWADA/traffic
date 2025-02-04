<?php
require_once '../../models/Aeroporto.php';

if (isset($_GET['id'])) {
    $id_aeroporto = $_GET['id'];
    $aeroporto = new Aeroporto($id_aeroporto);
} else {
    echo "Aeroporto não encontrado.";
    exit;
}

$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<h2>Excluir Aeroporto</h2>

<p>Tem certeza que deseja excluir o aeroporto <strong><?php echo $aeroporto->getNome(); ?></strong>?</p>

<form action="../../controller/Aeroporto_controller.php" method="post">
    <input type="hidden" name="id" value="<?php echo $aeroporto->getId(); ?>">
    <button type="submit" name="action" value="excluir">Excluir Aeroporto</button>
</form>

<p><a href="listar_aeroportos.php">Cancelar</a></p>

<!-- Mensagens de status -->
<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Aeroporto excluído com sucesso!');
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao excluir aeroporto. Tente novamente.');
    </script>
<?php endif; ?>

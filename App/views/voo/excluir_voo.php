<?php
require_once '../../models/Voo.php';

if (isset($_GET['id'])) {
    $id_voo = $_GET['id'];
    $voo = new Voo($id_voo);  // Carrega os dados do voo
} else {
    echo "Voo não encontrado.";
    exit;
}

$status = isset($_GET['status']) ? $_GET['status'] : '';  // Verifica o status na URL
?>

<h2>Excluir Voo</h2>

<p>Tem certeza de que deseja excluir o voo <strong><?php echo $voo->getId(); ?></strong>?</p>

<form action="../../controller/Voo_controller.php" method="post">
    <input type="hidden" name="id" value="<?php echo $voo->getId(); ?>">
    <div>
        <button type="submit" name="action" value="excluir">Excluir Voo</button>
    </div>
</form>

<p><a href="listar_voos.php">Cancelar</a></p>

<!-- Exibe a mensagem de sucesso ou erro -->
<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Voo excluído com sucesso!');
        window.location.href = 'listar_voos.php';  // Redireciona após 3 segundos
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao excluir voo. Tente novamente.');
    </script>
<?php endif; ?>

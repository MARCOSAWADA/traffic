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

<h2>Editar Aeroporto</h2>

<form action="../../controller/Aeroporto_controller.php" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $aeroporto->getNome(); ?>" required>
    </div>
    <div>
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" value="<?php echo $aeroporto->getCodigo(); ?>" required>
    </div>
    <div>
        <label for="localizacao">Localização:</label>
        <input type="text" name="localizacao" id="localizacao" value="<?php echo $aeroporto->getLocalizacao(); ?>" required>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $aeroporto->getId(); ?>">
        <button type="submit" name="action" value="editar">Salvar Alterações</button>
    </div>
</form>

<p><a href="listar_aeroportos.php">Voltar para a lista de aeroportos</a></p>

<!-- Mensagens de status -->
<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Alterações salvas com sucesso!');
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao salvar alterações. Tente novamente.');
    </script>
<?php endif; ?>

<?php
require_once '../../models/Piloto.php';

if (isset($_GET['id'])) {
    $id_piloto = $_GET['id'];
    $piloto = new Piloto($id_piloto); 
} else {
    echo "Piloto não encontrado.";
    exit;
}

$status = isset($_GET['status']) ? $_GET['status'] : '';  
?>

<h2>Editar Piloto</h2>

<form action="../../controller/Piloto_controller.php" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $piloto->getNome(); ?>" required>
    </div>
    <div>
        <label for="licenca">Licença:</label>
        <input type="text" name="licenca" id="licenca" value="<?php echo $piloto->getLicenca(); ?>" required>
    </div>
    <div>
        <label for="horas_voo">Horas de Voo:</label>
        <input type="number" name="horas_voo" id="horas_voo" value="<?php echo $piloto->getHorasVoo(); ?>" required>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $piloto->getId(); ?>">
        <button type="submit" name="action" value="editar">Salvar Alterações</button>
    </div>
</form>

<p><a href="listar_pilotos.php">Voltar para a lista de pilotos</a></p>

<!-- Script para exibir a mensagem de sucesso ou erro -->
<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Alterações salvas com sucesso!');
        setTimeout(function() {
            window.location.href = 'listar_pilotos.php';  
        }, 500); // 
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao salvar alterações. Tente novamente.');
        setTimeout(function() {
            window.location.href = 'listar_pilotos.php';  
        }, 500);
    </script>
<?php endif; ?>

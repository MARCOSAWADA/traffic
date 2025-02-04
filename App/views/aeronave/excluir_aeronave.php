<?php
require_once '../../models/Aeronave.php';

if (isset($_GET['id'])) {
    $id_aeronave = $_GET['id'];
    $aeronave = new Aeronave($id_aeronave); 
} else {
    echo "Aeronave não encontrado.";
    exit;
}

$status = isset($_GET['status']) ? $_GET['status'] : '';  
?>

<h2>Excluir Aeronave</h2>

<p>Tem certeza de que deseja excluir o aeronave <br><strong><?php echo $aeronave->getModelo(); ?></strong>?</p>

<form action="../../controller/Aeronave_controller.php" method="post">
    <input type="hidden" name="id" value="<?php echo $aeronave->getId(); ?>">
    <div>
        <button type="submit" name="action" value="excluir">Excluir Aeronave</button>
    </div>
</form>

<p><a href="aeronave/listar_aeronaves.php">Cancelar</a></p>


<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Aeronave excluído com sucesso!');
        setTimeout(function() {
            window.location.href = 'listar_aeronaves.php'; 
        }, 500); 
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao excluir aeronave. Tente novamente.');
        setTimeout(function() {
            window.location.href = 'listar_aeronaves.php';
        }, 500);
    </script>
<?php endif; ?>

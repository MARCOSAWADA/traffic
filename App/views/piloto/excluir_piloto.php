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

<h2>Excluir Piloto</h2>

<p>Tem certeza de que deseja excluir o piloto <br><strong><?php echo $piloto->getNome(); ?></strong>?</p>

<form action="../../controller/Piloto_controller.php" method="post">
    <input type="hidden" name="id" value="<?php echo $piloto->getId(); ?>">
    <div>
        <button type="submit" name="action" value="excluir">Excluir Piloto</button>
    </div>
</form>

<p><a href="piloto/listar_pilotos.php">Cancelar</a></p>


<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Piloto excluído com sucesso!');
        setTimeout(function() {
            window.location.href = 'listar_pilotos.php'; 
        }, 500); 
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao excluir piloto. Tente novamente.');
        setTimeout(function() {
            window.location.href = 'listar_pilotos.php';
        }, 500);
    </script>
<?php endif; ?>

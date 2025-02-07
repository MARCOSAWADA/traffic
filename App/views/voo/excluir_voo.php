<?php
require_once '../../models/Voo.php';


if (isset($_GET['id'])) {
    $id_voo = $_GET['id'];
    $voo = new Voo($id_voo);  
} else {
    echo "Voo não encontrado.";
    exit;
}


$status = isset($_GET['status']) ? $_GET['status'] : '';  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Voo</title>
    <link rel="stylesheet" href="../../../public/css/views.css">

</head>
<body>

    <div class="container">
        <h2>Excluir Voo</h2>

        <p>Tem certeza de que deseja excluir o voo <strong><?php echo $voo->getId(); ?></strong>?</p>

        <form action="../../controller/Voo_controller.php" method="post">
            <input type="hidden" name="id" value="<?php echo $voo->getId(); ?>">
            <button type="submit" name="action" value="excluir">Excluir Voo</button>
        </form>

        <p><a href="listar_voos.php">Cancelar</a></p>


        <?php if ($status == 'sucesso'): ?>
            <div class="status-message success">
                <p>Voo excluído com sucesso!</p>
            </div>
        <?php elseif ($status == 'erro'): ?>
            <div class="status-message error">
                <p>Erro ao excluir voo. Tente novamente.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>

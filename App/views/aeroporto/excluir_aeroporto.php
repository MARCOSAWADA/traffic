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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aeroporto</title>
    <link rel="stylesheet" href="../../../public/css/views.css">
    
</head>
<body>

    <div class="container">
        <h2>Excluir Aeroporto</h2>

        <p>Tem certeza que deseja excluir o aeroporto <strong><?php echo $aeroporto->getNome(); ?></strong>?</p>

        <form action="../../controller/Aeroporto_controller.php" method="post">
            <input type="hidden" name="id" value="<?php echo $aeroporto->getId(); ?>">
            <button type="submit" name="action" value="excluir">Excluir Aeroporto</button>
        </form>

        <p><a href="listar_aeroportos.php">Cancelar</a></p>


        <?php if ($status == 'sucesso'): ?>
            <div class="status-message success">
                <p>Aeroporto excluído com sucesso!</p>
            </div>
        <?php elseif ($status == 'erro'): ?>
            <div class="status-message error">
                <p>Erro ao excluir aeroporto. Tente novamente.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>

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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aeronave</title>
    <link rel="stylesheet" href="../../../public/css/views.css">
</head>
<body>

    <div class="container">
        <h2>Excluir Aeronave</h2>

        <p>Tem certeza de que deseja excluir a aeronave <br><strong><?php echo $aeronave->getModelo(); ?></strong>?</p>

        <form action="../../controller/Aeronave_controller.php" method="post">
            <input type="hidden" name="id" value="<?php echo $aeronave->getId(); ?>">
            <button type="submit" name="action" value="excluir">Excluir Aeronave</button>
        </form>

        <p><a href="listar_aeronaves.php">Cancelar</a></p>


        <?php if ($status == 'sucesso'): ?>
            <div class="status-message success">
                <p>Aeronave excluída com sucesso!</p>
            </div>
        <?php elseif ($status == 'erro'): ?>
            <div class="status-message error">
                <p>Erro ao excluir aeronave. Tente novamente.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>

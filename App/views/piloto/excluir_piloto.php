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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Piloto</title>
    <link rel="stylesheet" href="../../../public/css/views.css">
</head>
<body>

    <div class="container">
        <h2>Excluir Piloto</h2>

        <p>Tem certeza de que deseja excluir o piloto <strong><?php echo $piloto->getNome(); ?></strong>?</p>

        <form action="../../controller/Piloto_controller.php" method="post">
            <input type="hidden" name="id" value="<?php echo $piloto->getId(); ?>">
            <button type="submit" name="action" value="excluir">Excluir Piloto</button>
        </form>

        <p><a href="listar_pilotos.php">Cancelar</a></p>


        <?php if ($status == 'sucesso'): ?>
            <div class="status-message success">
                <p>Piloto excluído com sucesso!</p>
            </div>
        <?php elseif ($status == 'erro'): ?>
            <div class="status-message error">
                <p>Erro ao excluir piloto. Tente novamente.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>

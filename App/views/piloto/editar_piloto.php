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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Piloto</title>
    <link rel="stylesheet" href="../../css/painel_botao.css"> 
</head>
<body>
    <div class="container">

        <header>
            <h1>Editar Piloto</h1>
            <p>Atualize as informações do piloto abaixo.</p>
        </header>


        <form action="../../controller/Piloto_controller.php" method="post" style="background-color: #333; padding: 20px; border-radius: 8px;">
            <div style="margin-bottom: 15px;">
                <label for="nome" style="color: #f8f9fa;">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $piloto->getNome(); ?>" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ff7f00; background-color: #444; color: #f8f9fa;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="licenca" style="color: #f8f9fa;">Licença:</label>
                <input type="text" name="licenca" id="licenca" value="<?php echo $piloto->getLicenca(); ?>" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ff7f00; background-color: #444; color: #f8f9fa;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="horas_voo" style="color: #f8f9fa;">Horas de Voo:</label>
                <input type="number" name="horas_voo" id="horas_voo" value="<?php echo $piloto->getHorasVoo(); ?>" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ff7f00; background-color: #444; color: #f8f9fa;">
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $piloto->getId(); ?>">
                <button type="submit" name="action" value="editar" style="background-color: #ff7f00; color: #2a2a2a; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Salvar Alterações</button>
            </div>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="listar_pilotos.php" style="color: #ff7f00; font-size: 18px;">Voltar para a lista de pilotos</a>
        </div>


        <?php if ($status == 'sucesso'): ?>
            <script>
                alert('Alterações salvas com sucesso!');
                setTimeout(function() {
                    window.location.href = 'listar_pilotos.php';  
                }, 500);
            </script>
        <?php elseif ($status == 'erro'): ?>
            <script>
                alert('Erro ao salvar alterações. Tente novamente.');
                setTimeout(function() {
                    window.location.href = 'listar_pilotos.php';  
                }, 500);
            </script>
        <?php endif; ?>
    </div>
</body>
</html>

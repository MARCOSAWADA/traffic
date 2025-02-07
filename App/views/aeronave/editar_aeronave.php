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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aeronave</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1>Editar Aeronave</h1>
            <p>Altere as informações da aeronave abaixo.</p>
        </header>


        <form action="../../controller/Aeronave_controller.php" method="post" style="background-color: #333; padding: 20px; border-radius: 8px;">
            <div style="margin-bottom: 15px;">
                <label for="modelo" style="color: #ff7f00;">Modelo:</label>
                <input type="text" name="modelo" id="modelo" value="<?php echo $aeronave->getModelo(); ?>" required style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="capacidade" style="color: #ff7f00;">Capacidade:</label>
                <input type="number" name="capacidade" id="capacidade" value="<?php echo $aeronave->getCapacidade(); ?>" required style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="status" style="color: #ff7f00;">Status:</label>
                <select name="status" id="status" required style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
                    <option value="em voo" <?php echo $aeronave->getStatus() == 'em voo' ? 'selected' : ''; ?>>Em Voo</option>
                    <option value="em solo" <?php echo $aeronave->getStatus() == 'em solo' ? 'selected' : ''; ?>>Em Solo</option>
                    <option value="manutenção" <?php echo $aeronave->getStatus() == 'manutenção' ? 'selected' : ''; ?>>Manutenção</option>
                </select>
            </div>

            <div>
                <input type="hidden" name="id" value="<?php echo $aeronave->getId(); ?>">
                <button type="submit" name="action" value="editar" style="background-color: #ff7f00; color: #2a2a2a; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; width: 100%;">Salvar Alterações</button>
            </div>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="listar_aeronaves.php" style="color: #ff7f00;">Voltar para a lista de aeronaves</a>
        </div>

        <?php if ($status == 'sucesso'): ?>
            <script>
                alert('Aeronave atualizada com sucesso!');
            </script>
        <?php elseif ($status == 'erro'): ?>
            <script>
                alert('Erro ao atualizar aeronave. Tente novamente.');
            </script>
        <?php endif; ?>
    </div>
</body>
</html>

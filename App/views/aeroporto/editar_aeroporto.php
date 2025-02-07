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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aeroporto</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1>Editar Aeroporto</h1>
            <p>Altere as informações abaixo para editar o aeroporto.</p>
        </header>


        <form action="../../controller/Aeroporto_controller.php" method="post" style="background-color: #333; padding: 20px; border-radius: 8px;">
            <div style="margin-bottom: 15px;">
                <label for="nome" style="color: #ff7f00;">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $aeroporto->getNome(); ?>" required style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="codigo" style="color: #ff7f00;">Código:</label>
                <input type="text" name="codigo" id="codigo" value="<?php echo $aeroporto->getCodigo(); ?>" required style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="localizacao" style="color: #ff7f00;">Localização:</label>
                <input type="text" name="localizacao" id="localizacao" value="<?php echo $aeroporto->getLocalizacao(); ?>" required style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div>
                <input type="hidden" name="id" value="<?php echo $aeroporto->getId(); ?>">
                <button type="submit" name="action" value="editar" style="background-color: #ff7f00; color: #2a2a2a; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; width: 100%;">Salvar Alterações</button>
            </div>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="listar_aeroportos.php" style="color: #ff7f00;">Voltar para a lista de aeroportos</a>
        </div>


        <?php if ($status == 'sucesso'): ?>
            <script>
                alert('Alterações salvas com sucesso!');
            </script>
        <?php elseif ($status == 'erro'): ?>
            <script>
                alert('Erro ao salvar alterações. Tente novamente.');
            </script>
        <?php endif; ?>
    </div>
</body>
</html>

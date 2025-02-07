<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aeroporto</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1>Cadastrar Aeroporto</h1>
            <p>Preencha as informações abaixo para cadastrar um novo aeroporto.</p>
        </header>


        <form action="../../controller/Aeroporto_controller.php" method="post" style="background-color: #333; padding: 20px; border-radius: 8px;">
            <div style="margin-bottom: 15px;">
                <label for="nome" style="color: #ff7f00;">Nome:</label>
                <input type="text" name="nome" id="nome" required placeholder="Nome do Aeroporto" style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="codigo" style="color: #ff7f00;">Código:</label>
                <input type="text" name="codigo" id="codigo" required placeholder="Código do Aeroporto" style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="localizacao" style="color: #ff7f00;">Localização:</label>
                <input type="text" name="localizacao" id="localizacao" required placeholder="Localização do Aeroporto" style="width: 100%; padding: 10px; background-color: #444; border: 1px solid #ff7f00; color: #f8f9fa; border-radius: 4px;">
            </div>

            <div>
                <button type="submit" name="action" value="cadastrar" style="background-color: #ff7f00; color: #2a2a2a; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; width: 100%;">Cadastrar</button>
            </div>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <a href="../../views/aeroporto/listar_aeroportos.php" style="color: #ff7f00;">Mostrar a lista de aeroportos</a>
        </div>

        <?php if ($status == 'sucesso'): ?>
            <script>
                alert('Aeroporto cadastrado com sucesso!');
            </script>
        <?php elseif ($status == 'erro'): ?>
            <script>
                alert('Erro ao cadastrar aeroporto. Tente novamente.');
            </script>
        <?php endif; ?>
    </div>
</body>
</html>

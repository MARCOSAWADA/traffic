<?php
require_once '../../models/Aeroporto.php';

$aeroporto = new Aeroporto();
$aeroportos = $aeroporto->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aeroportos</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1>Lista de Aeroportos</h1>
            <p>Veja abaixo os aeroportos cadastrados.</p>
        </header>


        <table style="width: 100%; border-collapse: collapse; background-color: #333; color: #f8f9fa; border-radius: 8px;">
            <thead>
                <tr>
                    <th style="padding: 12px; border-bottom: 2px solid #ff7f00;">Nome</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ff7f00;">Código</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ff7f00;">Localização</th>
                    <th style="padding: 12px; border-bottom: 2px solid #ff7f00;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aeroportos as $a): ?>
                    <tr>
                        <td style="padding: 10px;"><?php echo $a['nome']; ?></td>
                        <td style="padding: 10px;"><?php echo $a['codigo']; ?></td>
                        <td style="padding: 10px;"><?php echo $a['localizacao']; ?></td>
                        <td style="padding: 10px;">
                            <a href="editar_aeroporto.php?id=<?php echo $a['id']; ?>" style="color: #ff7f00; text-decoration: none; padding: 6px;">Editar</a> |
                            <a href="excluir_aeroporto.php?id=<?php echo $a['id']; ?>" style="color: #ff7f00; text-decoration: none; padding: 6px;">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <div style="text-align: center; margin-top: 20px;">
            <a href="cadastrar_aeroporto.php" style="color: #ff7f00; font-size: 18px;">Cadastrar Novo Aeroporto</a>
        </div>
        <a href="../../../public/painel.php">
            <button class="logout-button">Voltar ao Painel</button>
        </a>
    </div>
</body>
</html>

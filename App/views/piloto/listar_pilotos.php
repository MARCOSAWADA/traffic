<?php
require_once '../../models/Piloto.php';

$piloto = new Piloto();
$pilotos = $piloto->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pilotos</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1>Lista de Pilotos</h1>
            <p>Confira a lista completa de pilotos cadastrados.</p>
        </header>


        <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="padding: 10px; background-color: #444; color: #f8f9fa;">Nome</th>
                    <th style="padding: 10px; background-color: #444; color: #f8f9fa;">Licença</th>
                    <th style="padding: 10px; background-color: #444; color: #f8f9fa;">Horas de Voo</th>
                    <th style="padding: 10px; background-color: #444; color: #f8f9fa;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pilotos as $p): ?>
                    <tr style="background-color: #333; color: #f8f9fa;">
                        <td style="padding: 10px;"><?php echo $p['nome']; ?></td>
                        <td style="padding: 10px;"><?php echo $p['licenca']; ?></td>
                        <td style="padding: 10px;"><?php echo $p['horas_voo']; ?></td>
                        <td style="padding: 10px;">
                            <a href="editar_piloto.php?id=<?php echo $p['id']; ?>" style="color: #ff7f00;">Editar</a> | 
                            <a href="excluir_piloto.php?id=<?php echo $p['id']; ?>" style="color: #ff7f00;">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <div style="text-align: center; margin-top: 20px;">
            <a href="cadastrar_piloto.php" style="color: #ff7f00; font-size: 18px;">Cadastrar Novo Piloto</a>
        </div>
        <a href="../../../public/painel.php">
            <button class="logout-button">Voltar ao Painel</button>
        </a>
    </div>
</body>
</html>

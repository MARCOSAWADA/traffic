<?php
require_once '../../models/Voo.php';

$voo = new Voo();
$voos = $voo->listar(); 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Voos</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1 style="color: #ff7f00;">Lista de Voos</h1>
            <p style="color: #f8f9fa;">Aqui estão os voos cadastrados no sistema.</p>
        </header>


        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #444; color: #f8f9fa;">
                    <th>Aeronave</th>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Horário de Partida</th>
                    <th>Horário de Chegada</th>
                    <th>Piloto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($voos as $v): ?>
                    <tr style="background-color: #333; color: #f8f9fa; text-align: center;">
                        <td><?php echo $v['aeronave']; ?></td>
                        <td><?php echo $v['origem']; ?></td>
                        <td><?php echo $v['destino']; ?></td>
                        <td><?php echo $v['horario_partida']; ?></td>
                        <td><?php echo $v['horario_chegada']; ?></td>
                        <td><?php echo $v['piloto']; ?></td>
                        <td>
                            <a href="editar_voo.php?id=<?php echo $v['id']; ?>" style="color: #ff7f00; text-decoration: none; padding: 5px;">Editar</a> | 
                            <a href="excluir_voo.php?id=<?php echo $v['id']; ?>" style="color: #ff7f00; text-decoration: none; padding: 5px;">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <p style="margin-top: 20px; text-align: center;">
            <a href="cadastrar_voo.php" style="color: #ff7f00; text-decoration: none; font-size: 16px;">Cadastrar Novo Voo</a>
        </p>
        <a href="../../../public/painel.php">
            <button class="logout-button">Voltar ao Painel</button>
        </a>
    </div>
</body>
</html>

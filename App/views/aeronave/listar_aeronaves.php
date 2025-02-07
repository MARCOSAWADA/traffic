<?php
require_once '../../models/Aeronave.php';

$aeronave = new Aeronave();
$aeronaves = $aeronave->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aeronaves</title>
    <link rel="stylesheet" href="../../css/painel_botao.css">
</head>
<body>
    <div class="container">

        <header>
            <h1>Lista de Aeronaves</h1>
            <p>Visualize todas as aeronaves registradas no sistema</p>
        </header>


        <table style="width: 100%; text-align: center; border-collapse: collapse; background-color: #333;">
            <thead>
                <tr style="background-color: #444;">
                    <th style="color: #ff7f00;">ID</th>
                    <th style="color: #ff7f00;">Modelo</th>
                    <th style="color: #ff7f00;">Capacidade</th>
                    <th style="color: #ff7f00;">Status</th>
                    <th style="color: #ff7f00;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aeronaves as $aero): ?>
                    <tr style="background-color: #2a2a2a; color: #f8f9fa;">
                        <td><?php echo $aero['id']; ?></td>
                        <td><?php echo $aero['modelo']; ?></td>
                        <td><?php echo $aero['capacidade']; ?></td>
                        <td><?php echo $aero['status']; ?></td>
                        <td>
                            <a href="editar_aeronave.php?id=<?php echo $aero['id']; ?>" class="card-button">Editar</a>
                            <a href="excluir_aeronave.php?id=<?php echo $aero['id']; ?>" class="card-button" style="background-color: #ff3d00;">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <a href="cadastrar_aeronave.php">
            <button class="logout-button" style="background-color: #ff7f00; color: #2a2a2a;">Cadastrar Nova Aeronave</button>
        </a>
        
        <a href="../../../public/painel.php">
            <button class="logout-button">Voltar ao Painel</button>
        </a>
    </div>
</body>
</html>

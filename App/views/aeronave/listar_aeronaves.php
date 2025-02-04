<?php
require_once '../../models/Aeronave.php';

$aeronave = new Aeronave();
$aeronaves = $aeronave->listar();
?>

<h2>Lista de Aeronaves</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Modelo</th>
        <th>Capacidade</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($aeronaves as $aero): ?>
        <tr>
            <td><?php echo $aero['id']; ?></td>
            <td><?php echo $aero['modelo']; ?></td>
            <td><?php echo $aero['capacidade']; ?></td>
            <td><?php echo $aero['status']; ?></td>
            <td>
                <a href="editar_aeronave.php?id=<?php echo $aero['id']; ?>">Editar</a>
                <a href="excluir_aeronave.php?id=<?php echo $aero['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a href="cadastrar_aeronave.php">Cadastrar Nova Aeronave</a></p>
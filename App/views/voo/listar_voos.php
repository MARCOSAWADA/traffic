<?php
require_once '../../models/Voo.php';

$voo = new Voo();  // Cria uma instância de Voo
$voos = $voo->listar();  // Chama o método listar()

?>

<h2>Lista de Voos</h2>

<table border="1">
    <thead>
        <tr>
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
            <tr>
                <td><?php echo $v['aeronave']; ?></td>
                <td><?php echo $v['origem']; ?></td>
                <td><?php echo $v['destino']; ?></td>
                <td><?php echo $v['horario_partida']; ?></td>
                <td><?php echo $v['horario_chegada']; ?></td>
                <td><?php echo $v['piloto']; ?></td>
                <td>
                    <a href="editar_voo.php?id=<?php echo $v['id']; ?>">Editar</a> | 
                    <a href="excluir_voo.php?id=<?php echo $v['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a href="cadastrar_voo.php">Cadastrar Novo Voo</a></p>

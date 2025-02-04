<?php
require_once '../../models/Piloto.php';

$piloto = new Piloto(); 
$pilotos = $piloto->listar();
?>

<h2>Lista de Pilotos</h2>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Licença</th>
            <th>Horas de Voo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pilotos as $p): ?>
            <tr>
                <td><?php echo $p['nome']; ?></td>
                <td><?php echo $p['licenca']; ?></td>
                <td><?php echo $p['horas_voo']; ?></td>
                <td>
                    <a href="editar_piloto.php?id=<?php echo $p['id']; ?>">Editar</a> | 
                    <a href="excluir_piloto.php?id=<?php echo $p['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a href="cadastrar_piloto.php">Cadastrar Novo Piloto</a></p>

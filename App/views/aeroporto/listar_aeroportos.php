<?php
require_once '../../models/Aeroporto.php';

$aeroporto = new Aeroporto();
$aeroportos = $aeroporto->listar();
?>

<h2>Lista de Aeroportos</h2>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Código</th>
            <th>Localização</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($aeroportos as $a): ?>
            <tr>
                <td><?php echo $a['nome']; ?></td>
                <td><?php echo $a['codigo']; ?></td>
                <td><?php echo $a['localizacao']; ?></td>
                <td>
                    <a href="editar_aeroporto.php?id=<?php echo $a['id']; ?>">Editar</a> | 
                    <a href="excluir_aeroporto.php?id=<?php echo $a['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

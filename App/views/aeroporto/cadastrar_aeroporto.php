<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<h2>Cadastrar Aeroporto</h2>

<form action="../../controller/Aeroporto_controller.php" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required placeholder="Nome do Aeroporto">
    </div>
    <div>
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" required placeholder="Código do Aeroporto">
    </div>
    <div>
        <label for="localizacao">Localização:</label>
        <input type="text" name="localizacao" id="localizacao" required placeholder="Localização do Aeroporto">
    </div>
    <div>
        <button type="submit" name="action" value="cadastrar">Cadastrar</button>
    </div>
</form>

<p><a href="../../views/aeroporto/listar_aeroportos.php">Mostrar a lista de aeroportos</a></p>


<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Aeroporto cadastrado com sucesso!');
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao cadastrar aeroporto. Tente novamente.');
    </script>
<?php endif; ?>

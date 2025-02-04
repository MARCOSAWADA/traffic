<?php
// Caso haja algum status vindo pela URL, definimos a variável $status.
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<h2>Cadastrar Piloto</h2>

<form action="../../controller/Piloto_controller.php" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required placeholder="Nome do Piloto">
    </div>
    <div>
        <label for="licenca">Licença:</label>
        <input type="text" name="licenca" id="licenca" required placeholder="Licença do Piloto">
    </div>
    <div>
        <label for="horas_voo">Horas de Voo:</label>
        <input type="number" name="horas_voo" id="horas_voo" required placeholder="Horas de Voo">
    </div>
    <div>
        <button type="submit" name="action" value="cadastrar">Cadastrar</button>
    </div>
</form>

<p><a href="../../views/piloto/listar_pilotos.php">Mostrar a lista de pilotos</a></p>


<?php if ($status == 'sucesso'): ?>
    <script>
        alert('Piloto cadastrado com sucesso!');
    </script>
<?php elseif ($status == 'erro'): ?>
    <script>
        alert('Erro ao cadastrar piloto. Tente novamente.');
    </script>
<?php endif; ?>

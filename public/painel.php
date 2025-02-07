<?php
session_start();


include_once '../App/models/Admin.php';

$admin = new Admin();


if (!$admin->isLoggedIn()) {

    header("Location: login.php");
    exit();
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Admin'; 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Tráfego Aéreo</title>
    <link rel="stylesheet" href="css/painel.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Painel de Controle</h1>
            <p>Bem-vindo ao painel de controle do sistema de Tráfego Aéreo, <?php echo htmlspecialchars($username); ?>!</p>
        </header>


        <div class="cards-container">
            <div class="card">
                <h3>Gerenciar Aeronaves</h3>
                <a href="../App/views/aeronave/listar_aeronaves.php">
                    <button class="card-button">Acessar</button>
                </a>
            </div>

            <div class="card">
                <h3>Gerenciar Aeroportos</h3>
                <a href="../App/views/aeroporto/listar_aeroportos.php">
                    <button class="card-button">Acessar</button>
                </a>
            </div>

            <div class="card">
                <h3>Gerenciar <br> Pilotos</h3>
                <a href="../App/views/piloto/listar_pilotos.php">
                    <button class="card-button">Acessar</button>
                </a>
            </div>

            <div class="card">
                <h3>Gerenciar <br> Voos</h3>
                <a href="../App/views/voo/listar_voos.php">
                    <button class="card-button">Acessar</button>
                </a>
            </div>
        </div>

        <form action="logout.php" method="POST">
            <button type="submit" class="logout-button">Sair</button>
        </form>
    </div>
</body>
</html>

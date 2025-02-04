<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAINEL DE CONTROLE</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>

    <header>
        <h1>PAINEL DE CONTROLE</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=cadastrar_voo">Cadastrar Voo</a></li>
                <li><a href="index.php?action=listar_voos">Listar Voos</a></li>
                <li><a href="index.php?action=cadastrar_aeronave">Cadastrar Aeronave</a></li>
                <li><a href="index.php?action=listar_aeronaves">Listar Aeronaves</a></li>
                <li><a href="index.php?action=cadastrar_piloto">Cadastrar Piloto</a></li>
                <li><a href="index.php?action=listar_pilotos">Listar Pilotos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="content">
            <h2>Bem-vindo ao Sistema de Tráfego Aéreo!</h2>
            <p>Selecione uma ação no menu para começar.</p>

            <div class="card">
                <h3>Voos</h3>
                <p>Acesse a lista de voos cadastrados ou cadastre novos voos.</p>
                <a href="index.php?action=listar_voos">Ver Voos</a>
            </div>

            <div class="card">
                <h3>Aeronaves</h3>
                <p>Cadastre e consulte as aeronaves disponíveis para os voos.</p>
                <a href="index.php?action=listar_aeronaves">Ver Aeronaves</a>
            </div>

            <div class="card">
                <h3>Pilotos</h3>
                <p>Gerencie os pilotos e associe-os aos voos programados.</p>
                <a href="index.php?action=listar_pilotos">Ver Pilotos</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Tráfego Aéreo. Todos os direitos reservados.</p>
    </footer>

</body>

</html>

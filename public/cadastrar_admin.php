<?php

include_once '../App/models/Admin.php';

$admin = new Admin();
$error_message = "";
$success_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if ($password !== $confirm_password) {
        $error_message = "As senhas não coincidem!";
    } else {

        if ($admin->cadastrarAdmin($username, $password)) {

            header("Location: ../public/painel.php");
            exit(); 
        } else {
            $error_message = "Erro ao cadastrar o admin.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Admin - Tráfego Aéreo</title>
    <link rel="stylesheet" href="../public/css/styles1.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Admin</h1>

        <?php if (!empty($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($success_message)): ?>
            <p style="color: green;"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <form action="cadastrar_admin.php" method="POST">
            <div>
                <label for="username">Usuário:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="confirm_password">Confirmar Senha:</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

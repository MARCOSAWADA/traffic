<?php
session_start();

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../App/models/Admin.php';
    
    $admin = new Admin();
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($admin->login($username, $password)) {

        header("Location: painel.php");
        exit();
    } else {

        $error_message = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tráfego Aéreo</title>
    <link rel="stylesheet" href="../public/css/styles1.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="submit-btn">Entrar</button>
        </form>


        <p>Ainda não tem conta? <a href="cadastrar_admin.php"><button class="register-btn">Cadastre-se</button></a></p>
    </div>
</body>
</html>

<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$mensagem2 = $_SESSION['login_erro'] ?? ''; 
unset($_SESSION['login_erro']);  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/forms.css">
    <title>Login de Pacientes:</title>
</head>
<body>
<main>
    <form action="../controller/login_patient.php" method="POST">
        <h1>Acesse sua conta</h1>
        <h2><?= htmlspecialchars($mensagem2) ?></h2>

        <div>
            <label>E-mail:</label>
            <input type="email" name="email" required placeholder="Digite seu e-mail">
        </div>

        <div>
            <label>Senha:</label>
            <input type="password" name="senha" required placeholder="Digite sua senha">
        </div>

        <button  type="submit">Entrar</button>

        <p class="register-link">
            Ops… não tenho conta!
            <a href="./create_user_patient.php">Criar agora</a>
        </p>
    </form>
</main>
</body>
</html>

<?php
session_start();
$erros = $_SESSION['erros'] ?? [];
$sucesso = $_SESSION['sucesso'] ?? null;
unset($_SESSION['erros'], $_SESSION['sucesso']);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mudando sua Senha:</title>
</head>
<body>
    <main>
        <div>
            <form action="../controller/alter_user_in_patient_password.php" method="post">
                <h1>Mudando sua Senha:</h1>
<?php if ($sucesso): ?>
                    <div style="color: green;">
                        <p><?= htmlspecialchars($sucesso) ?></p>
                    </div>
<?php endif; ?>
<?php if (!empty($erros)): ?>
                    <ul style="color: red;">
                        <?php foreach ($erros as $erro): ?>
                            <li><?= htmlspecialchars($erro) ?></li>
                        <?php endforeach; ?>
                    </ul>
<?php endif; ?>
                <label for="senha_atual">Senha Atual:</label>
                <input type="password" name="senha_atual" id="senha_atual" required placeholder="Digite sua senha atual">
                
                <label for="nova_senha">Nova Senha:</label>
                <input type="password" name="nova_senha" id="nova_senha" required placeholder="Digite sua nova senha">
                
                <label for="confirmar_senha">Confirmar Nova Senha:</label>
                <input type="password" name="confirmar_senha" id="confirmar_senha" required placeholder="Confirme sua nova senha">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">
                <button onclick="location.href='./home_patient.php'">Voltar</button>
                <button type="submit">Alterar Senha</button>
            </form>
        </div>


    </main>
    
</body>
</html>
<?php

session_start();

$erros = $_SESSION['erros'] ?? [];
$sucesso = $_SESSION['sucesso'] ?? null;
unset($_SESSION['erros'], $_SESSION['sucesso']);



$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
require_once '../controller/show_in_edit_patient.php';



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil de usuario </title>
</head>
<body>
    <main>
        <form action="../controller/edit_user_patient.php" method="POST">
            <h1>Auteração de dados:</h1>
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
            <label>Nome de usuario:</label>
            <input type="text" name="usuario" value="<?= htmlspecialchars($linhaExibir['usuario']) ?>" required placeholder="Digite o nome de usuario">
            <label>Nome completo:</label>
            <input type="text" name="nome_completo" value="<?= htmlspecialchars($linhaExibir['nome_completo']) ?>" required placeholder="Digite o nome completo">
            <label>Data de nascimento:</label>
            <input type="date" name="data_de_nascimento" value="<?= htmlspecialchars($linhaExibir['data_de_nascimento']) ?>" required placeholder="Digite a data de nascimento">
            <label>Telefone(incluindo DDD):</label>
            <input type="text" name="telefone" value="<?= htmlspecialchars($linhaExibir['telefone']) ?>" required placeholder="Digite o telefone com DDD">
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($linhaExibir['email']) ?>" required placeholder="Digite o email">
            <input type="hidden" name="id" value="<?= htmlspecialchars($linhaExibir['id']) ?>">

            <button type="button" onclick="location.href='./home_patient.php'">Voltar</button>
            <button type="submit">Salvar</button>
        </form>

    </main>
    
</body>
</html>
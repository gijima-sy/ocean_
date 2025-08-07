<?php
session_start();
$erro = $_SESSION['erro'] ?? '';
$sucesso = $_SESSION['sucesso'] ?? null;
unset($_SESSION['erro'], $_SESSION['sucesso']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes:</title>
</head>
<body>
    <form action="../controller/create_user_patient.php" method="POST">
        <h1>Criando uma Conta para Você:</h1>
        <p style="color:red;"><?= htmlspecialchars($erro)?></p>
        <?php if ($sucesso): ?>
            <p style="color: green;"><?= htmlspecialchars($sucesso) ?></p>
        <?php endif; ?>
        <label >Nome de usuario:</label>
        <input type="text" name="usuario" required placeholder="Digite o nome de usuario">
        
        <label >Nome completo:</label>
        <input type="text" name="nome_completo" required placeholder="Digite o nome completo">
        
        <label >Data de nacimento</label>
        <input type="date" name="data_nascimento" required placeholder="Digite a data de nacimento">

        <label>Telefone(incluindo DDD):</label>
        <input type="text" name="telefone" required placeholder="Digite o telefone com DDD">

        <label >Email:</label>
        <input type="email" name="email" required placeholder="Digite o email">

        <label >Senha:</label>
        <input type="password" name="senha" required placeholder="Digite a senha"> 

        <input type="submit" value="Criar usuario">
    </form>
    
</body>
</html>
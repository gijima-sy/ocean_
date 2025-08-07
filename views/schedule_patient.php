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
    <title>Agendamentos</title>
</head>
<body>
    <div>
        <h2>Opções dos agendamentos:</h2>
        <ul>
            <li>
                <a type="submit" onclick="location.href='./schedule_meetings_patient.php'">Novo Agendamento</a>
            </li>
            <li>
                <a type="submit" onclick="location.href='./list_of_scheduled.php'">Lista dos seus agendamentos</a>
            </li>
        </ul>
    </div>
    
</body>
</html>
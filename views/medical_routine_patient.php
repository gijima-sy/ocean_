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
    <title>Rotinas:</title>
</head>
<body>
    <div>
        <h2>Opções das Rotinas:</h2>
        <ul>
            <li>
                <a type="submit" onclick="location.href='./medical_routine_patient_new.php'">Nova Rotina</a>
            </li>
            <li>
                <a type="submit" onclick="location.href='./list_of_routine_patient.php'">Lista das suas rotinas</a>
            </li>
        </ul>
    </div>
    
</body>
</html>
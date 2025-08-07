<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


require_once '../conection/conection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../views/create_user_patient.php');
    exit;
}

$usuario = trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$nome = trim(filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$data_nascimento = trim($_POST['data_nascimento'] ?? '');   
$telefone = trim(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$senha = trim($_POST['senha'] ?? '');

require_once '../model/duplicated_patient.php';
 

if ($consulta ->rowCount() > 0) {
    $_SESSION['erro'] = 'Usuário já existe, tente mudar o nome de usuário, email ou telefone.';
    header('location: ../views/create_user_patient.php');
    exit;
}


if(strlen($senha) < 6){
    $_SESSION['erro'] = 'A senha deve ter pelo menos 6 caracteres.';
    header('location: ../views/create_user_patient.php');
    exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

try {

    require_once '../model/insert_user_patient.php';

    $_SESSION['id'] = $pdo->lastInsertId();
    $_SESSION['name'] = $usuario;

    header('location: ../views/home_patient.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['erro'] = 'Erro ao gravar no banco. Tente novamente.';
    header('location: ../views/create_user_patient.php');
    exit;
}
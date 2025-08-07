<?php

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../views/perfil_user_patient.php');
    exit;
}


$erros = [];


require_once '../conection/conection.php';

$id = trim(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));
$nome_completo = trim(filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$usuario = trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$data_de_nascimento = trim(filter_input(INPUT_POST, 'data_de_nascimento', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$telefone = trim(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
if (!$id || !$nome_completo || !$usuario || !$data_de_nascimento || !$telefone || !$email) {
    $erros[] = 'Dados inválidos ou incompletos.';
}

require_once '../model/duplicated_email_patient.php';

if ($consultaEmail->fetchColumn()) {
    $erros[] = 'Este e-mail já está cadastrado.';
    $_SESSION['erros'] = $erros; 
    header('Location: ../views/edit_user_patient.php?id=' . $id);
    exit;
}

require_once '../model/duplicated_user_patient.php';

if ($consultaDeUsuario->fetchColumn()) {
    $erros[] = 'Este nome de usuário já está cadastrado.';
    $_SESSION['erros'] = $erros;
    header('Location: ../views/edit_user_patient.php?id=' . $id);
    exit;
}

require_once '../model/update_perfil_patient.php';

if ($update->rowCount() > 0) {
    $_SESSION['sucesso'] = 'Dados atualizados com sucesso.';
    header('Location: ../views/perfil_user_patient.php?id=' . $id);
    exit;

} else {
    $erros[] = 'Erro ao atualizar os dados.';
    $_SESSION['erros'] = $erros;
    header('Location: ../views/edit_user_patient.php?id=' . $id);
    exit;
}

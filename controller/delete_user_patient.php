<?php
$_SESSION['erros'] ?? [];
$_SESSION['sucesso'] ?? [];
unset($_SESSION['erros'], $_SESSION['sucesso']);

require_once '../conection/conection.php';

session_start();
try {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
        $_SESSION['erros'][] = "ID inválido.";
        header('Location: ../views/perfil_user_patient.php');
        exit;
    }

    require_once '../model/delete_user_patient.php';
    $_SESSION['sucesso'] = "Usuário excluído com sucesso. Deseja criar um novo usuário?";
    header('Location: ../views/create_user_patient.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['erros'][] = "Erro no banco de dados: " . $e->getMessage();
    header('Location: ../views/perfil_user_patient.php');
    exit;
} catch (Exception $e) {
    $_SESSION['erros'][] = "Erro: " . $e->getMessage();
    header('Location: ../views/perfil_user_patient.php');
    exit;
} 
?>
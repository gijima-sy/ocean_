<?php

session_start();
$erros = $_SESSION['erros'] ?? [];
$sucesso = $_SESSION['sucesso'] ?? null;
unset($_SESSION['erros'], $_SESSION['sucesso']);

include_once '../conection/conection.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$senhaAtual = filter_input(INPUT_POST, 'senha_atual', FILTER_SANITIZE_STRING);
$novaSenha = filter_input(INPUT_POST, 'nova_senha', FILTER_SANITIZE_STRING);
$confirmarSenha = filter_input(INPUT_POST, 'confirmar_senha', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($novaSenha !== $confirmarSenha) {
        $erros[] = 'As novas senhas não coincidem.';
        $_SESSION['erros'] = $erros;
        header('Location: ../views/alter_user_in_patient_password.php?id=' . $id);
        exit;
    } else {
        if($novaSenha < 6){
            $erros[] = 'A nova senha deve ter pelo menos 6 caracteres.';
            $_SESSION['erros'] = $erros;
            header('Location: ../views/alter_user_in_patient_password.php?id=' . $id);
            exit;
        } else {
            require_once '../model/check_password_patient.php';

            if ($usuarioDaSenha && password_verify($senhaAtual, $usuarioDaSenha['senha'])) {
                require_once '../model/update_password_patient.php';
                if ($update->execute()) {
                    $_SESSION['sucesso'] = 'Senha alterada com sucesso.';
                    header('Location: ../views/perfil_user_patient.php?id=' . $id);
                    exit;
                } else {
                    $erros[] = 'Erro ao alterar a senha.';
                    $_SESSION['erros'] = $erros;
                    header('Location: ../views/alter_user_in_patient_password.php?id=' . $id);
                    exit;
                }
            } else {
                $erros[] = 'Senha atual incorreta.';
                $_SESSION['erros'] = $erros;
                header('Location: ../views/alter_user_in_patient_password.php?id=' . $id);
                exit;
            }
        }
    }
}

<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once '../conection/conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    
    if ($email === '' || $senha === '') {
        $_SESSION['login_erro'] = 'Preencha e-mail e senha.';
        header('Location: ../views/login_patient');
        exit();
    }


    require_once '../model/check_enter_patient.php';

    $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = :email');
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);
    $senha_correta = password_verify($senha,$paciente['senha']);
    
     
    if (password_verify($senha, $paciente['senha']) && $paciente  ) {
        $_SESSION['id']   = $paciente['id'];
        $_SESSION['name'] = $paciente['usuario'];
        header('Location: ../views/home_patient.php');
        exit();
    } 



   
} else{
    $_SESSION['login_erro'] = 'E-mail ou senha incorretos.';
    header('Location: ../vision/login_patient.php');
    exit;
}
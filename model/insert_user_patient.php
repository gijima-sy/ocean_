<?php

$create_user_patient = $pdo->prepare('INSERT INTO pacientes (usuario, nome_completo, data_de_nascimento, telefone, email, senha) VALUES (:usuario, :nome_completo, :data_de_nascimento, :telefone, :email, :senha)');
$create_user_patient->execute([
    ':usuario' => $usuario,
    ':nome_completo' => $nome,
    ':data_de_nascimento' => $data_nascimento,
    ':telefone' => $telefone,
    ':email' => $email,
    ':senha' => $senha_hash
]); 
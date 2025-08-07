<?php


$update = $pdo->prepare('UPDATE pacientes SET nome_completo = :nome_completo, usuario = :usuario, data_de_nascimento = :data_de_nascimento, telefone = :telefone, email = :email WHERE id = :id');
$update->execute([':nome_completo' => $nome_completo, ':usuario' => $usuario, ':data_de_nascimento' => $data_de_nascimento, ':telefone' => $telefone, ':email' => $email, ':id' => $id]);
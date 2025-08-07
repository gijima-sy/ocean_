<?php


$stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = :email');
$stmt->bindValue(':email', $email);
$stmt->execute();
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);
$senha_correta = password_verify($senha,$paciente['senha']);
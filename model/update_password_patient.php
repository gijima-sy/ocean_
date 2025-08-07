<?php

$novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
$update = $pdo->prepare('UPDATE pacientes SET senha = :senha WHERE id = :id');
$update->bindValue(':senha', $novaSenhaHash);
$update->bindValue(':id', $id, PDO::PARAM_INT);
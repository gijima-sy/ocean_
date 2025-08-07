<?php
$values = 'SELECT * FROM pacientes WHERE usuario = :usuario OR telefone = :telefone OR email = :email LIMIT 1';
$consulta = $pdo->prepare($values);
$consulta->bindValue(':usuario', $usuario);
$consulta->bindValue(':telefone', $telefone);
$consulta->bindValue(':email', $email);
$consulta->execute();  
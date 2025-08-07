<?php

$consultaEmail = $pdo->prepare('SELECT 1 FROM pacientes WHERE email = :email AND id <> :id LIMIT 1');
$consultaEmail->execute([':email' => $email, ':id' => $id]);

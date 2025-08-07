<?php

$consultaDeUsuario = $pdo->prepare('SELECT * FROM pacientes WHERE usuario = :usuario  AND id <> :id LIMIT 1');
$consultaDeUsuario->execute([':usuario' => $usuario, ':id' => $id]);

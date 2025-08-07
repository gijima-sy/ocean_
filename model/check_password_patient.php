<?php

$consulta_de_senha = $pdo->prepare('SELECT senha FROM pacientes WHERE id = :id');
$consulta_de_senha->bindValue(':id', $id, PDO::PARAM_INT);
$consulta_de_senha->execute();
$usuarioDaSenha = $consulta_de_senha->fetch(PDO::FETCH_ASSOC);
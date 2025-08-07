<?php

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$consulta = $pdo->prepare("SELECT * FROM pacientes WHERE id = :id");
$consulta->bindValue(':id', $id, PDO::PARAM_INT);
$consulta->execute();

$linha = $consulta->fetch(PDO::FETCH_ASSOC);
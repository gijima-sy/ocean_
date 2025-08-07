<?php

$consulta = $pdo->prepare('SELECT * FROM pacientes WHERE id = :id');
$consulta -> bindValue(':id', $id , PDO:: PARAM_INT);
$consulta -> execute();

$linhaExibir = $consulta -> fetch(PDO:: FETCH_ASSOC);

$mensagemErroProcura = '';
if (!$linhaExibir) {
    $mensagemErroProcura = "paciente não encontrado";
    exit;
}
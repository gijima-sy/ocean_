<?php

    try {
    $pdo = new PDO("mysql:host=localhost;dbname=nota_bd", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $erro) {
        echo "Erro na conexão: " . $erro->getMessage();
    }
?>

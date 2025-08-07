<?php

$deleteUser = 'DELETE FROM pacientes WHERE id = :id';
$deletion = $pdo->prepare($deleteUser);
$deletion->bindValue(':id', $id, PDO::PARAM_INT);
$deletion->execute();
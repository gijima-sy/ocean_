<?php
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
require_once '../controller/show_in_edit_patient.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Rotina</title>
</head>
<body>
    <div>
        <h2>Criando nova rotina medica:</h2>
        <form action="../controller/new_routine_patient.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($linhaExibir['id']) ?>">
            
        </form>
    </div>
</body>
</html>
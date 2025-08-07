<?php
// session_start();

include_once ('../controller/protect_patient.php');


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home do Seas </title>
</head>
<body>
    <div>
        <input type="image" src="../assets/imags/perfil.png"  alt="Perfil" style="width: 50px; height: 50px; cursor: pointer;" onclick="location.href='./perfil_user_patient.php?id=<?= $_SESSION['id'] ?>'">
        <p> <?= $_SESSION['name'] ?></p>
        <h2>Operações/Ações:</h5>
        <ul>
            <li>
                <a type="submit" onclick="location.href='./schedule_patient.php'">Agendamentos</a>
            </li>
            <li>
                <a type="submit" onclick="location.href='./medical_routine_patient.php?<?= $_SESSION['id']?>'">Rotinas de Medicamentos</a>
            </li>
            <li >
                <a type="submit" onclick="location.href='./algo.php'">*</a>
            </li>
        </ul>

    </div>
</body>
</html>
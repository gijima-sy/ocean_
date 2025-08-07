<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bem-Vindo ao Seas </title>
</head>
<body>
    <div>
        <input type="image" src="./assets/logo.png" alt="logo" style="width: 50px; height: 25px; cursor: pointer;" onclick="location.href='./views/secret.php'">
        <h1>Bem-Vindo ao Seas</h2>
        <h2>Selecione uma opção abaixo:</h2>
        <h3>Para quem deseja criar uma conta?</h3>
        <ul>
            <li onclick="location.href='./views/create_user_patient.php'">Criar conta (Pacientes da clinica)</li>
            <li onclick="location.href='./views/create_user_psychologist.php'">Criar conta (Psicólogos da clinica)</li>
        </ul>
        <h3>Para quem já possui uma conta?</h3>
        <ul>
            <li onclick="location.href='./views/login_patient.php'">Entrar em uma conta já existente (Pacientes da clinica)</li>
            <li onclick="location.href='./views/login_psychologist.php'">Entrar em uma conta já existente (Psicólogos da clinica)</li>
            <li onclick="location.href='./views/login_admin.php'">Entrar em uma conta já existente (Administrador)</li>
        </ul>

    </div>
</body>
</html>
<?php

session_start();
$erros = $_SESSION['erros'] ?? [];
$sucesso = $_SESSION['sucesso'] ?? null;
unset($_SESSION['erros'], $_SESSION['sucesso']);


require_once "../controller/show_perfil_user_patient.php";



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles_perfil_user_patient.css">
    <title>Seu Perfil</title>
</head>
<body>
  <main>
    <div>

        <a type="submit" onclick="location.href='./home_patient.php'">Deseja Voltar</a>
        <br><br>
        <a type="submit" onclick="location.href='../controller/leave_patient.php'">Deseja Sair Da Sua conta atual</a>
        <h1>Seus dados:</h1>

<?php if ($sucesso): ?>
            <p style="color: green;"><?= htmlspecialchars($sucesso) ?></p>
<?php endif; ?>
<?php if ($erros): ?>
            <ul class="erros">
                <?php foreach ($erros as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
<?php endif; ?>


        <p>Nome de Usuario: <?= htmlspecialchars($linha['usuario']) ?></p>
        <p>Nome Completo: <?= htmlspecialchars($linha['nome_completo']) ?></p>
        <p>Data de Nascimento: <?= htmlspecialchars($linha['data_de_nascimento']) ?></p>
        <p>Telefone: <?= htmlspecialchars($linha['telefone']) ?></p>
        <p>Email: <?= htmlspecialchars($linha['email']) ?></p>
        <p>Senha: ***** <a href="./alter_user_in_patient_password.php?id=<?= $linha['id'] ?>">Deseja mudar sua senha</a></p>
        <input type="hidden" name="id" value="<?= htmlspecialchars($linha['id']) ?>">

        <button type="submit" onclick="location.href='./edit_user_patient.php?id=<?= $linha['id'] ?>'" >Editar Perfil</button>

        <button class="login button-tabela" onclick="abrirModal()">Deletar perfil</button>

        <div id="modal" class="modal">
        <div class="modal-content">
            <p>Tem certeza que deseja excluir sua conta?</p>
            <button onclick="confirmarExclusao()">Sim</button>
            <button onclick="fecharModal()">Cancelar</button>
        </div>
        </div>


    </div>
  </main>
    
</body>

<script>
function abrirModal() {
  document.getElementById('modal').classList.add('show');
}

function fecharModal() {
  document.getElementById('modal').classList.remove('show');
}

function confirmarExclusao() {
  window.location.href = "../controller/delete_user_patient.php?id=<?= $linha['id'] ?>";
}
</script>

</html>
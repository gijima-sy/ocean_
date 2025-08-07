<?php

session_start();

$erros = $_SESSION['erros'] ?? [];
$sucesso = $_SESSION['sucesso'] ?? null;
unset($_SESSION['erros'], $_SESSION['sucesso']);

require_once '../conection/conection.php';
require_once '../controller/way_in_name_psychology.php'


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta:</title>
</head>
<body>
    <h2>Agendar Consulta:</h2>

    <form action="../controller/create_appointment_patient.php" method="post">
        <label> Psicólogo</label>
        <select name="psicologo" id="psicologo">
            <option value=""> selecione seu psicólogo</option>
            <?php foreach ($psicologos as $psicologo):?>
                <option value="<?= $psicologo['id']?>"><?= $psicologo['nome_completo']?></option>
            <?php endforeach; ?>
        </select>
        <br><br>


        <label >Data:</label>
        <select name="data" id="data">
            <option value="">Selecione o psicólogo primeiro</option>
        </select><br><br>

        <label>Horário:</label>
        <select name="horario" id="horario">
            <option value="">Selecione a data primeiro</option>
        </select><br><br>

        <input type="hidden" name="id" value=""<?= htmlspecialchars($_GET['id'] ?? '') ?>">
        <button type="submit">Agendar</button>
    </form>
    <a href="./appointment_patient.php">Voltar</a>

    
    <script>
        document.getElementById('psicologo').addEventListener('change', function() {
            const id = this.value;
            fetch(`../controller/way_in_search_date.php?psicologo_id=${id}`)
                .then(res => res.json())
                .then(datas => {
                    const dataSelect = document.getElementById('data');
                    dataSelect.innerHTML = '<option value="">Selecione</option>';
                    datas.forEach(d => {
                        dataSelect.innerHTML += `<option value="${d.id}">${d.data}</option>`;
                    });
                    document.getElementById('horario').innerHTML = '<option value="">Selecione a data primeiro</option>';
                });
        });

        document.getElementById('data').addEventListener('change', function() {
            const id = this.value;
            fetch(`../controller/way_in_search_time.php?data_id=${id}`)
                .then(res => res.json())
                .then(horarios => {
                    const horarioSelect = document.getElementById('horario');
                    horarioSelect.innerHTML = '<option value="">Selecione</option>';
                    horarios.forEach(h => {
                        horarioSelect.innerHTML += `<option value="${h.horario}">${h.horario}</option>`;
                    });
                });
        });
    </script>

</body>
</html>

<!-- esssa desgraça de código ta funcionando, mas não sei o porque, que odioooooooooo -->
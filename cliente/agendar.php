<?php

session_start();

// TESTES PARA VALIDAR LOGIN DE CLIENTE OU ENCERRAR A SESSÃO //

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: ../index.php');
}
if (isset($_POST['encerrar'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: ../index.php');
}

include_once('../conecta_banco.php');

$sqlSelect = "SELECT Num_vaga FROM vagas WHERE Estado='D'";
$resultado = $conexao->query($sqlSelect);
//print_r($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Vaga | Bjota estacionamento</title>
    <link rel="icon" href="../img/cats.png">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
</head>

<body>
    <nav class="dp-menu">
        <ul>
            <li><a href="#"><img src="../img/icone_menu.png" alt="menu" title="menu" width="25px" height="25px"></a>
                <ul>
                    <li><a href="documentos/BjotEstacionamentoManual.pdf" download="">Manual</a></li>
                    <li><a href="../menu_paginas/sobre.html">Sobre</a></li>
                    <li><a href="#p1">Contatos</a></li>
                </ul>
            <li><a href="#"><img src="../img/icone_menu_2.png" alt="icon logo" title="icon logo" width="25px"
                        height="25px"></a>
                <ul>
                    <li><a href="home_cliente.php">Voltar</a></li>
                </ul>
            </li>
            <div class="dp-menu-sair">
                <form method="POST" action="home_cliente.php"><input class="btn-sair" type="submit" name="encerrar"
                        value="Sair"></form>
            </div>
        </ul>
    </nav>

    <div class="container">
        <h2>Agendamento</h2>
        <div class="container-interno">
            <img src="../img/agenda.gif" alt="estacionamento">
            <form class="card" method="POST" action="agenda_vaga_cliente.php">
                <div class="tr">
                    <label for="data">Data Escolhida</label>
                    <input type="date" id="data" name="data" placeholder="data" value="<?php echo date('Y-m-d') ?>"
                        required>
                    <label for="hora">Horario Inicial</label>
                    <input type="time" id="hora" name="hora" placeholder="hora" min="06:00" max="22:00" required>
                    <h3 class="vagas-disponiveis">Vagas Disponiveis:</h3>

                    <?php
                    while ($dadosTabela = mysqli_fetch_assoc($resultado)) {
                        echo '<font color=rgb(5, 240, 36,); size=15>';
                        echo $dadosTabela['Num_vaga'];
                        echo '&nbsp&nbsp&nbsp';
                        echo '</font>';
                    }
                    ?>


                    <label for="vagas">Digite a vaga que irá ocupar</label>
                    <input type="number" id="vaga" name="vaga" min="1" max="5" required>
                    <input class="btn" type="submit" name="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
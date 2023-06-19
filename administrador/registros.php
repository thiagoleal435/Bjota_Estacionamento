<?php

session_start();

// TESTES PARA VALIDAR LOGIN DE ADMINISTRADOR OU ENCERRAR A SESSÃO //

if ($_SESSION['usuario'] <> "administrator@bjota.com" && $_SESSION['senha'] <> "AdmBj0t@") {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: ../index.php');
}
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

$sql = "SELECT * FROM historico_vagas";
$resultado = $conexao->query($sql);
//print_r($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros | Bjota Estacionamento</title>
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
                    <li><a href="home_adm.php">Voltar</a></li>
                </ul>
            </li>
            <div class="dp-menu-sair">
                <form method="POST" action="home_adm.php"><input class="btn-sair" type="submit" name="encerrar"
                        value="Sair"></form>
            </div>
        </ul>
    </nav>

    <div class="container">

        <h2>Registros</h2>

        <div class="table-select">
            <table class="table-cadastros">
                <thead>
                    <tr>
                        <th scope="col">ID de Registro</th>
                        <th scope="col">Vaga</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora_inicial</th>
                        <th scope="col">Hora_final</th>
                        <th scope="col">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dadosTabela = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $dadosTabela['ID_registro'] . "</td>";
                        echo "<td>" . $dadosTabela['Vaga'] . "</td>";
                        echo "<td>" . $dadosTabela['Data'] . "</td>";
                        echo "<td>" . $dadosTabela['Hora_inicial'] . "</td>";
                        echo "<td>" . $dadosTabela['Hora_final'] . "<a href='editar_registro_adm.php?Cliente=$dadosTabela[Cliente]'>
                        <img src='../img/icone_editar.png' height='20px' width='30px'>
                        </a>" . '</td>';
                        echo "<td>" . $dadosTabela['Cliente'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
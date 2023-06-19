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
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="icon" href="../img/cats.png">
    <title>Home Administrador | Bjota Estacionamento</title>
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
            </li>
            <div class="dp-menu-sair">
                <form method="POST" action="home_adm.php"><input class="btn-sair" type="submit" name="encerrar"
                        value="Sair"></form>
            </div>
        </ul>
    </nav>

    <div class="container">
        <div class="container-interno">
            <div class="card1">
                <img src="../img/home_administrador.gif" alt="estacionamento">

                <?php
                print_r($_SESSION['usuario']);
                ?>

            </div>

            <div class="botoes-container">
                <form class="card" method="POST" action="preencher_vaga.php">
                    <input class="btn" type="submit" name="submit" value="Preencher vagas">
                </form><br>

                <form class="card" method="POST" action="gerencia_cadastro.php">
                    <input class="btn" type="submit" name="submit" value="Gerenciar cadastros">
                </form><br>
                <form class="card" method="POST" action="registros.php">
                    <input class="btn" type="submit" name="submit" value="Registros">
                </form><br>

                <form class="card" method="POST" action="arquivo_relatorio.php">
                    <input class="btn" type="submit" name="submit" value="Relatorio.pdf">
                </form><br>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
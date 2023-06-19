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

$sql = "SELECT * FROM cadastro ORDER BY ID ASC";
$resultado = $conexao->query($sql);
//print_r($resultado);

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
    <title>Gerenciar Cadastros | Bjota Estacionamento</title>
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
            </li>
            <li><a href="#"><img src="../img/icone_menu_2.png" alt="icone logo" title="icone logo" width="25px"
                        height="25px"></a>
                <ul>
                    <li><a href="home_adm.php">Voltar</a></li>
                </ul>
            </li>
            <div class="dp-menu-sair">
                <form method="POST" action="home_adm.php">
                    <input class="btn-sair" type="submit" name="encerrar" value="Sair">
                </form>
            </div>
        </ul>
    </nav>

    <div class="container">
        <div class="table-select">
            <table class="table-cadastros">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Veiculo</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dadosTabela = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $dadosTabela['ID'] . "</td>";
                        echo "<td>" . $dadosTabela['Nome'] . "</td>";
                        echo "<td>" . $dadosTabela['CPF'] . "</td>";
                        echo "<td>" . $dadosTabela['Usuario'] . "</td>";
                        echo "<td>" . $dadosTabela['Senha'] . "</td>";
                        echo "<td>" . $dadosTabela['Telefone'] . "</td>";
                        echo "<td>" . $dadosTabela['Veiculo'] . "</td>";
                        echo "<td>" . $dadosTabela['Placa'] . "</td>";
                        echo "<td>
                            <a href='editar_cadastro.php?ID=$dadosTabela[ID]'>
                            <img src='../img/icone_editar.png' height='40px' width='40px'>
                            </a>
                            </td>
                            <td>
                            <a href='deletar_cadastro.php?ID=$dadosTabela[ID]'>
                            <img src='../img/icone_deletar.png' height='40px' width='40px'></a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
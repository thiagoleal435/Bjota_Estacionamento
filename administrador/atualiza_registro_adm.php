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

if (isset($_POST['submit'])) {

    $idRegistro = $_POST['idregistro'];
    $horaFinal = $_POST['horaFinal'];
    $vaga = $_POST['vaga'];

    $sqlUpdateHistorico = "UPDATE historico_vagas SET Hora_final='$horaFinal' WHERE ID_registro='$idRegistro'";
    $resultadoHistorico = $conexao->query($sqlUpdateHistorico);
    //print_r($resultadoHistorico);

    $sqlUpdateVagas = "UPDATE vagas SET Estado='D', Cliente='' WHERE Num_vaga='$vaga'";
    $resultado = $conexao->query($sqlUpdateVagas);
    //print_r($resultado);

    header('Location: registros.php');
}

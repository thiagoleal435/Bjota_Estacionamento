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

if (isset($_POST['submit'])) {

    $cliente = $_SESSION['usuario'];
    $estado = 'O';
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $vaga = $_POST['vaga'];

    $sqlUpdateVagas = "UPDATE vagas SET Estado='$estado', Cliente='$cliente' WHERE Num_vaga='$vaga'";
    $resultado = $conexao->query($sqlUpdateVagas);
    //print_r($resultado);

    $sqlInsertHistoricoVagas = mysqli_query($conexao, "INSERT INTO historico_vagas(Vaga,Data,Hora_inicial,Cliente) 
VALUES('$vaga','$data','$hora','$cliente')");

    header('Location: home_cliente.php');
}

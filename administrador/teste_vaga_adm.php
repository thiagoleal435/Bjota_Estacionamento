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

$estado = "O";
$vaga = $_POST['vaga'];
$data = $_POST['data'];
$horaInicial = $_POST['hora'];
$cpfCliente = $_POST['cpfcliente'];

$sqlSelectCliente = "SELECT Usuario FROM cadastro WHERE CPF='$cpfCliente'";
$resultado = $conexao->query($sqlSelectCliente);

while ($dadoTabela = mysqli_fetch_assoc($resultado)) {
    $cliente = $dadoTabela['Usuario'];
}

$sqlUpdateVagas = "UPDATE vagas SET Estado='$estado', Cliente='$cliente' WHERE Num_vaga='$vaga'";
$resultado = $conexao->query($sqlUpdateVagas);
//print_r($resultado);

$sqlInsertHistoricoVagas = mysqli_query($conexao, "INSERT INTO historico_vagas(Vaga,Data,Hora_inicial,Cliente) 
VALUES('$vaga','$data','$horaInicial','$cliente')");

header('Location: home_adm.php');

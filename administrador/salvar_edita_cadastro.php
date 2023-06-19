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

include('../conecta_banco.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $veiculo = $_POST['veiculo'];
    $placa = $_POST['placa'];

    $sqlUpdate = "UPDATE cadastro SET Nome='$nome', CPF='$cpf', Usuario='$usuario', 
    Senha='$senha', Telefone='$telefone', Veiculo='$veiculo', Placa='$placa' WHERE ID='$id'";

    $resultado = $conexao->query($sqlUpdate);
}

header('Location: gerencia_cadastro.php');

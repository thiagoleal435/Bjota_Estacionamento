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

$logado = $_SESSION['usuario'];
//print_r($logado);

$sqlSelect = "SELECT * FROM cadastro WHERE Usuario='$logado'";
$resultado = $conexao->query($sqlSelect);
//print_r($resultado);

if (isset($_POST['update'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $veiculo = $_POST['veiculo'];
    $placa = $_POST['placa'];

    $sqlUpdate = "UPDATE cadastro SET Nome='$nome', CPF='$cpf', Usuario='$usuario', 
    Senha='$senha', Telefone='$telefone', Veiculo='$veiculo', Placa='$placa' WHERE Usuario='$logado'";

    $resultado = $conexao->query($sqlUpdate);
}

$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
header('Location: home_cliente.php');

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

$sqlSelect = "SELECT * FROM cadastro WHERE Usuario='$_SESSION[usuario]'";
$resultado = $conexao->query($sqlSelect);
print_r($resultado);

$sqlDelete = "DELETE FROM cadastro WHERE Usuario='$_SESSION[usuario]'";
$resultado = $conexao->query($sqlDelete);
print_r($resultado);

unset($_SESSION['usuario']);
unset($_SESSION['senha']);
header('Location: index.php');

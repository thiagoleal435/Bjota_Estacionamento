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

if (!empty($_GET['ID'])) {

    $id = $_GET['ID'];

    $sqlSelect = "SELECT * FROM cadastro WHERE ID=$id";
    $resultado = $conexao->query($sqlSelect);
    //print_r($resultado);

    $sqlDelete = "DELETE FROM cadastro WHERE ID=$id";
    $resultado = $conexao->query($sqlDelete);
    //print_r($resultado);
}

header('Location: gerencia_cadastro.php');

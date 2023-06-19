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

$hoje = date('Y-m-d');

$sqlRegistros = "SELECT * FROM historico_vagas WHERE Hora_final > '0' AND Data = '$hoje' ORDER BY Data ASC;";
$resultado = $conexao->query($sqlRegistros);
//print_r($resultado);

$arquivo = fopen("../documentos/RegistrosDeVagas_Bjota_Data_" . $hoje . ".txt", "w");
$escreve = fwrite($arquivo, "Registros de vagas - Bjota Estacionamento - Data : " . $hoje . "\r\n\r\n\r\n");

while ($dadosRegistro = mysqli_fetch_assoc($resultado)) {
    $escreve = fwrite($arquivo, "ID_Registro:" . $dadosRegistro['ID_registro'] . " | ");
    $escreve = fwrite($arquivo, "Vaga:" . $dadosRegistro['Vaga'] . " | ");
    $escreve = fwrite($arquivo, "Data:" . $dadosRegistro['Data'] . " | ");
    $escreve = fwrite($arquivo, "Hora de Entrada:" . $dadosRegistro['Hora_inicial'] . " | ");
    $escreve = fwrite($arquivo, "Hora de Saída:" . $dadosRegistro['Hora_final'] . " | ");
    $escreve = fwrite($arquivo, "Cliente:" . $dadosRegistro['Cliente'] . "\r\n");
    $escreve = fwrite($arquivo, "______________________________________________________________________________________________________\r\n\r\n");
}

fclose($arquivo);

header('Location: home_adm.php');

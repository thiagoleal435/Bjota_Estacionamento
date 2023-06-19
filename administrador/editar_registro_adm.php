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

$cliente = $_GET['Cliente'];

$sqlSelect = "SELECT * FROM historico_vagas WHERE Cliente='$cliente'";
$resultado = $conexao->query($sqlSelect);
//print_r($resultado);

$sqlSelectCPF = "SELECT CPF FROM cadastro WHERE Usuario='$cliente'";
$resultadoCPF = $conexao->query($sqlSelectCPF);
//print_r($resultadoCPF);

while ($dadoTabela = mysqli_fetch_assoc($resultadoCPF)) {
    $cpf = $dadoTabela['CPF'];
}

if ($resultado->num_rows > 0) {
    while ($dadosTabela = mysqli_fetch_assoc($resultado)) {
        $idRegistro = $dadosTabela['ID_registro'];
        $vaga = $dadosTabela['Vaga'];
        $data = $dadosTabela['Data'];
        $horaInicial = $dadosTabela['Hora_inicial'];
        $cliente = $dadosTabela['Cliente'];
    }
} else {
    header('Location: home_adm.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro de Vaga | BJota Estacionamento</title>
    <link rel="icon" href="../img/cats.png">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
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
            <li><a href="#"><img src="../img/icone_menu_2.png" alt="icon logo" title="icon logo" width="25px" height="25px"></a>
                <ul>
                    <li><a href="home_adm.php">Voltar</a></li>
                </ul>
            </li>
            <div class="dp-menu-sair">
                <form method="POST" action="home_adm.php"><input class="btn-sair" type="submit" name="encerrar" value="Sair"></form>
            </div>
        </ul>
    </nav>

        <h1>Editar Registro de Vaga do Clientes:</h1>

        <?php
        echo '<h2>' . $cliente . '</h2>';
        ?>

    <form class="card" method="POST" action="atualiza_registro_adm.php">
        <div class="tr">
            <label for="vaga">Vaga Ocupada</label>
            <input type="number" id="vaga" name="vaga" placeholder="Vaga" value="<?php echo $vaga; ?>" required>
            <label for="cpfcliente">CPF do cliente</label>
            <input type="number" id="cpfcliente" name="cpfcliente" placeholder="CPF" value="<?php echo $cpf; ?>" max="99999999999" required>
            <label for="data">Data Escolhida</label>
            <input type="date" id="data" name="data" placeholder="data" value="<?php echo $data; ?>" required>
            <label for="hora">Horario Inicial</label>
            <input type="time" id="hora" name="horaInicial" placeholder="hora" value="<?php echo $horaInicial; ?>" min="06:00" max="22:00" required>
            <label for="hora">Horario Final</label>
            <input type="time" id="hora" name="horaFinal" placeholder="hora" max="22:00" required>
            <input type="hidden" name="idregistro" id="idregistro" value="<?php echo $idRegistro; ?>">
            <input class="btn" type="submit" name="submit" value="Enviar">
        </div>
    </form>
    
    <div>
        <img src="../img/agenda.gif" alt="BJota Estacionamento">
    </div>

</body>

</html>
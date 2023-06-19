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

    if ($resultado->num_rows > 0) {
        while ($dadosTabela = mysqli_fetch_assoc($resultado)) {
            $nome = $dadosTabela['Nome'];
            $cpf = $dadosTabela['CPF'];
            $usuario = $dadosTabela['Usuario'];
            $senha = $dadosTabela['Senha'];
            $telefone = $dadosTabela['Telefone'];
            $veiculo = $dadosTabela['Veiculo'];
            $placa = $dadosTabela['Placa'];
        }
    }
} else {
    header('Location: gerencia_cadastro.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro | BJota Estacionamento</title>
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
            </li>
            <li><a href="#"><img src="../img/icone_menu_3.png" alt="icone casa" title="icone casa" width="25px" height="25px"></a>
                <ul>
                    <li><a href="gerencia_cadastro.php">Voltar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <center>
        <p>
        <h1>Editar Cadastro</h1>
        </p>
        <?php
        print_r('<h2>' . $usuario . '</h2>');
        ?>
    </center>
    <form class="card" method="POST" action="salvar_edita_cadastro.php">
        <div class="tr">
            <label for="nome">Nome</label><br>
            <input type="text" id="nome" name="nome" placeholder="Nome" value="<?php echo $nome ?>" required><br>
            <label for="CPF">CPF</label><br>
            <input type="number" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $cpf ?>" required><br>
            <label for="Usuario">Usuário</label><br>
            <input type="email" id="usuario" name="usuario" placeholder="E-mail" value="<?php echo $usuario ?>" required><br>
            <label for="Senha">Senha</label><br>
            <input type="text" id="senha" name="senha" placeholder="Senha" value="<?php echo $senha ?>" required><br>
            <label for="Telefone">Telefone</label><br>
            <input type="number" id="telefone" name="telefone" placeholder="DDD+Numero" value="<?php echo $telefone ?>" required><br>

            <p class="p">Tipo de Veiculo</p>

            <input type="radio" id="carro" name="veiculo" value="Carro" <?php echo ($veiculo == 'Carro') ? 'checked' : '' ?> required>
            <label for="carro">Carro</label><br>
            <input type="radio" id="moto" name="veiculo" value="Moto" <?php echo ($veiculo == 'Moto') ? 'checked' : '' ?> required>
            <label for="motoo">Moto</label><br>
            <label for="placa">Placa do Veiculo</label><br>
            <input type="text" id="placa" name="placa" placeholder="Placa" value="<?php echo $placa ?>" required><br>
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input class="btn" type="submit" name="update" id="update" value="Enviar">

    </form>

</body>

</html>
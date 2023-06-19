<?php

if (isset($_POST['submit'])) {

    //TESTES BASICOS//

    /*print_r('Nome: ' . $_POST['nome']);
    echo '<br>';
    print_r('CPF: ' . $_POST['cpf']);
    echo '<br>';
    print_r('Usuario: ' . $_POST['usuario']);
    echo '<br>';
    print_r('Senha: ' . $_POST['senha']);
    echo '<br>';
    print_r('Telefone: ' . $_POST['telefone']);
    echo '<br>';
    print_r('Veiculo: ' . $_POST['veiculo']);
    echo '<br>';
    print_r('Placa: ' . $_POST['placa']);
    echo '<br>';*/

    include_once('conecta_banco.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $veiculo = $_POST['veiculo'];
    $placa = $_POST['placa'];

    $resultado = mysqli_query($conexao, "INSERT INTO cadastro(Nome,CPF,Usuario,Senha,Telefone,Veiculo,Placa) 
    VALUES('$nome','$cpf','$usuario','$senha','$telefone','$veiculo','$placa')");

    header('Location: index.php');
}

// TRATANTO ERROS //

/*if ($resultado) {
    print "<h1>Os dados foram adicionados com sucesso!</h1>";
} else {
    print "<h1>Houve um erro ao adicionar os dados a tabela!</h1>";
}*/

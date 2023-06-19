<?php

$host = 'localhost';
$username = 'root';
$password = '';
$nameDataBase = 'banco_estacionamento';
$conexao = new mysqli($host, $username, $password, $nameDataBase);

// TRATANDO ERROS //

/*if ($conexao->connect_errno) {
    echo "Erro";
} else {
    echo "Conexão Efetuada com sucesso!";
}*/

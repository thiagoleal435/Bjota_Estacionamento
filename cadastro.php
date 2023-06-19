<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Cadastro | BJota Estacionamento</title>
    <link rel="icon" href="/img/cats.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <nav class="dp-menu">
        <ul>
            <li><a href="#"><img src="img/icone_menu.png" alt="menu" title="menu" width="25px" height="25px"></a>
                <ul>
                    <li><a href="documentos/BjotEstacionamentoManual.pdf" download="">Manual</a></li>
                    <li><a href="menu_paginas/sobre.html">Sobre</a></li>
                    <li><a href="#p1">Contatos</a></li>
                </ul>
            </li>
            <li><a href="index.php"><img src="img/icone_menu_3.png" alt="icone casa" title="icone casa" width="25px"
                        height="25px"></a>
                <ul>
                    <li><a href="index.php">Voltar</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h2 class="titulo-cadastro">Cadastro Bjota</h2>

        <form class="card" method="POST" action="faz_cadastro.php">
            <div class="tr">
                <label for="nome">Nome</label>
                <input type="text" id="Nome" name="nome" placeholder="Nome" required>
                <label for="CPF">CPF</label>
                <input type="number" id="CPF" name="cpf" placeholder="CPF" required>
                <label for="Usuario">Usuário</label>
                <input type="email" id="Usuario" name="usuario" placeholder="E-mail" required>
                <label for="Senha">Senha</label>
                <input type="password" id="Senha" name="senha" placeholder="Senha" required>
                <label for="Telefone">Telefone</label>
                <input type="number" id="Telefone" name="telefone" placeholder="DDD+Numero" required>

                <h3 class="tipo-veiculo">Tipo de Veiculo</h3>
                <div class="tr-veiculo">
                    <input type="radio" id="Carro" name="veiculo" value="Carro" required>
                    <label for="carro">Carro</label>
                    <input type="radio" id="Moto" name="veiculo" value="Moto" required>
                    <label for="motoo">Moto</label>
                </div>

                <label for="placa">Placa do Veiculo</label>
                <input type="text" id="Placa" name="placa" placeholder="Placa" required>
            </div>

            <input class="btn" type="submit" name="submit" value="Enviar" required>

        </form>
    </div>
</body>

</html>
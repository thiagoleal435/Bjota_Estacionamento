<?php
session_start();

// VARIAVEIS DE LOGIN DO ADMINISTRADOR 

$usuarioADM = "administrator@bjota.com";
$senhaADM = "AdmBj0t@";

// RECEBENDO DADOS DE LOGIN 

if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // TESTANDO LOGIN DO ADMINISTRADOR 

    if (($usuario == $usuarioADM) && ($senha == $senhaADM)) {
        $_SESSION['usuario'] = $usuarioADM;
        $_SESSION['senha'] = $senhaADM;
        header('Location: administrador/home_adm.php');
    } else {

        // TESTANDO LOGIN DO CLIENTE //

        $testeconexão = include_once('conecta_banco.php');

        $sql = "SELECT * FROM cadastro WHERE Usuario = '$usuario' and Senha = '$senha'";
        $resultado = $conexao->query($sql);

        if (mysqli_num_rows($resultado) == 1) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: cliente/home_cliente.php');
        }

        // NÃO HOUVE LOGIN VÁLIDO 

        else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        }
    }
}

/* 
    //TENTIVA POR USO DE CLASSES E METODOS...

class manipulaLogin
{
    public function testaLogin()
    {
        if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {

            $usuarioADM = "administrator@bjota.com";
            $senhaADM = "AdmBj0t@";
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
        }

        // TESTA SE O LOGIN É CLIENTE //

        include_once('conecta_banco.php');

        $sql = "SELECT * FROM cadastro WHERE Usuario = '$usuario' and Senha = '$senha'";
        $resultado = $conexao->query($sql);

        if (mysqli_num_rows($resultado) == 1) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: home_cliente.php');
        }

        //TESTA SE O LOGIN É ADM //

        if (($_SESSION['usuario'] == $$usuarioADM) && ($_SESSION['senha'] == $$senhaADM)) {
            $_SESSION['usuario'] = $$usuarioADM;
            $_SESSION['senha'] = $$senhaADM;
            header('Location: home_adm.php');
        }

        // SE NAO HOUVE LOGIN VÁLIDO //

        else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        }
    }

    public function testaSessaoCliente()
    {
        if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        }
    }

    public function testaSessaoAdm()
    {
        if ($_SESSION['usuario'] <> "administrator@bjota.com" && $_SESSION['senha'] <> "AdmBj0t@") {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        }
    }

    public function apertouBotaoSair()
    {
        if (isset($_POST['encerrar'])) {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        }
    }
}
*/

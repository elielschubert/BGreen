<?php
    include_once("../database/conexao.php");

    $nome_empresa = $_POST["nome_empresa"];
    $nome_de_usuario_empresa = $_POST["nome_de_usuario_empresa"];
    $cnpj_empresa = $_POST["cnpj_empresa"];
    $email_empresa = $_POST["email_empresa"];
    $senha_empresa = MD5($_POST["senha_empresa"]);
    $senha_confirmacao_empresa = MD5($_POST["senha_confirmacao_empresa"]);

    $sql = $conn -> prepare("INSERT INTO empresa (nome_empresa, nome_de_usuario_empresa, cnpj_empresa, email_empresa, senha_empresa) value (?, ?, ?, ?, ?)");

    //verifica se a senha e a confirmação coincidem
    if($senha_empresa === $senha_confirmacao_empresa){
        $sql -> execute([$nome_empresa, $nome_de_usuario_empresa, $cnpj_empresa, $email_empresa, $senha_empresa]);
        echo '<div class="paragraph"> Empresa cadastrada com sucesso! </div>';
        //colocar um timer
        header("location: ../login-page/login-page.html");
    } else {
        echo '<div class="paragraph"> As senhas não coincidem! </div>';
        //estilizar errinho >.<
        //colocar um timer
        header("location: ../register-page/register-page.php");
    }

    unset($sql);
    unset($conn);
?>
<?php
    include_once("conexao.php");

    $nome_voluntario = $_POST["nome_voluntario"];
    $nome_de_usuario_voluntario = $_POST["nome_de_usuario_voluntario"];
    $email_voluntario = $_POST["email_voluntario"];
    $senha_voluntario = MD5($_POST["senha_voluntario"]);
    $senha_confirmacao = MD5($_POST["senha_confirmacao"]);

    $sql = $conn -> prepare("INSERT INTO voluntario (nome_voluntario, nome_de_usuario_voluntario, email_voluntario, senha_voluntario, senha_confirmacao) value (?, ?, ?, ?, ?)");

    if($senha_voluntario === $senha_confirmacao){
        $sql -> execute([$nome_voluntario, $nome_de_usuario_voluntario, $email_voluntario, $senha_voluntario]);
    } else {
        $this->setErro("As senhas não coincidem!");
    }

    unset($sql);
    unset($conn);

    header("location: ../register-page/register.php");
?>
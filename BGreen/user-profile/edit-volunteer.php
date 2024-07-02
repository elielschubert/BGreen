<?php
    include_once('../database/conexao.php');
    include_once('show-user-data.php');

    $nome_voluntario = $voluntario["nome_voluntario"];
    $nome_de_usuario_voluntario = $voluntario["nome_de_usuario_voluntario"];
    $email_voluntario = $voluntario["email_voluntario"];
    $senha_voluntario = $voluntario["senha_voluntario"];
    $id_voluntario = $_GET["voluntario"];

    $sql = $conn->prepare("UPDATE voluntario SET nome_voluntario = ?, nome_de_usuario_voluntario = ?, email_usuario = ?, senha_usuario = ? WHERE id_voluntario = ?;");
    $sql -> execute([$nome_voluntario, $nome_de_usuario_voluntario, $email_voluntario, $senha_voluntario, $id_voluntario]);

    unset($sql);
    unset($conn);

    // echo '<p> Alterações salvas com sucesso! <p>';
    // header("location: ../user-profile/user-profile.php");
?>
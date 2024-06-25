<?php
    include_once("conexao.php");

    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $sql = $conn -> prepare("SELECT pk_usuario, email_usuario, senha_usuario, eh_adm_usuario FROM usuario WHERE email_usuario = ?");

    $sql -> execute([$email]);

    if($sql-> rowCount() == 1){
        $usuario = $sql -> fetch();
        if ($usuario['senha_usuario'] = MD5($senha)){
            session_start();
            $_SESSION['loggedin'] = true;

            header("location:pagina-inicial.php");
        
        }else{
            echo("E-mail ou senha inválidos");
        }
    }
    
    else{
        echo("E-mail ou senha inválidos");
    }

    unset($sql);
    unset($conn);
?>
<?php
    date_default_timezone_set('America/Sao_Paulo');
    try{
        $conn = new PDO("mysql:dbname=bgreenproject;host=localhost;charset=utf8","root","root");
    }
    catch(PDOException $erro)
    {
        echo("ERRO NA CONEXÃO: <br>".$erro->getMessage());
    }
?>
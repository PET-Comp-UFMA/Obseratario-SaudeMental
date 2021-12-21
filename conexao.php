<?php

    $hostname="observatoriodesaudemental.com.br";
    $bd="bd_placeholder";
    $usuario="user_placeholder";
    $senha="pass_placeholder";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bd);

    if($mysqli->connect_errno){
        echo "falha ao conectar ao banco";   
    }

?>
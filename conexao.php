<?php
$hostname="localhost";
$bd="obser";
$usuario="root2";
$senha="";

$mysqli = new mysqli($hostname, $usuario, $senha, $bd);

if($mysqli->connect_errno){
    echo "falha ao conectar ao banco";
    
}


?>
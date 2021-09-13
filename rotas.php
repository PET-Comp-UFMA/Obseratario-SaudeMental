<?php
$rota = $_GET['url'] ?? '';

if(file_exists("{$rota}.php")){
    include "{$rota}.php";
}

?>
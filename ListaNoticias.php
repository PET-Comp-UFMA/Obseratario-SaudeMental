<!DOCTYPE html>
<?php
    require_once('conexao.php');
    require_once('scripts.php/utils.php');
    
    if(isset($_GET['Noticia'])){
      $pesquisa = $_GET['Noticia'];
    }else{
      $pesquisa = null;
    }
    
?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>
  
  <link rel="icon" href="./assets/images/logo-observatorio-sem-texto.png">

  <link rel="stylesheet" href="./styles/noticias.css">
  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/noticia_especifica.css">


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet">
  
  <meta property="og:title" content="<?php echo $pesquisa ?>">
  <meta property="og:type" content="article">
  <meta property="og:image" content="http://observatoriodesaudemental.com.br/assets/images/photo-5.jpg">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="500">
  <meta property="og:image:height" content="500"> 
  <meta property="og:site_name" content="Observatório de Saúde Mental">

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo $pesquisa ?>" />
   <meta name="twitter:description" content="Trabalho publicado no Observatório de Saúde Mental." />
  <meta name="twitter:site" content="@OBSERVATRIODES1" />
  <meta name="twitter:image" content="http://observatoriodesaudemental.com.br/assets/images/photo-5.jpg" />
  <meta name="twitter:creator" content="@OBSERVATRIODES1" />
  
  
</head>

<body>
  
  <?php 
    include('header.php');

      if(!isset($_GET['Noticia'])){
        include('noticias.php');
      }else{
        include('noticia.php');
      }

  ?>
    
    
  
  <?php 
    include('footer.php');
  ?>
</body>
<script src="./scripts/dropdown.js"></script>
</html>
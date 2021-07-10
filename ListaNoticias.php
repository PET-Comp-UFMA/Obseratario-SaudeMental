  <?php
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>
  
  <link rel="icon" href="./assets/images/LogoObservatorio2.png">

  <link rel="stylesheet" href="./styles/noticias.css">
  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/noticia_especifica.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  
  <?php 
    include('header.php');
  ?>

  <?php 
      if(!isset($_GET['Noticia'])){
        include('noticias.php');
      }else{
        include('noticia.php');
      }

  ?>
    
    <div class="line-gray"></div>
  </section>
  
  <?php 
    include('footer.php');
  ?>
</body>
<script src="./scripts/script.js"></script>
</html>
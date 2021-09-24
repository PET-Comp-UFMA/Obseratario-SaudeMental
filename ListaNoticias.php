<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>
  
  <link rel="icon" href="./assets/images/LogoObservatorio2.png">

  <link rel="stylesheet" href="./styles/noticias.css">
  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/noticia_especifica.css">


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet">
  
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
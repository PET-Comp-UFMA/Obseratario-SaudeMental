<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>
  
  <link rel="icon" href="./assets/images/LogoObservatorio2.png">

  <link rel="stylesheet" href="./styles/contato.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet">

</head>
<body class="dark-mode">
  
  <?php
    include('header.php');
  ?>

  <?php
    if(!isset($_POST['nome']) or !isset($_POST['email']) or !isset($_POST['mensagem']) or !isset($_POST['phone'])){
      //Se não tiver enviado email exiba a tela de form de contato
      ?>
      <main class="fade">
       <div class="section-header">
        <h2>contato</h2>
      </div>
      <?php
      include('formContato.php');
    }else{
      //Se tiver envia o email;
      ?>
      <main class="fade">
       <div class="section-header">
        <h2>contato</h2>
      </div>
      <?php

      include('email.php'); 
      include('formContato.php');

    }

  ?>
  
  <?php
    include('footer.php');
  ?>
  
  
  <script src="./scripts/dropdown.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script type="text/javascript">
    $("#phone").mask("(00) 0000-00009");
  </script>
</body>
</html>
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

  <link rel="stylesheet" href="./styles/home.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <?php 
    include('header.php');
  ?>

  <main class="fade">

    <section id="slider">
      <ul class="slider-content">
        <li class="slider-item fade">
          <div class="texto-banner" style="background: url(./assets/images/photo-10.jpg); 
          background-size: 100% 100%, cover">
            <div class="intro-noticia">
              <h3>Observatório Saúde Mental e Políticas sobre Drogas</h3>
              <p>Captação de obras na área de saúde mental e políticas sobre drogas no município de Sobral-CE</p>
              <a href="./sobre.php">Conheça</a>
            </div>
          </div>
        </li>
          <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM noticias ORDER BY `idNoticia` desc LIMIT 3";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<3; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>
        <!-- INICIO -->
        <li class="slider-item fade">
          <div class="texto-banner" style="background-image: url(./assets/noticias/<?php print_r(utf8_encode($row['Foto'])) ?>);background-size: cover;">
            <div class="intro-noticia">
              <h3><?php print_r(utf8_encode($row['Titulo'])) ?></h3>
              <p><?php print_r(utf8_encode($row['Descricao'])) ?> </p>
              <a href="./ListaNoticias.php?Noticia=<?php print_r(utf8_encode($row['idNoticia'])) ?>">Ver mais</a>
            </div>
          </div>
        </li>
        <?php
          }
        }
        ?>
        <!-- FIM -->
        <button class="preview" onclick="plusSlides(-1)">
          <span class="material-icons">
            navigate_before
          </span>
        </button>
        <button class="next" onclick="plusSlides(1)">
          <span class="material-icons">
            navigate_next
          </span>
        </button>
      </ul>
      <div class="dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
      </div>
    </section>

    <section id="sobre">
      <div class="resumo-dexters">
        <div class="images">
          <figure class="gallery__item gallery__item--1">
            <img src="./assets/images/photo-8.jpg" alt="Gallery image 1" class="gallery__img">
          </figure>
          <figure class="gallery__item gallery__item--2">
            <img src="./assets/images/photo-7.jpg" alt="Gallery image 2" class="gallery__img">
          </figure>
          <figure class="gallery__item gallery__item--3">
            <img src="./assets/images/photo-9.jpg" alt="Gallery image 3" class="gallery__img">
          </figure>
          <figure class="gallery__item gallery__item--4">
            <img src="./assets/images/photo-5.jpg" alt="Gallery image 4" class="gallery__img">
        </div>
        <div class="text-dexters">
          <h1>Conheça o <mark class="highlight">Observatório</mark></h1>
          <p>O Observatório de Saúde Mental e Políticas sobre Drogas é uma iniciativa do Grupo de Estudo e Pesquisa Saúde Mental e Cuidado (GESAM), da Universidade Estadual Vale do Acaraú (UVA), em parceria com a Secretaria de Saúde de Sobral-CE, por meio da Coordenadoria de Políticas sobre Drogas. A nossa missão é o acompanhamento estratégico/científico destas temáticas; aperfeiçoamento e difusão de informações nessas áreas assim como fortalecimento do campo da atenção psicossocial. Ressalta-se ainda que sua criação e institucionalização acontece sem fins lucrativos.
          </p>
          <a href="./sobre.php">Veja Mais ></a>
        </div>
      </div>
    </section>
  </main>

  <?php 
    include('footer.php');
  ?>

  <script src="./scripts/script.js"></script>
</body>
</html>
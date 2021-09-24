<?php
    require_once('conexao.php');   
    require_once('scripts.php/utils.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>

  <link rel="icon" href="./assets/images/LogoObservatorio2.png">
  
  <link rel="stylesheet" href="./styles/trabalhos_publicados.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet">
  
</head>
<body>
  <?php
    include('header.php');
  ?>
  <main>
    <div class="section-header"> <!-- para mudar a cor é so acessar essa classe em style.css -->
      <h2>Trabalhos Publicados</h2>
    </div>

    <section class="container">
    	<h2>Buscar por: </h2>
    <form action="busca.php" class="filtro" method="GET">
      <div class="publication">
        <label for="publication">Título</label>
        <input name="publication" type="text" placeholder="Digite o título">
      </div>
      <div class="author">
        <label for="author">Autor</label>
        <input name="author" type="text" placeholder="Digite o nome do autor">
      </div>
      <div class="keyword">
        <label for="keyword">Palavra-chave</label>
        <input name="keyword" type="text" placeholder="Digite uma palavra chave">
      </div>
      <div class="type">
        <label for="type">Tipo</label>
        <select name="type" id="Artigo">
          <option value="Tipo" selected disabled>Tipo</option>
          <option value="Artigo">Artigo</option>
          <option value="TCC Graduação">TCC Graduação</option>
          <option value="TCC Especialização">TCC Especialização</option>
          <option value="Dissertação Mestrado">Dissertação Mestrado</option>
          <option value="Tese Doutorado">Tese Doutorado</option>
          <option value="Livro">Livro</option>
          <option value="Capítulo de Livro">Capítulo de Livro</option>
          <option value="Produção Técnica">Produção Técnica</option>
          <option value="Documentos Institucionais">Documentos Institucionais</option>
        </select>
      </div>
      <div class="search">
        <label for="search-button">Buscar</label>
        <button name="search-button" class="search-button">
          <span class="material-icons">
            search
          </span>
        </button>
      </div>
    </form>
      <!-- START  -->
      
    <section id="paginate">
    <div class="line-purple"></div>
    <ul class="list" style="list-style: none;">  <!-- lista com cada li e cada li tem a box dentro-->
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM trabalhos_publicados ORDER BY Data DESC";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>

        <!-- inicio -->
      <li class="item">
      <div class="card">
        <div class="details">
          <div class="data-name">
                <!--  -->
            <h5 class="article-name">
            <?php print_r(utf8_encode($row['Titulo']))?>
            </h5>
            <div class="pub-type">
              <span class="span-pub-type">Tipo:</span>
            <span class="pub-type-cont"> <?php print_r(utf8_encode($row['Tipo']))?></span>
            </div>
          </div>
          <div class="share">
            <p class="type">Compartilhe</p>
            <div class="links ">
              <?php 
                $baseUrl = str_replace("trabalhos_publicados.php", "", url()); //removendo "trabalhos_publicados.php" do link de compartilhamento
                $url = $baseUrl."busca.php?publication=".urlencode(utf8_encode($row['Titulo']))."&author=". urlencode(utf8_encode($row['Autor']));
              ?>
              <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url?>" id="twitter-share-btt" rel="nofollow" target="_blank"><img src="./assets/svg/twitter_icon_copy.svg" alt=""></a>
              <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo $url?>"><img src="./assets/svg/facebook_icon_copy.svg" alt=""></a>
              <a target="_blank" href="whatsapp://send?text=<?php echo urlencode('Acesse: - '.$url)?>"><img src="./assets/svg/whatsapp.svg" alt=""></a> 
            </div>
          </div>
          <div class="authors">
            <p class="authors-names">Autores</p>
            <ul class="list-authors">
              <li class="item-author-name"><?php print_r(utf8_encode($row['Autor'])) ?></li>
            </ul>
          </div>
        </div>

        <div class="panel fade">
          <div class="resume">
            <p class="resume-title">Resumo</p>
            <p class="resume-text">
              <?php print_r(utf8_encode($row['Resumo']))?>
            </p>
          </div>
          <p class="tags-title">Palavras-chave</p>
          <div class="tags">
            <ul class="list-tags">
              <li class="item-tag"><?php print_r(utf8_encode($row['Palavras_Chave'])) ?></li>
            </ul>
          </div>	
        </div>
              
        <div class="card-bottom">
          <div class="buttons-container">
            <button class="button-show-more">
                Ver mais
                <span class="material-icons">
                  add
                </span>
              </button>
            <a href="./documents/<?php print_r(utf8_encode($row['Arquivo']))?>" download='<?php print_r(utf8_encode($row['Titulo'])) ?>' class="button-download">
              Download
              <span class="material-icons">
                file_download
              </span>
            </a>
          </div>
          <div class="container-data">
            <p class="data">Data de publicação: <span class="data-day"><?php print_r(utf8_encode($row['Data']))?></span></p>
          </div>
        </div>
        
        <!-- </div> -->
        
        <div class="line-gray"></div>
        <!-- fim -->
        <?php
        }
      ?>
        </ul>
      </section>

      <div class="pagination"> <!-- botões -->
        <div class="prev">
          <span class="material-icons">
            navigate_before
          </span>
        </div>
        <div class="numbers">
          <div>1</div>
          <div>2</div>
          <div>3</div>
        </div>
        <div" class="next">
          <span class="material-icons">
            navigate_next
          </span>
        </div>
      </div>
      <?php }else{ ?>
        <li class="item">
          <div class="resultados">
            <h2>Sem resultados!</h2>
          </div>
        </li>
        <?php } ?>
    </section>
  </main>
  <?php
    include('footer.php');
  ?>
  
  <script src="./scripts/dropdown.js"></script>
  <script src="./scripts/trab_publicados.js"></script>
  <script src="./scripts/pagination.js"></script>
  <script src="./scripts/tag_display.js"></script>
  <script src="./scripts/pagination.js"></script>

</body>
</html>
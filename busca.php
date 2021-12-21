<?php
    require_once('conexao.php');
    require_once('scripts.php/utils.php');
    
    if(isset($_GET['publication'])){
      $pesquisa = $_GET['publication'];
    }else{
      $pesquisa = null;
    }

    if(isset($_GET['author'])){
      $autor = $_GET['author'];
    }else{
      $autor = null;
    }

    if(isset($_GET['keyword'])){
      $palavra_chave = $_GET['keyword'];
    }else{
      $palavra_chave = null;
    }

    if(isset($_GET['type'])){
      $tipo = $_GET['type'];
    }else{
      $tipo = null;
    }

?>

<?php
    require_once('conexao.php');
    require_once('scripts.php/utils.php')
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
  
  <title>Observatório Saúde Mental</title>

  <link rel="icon" href="./assets/images/logo-observatorio-sem-texto.png">
  
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
    <div class="section-header"> 
      <h2>Trabalhos Publicados</h2>
    </div>
    
    <section class="container">
    	<h2>Buscar por: </h2>
    <form action="busca.php" class="filtro" method="<?php echo $_SERVER['PHP_SELF']?>"> 
      <div class="publication">
        <label for="publication">Título</label>
        <input name="publication" type="text" placeholder="Título..." value="<?php echo $pesquisa;?>">
      </div>
      <div class="author">
        <label for="author">Autor</label>
        <input name="author" type="text" placeholder="Autor..." value="<?php echo $autor;?>">
      </div>
      <div class="keyword">
        <label for="keyword">Palavra-chave</label>
        <input name="keyword" type="text" placeholder="Palavra-chave..." value="<?php echo $palavra_chave;?>">
      </div>
      <div class="type">
        <label for="type">Tipo</label>
        <select name="type" id="">
          <option value="Tipo" disabled>Tipo</option>
          <option value="Artigo" <?php if($tipo=="Artigo") echo "selected";?>>Artigo</option>
          <option value="TCC Graduação" <?php if($tipo=="TCC Graduação") echo "selected";?>>TCC Graduação</option>
          <option value="TCC Especialização" <?php if($tipo=="TCC Especialização") echo "selected";?>>TCC Especialização</option>
          <option value="Dissertação Mestrado" <?php if($tipo=="Dissertação Mestrado") echo "selected";?>>Dissertação Mestrado</option>
          <option value="Tese Doutorado" <?php if($tipo=="Tese Doutorado") echo "selected";?>>Tese Doutorado</option>
          <option value="Livro" <?php if($tipo=="Livro") echo "selected";?>>Livro</option>
          <option value="Capítulo de Livro" <?php if($tipo=="Capítulo de Livro") echo "selected";?>>Capítulo de Livro</option>
          <option value="Produção Técnica" <?php if($tipo=="Produção Técnica") echo "selected";?>>Produção Técnica</option>
          <option value="Documentos Institucionais" <?php if($tipo=="Documentos Institucionais") echo "selected";?>>Documentos Institucionais</option>
        </select>
      </div>
      <div class="search">
        <label for="search-button">Buscar</label>
        <button name="search-button" class="search-button"><img src="./assets/svg/search.svg" alt=""></button>
      </div>
    </form>
    
    <section id="paginate">
    <ul class="list" style="list-style: none;"> 
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM trabalhos_publicados WHERE Tipo LIKE '".strtr($tipo, $caracteres_sem_acento) ."%' and (Titulo LIKE '%". strtr($pesquisa, $caracteres_sem_acento) . "%') and Autor LIKE '%". strtr($autor, $caracteres_sem_acento) ."%' and  Palavras_Chave LIKE 
                      '%". strtr($palavra_chave, $caracteres_sem_acento)  ."%' ORDER BY Data DESC;";

            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>

      <li class="item">
      <div class="card">
        <div class="details">
          <div class="data-name">
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
                $baseUrl = url();
                $parametro = strtr(utf8_encode($row['Titulo']), $caracteres_sem_acento);
                $parametro = substr_replace($parametro ,'',-1);
                $parametro = urlencode((str_replace(" ", "+", $parametro)));
                $url =  $baseUrl."busca.php?publication=".$parametro;
              ?>
              <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url?>" id="twitter-share-btt" rel="nofollow" target="_blank"><img src="./assets/svg/twitter_icon_copy.svg" alt=""></a>



              <?php
                $urlFace = "https://www.facebook.com/sharer.php?u=".$url.urlencode(utf8_encode($row['Titulo']));
              ?>
              <a target="_blank" href="<?php echo $urlFace?>"><img src="./assets/svg/facebook_icon_copy.svg" alt=""></a>
              
              <a href="whatsapp://send?text=<?php echo 'Acesse: - '.$url?>"><img src="./assets/svg/whatsapp.svg" alt=""></a> 
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
        
        <div class="line-gray"></div>
      <?php
        }
      ?>
        </ul>
      </section> 

      <div class="pagination">
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
  <script src="./scripts/tag_display.js"></script>
  <script src="./scripts/pagination.js"></script>

</body>
</html>
<?php
    require_once('conexao.php');

    $caracteres_sem_acento = array(
    'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
    'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
    'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
    'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
    'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
    'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
    'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
    'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
	);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>

  <link rel="icon" href="./assets/images/LogoObservatorio2.png">
  
  <link rel="stylesheet" href="./styles/trabalhos_publicados.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <?php 
    include('header.php');
  ?>

<main>
    <div class="section-header"> <!-- para mudar a cor é so acessar essa clase em style.css -->
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
      <!-- START  -->
      
      <section id="paginate">
    <ul class="list" style="list-style: none;">  <!-- lista com cada li e cada li tem a box dentro-->
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM trabalhos_publicados WHERE Tipo LIKE '".strtr($tipo, $caracteres_sem_acento) ."%' and (Titulo LIKE '%". strtr($pesquisa, $caracteres_sem_acento) . "%' 
                      or Resumo LIKE '%". strtr($pesquisa, $caracteres_sem_acento) . "%') and Autor LIKE '%". strtr($autor, $caracteres_sem_acento) ."%' and  Palavras_Chave LIKE 
                      '%". strtr($palavra_chave, $caracteres_sem_acento)  ."%' ORDER BY Data DESC;";

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
            <p class="data"><?php print_r(utf8_encode($row['Data'])) ?></p>
            <h5 class="article-name">
            <?php print_r(utf8_encode($row['Titulo']))?>
            </h5>
          </div>
          <div class="share">
            <p class="type">Compartilhe <br> a publicação</p>
            <div class="links">
              <a href="https://twitter.com/intent/tweet?url=http://localhost:8080/Observatorio-SaudeMental/busca.php?publication=<?php echo urlencode(utf8_encode($row['Titulo'])) ?>&author=<?php echo urlencode(utf8_encode($row['Autor'])) ?>&keyword=&type=Artigo&search-button=&text=Publicado+no+Observatório+Virutual+de+Saúde+Mental"><img src="./assets/svg/twitter_icon_copy.svg" alt=""></a>
              <a href=""><img src="./assets/svg/facebook_icon_copy.svg" alt=""></a>
              <a href=""><img src="./assets/svg/instagram_icon_copy.svg" alt=""></a>
              <a href=""><img src="./assets/svg/whatsapp.svg" alt=""></a>  
              <a href=""><img src="./assets/svg/link_black_24dp.svg" alt=""></a>
            </div>
            <p class="authors-names"><?php print_r(utf8_encode($row['Tipo']))?></p>
              
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
        <div class="line-gray"></div>
        <!-- fim -->
      <?php
        }
      }else{
        ?>
        <li class="item">
        <div class="card">
          <div class="details">
            <div class="data-name">
              <p class="data">Nenhum item foi encontrado!</p>
            </div>
          </div>
        </div>
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
    </section>
  </main>

    
  <?php 
    include('footer.php');
  ?>
  <script src="./scripts/dropdown.js"></script>
  <script src="./scripts/trab_publicados.js"></script>
  <script src="./scripts/tag_display.js"></script>
  <script src="./scripts/pagination.js"></script>

  <script type="text/javascript">
   function cite(str) {
    // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
   alert('Citação copiada para área de transferêcia');
}
  </script>

</body>
</html>
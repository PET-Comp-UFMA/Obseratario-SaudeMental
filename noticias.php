 <?php
    require_once('conexao.php');
?>
<section class="container fade">
    <div class="section-header">
      <h2>Notícias</h2>
    </div>
    <div class="line-purple"></div>
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM noticias ORDER BY `idNoticia` DESC";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>


    <!-- INICIO --> 
    <div class="card">
      <img src="./assets/noticias/<?php print_r(utf8_encode($row['Foto']))?>" alt="" loading="lazy">
      <div class="details">
        <h1>Título: <?php print_r(utf8_encode($row['Titulo'])) ?></h1>
        <p>Description: <?php print_r(utf8_encode($row['Descricao'])) ?></p>
        <a href="?Noticia=<?php print_r(utf8_encode($row['idNoticia']))?>">Ver mais</a>
      </div>
    </div>
    <div class="line-gray"></div>
    <?php 
      }
    }	
    ?>
</section>

    <!-- FIM -->
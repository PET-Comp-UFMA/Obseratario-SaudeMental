 <?php
    require_once('conexao.php');
?>

<section class="container fade">
    <div class="section-header">
      <h2>Notícias</h2>
    </div>

    <section id="paginate">
      <ul class="list" style="list-style: none;">  <!-- lista com cada li e cada li tem a box dentro-->
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
        <li class="item">
        <div class="card">
          <img src="./assets/noticias/<?php print_r(utf8_encode($row['Foto']))?>" alt="" loading="lazy">
          <div class="details">
            <h1>Título: <?php print_r(utf8_encode($row['Titulo'])) ?></h1>
            <p>Description: <?php print_r(utf8_encode($row['Descricao'])) ?></p>
            <a href="<?php print_r(str_replace(' ', '+', utf8_encode($row['Titulo'])))?>-<?php print_r(utf8_encode($row['idNoticia'])) ?>">Ver mais</a>
          </div>
        </div>
        <div class="line-gray"></div>
        <?php 
          }	
        ?>
        </ul>
      </section> <!--END <section id="paginate">-->

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
</section> <!--END section class="container"-->


  <script src="./scripts/dropdown.js"></script>
  <script src="./scripts/pagination.js"></script>

        
    <!-- FIM -->
<?php
require_once('conexao.php');
if (!isset($_GET['idNoticia'])) {

  //No servidor usar essa:
  $URL = "http://observatoriodesaudemental.com.br/v2/Observatorio-SaudeMental/ListaNoticias.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  die();

  //No localhost usar essa:
  // header('Location: ListaNoticias.php');
  // die();
} else {

  $parametro = $_GET['idNoticia'];
  mysqli_select_db($mysqli, $bd) or die("Could not select database");
  $stmt = $mysqli->prepare("SELECT * FROM `noticias` WHERE `idNoticia` = ?");
  $stmt->bind_param('i', $parametro);
  $stmt->execute();
  $stmt->store_result();
  $num_of_rows = $stmt->num_rows;
  $stmt->bind_result($idNoticia, $Titulo, $Texto, $Descricao, $Foto);
  if ($stmt->fetch()) {

?>

    <main class="fade">
      <section class="container">
        <div class="noticia-especifica">
          <h1 class="titulo-noticia"><?php print_r(utf8_encode($Titulo)) ?></h1>
          <div class="image">
            <img src="./assets/noticias/<?php print_r($Foto) ?>" alt="" loading="lazy">
            <div class="share">
              <p class="type">Compartilhe</p>
              <div class="links">
                <a target="_blank" href="https://twitter.com/intent/tweet?url=" id="twitter-share-btt" rel="nofollow" target="_blank"><img src="./assets/svg/twitter_icon_copy.svg" alt=""></a>
                <a target="_blank" href="https://www.facebook.com/sharer.php?"><img src="./assets/svg/facebook_icon_copy.svg" alt=""></a>
                <a target="_blank" href="whatsapp://send?text=<?php echo urlencode('Acesse: - ') ?>"><img src="./assets/svg/whatsapp.svg" alt=""></a>

              </div>
            </div>
          </div>
          <?php print_r(utf8_encode($Texto)) ?>
          <div class="voltar">
            <a href="./ListaNoticias.php">
              <button class="button-back">
                Voltar
              </button></a>
          </div>
        </div>

      </section>
    </main>

<?php
  }
}
?>
<!-- 
<?php
$baseUrl = str_replace("trabalhos_publicados.php", "", url()); //removendo "trabalhos_publicados.php" do link de compartilhamento
$url = $baseUrl . "busca.php?publication=" . urlencode(utf8_encode($row['Titulo'])) . "&author=" . urlencode(utf8_encode($row['Autor']));
?>

<?php
$baseUrl = url();
$parametro = strtr(utf8_encode($row['Titulo']), $caracteres_sem_acento);
$parametro = substr_replace($parametro, '', -1); //removendo o ultimo ' ' que vem do bd e gera erro no link 
$parametro = urlencode((str_replace(" ", "+", $parametro)));
$url =  $baseUrl . "busca.php?publication=" . $parametro;
?> -->
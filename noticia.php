<?php
	require_once('conexao.php');
    if(!isset($_GET['idNoticia'])){
        
        //No servidor usar essa:
        $URL="http://observatoriodesaudemental.com.br/v2/Observatorio-SaudeMental/ListaNoticias.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        die();
        
        //No localhost usar essa:
        // header('Location: ListaNoticias.php');
        // die();
    }else{

    $parametro = $_GET['idNoticia'];
    mysqli_select_db($mysqli, $bd) or die("Could not select database");	
    $stmt = $mysqli->prepare("SELECT * FROM `noticias` WHERE `idNoticia` = ?");
    $stmt->bind_param('i', $parametro);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $stmt->bind_result($idNoticia, $Titulo, $Texto, $Descricao, $Foto);
    if($stmt->fetch()){

?>

  <main class="fade">
    <section class="container">
      <div class="noticia-especifica">
        <h1 class="titulo-noticia"><?php print_r(utf8_encode($Titulo)) ?></h1>
        <div class="image">
          <img src="./assets/noticias/<?php print_r($Foto) ?>" alt="" loading="lazy">
        </div>
        <p class="paragrafo-noticia"><?php print_r(utf8_encode($Texto)) ?> </p>
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


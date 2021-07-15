<?php
	require_once('conexao.php');
    if(!isset($_GET['Noticia'])){
        /*
        //No servidor usar essa:
    	$URL="http://observatoriodesaudemental.com.br/v2/Observatorio-SaudeMental/ListaNoticias.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        die();
        */
        //No localhost usar essa:
        header('Location: ListaNoticias.php');
        die();
    }else{

    $parametro = $_GET['Noticia'];
    
        for($i=0;$i < strlen($parametro);$i++){
        	if(!is_numeric($parametro[$i])){
        	    
                //No servidor usar essa:
                /*
        	    $URL="http://observatoriodesaudemental.com.br/v2/Observatorio-SaudeMental/ListaNoticias.php";
                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 
                die();
                */
                //No localhost usar essa:
                header('Location: ListaNoticias.php');
                die();  
    	    }  
        }

    mysqli_select_db($mysqli, $bd) or die("Could not select database");	
    $stmt = $mysqli->prepare('SELECT * FROM noticias WHERE idNoticia =  ?');
    $stmt->bind_param('i', $parametro);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $stmt->bind_result($idNoticia, $Titulo, $Texto, $Descricao, $Foto);
    if($stmt->fetch()){

?>

  <main class="fade">
    <section class="container">
      <div class="image">
        <img src="./assets/noticias/<?php print_r($Foto) ?>" alt="">
      </div>
      <div class="texto-noticia">
        <h1><?php print_r(utf8_encode($Titulo)) ?></h1>
        <p><?php print_r(utf8_encode($Texto)) ?> </p>
      </div>
      <button class="button-back">Voltar</button>
    </section>
  </main>

<?php
        }
    }
?>


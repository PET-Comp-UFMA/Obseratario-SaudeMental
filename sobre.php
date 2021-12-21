<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Observatório Saúde Mental</title>

  <link rel="icon" href="./assets/images/logo-observatorio-sem-texto.png">
  
  <link rel="stylesheet" href="./styles/sobre.css">
  <link rel="stylesheet" href="./styles/styles.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  
  <?php
    include('header.php');
    require_once('conexao.php');
  ?>

  <main class="fade">
    <div class="section-header"> 
      <h2>Sobre</h2>
    </div>
    <section class="container">
      <h4>Apresentação</h4>
      <p>O Observatório de Saúde Mental e Políticas sobre Drogas é uma iniciativa do Célula de Estudo e Pesquisa Saúde Mental e Cuidado (GESAM), da Universidade Estadual Vale do Acaraú (UVA), em parceria com a Secretaria de Saúde de Sobral - Ceará, por meio da Célula de Políticas sobre Drogas. Tem por objetivo, captar e compilar pesquisas institucionais, teses, dissertações, monografias, artigos, livros, capítulos de livros e produções técnicas na área de saúde mental e políticas sobre drogas, realizadas no município, com o intuito de impulsionar sua devolução para sociedade em geral. A nossa missão é o acompanhamento estratégico/científico destas temáticas; aperfeiçoamento e difusão de informações nessas áreas assim como fortalecimento do campo da atenção psicossocial. Ressalta-se ainda que sua criação e institucionalização acontece sem fins lucrativos.</p>
      <h4>Funcionalidade do Observatório</h4>
      <p>A partir deste observatório, a comunidade acadêmica e a população em geral poderá realizar pesquisas na área da saúde mental e políticas sobre drogas, por meio de ferramentas que facilitam a busca por temas, autores, ano de publicação e palavras-chave. Suas funcionalidades viabilizam a pesquisa à diversos tipos de trabalhos: teses, dissertações de mestrado, TCC de especialização, TCC de graduação, artigos publicados, livros, capítulos de livros, produções técnicas e documentos institucionais. Ademais, possibilita o acesso às citações desses materiais nas seguintes normas: ABNT (Associação Brasileira de Normas Técnicas), Vancouver e APA (American Psychological Association).</p>
      <h4>Nossa Compreensão sobre o Observatório</h4>
      <p>Os observatórios são mecanismos que fornece informações estratégicas para auxiliar na identificação de ameaças, oportunidades e tendências, além de oferecer subsídios à tomada de decisão de um determinado setor, seja em nível regional, nacional ou internacional A principal vantagem de um observatório é a obtenção de uma visão ampla, integrando perspectivas regionais e locais, permitindo o desenvolvimento científico e tecnológico local sem perder de vista a perspectiva nacional(SCHMIDT E SILVA, 2018). Nos últimos tempos estão sendo criados observatórios dos mais diversos tipos, com o intuito de monitorar sistematicamente o funcionamento de um setor ou temáticas específicas, destacando-se: racismo, trabalho, imigração, relações industriais, ciência e tecnologia, violência, meio ambiente, política etc., dentre outras. No caso específico deste, o objeto é o setor de Saúde Mental e Política sobre Drogas.</p>

      <p class="reference">*SCHMIDT, Nádia Solange; SILVA, Christian Luiz da. Observatório como instrumento de prospectiva estratégica para as Instituições de Ciência e Tecnologia (ICTs). Interações (Campo Grande), Campo Grande , v. 19, n. 2, p. 387-400, June 2018 . Available from <a href="http://www.scielo.br/scielo.php?script=sci_arttext&pid=S1518-70122018000200387&lng=en&nrm=iso" target="_blank"><span class="italic">Scielo Brasil</span></a>. access on 25 June 2020. <a href="http://dx.doi.org/10.20435/9inter.v19i2.1689" target="_blank"><span class="italic">DOI</span></a>.</p>
      
      <div class="section-header">
        <h2>Coordenação</h2>
      </div>
      <div class="card-coordenacao">
        <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM integrantes WHERE tipo='coordenacao';";

            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>

        <div class="card">
          <img src="./assets/images/integrantes/<?php print_r(utf8_encode($row['imagem']))?>" alt="" loading="lazy">
          <div class="details">
            <div class="infos">
              <p class="name"><?php print_r(utf8_encode($row['nome']))?></p>
              <p class="occupation"><?php print_r(utf8_encode($row['ocupacao']))?></p>
              <p class="local"><?php print_r(utf8_encode($row['local']))?></p>
            </div>
          </div>
        </div>
        
        <?php
                }
            }
        ?>

      </div>
      <div class="section-header"> 
        <h2>Integrantes</h2>
      </div>
      <div class="card-integrantes">
      <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM integrantes WHERE tipo='integrante';";

            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>

        <div class="card">
          <img src="./assets/images/integrantes/<?php print_r(utf8_encode($row['imagem']))?>" alt="" loading="lazy">
          <div class="details">
            <div class="infos">
              <p class="name"><?php print_r(utf8_encode($row['nome']))?></p>
              <p class="occupation"><?php print_r(utf8_encode($row['ocupacao']))?></p>
              <p class="local"><?php print_r(utf8_encode($row['local']))?></p>
            </div>
          </div>
        </div>
        
        <?php
                }
            }
        ?>
        
      </div>
    </section>
  </main>

  <?php
    include('footer.php');
  ?>
  
  <script src="./scripts/dropdown.js"></script>
</body>
</html>
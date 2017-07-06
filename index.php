<?php
/**
* Created by PhpStorm.
* User: Mayrc
* Date: 03/07/2017
* Time: 8:08
*/
include('config/banco.php');
$time1 = 4;
$time2 = 4;
$time3 = 4;
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Campeonato Altinão 2017</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link href="https://fonts.googleapis.com/css?family=Acme|Questrial" rel="stylesheet">
    <link rel="stylesheet" href="css/foundation-icons.css" />
  </head>
  <body>

    <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text logo-site">ALTINÃO 2017</li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a class="logo-site" href="admin2/index.php">ADMIN</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->


    <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
      <ul class="orbit-container">
        <button class="orbit-previous" aria-label="previous"><i class="step fi-arrow-left size-36"></i></button>
        <button class="orbit-next" aria-label="next"><i class="step fi-arrow-right size-36"></i></button>
        <li class="orbit-slide is-active">
          <img src="img/campo1.jpg">
        </li>
        <li class="orbit-slide">
          <img src="img/campo1.jpg">
        </li>
        <li class="orbit-slide">
          <img src="img/campo1.jpg">
        </li>
        <li class="orbit-slide">
          <img src="img/campo1.jpg">
        </li>
      </ul>
    </div>

    <div class="row column text-center">
      <h2>Escalação dos Times</h2>
      <hr>
    </div>
<div class="grid-container caixa">
 <div class="grid-x grid-padding-x">
  <div class="medium-6 large-4 cell">
<div class="card"">
  <div class="card-divider">
    <?php
        $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = $time1") or die(mysql_errno($link));
        $time = mysqli_fetch_array($result);
        echo $time['nome'];
    ?>
  </div>
  <img src="img/barsemlona.png">
  <div class="card-section">
    
    <?php
            $result = mysqli_query($link, "SELECT `nome`
            FROM `jogador`
            WHERE (`jogador`.`id_time` = $time1)
            ORDER BY `jogador`.`nome` ASC");
            while($jogador = mysqli_fetch_array($result)){
            echo '<p>' . $jogador['nome'] . '</p>';
            }
            ?>
  </div>
</div>
  </div>
  <div class="medium-6 large-4 cell">
    <div class="card"">
  <div class="card-divider">
    <?php
        $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = $time2") or die(mysql_errno($link));
        $time = mysqli_fetch_array($result);
        echo $time['nome'];
    ?>
  </div>
  <img src="img/barsemlona.png">
  <div class="card-section">
    <?php
            $result = mysqli_query($link, "SELECT `nome`
            FROM `jogador`
            WHERE (`jogador`.`id_time` = $time2)
            ORDER BY `jogador`.`nome` ASC");
            while($jogador = mysqli_fetch_array($result)){
            echo '<p>' . $jogador['nome'] . '</p>';
            }
            ?>
  </div>
</div>
  </div>
  <div class="medium-6 large-4 cell">
  <div class="card"">
  <div class="card-divider">
    <?php
        $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = $time3") or die(mysql_errno($link));
        $time = mysqli_fetch_array($result);
        echo $time['nome'];
    ?>
  </div>
  <img src="img/barsemlona.png">
  <div class="card-section">
    <?php
            $result = mysqli_query($link, "SELECT `nome`
            FROM `jogador`
            WHERE (`jogador`.`id_time` = $time3)
            ORDER BY `jogador`.`nome` ASC");
            while($jogador = mysqli_fetch_array($result)){
            echo '<p>' . $jogador['nome'] . '</p>';
            }
            ?>
  </div>
</div>
</div>
</div>
</div>
<div class="grid-container caixa">
 <div class="grid-x grid-padding-x">
  <div class="medium-6 large-4 cell">
   <div class="row column text-center">
      <h2>Tabela</h2>
      <hr>
    </div>
  <table>
  <thead>
    <tr>
      <th>Time</th>
      <th>Ponto(s)</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $result = mysqli_query($link, "SELECT `nome`, `pontos` FROM `time` ORDER BY `pontos` DESC");
        while ($classificacao = mysqli_fetch_array($result))
        {
        echo '<tr><td>' . $classificacao['nome'] . '</td><td>' . $classificacao['pontos'] .
        '</tr>';
        }
    ?>
  </tbody>
</table>
 <div class="row column text-center">
      <h2>Artilharia</h2>
      <hr>
    </div>
    <table>
  <thead>
    <tr>
      <th>Jogador</th>
      <th>Gol(s)</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $result = mysqli_query($link, "SELECT `info_gol`.`jogador_id`, SUM(`info_gol`.`quantidade`) as gols, `jogador`.`nome`
        FROM `jogador`
        LEFT JOIN `info_gol` ON `info_gol`.`jogador_id` = `jogador`.`id`
        WHERE (`info_gol`.`quantidade` > 0) GROUP BY `jogador_id` ORDER BY SUM(`info_gol`.`quantidade`) DESC");
        while($artilheiro = mysqli_fetch_array($result)){
        echo   '<tr>
            <td>' . $artilheiro['nome'] . '</td><td>' . $artilheiro['gols'] . '</td></tr>';
            }
    ?>
  </tbody>
</table>
</div>
  <div class="medium-6 large-8 cell">
   <div class="row column text-center">
      <h2>Jogos</h2>
      <hr>
    </div>
     <table>
  <thead>
    <tr>
      <th>Data</th>
      <th>Time de Casa</th>
      <th style="text-align: center">Placar</th>
      <th>Time Fora de Casa</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $result = mysqli_query($link, "SELECT j.id AS id_jogo,tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa, j.placar_visitante FROM jogo  j
        LEFT JOIN time tv ON tv.id = j.time_visitante
        LEFT JOIN time tc ON tc.id = j.time_casa ORDER BY data DESC LIMIT 6");
        while ($jogos = mysqli_fetch_array($result))
        {
            $jogo_id = $jogos['id_jogo'];
        echo '<tr class="info-jogos"><td>' . $jogos['data'] . '</td><td>' . $jogos['time_casa'] . '</td><td style="text-align: center">' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td></tr>';

        $result_gols = mysqli_query($link, "SELECT jo.nome AS jogador, gol.quantidade AS gols FROM info_gol AS gol LEFT JOIN jogador AS jo ON jo.id = gol.jogador_id WHERE gol.jogo_id = '$jogo_id'");

        while ($gols = mysqli_fetch_array($result_gols))
        {
        echo '<tr><td></td><td></td><td><i><u><b>' . $gols['jogador'] . '</b>: ' . $gols['gols'] . ' Gol(s)</i></u></td><td></td></tr>';
        }
        }
    ?>
  </tbody>
</table>
  </div>
 <!--  <div class="medium-6 large-3 cell">
   <div class="row column text-center">
      <h2>Artilharia</h2>
      <hr>
    </div>
    <table>
  <thead>
    <tr>
      <th>Jogador</th>
      <th>Gol(s)</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $result = mysqli_query($link, "SELECT `info_gol`.`jogador_id`, SUM(`info_gol`.`quantidade`) as gols, `jogador`.`nome`
        FROM `jogador`
        LEFT JOIN `info_gol` ON `info_gol`.`jogador_id` = `jogador`.`id`
        WHERE (`info_gol`.`quantidade` > 0) GROUP BY `jogador_id` ORDER BY SUM(`info_gol`.`quantidade`) DESC");
        while($artilheiro = mysqli_fetch_array($result)){
        echo   '<tr>
            <td>' . $artilheiro['nome'] . '</td><td>' . $artilheiro['gols'] . '</td></tr>';
            }
    ?>
  </tbody>
</table>
  </div> -->
</div>
</div>
<div class="grid-container caixa">
 <div class="row column text-center">
      <h2>Patrocinadores</h2>
      <hr>
    </div>
 <div class="grid-x grid-padding-x">
  <div class="medium-6 large-4 cell">
    <div class="row column text-center">
    <a href="#" class="thumbnail"><img src="img/sportv.png" alt="SPORTV"></a>
    </div>
  </div>
  <div class="medium-6 large-4 cell">
  <div class="row column text-center">
    <a href="#" class="thumbnail"><img src="img/globo.png" alt="GLOBO"></a>
  </div>
  </div>
  <div class="medium-6 large-4 cell">
  <div class="row column text-center">
    <a href="#" class="thumbnail"><img src="img/band.png" alt="BAND"></a>
  </div>
  </div>
</div>
</div>

<div class="grid-container">
  <div class="callout large">
  <h5 style="color: #fff">Altinão 2017</h5>
  <p style="color: #fff">Canguaretama/RN</p>
  <p style="color: #fff">Developed by<a href="https://www.facebook.com/mayrconmarlon.warchiefsnake"><b> SnakeWar</b></a></p>
</div>
</div>

   <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>

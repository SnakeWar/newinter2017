<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Altinão 2017</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Righteous" rel="stylesheet">
    <link rel="stylesheet" href="css/foundation-icons.css" />
    <link rel="icon" href="img/favicon.png" />
</head>
<body>
<div class="grid-x grid-padding-x">
<div class="medium-6 large-4 cell">
</div>
<div class="medium-6 large-4 cell">
    <div class="row column text-center">
        <h2>Jogos</h2>
        <hr>
    </div>
    <table class="jogos">
        <thead>
        <tr>
            <th>Data</th>
            <th class="ali-direita">Time de Casa</th>
            <th style="text-align: center">Placar</th>
            <th>Time Fora de Casa</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('config/banco.php');
        $result = mysqli_query($link, "SELECT j.id AS id_jogo,tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa, j.placar_visitante FROM jogo  j
            LEFT JOIN time tv ON tv.id = j.time_visitante
            LEFT JOIN time tc ON tc.id = j.time_casa ORDER BY j.id DESC");
        while ($jogos = mysqli_fetch_array($result))
        {
            $jogo_id = $jogos['id_jogo'];
            echo '<tr class="info-jogos"><td>' . $jogos['data'] . '</td><td class="ali-direita">' . $jogos['time_casa'] . '</td><td style="text-align: center">' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td></tr>';
            $result_gols = mysqli_query($link, "SELECT jo.nome AS jogador, gol.quantidade AS gols FROM info_gol AS gol LEFT JOIN jogador AS jo ON jo.id = gol.jogador_id WHERE gol.jogo_id = '$jogo_id'");
            while ($gols = mysqli_fetch_array($result_gols))
            {
                echo '<tr><td></td><td></td><td><i><u><b>' . $gols['jogador'] . '</b>: ' . $gols['gols'] . ' Gol(s)</i></u></td><td></td></tr>';
            }
        }
        mysqli_close($link);
        ?>
        </tbody>
    </table>
<!--    <a href="lista-jogos.php" target="_blank"><button class="button success expanded">Ver Mais</button></a>-->
</div>
<div class="medium-6 large-4 cell">
</div>
</div>
</body>
</html>
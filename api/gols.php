<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
$postData = file_get_contents("php://input");
if (isset($postData)) {
    $request = json_decode($postData);
    $jogo_id = '13';
var_dump($jogo_id)
    include_once '../config/banco.php';
    /*$cidade = array();*/
    $sql = "SELECT jo.nome AS jogador, gol.quantidade AS gols FROM info_gol AS gol LEFT JOIN jogador AS jo ON jo.id = gol.jogador_id WHERE gol.jogo_id = '$jogo_id'";
//    $cmd->bindParam(':ID', $matricula);
    $query = mysqli_query($link, "SELECT jo.nome AS jogador, gol.quantidade AS gols FROM info_gol AS gol LEFT JOIN jogador AS jo ON jo.id = gol.jogador_id WHERE gol.jogo_id = 12");
    while($row = mysqli_fetch_assoc($query)){
        /*$id = $row['id_cidade'];
        $nome = $row['nome'];
        $capital = $row['capital'];*/
//        echo $nome . "<br>";
        /*array_push($cidade, array('id' => $id, 'nome' => $nome, 'capital' => $capital));*/
        $gols[] = $row;
//        $cidade[] = ['nome' => $nome, ];
    }
    /*$gols = array("result" => $cidade);*/
    $json = json_encode($gols);
    // $teste = $_POST[$json];
    echo $json;
}else{
    echo "erro 2";
}
/*
$result = mysqli_query($link, "SELECT j.id AS id_jogo,tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa, j.placar_visitante FROM jogo  j
            LEFT JOIN time tv ON tv.id = j.time_visitante
            LEFT JOIN time tc ON tc.id = j.time_casa ORDER BY id_jogo ASC");

            while($jogos_php = mysqli_fetch_assoc($result)){

  

            $jogos[] = $jogos_php;

  
            }

            $jogos_json = json_encode($jogos);
            echo "$jogos_json";*/

?>
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
/*$postdata = file_get_contents("php://input");
if (isset($postdata)) {
    $request = json_decode($postdata);
    $estado = $request->estado;
    include_once 'conexao.php';
    $cidade = array();
    $sql = "SELECT c.id_cidade, c.nome, c.capital FROM cidade c WHERE c.cod_estado = $estado";
//    $cmd->bindParam(':ID', $matricula);
    $query = $con->query($sql);
    foreach ($query as $row) {
        $id = $row['id_cidade'];
        $nome = $row['nome'];
        $capital = $row['capital'];
//        echo $nome . "<br>";
        array_push($cidade, array('id' => $id, 'nome' => $nome, 'capital' => $capital));
//        $cidade[] = ['nome' => $nome, ];
    }
    $reposta = array("result" => $cidade);
    $json = json_encode($reposta);
    // $teste = $_POST[$json];
    echo $json;
}else{
    echo "erro 2";
}*/
include('../config/banco.php');
$result = mysqli_query($link, "SELECT `nome`, `pontos`, `vitorias`, `gols_pro`, `gols_con`, `saldo` FROM `time` ORDER BY `pontos` DESC,`vitorias` DESC,`saldo` DESC");

            while($tabela_php = mysqli_fetch_assoc($result)){

             /*-----------------TESTE--------------------*/

            $tabela[] = $tabela_php;

            /* -----------------TESTE------------------*/
            }

            $tabela_json = json_encode($tabela);
            echo "$tabela_json";

?>

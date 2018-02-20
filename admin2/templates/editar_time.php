<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
	include('header2.php');
	include('../../config/banco.php');
$id_time = $_GET['id'];
    /*$id_time_casa = $jogo['time_casa'];*/
unset($_GET['id']);

	//FORM//
  //
/*if(!$_GET){

}
else
{
	if($_GET['nome'] == null)
	{
		echo '<br><p class="bg-danger erro">Preencha o campo Nome.</p>';
	}
	else
	{
		$nome = $_GET['nome'];

		if($_GET['pontos'] == null || $_GET['pro'] == null || $_GET['con'] == null)
		{
			echo '<br><p class="bg-danger erro">Preencha o campo Pontos e/ou Gols Pro e/ou Gols Contra</p>';
		}
		else
		{
    $pontos = $_GET['pontos'];
    $pro = $_GET['pro'];
    $con = $_GET['con'];
    $saldo = $pro - $con;
		$query = "UPDATE `time` SET `nome` = '$nome', `pontos` = '$pontos', `gols_pro` = '$pro', `gols_con` = '$con', `saldo` = '$saldo'  WHERE `id` = '$id_time'";
			mysqli_query($link, $query) or die(mysqli_error($link));
		}
	}
}*/


/*$resultado_query = "SELECT nome, pontos FROM time WHERE id = $id_time";

$times = mysqli_query($link, $resultado_query) or die(mysqli_error($link));
$time = mysqli_fetch_array($times);*/

?>

	                       <!-- Editar Jogo -->
<div class="grid-container">
<div class="grid-x grid-padding-x">
    <div class="medium-6 large-8 cell caixa">
        <div class="row column text-center">
            <h1>Histórico</h1>
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
            $result = mysqli_query($link, "SELECT j.id AS id_jogo,tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa, j.placar_visitante FROM jogo  j
            LEFT JOIN time tv ON tv.id = j.time_visitante
            LEFT JOIN time tc ON tc.id = j.time_casa WHERE tc.id = '$id_time' ORDER BY j.id ASC");
            $gols_pro = 0;
            $gols_con = 0;
            $pontos_time = 0;
            $vitorias = 0;
            while ($jogos = mysqli_fetch_array($result))
            {
                if($jogos['placar_casa'] > $jogos['placar_visitante']){
                    $pontos_time = $pontos_time + 3;
                    $vitorias = $vitorias + 1;
                }
                if($jogos['placar_casa'] < $jogos['placar_visitante']){
                    $pontos_time = $pontos_time + 0;
                }
                if($jogos['placar_casa'] == $jogos['placar_visitante']){
                    $pontos_time = $pontos_time + 1;
                }

                $gols_pro = $gols_pro + $jogos['placar_casa'];
                $gols_con = $gols_con + $jogos['placar_visitante'];
                $jogo_id = $jogos['id_jogo'];
                echo '<tr class="info-jogos"><td>' . $jogos['data'] . '</td><td class="ali-direita">' . $jogos['time_casa'] . '</td><td style="text-align: center">' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td></tr>';
                $result_gols = mysqli_query($link, "SELECT jo.nome AS jogador, gol.quantidade AS gols FROM info_gol AS gol LEFT JOIN jogador AS jo ON jo.id = gol.jogador_id WHERE gol.jogo_id = '$jogo_id'");
//                while ($gols = mysqli_fetch_array($result_gols))
//                {
//                    echo '<tr><td></td><td></td><td><i><u><b>' . $gols['jogador'] . '</b>: ' . $gols['gols'] . ' Gol(s)</i></u></td><td></td></tr>';
//                }
            }
            ?>


            <?php
            $result = mysqli_query($link, "SELECT j.id AS id_jogo,tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa, j.placar_visitante FROM jogo  j
            LEFT JOIN time tv ON tv.id = j.time_visitante
            LEFT JOIN time tc ON tc.id = j.time_casa WHERE tv.id = '$id_time' ORDER BY j.id ASC");

            while ($jogos = mysqli_fetch_array($result))
            {
                if($jogos['placar_casa'] > $jogos['placar_visitante']){
                    $pontos_time = $pontos_time + 0;
                }
                if($jogos['placar_casa'] < $jogos['placar_visitante']){
                    $pontos_time = $pontos_time + 3;
                    $vitorias = $vitorias + 1;
                }
                if($jogos['placar_casa'] == $jogos['placar_visitante']){
                    $pontos_time = $pontos_time + 1;
                }
                $gols_pro = $gols_pro + $jogos['placar_visitante'];
                $gols_con = $gols_con + $jogos['placar_casa'];
                $jogo_id = $jogos['id_jogo'];
                echo '<tr class="info-jogos"><td>' . $jogos['data'] . '</td><td class="ali-direita">' . $jogos['time_casa'] . '</td><td style="text-align: center">' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td></tr>';
                $result_gols = mysqli_query($link, "SELECT jo.nome AS jogador, gol.quantidade AS gols FROM info_gol AS gol LEFT JOIN jogador AS jo ON jo.id = gol.jogador_id WHERE gol.jogo_id = '$jogo_id'");
//                while ($gols = mysqli_fetch_array($result_gols))
//                {
//                    echo '<tr><td></td><td></td><td><i><u><b>' . $gols['jogador'] . '</b>: ' . $gols['gols'] . ' Gol(s)</i></u></td><td></td></tr>';
//                }
            }
            ?>
            </tbody>
        </table>
        <?php
//        echo "Gols Pro: " . $gols_pro . " / Gol Contra: " . $gols_con . " / Pontos: " . $pontos_time;

        $saldo = $gols_pro - $gols_con;
//        echo " Saldo: " . $saldo;
$query = "UPDATE `time` SET `pontos` = '$pontos_time', `vitorias` = '$vitorias', `gols_pro` = '$gols_pro', `gols_con` = '$gols_con', `saldo` =   '$saldo'  WHERE `id` = '$id_time'";
mysqli_query($link, $query) or die(mysqli_error($link));

        ?>

    </div>
<div class="medium-6 large-4 cell caixa">
<div class="row column text-center">
<h1>Escalação</h1>
</div>
<div class="card" style="width: 300px;">
  <div class="card-divider">
               <?php
                    $result = mysqli_query($link, "SELECT `nome`, `vitorias`, `gols_pro`, `gols_con`, `saldo`, `pontos` FROM `time` WHERE `id` = '$id_time'");
                    $time = mysqli_fetch_array($result);
                    echo $time['nome'];
                ?>
            </div>
            <?php
              if($time['nome'] == 'Pé Com Chulé'){
                echo '<img src="../../img/pecomchule.png">';
              }
              if($time['nome'] == 'Bar 100 Lona'){
                echo '<img src="../../img/barsemlona.png">';
              }
              if($time['nome'] == 'Laranjada F.C'){
                echo '<img src="../../img/laranjada.png">';
              }
            ?>
  <div class="card-section">
            <?php
            $result = mysqli_query($link, "SELECT `nome`, `id` AS id_jogador, `cartao` FROM `jogador` WHERE (`jogador`.`id_time` = '$id_time') ORDER BY `jogador`.`nome` ASC");

            while($jogador = mysqli_fetch_array($result)){
                if($jogador['cartao'] == 0){
                  echo '<p><a class="" href="remover_jogador.php?id='. $jogador['id_jogador'] .'"><span class="badge alert"><i class="fi-x"></i></span></a>  <a class="" href="add_cartao.php?id='. $jogador['id_jogador'] .'"><span class="badge warning"><i class="fi-plus"></i></span></a>  ' . $jogador['nome'] .
                ' </p>';
                }
                elseif($jogador['cartao'] == 1){
                  echo '<p><a class="" href="remover_jogador.php?id='. $jogador['id_jogador'] .'"><span class="badge alert"><i class="fi-x"></i></span></a>  <a class="" href="add_cartao.php?id='. $jogador['id_jogador'] .'"><span class="badge warning"><i class="fi-plus"></i></span></a>  ' . $jogador['nome'] .
                ' <i class="fi-stop amarelo"></i></p>';
                }
                elseif($jogador['cartao'] == 2){
                  echo '<p><a class="" href="remover_jogador.php?id='. $jogador['id_jogador'] .'"><span class="badge alert"><i class="fi-x"></i></span></a>  <a class="" href="add_cartao.php?id='. $jogador['id_jogador'] .'"><span class="badge warning"><i class="fi-plus"></i></span></a>  ' . $jogador['nome'] .
                ' <i class="fi-stop amarelo"></i> <i class="fi-stop amarelo"></i></p>';  
                }
                elseif($jogador['cartao'] == 3){
                  echo '<p><a class="" href="remover_jogador.php?id='. $jogador['id_jogador'] .'"><span class="badge alert"><i class="fi-x"></i></span></a>  <a class="" href="add_cartao.php?id='. $jogador['id_jogador'] .'"><span class="badge warning"><i class="fi-plus"></i></span></a>  ' . $jogador['nome'] .
                ' <i class="fi-stop vermelho"></i></p>';
                }
                
            }
        ?>
        </div>
        </div>
</div>
  <div class="medium-6 large-4 cell caixa">
        <div class="row column text-center">
<h1>Editar Time</h1>
</div>
<form>
<input type="hidden" name="id" value="<?php echo $id_time ?>">
  <div class="form-group">
    <label for="exampleInputName2">Nome</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $time['nome'];?>" placeholder="">
  </div>
    <div class="form-group">
        <label for="exampleInputName2">Vitórias</label>
        <input type="text" class="form-control" name="nome" disabled value="<?php echo $time['vitorias'];?>" placeholder="">
    </div>
  <div class="form-group">
    <label for="exampleInputName2">Gols Pro</label>
    <input type="text" class="form-control" disabled value="<?php echo $time['gols_pro'];?>" name="pro" placeholder="">
  </div>
    <div class="form-group">
        <label for="exampleInputName2">Gols Contra</label>
        <input type="text" class="form-control" disabled value="<?php echo $time['gols_con'];?>" name="con" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputName2">Saldo</label>
        <input type="text" class="form-control" disabled value="<?php echo $time['saldo'];?>" name="pontos" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputName2">Pontos</label>
        <input type="text" class="form-control" disabled value="<?php echo $time['pontos'];?>" name="pontos" placeholder="">
    </div>
  <button type="submit" class="success button">Atualizar / Salvar</button>
  <a class="warning button" href="times.php">Voltar</a>
</form>
<div class="row column text-center">
<h1>Adicionar Jogador</h1>
</div>
<form action="addjogador.php" method="POST">
<input type="hidden" name="id_time" value="<?php echo $id_time ?>">
  <div class="form-group">
    <label for="exampleInputName2">Nome</label>
    <input type="text" class="form-control" name="nome_jogador" value="" placeholder="">
  </div>
  <label for="exampleInputEmail2">Time</label>
    <?php
    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = '$id_time'");
    ?>
 <input type="text" class="form-control" name="time" value="<?php echo $time['nome'] ?>" placeholder="" disabled>
  <button type="submit" class="success button">Adicionar</button>
</form>
</div>

</div>
</div>
								      <!-- Fim Editar Jogo -->
<script>
function confirmacao(id) {
  if (confirm("Deseja Realmente Excluir?") == true) {
  window.location = "remover_jogador.php?id=" + id;
  }
  else {

  }
};
	function voltar(){
		window.location = "times.php";
	};
  function add(){
    var nome = document.getElementsByName('nome_jogador');
    var time = document.getElementsByName('id_time');
    window.location = "addjogador.php?nome=" + nome + "time=" + time;
  };
</script>
<?php
unset($_GET['deucerto']);

mysqli_close($link);

	include('footer.php');
?>
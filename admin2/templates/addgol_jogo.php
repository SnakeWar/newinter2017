<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
include('header2.php');
include('../../config/banco.php');
$id_jogo = $_GET['id'];
$query = "SELECT j.id AS id_jogo, tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa AS placar_casa, j.placar_visitante AS placar_visitante, tc.id AS timec_id, tv.id AS timev_id FROM jogo  j
LEFT JOIN time tv ON tv.id = j.time_visitante
LEFT JOIN time tc ON tc.id = j.time_casa WHERE j.id = $id_jogo";
$jogos = mysqli_query($link, $query);
$jogo = mysqli_fetch_array($jogos);
$timea = $jogo['timec_id'];
$timeb = $jogo['timev_id'];
?>
<div class="grid-container">
<div class="grid-x grid-padding-x">
  <div class="medium-6 large-3 cell caixa">
        <div class="row column text-center">
        <h2>Adicionar Gol(s)</h2>
        </div>
        <form action="add_gol.php" method="POST">
            <input type="hidden" name="id_jogo" value="<?php echo $id_jogo ?>">
            <div class="form-group">
                <label for="exampleInputEmail2">Jogador</label>
                <select class="form-control" name="jogador">
                    <option></option>
                    <?php
                    $jogadores = mysqli_query($link, "SELECT jogador.id as id_jogador, jogador.nome nome_jogador, jogador.id_time, time.nome as nome_time FROM jogador LEFT JOIN time ON jogador.id_time = time.id WHERE (id_time = '$timea' OR id_time = '$timeb')");
                    foreach($jogadores as $jogador){
                    echo '<option value="' . $jogador['id_jogador'] . '">' . $jogador['nome_jogador'] . ' (' . $jogador['nome_time'] . ')</option>';
                    }
                    ?>
                </select>
                <label for="exampleInputName2">Quantidade de Gol(s)</label>
                <input type="text" class="form-control" name="quantidade" placeholder="">
            </div>
            <button type="submit" class="success button">Adicionar Gol</button>
        </form>
        <button type="submit" class="warning button" onclick="voltar()">Voltar</button>
</div>
                   
    <div class="medium-6 large-5 cell caixa">
        <div class="row column text-center">
        <h2>Dados do Jogo</h2>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Data</th>
                <th>Time (Casa)</th>
                <th>Placar</th>
                <th>Time (Visitante)</th>
            </tr>
            <tr><td><?php echo $jogo['data'] ?></td><td><?php echo $jogo['time_casa'] ?></td><td><?php echo $jogo['placar_casa']?> X <?php echo $jogo['placar_visitante']?></td><td><?php echo $jogo['time_visitante']?></td></tr>
        </table>
    </div>
         <!-- --------Artilheiro------------- -->
<div class="medium-6 large-3 cell caixa">
        <div class="row column text-center">
        <h2>Artilharia</h2>
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
          <!-- --------------------- -->
    
    </div>
    <script type="text/javascript">
    function voltar(){
    window.location = "jogos.php";
    }
    </script>
    <?php
    mysqli_close($link);
    include('footer.php')?>
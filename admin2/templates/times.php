<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
$paginaAtiva = 'times';
include('header.php');
include('../../config/banco.php');
if(!$_GET){
}
else{
  if($_GET['nome'] == null){
  }
  else{
  $nome = $_GET['nome'];
  $add = "INSERT INTO `time` (`nome`, `pontos`) VALUES ('$nome', '0')";
        mysqli_query($link, $add) or die(mysqli_error($link));
  }
}
?>
<div class="grid-container">
<div class="grid-x grid-padding-x">
  <div class="medium-6 large-4 cell caixa">
        <div class="row column text-center">
    <h2>Cadastrar Time</h2>
    </div>
    <form>
      <div class="form-group">
        <label for="exampleInputName2">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="">
      </div>
      <button type="submit" class="success button">Adicionar Time</button>
    </form>
  </div>
  <!-- FIM Cadastrar Time -->
  <!-- Editar Time -->
  <div class="medium-6 large-7 cell caixa">
    <div class="row column text-center">
    <h2>Editar Times</h2>
    </div>
    <table class="table table-striped">
      <tr>
        <th class="ali-esquerda">Nome</th>
        <th class="ali-centro">GP</th>
          <th class="ali-centro">GC</th>
          <th class="ali-centro">Saldo</th>
          <th class="ali-centro">Pontos</th>
        <th>Ações</th>
      </tr>
      <?php
      $result = "SELECT nome, pontos, id, gols_pro, gols_con, saldo FROM time ORDER BY pontos DESC";
      $times = mysqli_query($link, $result);
      foreach($times as $time){
        echo '<tr><td>' . $time['nome'] . '</td><td class="ali-centro">' . $time['gols_pro'] . '</td><td class="ali-centro">' . $time['gols_con'] . '</td><td class="ali-centro">' . $time['saldo'] . '</td><td class="ali-centro">' . $time['pontos'] . '</td><td class="ali-centro"><button type="submit" class=" warning button" onclick="editar('. $time['id'] .')">Editar</button> <button type="submit" class="alert button" onclick="confirmacao('. $time['id'] .')">Excluir</button></td></tr>';
      }
      ?>
    </table>
  </div>
  <!-- FIM Editar Time -->
</div>
</div>
<script>
function confirmacao(id) {
if (confirm("Esta ação excluirá todos os jogadores desse time!") == true) {
window.location = "remover_time.php?id=" + id;
}
else {
}
}
function editar(id) {
window.location = "editar_time.php?id=" + id;
}
</script>
<?php
mysqli_close($link);
include('footer.php');
?>
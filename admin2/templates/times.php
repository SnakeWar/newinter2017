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
  <div class="medium-6 large-4 cell">
        <div class="row column text-center">
    <h1>Cadastrar Time</h1>
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
  <div class="medium-6 large-8 cell">
    <div class="row column text-center">
    <h1>Editar Times</h1>
    </div>
    <table class="table table-striped">
      <tr>
        <th>Nome</th>
        <th>Pontos</th>
        <th>Ações</th>
      </tr>
      <?php
      $result = "SELECT nome, pontos, id FROM time ORDER BY pontos DESC";
      $times = mysqli_query($link, $result);
      foreach($times as $time){
        echo '<tr><td>' . $time['nome'] . '</td><td>' . $time['pontos'] . '</td><td><button type="submit" class=" warning button" onclick="editar('. $time['id'] .')">Editar</button> <button type="submit" class="alert button" onclick="confirmacao('. $time['id'] .')">Excluir</button></td></tr>';
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
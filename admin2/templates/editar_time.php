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
if(!$_GET){

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

		if($_GET['pontos'] == null)
		{
			echo '<br><p class="bg-danger erro">Preencha o campo Pontos</p>';
		}
		else
		{
      $pontos = $_GET['pontos'];
			$query = "UPDATE `time` SET `nome` = '$nome', `pontos` = '$pontos' WHERE `id` = '$id_time'";

				mysqli_query($link, $query) or die(mysqli_error($link));
		}
	}
}


$resultado_query = "SELECT nome, pontos FROM time WHERE id = $id_time";

$times = mysqli_query($link, $resultado_query) or die(mysqli_error($link));
$time = mysqli_fetch_array($times);

?>

	                       <!-- Editar Jogo -->
<div class="grid-container">
<div class="grid-x grid-padding-x">
<div class="medium-6 large-4 cell caixa">
<div class="row column text-center">
<h1>Escalação</h1>
</div>
<div class="card" style="width: 300px;">
  <div class="card-divider">
               <?php
                    $result = mysqli_query($link, "SELECT `nome`, `pontos` FROM `time` WHERE `id` = '$id_time'");
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
    <label for="exampleInputName2">Pontos</label>
    <input type="text" class="form-control" value="<?php echo $time['pontos'];?>" name="pontos" placeholder="">
  </div>
  <button type="submit" class="success button">Editar Time</button>
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
<div class="medium-6 large-4 cell">
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
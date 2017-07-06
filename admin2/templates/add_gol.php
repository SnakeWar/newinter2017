<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
include('header2.php');
include('../../config/banco.php');
$id_jogo = $_POST['id_jogo'];
$jogador_id = $_POST['jogador'];
$quantidade = $_POST['quantidade'];
if($_POST['id_jogo'] == null){
	echo '<br><p class="bg-danger erro">Preencha o campo Time.</p>';
	echo '<br><a class="btn btn-success" href="addgol_jogo.php">Voltar</a>';
}
else
{
	if($_POST['jogador'] == null){
echo '<br><p class="bg-danger erro">Preencha o campo Nome.</p><br>';
echo '<br><a class="btn btn-success" href="addgol_jogo.php">Voltar</a>';
	}
	else{
		var_dump($id_jogo);
		var_dump($jogador_id);
		var_dump($quantidade);
		$add = "INSERT INTO info_gol (id, jogador_id, quantidade, jogo_id) VALUES (NULL, '$jogador_id', '$quantidade', '$id_jogo')";
		mysqli_query($link, $add) or die(mysqli_error($link));
		/*unset($_POST['id_time']);
		unset($_POST['jogador']);
		unset($_POST['quantidade']);
		unset($jogador);*/
		header('location: addgol_jogo.php?id=' . $id_jogo);
		/*echo '<br><p class="bg-success erro">Jogador ' . $nome_jogador .' Adicionado!</p>';
		echo '<br><a class="btn btn-success" href="editar_time.php?id='. $id_time .'">Voltar</a>';*/
	}
}
mysqli_close($link);
include('footer.php');
?>
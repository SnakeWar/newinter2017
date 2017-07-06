<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
include('header2.php');
include('../../config/banco.php');
$id_time = $_POST['id_time'];
$nome_jogador = $_POST['nome_jogador'];

if($_POST['id_time'] == null){
	echo '<br><p class="bg-danger erro">Preencha o campo Time.</p>';
	echo '<br><a class="btn btn-success" href="editar_time.php">Voltar</a>';
}
else
{
	if($_POST['nome_jogador'] == null){

echo '<br><p class="bg-danger erro">Preencha o campo Nome.</p><br>';
echo '<br><a class="btn btn-success" href="editar_time.php">Voltar</a>';

	}
	else{

		var_dump($id_time);
		var_dump($nome_jogador);

		$add = "INSERT INTO jogador (id, nome, id_time) VALUES (NULL, '$nome_jogador', '$id_time')";
		mysqli_query($link, $add) or die(mysqli_error($link));
		unset($_POST['id_time']);
		unset($_POST['nome_jogador']);
		unset($nome_jogador);
		header('location: editar_time.php?id=' . $id_time);
		/*echo '<br><p class="bg-success erro">Jogador ' . $nome_jogador .' Adicionado!</p>';
		echo '<br><a class="btn btn-success" href="editar_time.php?id='. $id_time .'">Voltar</a>';*/
	}
}
mysqli_close($link);
include('footer.php');
?>
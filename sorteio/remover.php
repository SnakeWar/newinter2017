<?php
include('config/banco_sorteio.php');
	$id_jogador = $_GET['id'];
	var_dump($id_jogador);
	mysqli_query($link, "DELETE FROM jogador WHERE id = '$id_jogador'");
	header('location:index.php');
?>
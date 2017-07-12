<?php

$id_jogador = $_GET['id'];
include('../../config/banco.php');
$result = mysqli_query($link, "SELECT nome, id, cartao, id_time FROM jogador WHERE id = '$id_jogador'");

$jogador = mysqli_fetch_array($result);

if($jogador['cartao'] == 0){
	$cartao = 1;
}
else{
	if($jogador['cartao'] == 1){
		$cartao = 2;
	}
	else{
		if($jogador['cartao'] == 2){
			$cartao = 3;
		}
		else{
			if($jogador['cartao'] == 3){
				$cartao = 0;
			}
		}
	}
}




$time_id = $jogador['id_time'];


$query = "UPDATE jogador SET cartao = '$cartao' WHERE id = '$id_jogador'";
mysqli_query($link, $query) or die(mysqli_error($link));

header('location: editar_time.php?id=' . $time_id);

 ?>
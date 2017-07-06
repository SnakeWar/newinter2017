<?php
	include('header2.php');
	include('config/banco_sorteio.php');
	$arrayTime = array("A", "B", "C");
	$arrayLetra = array(1, 2, 3, 4 , 5, 6, 7);
	
	foreach($arrayLetra as $letra){
		$ids = mysqli_query($link, "SELECT id FROM jogador WHERE letra_id = $letra");
		shuffle($arrayTime);
		$time = $arrayTime[0];
		foreach($ids as $id){

		$id_jogador = $id['id'];
		/*mysqli_query($link, "UPDATE jogador SET time = '$arrayTime[0]' WHERE id = '$id_jogador'") or die(mysqli_error($link));*/

		if($time == "A"){
			mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
			$time = "B";
		}
		else{
			if($time == "B"){
			mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
			$time = "C";
			}
			else{
			mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
			$time = "A";
			}
		}
	}
	}
	/*$ids = mysqli_query($link, "SELECT id FROM jogador WHERE letra_id = 2");
	foreach($arrayTime as $time){
		shuffle($ids);_
	foreach($ids as $id){
		$id_jogador = $id['id'];
		mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
		}
	}
	$ids = mysqli_query($link, "SELECT id FROM jogador WHERE letra_id = 3");
	foreach($arrayTime as $time){
		shuffle($ids);_
	foreach($ids as $id){
		$id_jogador = $id['id'];
		mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
		}
	}
	$ids = mysqli_query($link, "SELECT id FROM jogador WHERE letra_id = 4");
	foreach($arrayTime as $time){
		shuffle($ids);_
	foreach($ids as $id){
		$id_jogador = $id['id'];
		mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
		}
	}
	$ids = mysqli_query($link, "SELECT id FROM jogador WHERE letra_id = 5");
	foreach($arrayTime as $time){
		shuffle($ids);_
	foreach($ids as $id){
		$id_jogador = $id['id'];
		mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
		}
	}
	$ids = mysqli_query($link, "SELECT id FROM jogador WHERE letra_id = 6");
	foreach($arrayTime as $time){
		shuffle($ids);_
	foreach($ids as $id){
		$id_jogador = $id['id'];
		mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
		}
	}
	$ids = mysqli_query($link, "SELECT id FROM jogador WHERE letra_id = 7");
	foreach($arrayTime as $time){
		shuffle($ids);_
	foreach($ids as $id){
		$id_jogador = $id['id'];
		mysqli_query($link, "UPDATE jogador SET time = '$time' WHERE id = '$id_jogador'") or die(mysqli_error($link));
		}
	}*/
	header('location: index.php');
?>
<!-- <div class="row times-sorteio">
	<h1>Times</h1>
	<div class="list-group col-md-4">
		<a href="#" class="list-group-item active">
			Time A
		</a>
		<?php
				$jogadores = mysqli_query($link, "SELECT nome, letra, time FROM jogador WHERE time = 'A'");
				foreach($jogadores as $jogador){
						echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
		}
		?>
	</div>
	<div class="list-group col-md-4">
		<a href="#" class="list-group-item active">
			Time B
		</a>
		<?php
				$jogadores = mysqli_query($link, "SELECT nome, letra, time FROM jogador WHERE time = 'B'");
				foreach($jogadores as $jogador){
						echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
				}
		?>
	</div>
	<div class="col-md-4">
		<a href="#" class="list-group-item active">
			Time C
		</a>
		<?php
				$jogadores = mysqli_query($link, "SELECT nome, letra, time FROM jogador WHERE time = 'C'");
				foreach($jogadores as $jogador){
						echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
				}
		?>
	</div> -->
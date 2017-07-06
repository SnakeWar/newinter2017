<?php
	include('header2.php');
	include('config/banco_sorteio.php');
if(!$_GET){
}
else{
	if(!$_GET['nome']){
		echo "Preencha o nome.";
	}
	else{
		$nome = $_GET['nome'];
		$letra = $_GET['letra'];
		mysqli_query($link, "INSERT INTO jogador (id, nome, letra_id) VALUES (null, '$nome', '$letra')")or die(mysqli_error($link));
	}
}
?>
<div class="grid-container caixa">
 <div class="grid-x grid-padding-x">
  <div class="medium-6 large-4 cell">
   <div class="row column text-center">
			<h3>Time A</h3>
		
		<?php
				$jogadores = mysqli_query($link, "SELECT nome, letra_id, time FROM jogador WHERE time = 'A'");
				foreach($jogadores as $jogador){
						echo '<p>' . $jogador['nome'] . '</p>';
		}
		?>
	</div>
	</div>
	<div class="medium-6 large-4 cell">
		<div class="row column text-center">
			<h3>Time B</h3>
		
		<?php
				$jogadores = mysqli_query($link, "SELECT nome, letra_id, time FROM jogador WHERE time = 'B'");
				foreach($jogadores as $jogador){
						echo '<p>' . $jogador['nome'] . '</p>';
				}
		?>
	</div>
	</div>
	<div class="medium-6 large-4 cell">
		<div class="row column text-center">
			<h3>Time C</h3>
		
		<?php
				$jogadores = mysqli_query($link, "SELECT nome, letra_id, time FROM jogador WHERE time = 'C'");
				foreach($jogadores as $jogador){
						echo '<p>' . $jogador['nome'] . '</p>';
				}
		?>
	</div>
	</div>
</div>
</div>

<?php
$jogadores = mysqli_query($link, "SELECT nome, letra_id, time FROM jogador");
	foreach($jogadores as $jogador){
	echo '<p>'.$jogador['letra'].'</p>';
}
?>

									<!-- JOGADORES -->

<div class="row column text-center">
	<a href="distribuicao.php" class="success button">SORTEAR</a>
</div>

<div class="grid-container caixa">
 <div class="grid-x grid-padding-x">
  <div class="medium-6 large-3 cell">
			<table>
			<thead>
				<th>Estrela</th>
			</thead>
			<tbody>
					<?php
						$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 1")or die(mysqli_error($link));
						foreach($jogadores as $jogador){
							$id_jogador = $jogador['id'];
/*remover.php?id=' . $id_jogador . '*/
								echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
						}
					?>
			</tbody>
		</table>
	</div>
	<div class="medium-6 large-3 cell">
		<table>
			<thead>
				<th>S</th>
			</thead>
			<tbody>
		<?php
					$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 2");
					foreach($jogadores as $jogador){
						$id_jogador = $jogador['id'];
							echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
					}
		?>
		</tbody>
		</table>
	</div>
	<div class="medium-6 large-3 cell">
		<table class="table table-striped">
			<thead>
				<th>A</th>
			</thead>
			<tbody>
		<?php
					$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 3");
					foreach($jogadores as $jogador){
						$id_jogador = $jogador['id'];
							echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
					}
		?>
		</tbody>
		</table>
	</div>
	<div class="medium-6 large-3 cell">
		<table class="">
			<thead>
				<th>B</th>
			</thead>
			<tbody>
		<?php
					$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 4");
					foreach($jogadores as $jogador){
						$id_jogador = $jogador['id'];
							echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
					}
		?>
		</tbody>
		</table>
	</div>
</div>
</div>
<div class="grid-container caixa">
 <div class="grid-x grid-padding-x">
  <div class="medium-6 large-3 cell">
			<table>
			<thead>
				<th>C</th>
			</thead>
			<tbody>
		<?php
					$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 5");
					foreach($jogadores as $jogador){
						$id_jogador = $jogador['id'];
							echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
					}
		?>
		</tbody>
		</table>
	</div>
	<div class="medium-6 large-3 cell">
		<table class="">
			<thead>
				<th>D</th>
			</thead>
			<tbody>
		<?php
					$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 6");
					foreach($jogadores as $jogador){
						$id_jogador = $jogador['id'];
							echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
					}
		?>
		</tbody>
		</table>
	</div>
	<div class="medium-6 large-3 cell">
		<table class="table table-striped">
			<thead>
				<th>F</th>
			</thead>
			<tbody>
		<?php
					$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 7");
					foreach($jogadores as $jogador){
						$id_jogador = $jogador['id'];
							echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
					}
		?>
		</tbody>
		</table>
	</div>
	<div class="medium-6 large-3 cell">
		<table class="table table-striped">
			<thead>
				<th>Goleiro</th>
			</thead>
			<tbody>
		<?php
					$jogadores = mysqli_query($link, "SELECT id, nome, letra_id, time FROM jogador WHERE letra_id = 8");
					foreach($jogadores as $jogador){
						$id_jogador = $jogador['id'];
							echo '<tr><td>' . $jogador['nome'] . '</td><td><a href="remover.php?id=' . $id_jogador . '" class="alert button">Excluir</a></td></tr>';
					}
		?>
		</tbody>
		</table>
	</div>
	</div>
	</div>
<div class="grid-container caixa">
 <div class="grid-x grid-padding-x">
 <div class="medium-6 large-5 cell">
	<form>
		<div class="form-group">
			<label for="exampleInputEmail1">Nome</label>
			<input type="text" class="form-control" name="nome" id="exampleInputEmail1" placeholder="">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Letra</label>
			<select class="form-control" name="letra">
				<option value="1">E</option>
				<option value="2">S</option>
				<option value="3">A</option>
				<option value="4">B</option>
				<option value="5">C</option>
				<option value="6">D</option>
				<option value="7">F</option>
				<option value="8">G</option>
			</select>
		</div>
		<button type="submit" class="success button">ADD JOGADOR</button>
	</form>
</div>
</div>
</div>
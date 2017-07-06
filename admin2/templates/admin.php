<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
$paginaAtiva = "admin";
include('header.php');
?>
<div class="grid-container">
<div class="grid-x grid-padding-x">
  <div class="medium-6 large-4 cell">
	</div>
	<div class="medium-6 large-4 cell">
	<div class="row column text-center">
	<br>
		<a href="../logout.php" class="warning button expanded">Sair</a>
		</div>
	</div>
	<div class="medium-6 large-4 cell">
	</div>

</div>
</div>

<?php
include('footer.php');
?>
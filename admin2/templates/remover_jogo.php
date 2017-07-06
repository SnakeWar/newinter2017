<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
include('../../config/banco.php');
$id_jogo = $_GET['id'];
$delete_info_gol = "DELETE FROM info_gol WHERE jogo_id = '$id_jogo'";
mysqli_query($link, $delete_info_gol) or die(mysqli_error($link));
$delete = "DELETE FROM jogo WHERE id = '$id_jogo'";
mysqli_query($link, $delete) or die(mysqli_error($link));
mysqli_close($link);
header('location: jogos.php?id=' . $time_id);
?>
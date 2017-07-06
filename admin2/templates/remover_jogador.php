<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
include('../../config/banco.php');
$id_jogador = $_GET['id'];

$delete_info_gol = "DELETE FROM info_gol WHERE jogador_id = '$id_jogador'";
mysqli_query($link, $delete_info_gol) or die(mysqli_error($link));

$select = "SELECT id_time, id FROM jogador WHERE id = $id_jogador";
$jogador = mysqli_query($link, $select);

$id_time = mysqli_fetch_array($jogador);
$time_id = $id_time['id_time'];

$delete = "DELETE FROM `jogador` WHERE `jogador`.`id` = '$id_jogador'";
mysqli_query($link, $delete) or die(mysqli_error($link));
mysqli_close($link);
header('location: editar_time.php?id=' . $time_id);
?>

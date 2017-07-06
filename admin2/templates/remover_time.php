<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
include('../../config/banco.php');
$id_time = $_GET['id'];
$delete_jogadores = "DELETE FROM jogador WHERE id_time = '$id_time'";
mysqli_query($link, $delete_jogadores) or die(mysqli_error($link));
$delete = "DELETE FROM `time` WHERE id = '$id_time'";
mysqli_query($link, $delete) or die(mysqli_error($link));
mysqli_close($link);
header('location: times.php?id=' . $id_time);
?>
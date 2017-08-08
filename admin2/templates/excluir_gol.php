<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
include('../../config/banco.php');
$id_gol = $_GET['id'];


$delete_info_gol = "DELETE FROM info_gol WHERE id = '$id_gol'";
mysqli_query($link, $delete_info_gol) or die(mysqli_error($link));
echo $id_gol;
mysqli_close($link);
/*header('location: addgol_jogo.php?id=' . $id_jogo);*/
?>

<script type="text/javascript">

        window.history.back();

</script>


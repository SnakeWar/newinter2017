<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
$paginaAtiva = "artilharia";
include('header.php');
include('../../config/banco.php');
?>
<div class="row margin-left">
        <div class="col-md-4">
         <h1>Artilheiro</h1>
            <ul class="list-group">
             <a href="#" class="list-group-item active">Jogador<p class="direita">Gols</p></a>
                <?php
                $result = mysqli_query($link, "SELECT `info_gol`.`jogador_id`, SUM(`info_gol`.`quantidade`) as gols, `jogador`.`nome`
                FROM `jogador`
                    LEFT JOIN `info_gol` ON `info_gol`.`jogador_id` = `jogador`.`id`
                WHERE (`info_gol`.`quantidade` > 0) GROUP BY `jogador_id` ORDER BY SUM(`info_gol`.`quantidade`) DESC");

                while($artilheiro = mysqli_fetch_array($result)){
                     echo   '<li class="list-group-item">
                    <span class="badge">' . $artilheiro['gols'] . '</span>' . $artilheiro['nome'] . '</li>';
                }

                ?>
            </ul>
        </div>
        </div>
<?php
mysqli_close($link);
include('footer.php');
?>
<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
$paginaAtiva = 'jogos';
include('header.php');
include('../../config/banco.php');
//FORM
if(!$_GET){
}
else
{
if($_GET['data'] == "")
{
echo '<p class="bg-danger erro">Data não selecionada.</p>';
}
else
{
$data = $_GET['data'];
$time_casa = $_GET['time_casa'];
$time_visitante = $_GET['time_visitante'];
$get_placar_casa = $_GET['placar_casa'];
$get_placar_visitante = $_GET['placar_visitante'];
if($time_casa == $time_visitante)
{
echo '<p class="bg-danger erro">Campo Time (Casa) e Time (Visitante) são obrigatório e não podem conter o mesmo time</p>';
}
else
{
if($get_placar_casa == null || $get_placar_visitante == null){
echo '<p class="bg-danger erro">Caso o jogo não tenha acontecido ainda, digite "0" nos dois placares.</p>';
}
else{
$add = "INSERT INTO `jogo` (`data`, `placar_casa`, `placar_visitante`, `time_casa`, `time_visitante`) VALUES ('$data', '$get_placar_casa', '$get_placar_visitante', '$time_casa', '$time_visitante')";
mysqli_query($link, $add) or die(mysqli_error($link));
}
}
}
}
?>
<!-- Começo Cadastro -->
<div class="grid-container">
<div class="grid-x grid-padding-x">
  <div class="small-12 medium-12 large-3 cell caixa">
        <div class="row column text-center">
            <h3>Cadastrar Jogo</h3>
        </div>
        <form>
            <div class="form-group">
                <label for="exampleInputName2">Data</label>
                <input type="text" class="form-control" data-date-format="dd/mm/yy" id="dp1" name="data" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Time Casa</label>
                <select class="form-control" name="time_casa">
                    <option></option>
                    <?php
                    $times = mysqli_query($link, "SELECT `time`.`id`, `time`.`nome` FROM `time`");
                    foreach($times as $time){
                    echo '<option value="' . $time['id'] . '">' . $time['nome'] . '</option>';
                    }
                    ?>
                </select>
                <label for="exampleInputName2">Placar (Casa)</label>
                <input type="text" class="form-control" name="placar_casa" placeholder="">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputName2">Time Visitante</label>
                <select class="form-control" name="time_visitante">
                    <option></option>
                    <?php
                    foreach($times as $time){
                    echo '<option value="' . $time['id'] . '">' . $time['nome'] . '</option>';
                    }
                    ?>
                </select>
                <label for="exampleInputName2">Placar (Visitante)</label>
                <input type="text" class="form-control" name="placar_visitante" placeholder="">
            </div>
            <button type="submit" class="button success">Adicionar Jogo</button>
        </form>
    </div>
    <!-- Fim Cadastro -->
    <!-- Começo Lista de Jogos -->
    <div class="small-12 medium-12 large-8 cell caixa jogos">
    <div class="row column text-center">
        <h1>Jogos</h1>
        </div>
        <table class="">
            <tr>
                <th>Data</th>
                <th>Time (Casa)</th>
                <th>Placar</th>
                <th>Time (Visitante)</th>
                <th>Ações</th>
            </tr>
            <?php
            $result = mysqli_query($link, "SELECT j.id AS id_jogo, tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa AS placar_casa, j.placar_visitante AS placar_visitante FROM jogo  j
            LEFT JOIN time tv ON tv.id = j.time_visitante
            LEFT JOIN time tc ON tc.id = j.time_casa ORDER BY data DESC");
            while ($jogos = mysqli_fetch_array($result))
            {
            $post_id_jogo = $jogos['id_jogo'];
            /*$post_time_casa = $jogos['time_casa'];
            $post_placar_casa = $jogos['placar_casa'];
            $post_time_visitante = $jogos['time_visitante'];
            $post_placar_visitante = $jogos['placar_visitante'];*/
            echo '<tr><td>' . $jogos['data'] . '</td><td>' . $jogos['time_casa'] . '</td><td>' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td><td><button type="submit" class="button" onclick="addGol(' . $post_id_jogo . ')">Add Gol(s)</button> <button type="submit" class="success button" onclick="editar('. $post_id_jogo . ')">Editar</button> <button type="submit" class="alert button" onclick="confirmacao(' . $post_id_jogo . ')">Excluir</button></td></tr>';
            }
            ?>
        </table>
    </div>
</div>
</div>
<!-- Fim Lista de Jogos -->
<script>
/* Datepicker*/
$(function() {
$( "#calendario" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
/* FIM Datepicker*/
function confirmacao(id) {
if (confirm("Deseja Realmente Excluir?") == true) {
window.location = "remover_jogo.php?id=" + id;
}
else {
}
}
function editar(id) {
window.location = "editar_jogo.php?id=" + id;
}
function addGol(id) {
window.location = "addgol_jogo.php?id=" + id;
}
</script>
<?php
mysqli_close($link);
include('footer.php');
?>
<?php
session_start();
include('../config/banco.php');
$usuarios = mysqli_query($link, "SELECT nome,senha FROM usuario");

if(isset($_POST))
{
	$get_usuario = $_POST['usuario'];
	$get_senha = $_POST['senha'];


	unset($error);
	if(!empty($get_usuario) && !empty($get_senha))
	{
		foreach ($usuarios as $usuario)
		{
			if(($get_usuario == $usuario['nome']) && ($get_senha == $usuario['senha']))
			{

				$_SESSION['logged'] = true;
				$_SESSION['nome'] = $usuario['usuario'];
				header('location: templates/jogos.php');
			}
		}
		$error = 'Usuário e/ou senha inválidos';
	}
}
if(isset($error))
	{
		echo '<p class="">' . $error . '</p>';
	}
$paginaAtiva = "admin";
include('header.php');
?>
<div class="gri-container caixa login">
<div class="grid-x">
  <div class="medium-6 large-4 cell"></div>
  <div class="medium-6 large-4 cell">
  	<div class="row column text-center">
				<h1 class="panel-title">Login</h1>
				<form method="post">
					<div class="row">
					<div class="medium-6 columns">
						<label for=""><b>Usuário</b></label>
						<input type="text" name="usuario" id="" placeholder="">
					</div>
					</div>
					<div class="row">
					<div class="medium-6 columns">
						<label for=""><b>Senha</b></label>
						<input type="password" name="senha" id="" placeholder="">
					</div>
					</div>
					<button type="submit" class="success button expanded">ENTRAR</button>
				</form>
</div>
  </div>
  <div class="medium-6 large-4 cell"></div>
</div>
</div>
<?php
include('footer.php');
?>
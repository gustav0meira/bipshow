<?php 

session_start();

// requires
require "../config/sql.php";
require "../config/vars/app.php";
require "../config/cdn.php";

// functions
require "../config/functions/user.php";
require "../config/functions/app.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="config/vars/geralStyle.css">
	<link rel="stylesheet" type="text/css" href="public/css/register.css">
</head>
<body>
	<?php 

	if (isMobileDevice()) {
	    require "../app/topbar_mobile.php";
	} else {
	    require "../app/topbar.php";
	}

	?>
	<div id="register" class="container">
		<div style="padding: 100px 0px 50px 0px;" class="row">
			<div class="col-11 col-lg-4 mx-auto">
				<h1 class="gradient">Faça Login</h1>
				<center>
					<p class="register">Faça login e tenha acesso a todas as opções disponíveis em nossa plataforma de venda de ingressos.</p>
				</center>
				<form method="POST" action="./entrar">
					<label class="input">E-mail</label>
					<input required placeholder="Insira o seu e-mail" type="text" name="email"><br>

					<label class="input">Senha</label>
					<input required placeholder="Insira a sua senha" type="password" name="password"><br>

					<button class="gradient">CADASTRAR</button>
				</form>
			</div>
		</div>
	</div>
	<?php require "../app/footer.php"; ?>
</body>
</html>
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
				<ul>
					<li class="dropdown-item">Meus Ingressos</li>
					<li class="dropdown-item">Minha Conta</li>
					<li class="dropdown-item">Sair</li>
				</ul>
			</div>
		</div>
	</div>
	<?php require "../app/footer.php"; ?>
</body>
</html>
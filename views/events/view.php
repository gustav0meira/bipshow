<?php 

session_start();

// requires
require "../config/sql.php";
require "../config/vars/app.php";
require "../config/cdn.php";

// functions
require "../config/functions/user.php";
require "../config/functions/app.php";

// catch id from url
$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$filename = basename($currentUrl);
$matches = array();
if (preg_match('/(\d+)$/', $filename, $matches)) { $id = $matches[1]; } else { header('Location: '.route("404").''); }

$query 			= "SELECT * FROM events WHERE id = {$id}";
$mysqli_query 	= mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($mysqli_query)) { $event = $data; }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="config/vars/geralStyle.css">
	<link rel="stylesheet" type="text/css" href="public/css/viewsEvents.css">
</head>
<body>
<?php if (isMobileDevice()) { require "../app/topbar_mobile.php"; } else { require "../app/topbar.php"; } ?>
	<div style="padding-top: 70px; padding-bottom: 20px;" class="container">
		<div class="row">
			<div class="col-12">
				<i class="fa-solid fa-angle-left fa-xs"></i> Voltar
			</div>
			<div class="col-12">
				<div style="background: url('data/banner_events/<?php echo $event['banner']; ?>');" class="event_banner"></div>
			</div>
			<div class="col-8">
				<p>Talent Show</p>
				<p>
					Florianópolis, SC - Teatro Carlos Gomes <br>
					22:00 <br>
					18 de Julho de 2023
				</p>
				<button>Como chegar</button>
				<button>Adicionar na agenda</button>
				<button>Compartilhar</button>

				<p>Informações gerais</p>
				<hr>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum in purus non facilisis. Morbi laoreet varius dolor, in sagittis ipsum ultricies eget. Nulla pretium pretium mi eu gravida. Donec accumsan tempus imperdiet. Proin eget tincidunt metus, at fermentum diam. Aliquam laoreet consectetur leo, at volutpat eros consectetur non. Proin a lorem eu dolor elementum pulvinar. Phasellus sit amet lorem bibendum, posuere est eget, efficitur dui.

					Ut lobortis ipsum a rutrum hendrerit. Cras suscipit, arcu ac luctus tempus, metus elit placerat est, nec dictum mauris odio et lorem. Vivamus pharetra metus accumsan augue egestas, sit amet consectetur enim aliquet. Cras id ex hendrerit, luctus risus in, maximus lectus. Donec tincidunt elementum mauris. Nunc congue condimentum nibh non maximus. Proin ipsum ligula, auctor eget turpis consequat, posuere pulvinar urna. Nunc consectetur tortor purus, vel lobortis lacus ultrices eu. Aliquam eu ex ac leo feugiat eleifend vel id nibh. Fusce vel placerat quam. Mauris feugiat congue mollis. Nullam congue mauris quis nibh hendrerit mollis.
				</p>

				<div class="rulesBox">
					<p>Regras da compra online e acesso digital</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum in purus non facilisis. Morbi laoreet varius dolor, in sagittis ipsum ultricies eget. Nulla pretium pretium mi eu gravida. Donec accumsan tempus imperdiet. Proin eget tincidunt metus, at fermentum diam. Aliquam laoreet consectetur leo, at volutpat eros consectetur non. Proin a lorem eu dolor elementum pulvinar. Phasellus sit amet lorem bibendum, posuere est eget, efficitur dui.</p>
				</div>
			</div>
		</div>
	</div>
<?php require "../app/footer.php"; ?>
</body>
</html>
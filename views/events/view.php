<title><?php if ($url == '') { echo 'Início'; } else { echo ucwords(substr(str_replace('-', ' ', $url), 0, -2)); }; ?> | <?php echo 'BipShow'; ?></title>

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
	<div style="padding-top: 30px; padding-bottom: 20px;" class="container">
		<div class="row">
			<div class="col-12">
				<label onclick="window.history.back();" style="cursor: pointer;"><i class="fa-solid fa-angle-left fa-xs"></i> Voltar</label>
			</div>
			<div class="col-12">
				<div style="background: url('data/banner_events/<?php echo $event['banner']; ?>');" class="event_banner"></div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-8">
						<p class="b_title"><?php echo $event['title']; ?></p>
						<p>
							<?php echo $event['city'] . ', ' . $event['uf'] . ' - ' . $event['local'] ?> <br>
							<?php echo dateHour($event['event_data']); ?> <br>
							<?php echo fullMonth($event['event_data']); ?>

							<?php 

								// como chegar
								$local = $event['local'];
								$cidade = $event['city'];
								$uf = $event['uf'];

								// adicionar na agenda
						        $tituloEvento = $event['title'];
						        $dataInicio = date('c', strtotime($event['event_data']));
						        $dataFim = date('c', strtotime($event['event_data']));
						        $descricao = $event['description'];
						        $local = $event['city'] . ', ' . $event['uf'] . ' - ' . $event['local'];

							?>

						</p>

						<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo urlencode($local . ', ' . $cidade . ', ' . $uf); ?>" target="_blank"><button class="act">
							<i class="fa-regular fa-compass"></i> 
							Como chegar
						</button></a>
						<a href="http://www.google.com/calendar/event?action=TEMPLATE&text=<?php echo urlencode($tituloEvento); ?>&dates=<?php echo urlencode($dataInicio . '/' . $dataFim); ?>&details=<?php echo urlencode($descricao . '\nLocal: ' . $local); ?>" target="_blank"><button class="act">
							<i class="fa-regular fa-calendar"></i> 
							Adicionar na agenda
						</button></a>
						<a><button id="shareButton" class="act">
							<i class="fa-regular fa-share-from-square"></i> 
							Compartilhar
						</button></a>

						<p style="margin-top: 30px;" class="b">Informações gerais</p>
						<hr width="10%" style="border-color: #00000030;">

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum in purus non facilisis. Morbi laoreet varius dolor, in sagittis ipsum ultricies eget. Nulla pretium pretium mi eu gravida. Donec accumsan tempus imperdiet. Proin eget tincidunt metus, at fermentum diam. Aliquam laoreet consectetur leo, at volutpat eros consectetur non. Proin a lorem eu dolor elementum pulvinar. Phasellus sit amet lorem bibendum, posuere est eget, efficitur dui.
							<br>
							<br>
							Ut lobortis ipsum a rutrum hendrerit. Cras suscipit, arcu ac luctus tempus, metus elit placerat est, nec dictum mauris odio et lorem. Vivamus pharetra metus accumsan augue egestas, sit amet consectetur enim aliquet. Cras id ex hendrerit, luctus risus in, maximus lectus. Donec tincidunt elementum mauris. Nunc congue condimentum nibh non maximus. Proin ipsum ligula, auctor eget turpis consequat, posuere pulvinar urna. Nunc consectetur tortor purus, vel lobortis lacus ultrices eu. Aliquam eu ex ac leo feugiat eleifend vel id nibh. Fusce vel placerat quam. Mauris feugiat congue mollis. Nullam congue mauris quis nibh hendrerit mollis.
						</p>

						<div style="text-align: justify;" class="rulesBox">
							<p class="b">Regras da compra online e acesso digital</p>
							<p><?php echo $config['purchase_rules']; ?></p>
						</div>
					</div>
					<div style="position: relative !important;" class="col-4">
						<div class="ticketBox">
							<div class="">
								<div class="row ticket_dateBox">
									<div class="col-12 top">
										<div class="row">
											<div class="col-1">
												<i class="fa-solid fa-ticket align"></i> 
											</div>
											<div class="col-11">
												<div class="align">
													<label class="ticketLabel">Ingressos</label>
												</div>	
											</div>
										</div>
									</div>
									<?php if (isset($_GET['day'])) {
										// code...
									} else {  ?>
									<div class="col-12">
										<?php $days = json_decode($event['days']);
										foreach ($days as $day) {

											$day = strtotime($day);
											$n_day = date('d', $day);
											$month = strtoupper(monthToPT(date('M', $day)));
											$t_day = dayToName($day);

										?>
										<div onclick="window.location.href='?event=<?php print_r($id); ?>&day=<?php echo $day; ?>'" class="row ticketDay">
											<div class="col-2">
												<label class="day"><?php echo $n_day; ?></label>
											</div>
											<div style="padding-left: 5px;" class="col-2">
												<div class="align">
													<label class="month"><?php echo $month; ?></label><br>
													<label class="extenseDay"><?php echo $t_day; ?></label>
												</div>
											</div>
											<div class="col-7">
												<div class="align">
													<p class="prieceDescription">
														Preços entre <br>
														<b>R$ 400,00 e 500,00</b>
													</p>
												</div>
											</div>
											<div class="col-1">
												<div class="align">
													<i class="fa-solid fa-chevron-right fa-2xl"></i>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require "../app/footer.php"; ?>
</body>
<script>
    document.getElementById('shareButton').addEventListener('click', function() {
        if (navigator.share) {
            navigator.share({
                title: 'Título do Compartilhamento',
                text: 'Texto para compartilhar',
                url: window.location.href
            })
            .then(() => console.log('Compartilhado com sucesso'))
            .catch((error) => console.error('Erro ao compartilhar', error));
        } else {
            // Caso a API Web Share não seja suportada, abrir links diretos
            var sharedURL = encodeURIComponent(window.location.href);
            window.open(
                'https://wa.me/?text=' + sharedURL,
                'whatsapp-share',
                'width=600,height=400'
            );
            window.open(
                'https://www.facebook.com/sharer/sharer.php?u=' + sharedURL,
                'facebook-share',
                'width=600,height=400'
            );
            // Adicione mais links para outras plataformas de compartilhamento aqui
        }
    });
</script>
</html>
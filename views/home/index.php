<?php 

session_start();

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// requires
require "config/sql.php";
require "config/vars/app.php";
require "config/cdn.php";

// functions
require "config/functions/user.php";
require "config/functions/app.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="config/vars/geralStyle.css">
	<link rel="stylesheet" type="text/css" href="public/css/home.css">
	<link rel="stylesheet" type="text/css" href="config/vars/geralStyle.css">
</head>
<body>

	<?php if (isMobileDevice()) { require "app/topbar_mobile.php"; } else { require "app/topbar.php"; } ?>

	<div class="container-fluid">
		<div class="row">
			<div style="padding: 0px;" class="col-12">
				<div id="carouselExampleFade" class="carousel slide carousel-fade">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="assets/banners/banner_01.png" class="d-block w-100" alt="assets/banners/banner_01.png">
				    </div>
				  </div>
				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </button>
				</div>
			</div>
		</div>
	</div>
	<div class="container categorySection">
		<div class="row">
			<div class="col-12">
				<center>
					<svg style="margin-top: -14px;" width="150px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 229 173" fill="none">
					  <rect x="42.001" y="23.9248" width="145" height="145" rx="72.5" fill="#FDFDFD" stroke="url(#paint0_linear_813_1161)" stroke-width="8"/>
					  <path d="M110.836 8.32913C57.3483 9.03948 22.3442 54.5502 22.504 96.3503" stroke="#E3E3E3" stroke-width="5"/>
					  <path d="M118.242 8.32913C171.73 9.03948 206.734 54.5502 206.574 96.3503" stroke="#E3E3E3" stroke-width="5"/>
					  <defs>
					    <linearGradient id="paint0_linear_813_1161" x1="42.001" y1="23.9248" x2="188.174" y2="25.117" gradientUnits="userSpaceOnUse">
					      <stop stop-color="#5B2591"/>
					      <stop offset="1" stop-color="#53AFED"/>
					    </linearGradient>
					  </defs>
					  <text x="50%" y="55%" text-anchor="middle" dy=".3em" font-size="20" fill="#4A3D90" class="svg-text">
					    <tspan x="50%" dy="0"><?php echo str_replace(' ', '</tspan><tspan x="50%" dy="1.2em">', 'Categoria Um') ?></tspan>
					  </text>
					</svg>
					<svg style="margin-bottom: -10px;" xmlns="http://www.w3.org/2000/svg" width="150px" viewBox="0 0 228 178" fill="none">
					  <rect x="42" y="4.92578" width="145" height="145" rx="72.5" fill="#FDFDFD" stroke="url(#paint0_linear_813_1162)" stroke-width="8"/>
					  <path d="M110.836 169.021C57.3483 168.311 22.3442 122.8 22.504 81.0003" stroke="#E3E3E3" stroke-width="5"/>
					  <path d="M117.242 169.021C170.73 168.311 205.734 122.8 205.574 81.0003" stroke="#E3E3E3" stroke-width="5"/>
					  <defs>
					    <linearGradient id="paint0_linear_813_1162" x1="42" y1="4.92578" x2="188.173" y2="6.11801" gradientUnits="userSpaceOnUse">
					      <stop stop-color="#5B2591"/>
					      <stop offset="1" stop-color="#53AFED"/>
					    </linearGradient>
					  </defs>
					  <text x="50%" y="45%" text-anchor="middle" dy=".3em" font-size="20" fill="#4A3D90" class="svg-text">
					    <tspan x="50%" dy="0"><?php echo str_replace(' ', '</tspan><tspan x="50%" dy="1.2em">', 'Categoria dois') ?></tspan>
					  </text>
					</svg>
				</center>
			</div>
		</div>
	</div>
	<div class="container events">
		<div style="margin-bottom: 20px;" class="row topAllEvents">
			<div style="padding: 0px 30px !important;" class="col-12">
				<div class="row">
					<div class="col-9 col-lg-3">
						<div class="allEvents">
							<div class="row">
								<div class="col-2 col-lg-1">
									<div class="align">
										<a href="<?php echo route('eventos'); ?>">
										<i	 class="fa-regular fa-calendar"></i>
										</a>
									</div>
								</div>
								<div class="col-10">
									<div class="align">
										<a href="<?php echo route('eventos'); ?>">
											<label class="allEvents">Todos os eventos</label>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="text-align: right;" class="col-3 col-lg-9">
						<div class="align">
							<label class="slogam">
								Comprou, <br>
								sorriu, curtiu.
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row dropEvents">
			<?php
			$consulta = "SELECT * FROM events WHERE status != 0 ORDER BY id DESC LIMIT 12";
			$con = $conn->query($consulta) or die($conn->error);
			if ($con->num_rows > 0) {
			while($dado = $con->fetch_array()) { ?>
			<div class="col-11 col-md-4 col-lg-3 <?php if (isMobileDevice()) { echo 'mx-auto'; } ?>">
				<?php $lowerName = strtolower(str_replace(' ', '-', $dado['title'])); ?>
				<div onclick="window.location.href='<?php echo $lowerName ?>-<?php echo $dado['id']; ?>'" class="moduleEvent">
					<div style="background: url('data/events/<?php echo $dado['photo']; ?>');" class="photo">
					    <svg class="share-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M400 255.4V240 208c0-8.8-7.2-16-16-16H352 336 289.5c-50.9 0-93.9 33.5-108.3 79.6c-3.3-9.4-5.2-19.8-5.2-31.6c0-61.9 50.1-112 112-112h48 16 32c8.8 0 16-7.2 16-16V80 64.6L506 160 400 255.4zM336 240h16v48c0 17.7 14.3 32 32 32h3.7c7.9 0 15.5-2.9 21.4-8.2l139-125.1c7.6-6.8 11.9-16.5 11.9-26.7s-4.3-19.9-11.9-26.7L409.9 8.9C403.5 3.2 395.3 0 386.7 0C367.5 0 352 15.5 352 34.7V80H336 304 288c-88.4 0-160 71.6-160 160c0 60.4 34.6 99.1 63.9 120.9c5.9 4.4 11.5 8.1 16.7 11.2c4.4 2.7 8.5 4.9 11.9 6.6c3.4 1.7 6.2 3 8.2 3.9c2.2 1 4.6 1.4 7.1 1.4h2.5c9.8 0 17.8-8 17.8-17.8c0-7.8-5.3-14.7-11.6-19.5l0 0c-.4-.3-.7-.5-1.1-.8c-1.7-1.1-3.4-2.5-5-4.1c-.8-.8-1.7-1.6-2.5-2.6s-1.6-1.9-2.4-2.9c-1.8-2.5-3.5-5.3-5-8.5c-2.6-6-4.3-13.3-4.3-22.4c0-36.1 29.3-65.5 65.5-65.5H304h32zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V376c0-13.3-10.7-24-24-24s-24 10.7-24 24v64c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z"/></svg>
					</div>
					<div style="padding: 0px 8px;" class="row">
						<div class="col-9">
							<label class="title"><?php echo $dado['title']; ?></label><br>
							<label class="city"><?php echo $dado['city'] ?>, <?php echo $dado['uf']; ?></label><br>
							<label class="local"><?php echo $dado['local']; ?></label><br>
							<button class="buy">
								<i class="fa-solid fa-dollar-sign"></i>
								Comprar
							</button>
						</div>
						<div style="text-align: right;" class="col-3">
							<center>
								<?php
								$event_date = $dado['event_data'];
								$event_date_formatted = new DateTime($event_date);

								$month = $event_date_formatted->format('M'); // Formato de mês abreviado (ex: JUL)
								$day = $event_date_formatted->format('d');   // Dia do mês (ex: 18)
								$hour = $event_date_formatted->format('H:i'); // Hora e minutos (ex: 22:00)
								?>

								<label class="month"><?php echo $month; ?></label><br>
								<label class="day"><?php echo $day; ?></label><br>
								<label class="hour"><?php echo $hour; ?></label>
							</center>
						</div>
					</div>
				</div>
			</div>
			<?php } } else { echo "<p class='nothing'> Nenhum evento encontrado!</p>"; } ?>
		</div>
	</div>

	<?php require "app/footer.php"; ?>

</body>
</html>
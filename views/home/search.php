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
	<link rel="stylesheet" type="text/css" href="public/css/home.css">
</head>
<body>
	
	<?php if (isMobileDevice()) { require "../app/topbar_mobile.php"; } else { require "../app/topbar.php"; } ?>

	<div class="container">
		<div style="margin: 75px 0px 20px 0px; padding-bottom: 20px; border-bottom: 1px solid #00000010;" class="row">
			<div class="col-10">
				<div class="align">
					<i class="fa-solid fa-magnifying-glass"></i>
					<label style="margin-left: 15px">Exibindo resultados para <b>“<?php echo $_POST['search']; ?>”</b></label>
				</div>
			</div>
			<div style="text-align: right;" class="col-2">
				<div class="align">
					<label style="font-size: 0.7rem !important;"><b>154</b> resultados</label>
				</div>
			</div>
		</div>
		<div class="row dropEvents">
			<?php
			$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
			$consulta = "SELECT * FROM events WHERE status != 0";

			if (!empty($searchTerm)) {
			    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);
			    $searchTerm = strtolower($searchTerm);  // Converter para minúsculas

			    $consulta .= " AND (LOWER(title) LIKE '%$searchTerm%' OR LOWER(city) LIKE '%$searchTerm%')";
			    
			    // Consulta para buscar por registros similares usando Levenshtein
				$consultaSimilar = "SELECT * FROM events WHERE status != 0 AND (";
				$consultaSimilar .= "LOWER(title) LIKE '%$searchTerm%' OR ";
				$consultaSimilar .= "LOWER(city) LIKE '%$searchTerm%')";
				$consultaSimilar .= " ORDER BY id DESC LIMIT 12";

			    $resultSimilar = mysqli_query($conn, $consultaSimilar);
			    
			    if ($resultSimilar) {
			        // Combine os resultados da consulta original e da consulta por similaridade
			        while ($row = mysqli_fetch_assoc($resultSimilar)) {
			            // Adicione os resultados à lista de resultados da consulta original
			            // Certifique-se de eliminar duplicatas, se necessário
			        }
			    }
			}

			$consulta .= " ORDER BY id DESC";
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
	<?php require "../app/footer.php"; ?>
</body>
</html>
<?php 

	$app_name = 'BipShow';
	$app_slogan = 'Comprou, sorriu, curtiu.';

	$baseDirectory = __DIR__ . '/../';
	$url = $_GET['url'] ?? '';

?>

<!-- favicon and title -->
<link rel="icon" type="image/x-icon" href="./assets/logo/favicon.png">
<title><?php if ($url == '') { echo 'Início'; } else { echo $url; }; ?> | <?php echo $app_name; ?></title>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:wght@300;400&display=swap');
	body{
		background-color: var(--background);
		font-family: Inter !important;
		font-size: 0.8rem !important;
	}
	.align{
		position: relative;
		top: 50%;
		transform: translateY(-50%);
	}
	body::-webkit-scrollbar {
		width: 12px;
	}

	body::-webkit-scrollbar-track {
		background: white;
	}

	body::-webkit-scrollbar-thumb {
		background-color: #325f8e;
		border-radius: 20px;
		border: 3px solid white;
	}
	.no_button{
		background: transparent !important;
		margin: 0px !important;
		padding: 0px !important;
		border: none !important;
	}
	html,
	body{
		overflow-x: hidden !important;
	}
	form{
		margin: 0px !important;
	}
</style>
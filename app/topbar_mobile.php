<style>
	.topbar_mobile {
		padding: 20px 30px;
	}

	.logoMobile {
		width: 100%;
	}

	.topbar_mobile .fa-user {
		padding: 15px;
		border-radius: 50%;
		border: 1px solid #00000030;
		color: #7261d4 !important;
	}

	.boxLocation .fa-map-pin {
		font-size: 1.3rem !important;
		margin-top: 25px;
		margin-bottom: 5px;
		color: #4A3D90 !important;
	}

	.boxLocation .topTitle {
		font-size: 0.6rem !important;
		color: #4A3D90 !important;
	}

	.boxLocation .bottomTitle {
		font-size: 0.7rem !important;
		font-weight: 500;
		color: #39474F !important;
	}

	.boxLocation .dropdown-menu {
		border-radius: 20px !important;
		-webkit-box-shadow: 0px 0px 48px -22px rgba(0, 0, 0, 0.9);
		-moz-box-shadow: 0px 0px 48px -22px rgba(0, 0, 0, 0.9);
		box-shadow: 0px 0px 48px -22px rgba(0, 0, 0, 0.9);
		font-size: 0.8rem !important;
		border: none !important;
		padding: 20px;
		width: 250px;
	}

	.boxLocation input.cep {
		padding: 10px;
		border-radius: 10px;
		width: 100%;
		border: 1px solid #00000040;
	}

	.boxLocation button.cep {
		padding: 10px 0px;
		text-align: center !important;
		background: var(--gradient);
		color: white;
		border-radius: 10px;
		width: 100%;
		border: none;
	}

	div.search {
		margin-top: 10px;
		margin-bottom: 10px;
		font-size: 0.7rem !important;
		border: 1px solid #6b95f2;
		border-radius: 25px;
		width: 100%;
	}

	div.search .fa-magnifying-glass {
		margin-left: 20px;
		color: var(--primary);
	}

	div.search input {
		font-size: 0.7rem !important;
		border-radius: 10px;
		padding: 12px 5px;
		margin-left: 10px;
		border: none;
		width: 85%;
	}

	div.search input::placeholder {
		color: #4A3D90;
	}

	img.profile_pp {
		width: 50px;
	}

	.dropdown-profile {
		position: absolute;
		z-index: 9999 !important;
		padding: 15px 0px;
		border-radius: 20px;
		font-size: 0.8rem !important;
	}

	.dropdown-profile a {
		text-decoration: none !important;
	}

	.dropdown-profile li {
		padding: 5px 14px;
		cursor: pointer;
		transition: all 200ms;
		border-left: 4px solid #00000000;
	}

	.dropdown-profile li:hover {
		border-left: 4px solid #828ff4;
	}

	li.dropdown-item svg {
		margin-right: 5px;
		color: #828ff4;
	}

	.dropdown-item:active {
		background: #828ff4 !important;
	}

	.dropdown-item:active svg {
		color: white !important;
		border-color: white !important;
	}
</style>

<div class="container topbar_mobile">
	<div class="row">
		<div class="col-9">
			<a href="<?php echo route(''); ?>?logoTopbar=true">
				<img class="logoMobile" src="assets/logo/topbar.png">
			</a>
		</div>
		<div class="col-3">
			<div style="text-align: right;" class="align">
				<?php if (isset($_SESSION['user'])) { ?>
					<div id="account" class="dropdown-center">
					  <button class="no_button" data-bs-toggle="dropdown" aria-expanded="false">
					  	<img class="profile_pp" src="data/pp/<?php echo $_SESSION['user']['profile_pp']; ?>">
					  </button>
					  <ul class="dropdown-menu dropdown-profile">
					  	<a href="<?php echo route('minha-conta'); ?>"><li class="dropdown-item"><i class="fa-regular fa-circle-user"></i> Meus Ingressos</li></a>
					  	<a href="<?php echo route('minha-conta'); ?>"><li class="dropdown-item"><i class="fa-regular fa-circle-user"></i> Meu Perfil</li></a>
					  	<a href="<?php echo route('logout'); ?>"><li class="dropdown-item"><i class="fa-regular fa-circle-xmark"></i> Sair</li></a>
					  </ul>
					</div>
				<?php } else { ?>
				    <i onclick="window.location.href='./menu'" class="fas fa-user"></i>
				<?php } ?>
			</div>
		</div>
		<div style="text-align: center !important;" class="col-12">
			<div class="boxLocation dropdown-center">
			  <button class="no_button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
				<div class="row">
					<div class="col-12">
						<i class="fa-solid fa-map-pin"></i><br>
						<label class="topTitle">Eventos próximos à</label><br>
						<label class="bottomTitle dropdown-toggle">
							<?php 
								if (isset($_SESSION['location']->localidade) AND isset($_SESSION['location']->uf)) { 
									echo $_SESSION['location']->localidade . ', ' . $_SESSION['location']->uf;
								} else { 
									echo getUserLocation();
								} 
							?>
						</label>
					</div>
				</div>
			  </button>
			  <ul class="dropdown-menu">
				<p>para ver os melhores fretes e prazos para sua região</p>
				<p>insira o seu cep:</p>
				<form method="POST" action="./cep">
				  <div class="row">
					<div style="padding: 0px 3px 0px 12px;" class="col-9">
					  <input id="cep" maxlength="9" minlength="9" placeholder="_____-___" class="cep" type="text" name="cep" value="<?php if(isset($_SESSION['location']->cep)) { echo $_SESSION['location']->cep; } else { if ($_SERVER['REMOTE_ADDR'] == '::1') { echo '00000-000'; } else { echo getUserCep(); } } ?>">
					</div>
					<div style="padding: 0px 12px 0px 3px;" class="col-3">
					  <button class="cep">ok</button>
					</div>
				  </div>
				</form>
			  </ul>
			</div>
		</div>
		<div class="col-12">
			<div class="align">
				<div class="search">
					<form method="POST" action="./pesquisa">
						<button class="no_button">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
						<input value="<?php if (isset($_POST['search'])) { echo $_POST['search']; } ?>" placeholder="Pesquise seu evento" class="search" type="search" name="search">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cepInput = document.getElementById('cep');

    cepInput.addEventListener('input', function(event) {
        const input = event.target;
        const value = input.value.replace(/\D/g, '');

        if (value.length > 8) {
            input.value = value.slice(0, 8);
        } else if (value.length >= 5) {
            input.value = value.slice(0, 5) + '-' + value.slice(5);
        } else {
            input.value = value;
        }
    });
});
</script>

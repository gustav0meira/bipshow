<style>
	.topbar_mobile{
		padding: 20px 30px;
	}
	.logoMobile{
		width: 100%;
	}
	.topbar_mobile .fa-user{
		padding: 15px;
		border-radius: 50%;
		border: 1px solid #00000030;
		color: #7261d4 !important;
	}
	
	.boxLocation .fa-map-pin{
		font-size: 1.3rem !important;
		margin-top: 25px;
		margin-bottom: 5px;
		color: #4A3D90 !important;
	}

	.boxLocation .topTitle{
		font-size: 0.6rem !important;
		color: #4A3D90 !important;
	}

	.boxLocation .bottomTitle{
		font-size: 0.7rem !important;
		font-weight: 500;
		color: #39474F !important;
	}
	.boxLocation .dropdown-menu{
		border-radius: 20px !important;
		-webkit-box-shadow: 0px 0px 48px -22px rgba(0,0,0,0.9);
		-moz-box-shadow: 0px 0px 48px -22px rgba(0,0,0,0.9);
		box-shadow: 0px 0px 48px -22px rgba(0,0,0,0.9);
		font-size: 0.8rem !important;
		border: none !important;
		padding: 20px;
		width: 250px;
	}
	.boxLocation input.cep{
		padding: 10px;
		border-radius: 10px;
		width: 100%;
		border: 1px solid #00000040;
	}
	.boxLocation button.cep{
		padding: 10px 0px;
		text-align: center !important;
		background: var(--gradient);
		color: white;
		border-radius: 10px;
		width: 100%;
		border: none;
	}

	div.search{
		margin-top: 10px;
		margin-bottom: 10px;
		font-size: 0.7rem !important;
		border: 1px solid #6b95f2;
		border-radius: 25px;
		width: 100%;
	}

	div.search .fa-magnifying-glass{
		margin-left: 20px;
		color: var(--primary);
	}

	div.search input{
		font-size: 0.7rem !important;
		border-radius: 10px;
		padding: 12px 5px;
		margin-left: 10px;
		border: none;
		width: 85%;
	}

	div.search input::placeholder{
		color: #4A3D90;
	}
</style>

<div class="container topbar_mobile">
	<div class="row">
		<div class="col-9">
			<img onclick="window.loation.href='<?php echo route('/'); ?>'" class="logoMobile" src="assets/logo/topbar.png">
		</div>
		<div class="col-3">
			<div style="text-align: right;" class="align">
				<i onclick="window.location.href='<?php echo route('login-mobile'); ?>'" class="fa-solid fa-user"></i>
			</div>
		</div>
		<div style="text-align: center !important;" class="col-12">
			<div class="boxLocation">
				<div class="dropdown-center">
				  <button class="no_button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					<div class="row">
						<div class="col-12">
							<i class="fa-solid fa-map-pin"></i><br>
							<label class="topTitle">Eventos próximos à</label><br>
							<label class="bottomTitle dropdown-toggle"><?php echo getUserLocation(); ?></label>
						</div>
					</div>
				  </button>
				  <ul class="dropdown-menu">
				  	<p>para ver os melhores fretes e prazos para sua região</p>
				  	<p>insira o seu cep:</p>
				  	<form method="POST" action="<?php echo route('newCep'); ?>">
					  	<div class="row">
					  		<div style="padding: 0px 3px 0px 12px;" class="col-9">
					  			<input id="cep" maxlength="9" minlength="9" placeholder="_____-___" class="cep" type="text" name="cep" value="<?php echo getUserCep(); ?>">
					  		</div>
					  		<div style="padding: 0px 12px 0px 3px;" class="col-3">
					  			<button class="cep">ok</button>
					  		</div>
					  	</div>
				  	</form>
				  </ul>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="align">
				<div class="search">
					<form method="POST" action="<?php echo route('search'); ?>">
						<button class="no_button">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
						<input placeholder="Pesquise seu evento" class="search" type="search" name="search">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
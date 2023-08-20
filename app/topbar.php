<style>
body{
	padding-top: 5rem !important;
}

.topbar{
	top: 0;
	background: white !important !important;
	padding: 20px 0px;
	position: absolute;
	z-index: 100 !important;
}

.topbar button.white{
	width: 100% !important;
	font-family: Poppins !important;
	font-size: 0.7rem !important;
	border-radius: 25px;
	border: 1px solid #E3E3E3;
	font-weight: 500;
	background: transparent;
	color: #39474F;
	padding: 12px 27px;
}

.topbar .topLogo{
	width: 100%;
}

.topbar button.gradient{
	width: 100% !important;
	font-family: Poppins !important;
	font-size: 0.7rem !important;
	border-radius: 25px;
	font-weight: 500;
	background: var(--gradient);
	border: none;
	color: white;
	padding: 12px 27px;
}

div.search{
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

.boxLocation .fa-map-pin{
	font-size: 1.3rem !important;
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
.dropdown-entrar{
	padding: 25px;
	width: 300px;
	border-radius: 20px;
	font-size: 0.8rem !important;
}
.dropdown-entrar input{
	width: 100%;
	padding: 10px 15px;
	font-size: 0.8rem !important;
	border-radius: 25px;
	border: 1px solid #00000050;
	margin-bottom: 10px;
	font-family: Inter;
}
.dropdown-entrar input::placeholder{
	color: #00000050;
}
label.input{
	position: relative;
	margin-bottom: -7px;
	background: white !important;
	padding: 0px 5px;
	margin-left: 15px;
	font-size: 0.5rem !important;
	color: #00000095;
}
.forget{
	text-align: center;
	font-size: 0.7rem !important;
	font-weight: 300 !important;
	cursor: pointer;
	margin-top: 10px;
	color: #8782f8;
}
</style>

<div class="container-fluid topbar">
	<div class="container">
		<div class="row">
			<div class="col-2">
				<div class="align">
					<a href="?logoTopbar=true">
						<img class="topLogo" src="assets/logo/topbar.png">
					</a>
				</div>
			</div>
			<div class="col-1"></div>
			<div style="text-align: left;" class="col-2">
				<div class="align">
					<div class="boxLocation">
						<div class="dropdown-center">
						  <button class="no_button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<div class="row">
								<div class="col-2">
									<i class="fa-solid fa-map-pin align"></i>
								</div>
								<div style="text-align: left !important;" class="col-10">
									<div class="align">
										<label style="cursor: pointer;" class="topTitle">Eventos próximos à</label><br>
										<label style="cursor: pointer;" class="bottomTitle dropdown-toggle"><?php echo getUserLocation(); ?></label>
									</div>
								</div>
							</div>
						  </button>
						  <ul class="dropdown-menu">
						  	<p>para ver os melhores fretes e prazos para sua região</p>
						  	<p>insira o seu cep:</p>
						  	<form method="POST" action="<?php echo route('newRoute'); ?>">
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
			</div>
			<div class="col-4">
				<div class="align">
					<div class="search">
						<form style="margin: 0px !important;" method="POST" action="<?php echo route('search'); ?>">
							<button class="no_button">
								<i class="fa-solid fa-magnifying-glass"></i>
							</button>
							<input placeholder="Pesquise seu evento" class="search" type="search" name="search">
						</form>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="align">
					<div class="row">
						<div class="col-sm">
							<div class="dropdown-center">
							  <button class="white" data-bs-toggle="dropdown" aria-expanded="false">Entrar</button>
							  <ul class="dropdown-menu dropdown-entrar">
							  	<p>faça login para acessar todos os recursos da plataforma</p>
							  	<form method="POST" action="<?php echo route('entrar'); ?>">
							  		<label class="input">E-mail</label>
							  		<input required placeholder="seu e-mail aqui..." type="email" name="email">
							  		<label class="input">Senha</label>
							  		<input required placeholder="sua senha aqui..." type="password" name="password">
							  		<button class="gradient">ENTRAR</button>
							  		<p class="forget">Esqueci minha senha</p>
							  	</form>
							  </ul>
							</div>
						</div>
						<div class="col-sm">
							<a href="<?php echo route('register'); ?>"><button class="gradient">Criar Conta</button></a>
						</div>
					</div>
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
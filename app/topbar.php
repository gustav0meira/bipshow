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
.dropdown-profile{
	padding: 15px 0px;
	border-radius: 20px;
	font-size: 0.8rem !important;
}
.dropdown-profile a{
	text-decoration: none !important;
}
.dropdown-profile li{
	padding: 5px 14px;
	cursor: pointer;
	transition: all 200ms;
	border-left: 4px solid #00000000;
}
.dropdown-profile li:hover{
	border-left: 4px solid #828ff4;
}
li.dropdown-item svg{
	margin-right: 5px;
	color: #828ff4;
}
.dropdown-item:active{
	background: #828ff4 !important;
}
.dropdown-item:active svg{
	color: white !important;
	border-color: white !important;
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
	margin-left: 10px;
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
.profile_pp{
	width: 40px;
	height: 40px;
	background-size: cover !important;
	background-position: center center !important;
	border-radius: 15px;
}
</style>
<script>
function formatCPF_CNPJ(input) {
    const cleanInput = input.replace(/\D/g, '');
    return cleanInput.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    return input;
}
</script>
<div class="container-fluid topbar">
	<div class="container">
		<div class="row">
			<div class="col-2">
				<div class="align">
					<a href="<?php echo route(''); ?>?logoTopbar=true">
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
										<label style="cursor: pointer;" class="bottomTitle dropdown-toggle">
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
							</div>
						  </button>
						  <ul class="dropdown-menu">
						  	<p>para ver os melhores fretes e prazos para sua região</p>
						  	<p>insira o seu cep:</p>
						  	<form method="POST" action="/cep">
							  	<div class="row">
							  		<div style="padding: 0px 3px 0px 12px;" class="col-9">
							  			<input id="cep" maxlength="9" minlength="9" placeholder="_____-___" class="cep" type="text" name="cep" 
							  			value="<?php if(isset($_SESSION['location']->cep)) { echo $_SESSION['location']->cep; } else { if ($_SERVER['REMOTE_ADDR'] == '::1') { echo '00000-000'; } else { echo getUserCep(); } } ?>">
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
						<form style="margin: 0px !important;" method="POST" action="./pesquisa">
							<button class="no_button">
								<i class="fa-solid fa-magnifying-glass"></i>
							</button>
							<input value="<?php if (isset($_POST['search'])) { echo $_POST['search']; } ?>" placeholder="Pesquise seu evento" class="search" type="search" name="search">
						</form>
					</div>
				</div>
			</div>
			<?php 
			if (isset($_SESSION['user'])) { ?>
			<div class="col-3">
				<div class="align">
					<div class="row">
						<div class="col-sm">
							<a href="<?php echo route('meus-ingressos'); ?>"><button style="width: 109% !important;" class="gradient">Meus ingressos</button></a>
						</div>
						<div style="text-align: right !important;" class="col-3">
							<div class="dropdown-center">
							  <button class="no_button" data-bs-toggle="dropdown" aria-expanded="false">
								<div style="float: right; background: url('data/pp/<?php echo $_SESSION['user']['profile_pp'] ?>');" class="profile_pp"></div>
							  </button>
							  <ul class="dropdown-menu dropdown-profile">
							  	<a href="<?php echo route('minha-conta'); ?>"><li class="dropdown-item"><i class="fa-regular fa-circle-user"></i> Meu Perfil</li></a>
							  	<a href="<?php echo route('logout'); ?>"><li class="dropdown-item"><i class="fa-regular fa-circle-xmark"></i> Sair</li></a>
							  </ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } else { ?>
			<div class="col-3">
				<div class="align">
					<div class="row">
						<div class="col-sm">
							<div class="dropdown-center">
							  <button class="white" data-bs-toggle="dropdown" aria-expanded="false">Entrar</button>
							  <ul class="dropdown-menu dropdown-entrar">
							  	<p>faça login para acessar todos os recursos da plataforma</p>
							  	<form method="POST" action="./entrar">
							  		<label class="input">CPF</label>
							  		<input required oninput="this.value = formatCPF_CNPJ(this.value)" maxlength="14" placeholder="seu CPF aqui..." type="text" name="cpf">
							  		<label class="input">Senha</label>
							  		<input required placeholder="sua senha aqui..." type="password" name="password">
							  		<button class="gradient">ENTRAR</button>
							  		<p class="forget">Esqueci minha senha</p>
							  	</form>
							  </ul>
							</div>
						</div>
						<div class="col-sm">
							<a href="./register"><button class="gradient">Criar Conta</button></a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
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
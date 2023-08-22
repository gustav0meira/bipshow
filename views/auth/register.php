<?php 

session_start();

// requires
require "../config/sql.php";
require "../config/vars/app.php";
require "../config/cdn.php";

// functions
require "../config/functions/user.php";
require "../config/functions/app.php";

if (session_status() == PHP_SESSION_NONE) { session_start(); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    // Verifica se o email já está em uso
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmtCheckEmail = $conn->prepare($checkEmailQuery);
    $stmtCheckEmail->bind_param("s", $email);
    $stmtCheckEmail->execute();
    $resultCheckEmail = $stmtCheckEmail->get_result();

    if ($resultCheckEmail->num_rows > 0) {
        echo '<script>alert("Este e-mail já está em uso. Por favor, escolha outro.");</script>';
    } else {
        if (isset($_POST['terms'])) {

            $insertQuery = "INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);

            $stmt->bind_param("ssss", $name, $surname, $email, $password);

            if ($stmt->execute()) {
                // Obtém todas as informações do usuário do banco de dados
                $getUserQuery = "SELECT * FROM users WHERE email = ?";
                $stmtGetUser = $conn->prepare($getUserQuery);
                $stmtGetUser->bind_param("s", $email);
                $stmtGetUser->execute();
                $resultGetUser = $stmtGetUser->get_result();
                $userData = $resultGetUser->fetch_assoc();

                // Define a sessão com as informações do usuário
                $_SESSION['user'] = $userData;

                header("Location: ./");
                exit();
            } else {
                echo '<script>alert("Erro! Contacte o suporte do sistema!");</script>';
            }

            $stmt->close();
        } else {
            echo '<script>alert("Você precisa aceitar os termos de registro.");</script>';
        }
    }

    $stmtCheckEmail->close();
}

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
				<h1 class="gradient">Cadastre-se</h1>
				<center>
					<p class="register">Faça seu registro e tenha acesso a todas as opções disponíveis em nossa plataforma de venda de ingressos.</p>
				</center>
				<form method="POST" action="#">
					<label class="input">Nome</label>
					<input required placeholder="Primeiro nome..." type="text" name="name"><br>

					<label class="input">Sobrenome</label>
					<input required placeholder="Insira seu sobrenome..." type="text" name="surname"><br>

					<label class="input">E-mail</label>
					<input required placeholder="O seu melhor e-mail..." type="email" name="email"><br>

					<label class="input">Senha</label>
					<input required placeholder="Insira sua senha..." type="password" name="password"><br>

					<label class="input">Repita a senha</label>
					<input required placeholder="Repita a senha..." type="password" name="repeat_password"><br>

					<div class="row">
						<div style="padding-right: 0px;; text-align: right !important;" class="col-2">
							<input required id="terms" class="align" type="checkbox" name="terms">
						</div>
						<div style="padding-left: 0px;" class="col-10">
							<label for="terms" class="terms align">Declaro que li e concordo com todos os <a href="termos-de-cadastro">termos</a> de registro.</label>
						</div>
					</div>

					<div style="margin-bottom: 15px;" class="row">
						<div style="padding-right: 0px;; text-align: right !important;" class="col-2">
							<input id="termsMail" class="align" type="checkbox" name="termsMail">
						</div>
						<div style="padding-left: 0px;" class="col-10">
							<label for="termsMail" class="terms align">Gostaria de receber informações por e-mail, incluindo newsletters e ofertas.</label>
						</div>
					</div>

					<button class="gradient">CADASTRAR</button>
				</form>
			</div>
		</div>
	</div>
	<?php require "../app/footer.php"; ?>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
	<!-- Sweet Alert -->
	<link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
	<!-- Sweet Alerts 2 -->
	<script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>
	<?php
	session_start();
	if (isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
		//configuração com o banco de dados
		// Conecte-se ao banco de dados
		$usuario_db = 'archer';
		$senha_db = 'B5n3Qz2vL7HAUs7z';
		$database_db = 'archerx';
		$host_db = '172.10.20.47';

		$conn = new mysqli($host_db, $usuario_db, $senha_db, $database_db);
		if (!$conn) {
			die("Conexão falhou: " . mysqli_connect_error());
		}

		$login = $_POST['login'];
		$senha = $_POST['senha'];

		//print_r('login: ' . $login);
		//print_r('senha: ' . $senha);

		$sql = "SELECT * FROM usuarios_wyntech WHERE BINARY LOGIN = '$login' AND BINARY SENHA ='$senha'";

		$result = $conn->query($sql);
		//print_r($result);

		if (mysqli_num_rows($result) < 1) {
			unset($_SESSION['login']);
			unset($_SESSION['senha']);
			echo '<script>
            Swal.fire({
                title: "Erro!",
                text: "Login ou senha inválidos.",
                icon: "error",
                timer: 2000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = "login.html";
            });
          </script>';
		} else {
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$logado = $_SESSION['login'];

			// Fetch the user data from the database
			$user = mysqli_fetch_assoc($result);

			// Set session variables for login, senha, and user_type
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['tipo'] = $user['tipo'];
			// Check the user's type and redirect them to the appropriate page
			if ($user['tipo'] == 'admin') {
				echo "<script>
				Swal.fire({
					title: 'Bem vindo $logado',
					text: 'Login feito com sucesso.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
				}).then((result) => {
					window.location.href = 'home.php';
				});
			</script>";
			} else {
				echo "<script>
				Swal.fire({
					title: 'Bem vindo $logado',
					text: 'Acesso feito com sucesso.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
				}).then((result) => {
					window.location.href = 'home.php';
				});
			</script>";
			}
			if ($user['tipo'] == 'visitante') {
				echo "<script>
				Swal.fire({
					title: 'Bem vindo $logado',
					text: 'Acesso feito com sucesso.',
					icon: 'success',
					showConfirmButton: false,
					timer: 2000
				}).then((result) => {
					window.location.href = 'home.php';
				});
			</script>";
			}
		}
	} else {
		echo '<script>
		Swal.fire({
			title: "Erro!",
			text: "Login ou senha inválidos.",
			icon: "error",
			timer: 2000,
			showConfirmButton: false
		}).then(function() {
			window.location.href = "login.html";
		});
	  </script>';
	}
	?>


</body>

</html>
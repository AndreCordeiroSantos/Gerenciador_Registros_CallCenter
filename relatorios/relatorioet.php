<!DOCTYPE html>
<html>

<head>

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="/archerx/public/wyntech/img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/archerx/public/wyntech/img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/archerx/public/wyntech/img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/archerx/public/wyntech/img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/archerx/public/wyntech/img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/archerx/public/wyntech/img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/archerx/public/wyntech/img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/archerx/public/wyntech/img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/archerx/public/wyntech/img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/archerx/public/wyntech/img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/archerx/public/wyntech/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/archerx/public/wyntech/img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/archerx/public/wyntech/img/favicon-16x16.png">
	<link rel="manifest" href="/archerx/public/wyntech/img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/archerx/public/wyntech/img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<title>Relatório por Estação</title>

	</title>
	<!-- Sweet Alert -->
	<link type="text/css" href="/archerx/public/wyntech/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
	<!-- Sweet Alerts 2 -->
	<script src="/archerx/public/wyntech/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>
	<?php
	session_start();
	if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location: login.html');
	}

	$logado = $_SESSION['login'];
	// Check the user's type and restrict access to this page if necessary
	if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'suporte' && $_SESSION['tipo'] != 'gerencia') {
		echo "<script language='javascript' type='text/javascript'>
    alert('VOCÊ NÃO TEM ACESSO A ESSA PÁGINA.');window.location
    .href='home.php';</script>";
	}
	?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Sweet Alert -->
	<link type="text/css" href="/archerx/public/wyntech/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

	<!-- Notyf -->
	<link type="text/css" href="/archerx/public/wyntech/vendor/notyf/notyf.min.css" rel="stylesheet">

	<!-- Volt CSS -->
	<link type="text/css" href="/archerx/public/wyntech/css/volt.css" rel="stylesheet">

</head>

<body>


	<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
		<a class="navbar-brand me-lg-5" href="#">
			<img class="navbar-brand-dark" src="/archerx/public/wyntech/assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="assets/img/brand/dark.svg" alt="Volt logo" />
		</a>
		<div class="d-flex align-items-center">
			<button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>

	<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
		<div class="sidebar-inner px-4 pt-3">
			<div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
				<div class="d-flex align-items-center">
					<div class="avatar-lg me-4">
						<img src="img/149071.png" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
					</div>

				</div>
				<div class="collapse-close d-md-none">
					<a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
						<svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
					</a>
				</div>
			</div>
			<ul class="nav flex-column pt-3 pt-md-0">
				<h4 style="color: #f46524;">Sistema P.X</h4>
				<li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

				<?php include '../nav2.php'; ?>

			</ul>
		</div>
	</nav>
	<main class="content">

		<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
			<div class="container-fluid px-0">
				<div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
					<div class="d-flex align-items-center">
						<!-- Titulo da página -->
						<h1>relatório por data</h1>
						<!-- / Titulo da página -->
					</div>
					<div class="d-flex align-items-center">
					</div>
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center">
						</li>
						<li class="nav-item dropdown ms-lg-3">
							<a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<div class="media d-flex align-items-center">
									<img class="avatar rounded-circle" alt="Image placeholder" src="/archerx/public/wyntech/img/149071.png">
									<div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
										<span class="mb-0 font-small fw-bold text-gray-900">
											<?php
											echo "<h4> $logado </h4>"
											?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">

								<a class="dropdown-item d-flex align-items-center" href="/archerx/public/wyntech/logoff.php">
									<svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="#">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
										</path>
									</svg>
									Logoff
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<br>

		<div role="separator" class="dropdown-divider my-1"></div>
		<br>
		<div class="container">
			<div class="card card-body border-0 shadow mb-4">
				<h3 class="card-title">Relatório por Estação:</h3>
				<?php

				//conectar ao banco de dados
				$servername = "172.10.20.47";
				$usernameDB = "archer";
				$passwordDB = "B5n3Qz2vL7HAUs7z";
				$dbname = "archerx";

				$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
				if (!$conn) {
					die("Conexão falhou: " . mysqli_connect_error());
				}

				// Verificar se o formulário foi enviado
				if (isset($_POST['submit'])) {
					// Obter o valor da coluna "et" enviado pelo formulário
					$et = mysqli_real_escape_string($conn, $_POST['et']);

					// Executar a consulta SQL para buscar as informações
					$sql = "SELECT et, numserie, data, usuario, motivo, req, causa, solucao, descricao FROM dados_wyntech WHERE et = '$et'";
					$result = mysqli_query($conn, $sql);

					// Exibir os resultados na tela
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "Nome Lógico: " . $row["et"] . "<br>";
							echo "Num/Serie: " . $row["numserie"] . "<br>";
							echo "Data: " . $row["data"] . "<br>";
							echo "Usuário: " . $row["usuario"] . "<br>";
							echo "Ocorrência: " . $row["motivo"] . "<br>";
							echo "Req: " . $row["req"] . "<br>";
							echo "Causa: " . $row["causa"] . "<br>";
							echo "Solução: " . $row["solucao"] . "<br>";
							echo "Observação: " . $row["descricao"] . "<br>";
							echo "_____________________________";
							echo "<br>";
						}
					} else {
						echo "Nenhum resultado encontrado.";
					}
				}

				// Fechar a conexão com o banco de dados
				mysqli_close($conn);
				?>
				<BR>
				<div>
					<button onclick="goBack()" class="btn btn-gray-800 mt-2 animate-up-2">Voltar</button>
					<script>
						function goBack() {
							window.history.back();
						}
					</script>
				</div>
			</div>
		</div>
		<BR><BR>
		<?php include 'footer.php'; ?>

	</main>

	<!-- Core -->
	<script src="/archerx/public/wyntech/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
	<script src="/archerx/public/wyntech/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Vendor JS -->
	<script src="/archerx/public/wyntech/vendor/onscreen/dist/on-screen.umd.min.js"></script>

	<!-- Slider -->
	<script src="/archerx/public/wyntech/vendor/nouislider/distribute/nouislider.min.js"></script>

	<!-- Smooth scroll -->
	<script src="/archerx/public/wyntech/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

	<!-- Charts -->
	<script src="/archerx/public/wyntech/vendor/chartist/dist/chartist.min.js"></script>
	<script src="/archerx/public/wyntech/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

	<!-- Datepicker -->
	<script src="/archerx/public/wyntech/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

	<!-- Sweet Alerts 2 -->
	<script src="/archerx/public/wyntech/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

	<!-- Moment JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

	<!-- Vanilla JS Datepicker -->
	<script src="/archerx/public/wyntech/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

	<!-- Notyf -->
	<script src="/archerx/public/wyntech/vendor/notyf/notyf.min.js"></script>

	<!-- Simplebar -->
	<script src="/archerx/public/wyntech/vendor/simplebar/dist/simplebar.min.js"></script>

	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>

	<!-- Volt JS -->
	<script src="/archerx/public/wyntech/assets/js/volt.js"></script>

</body>

</html>
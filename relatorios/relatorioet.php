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
	if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'suporte') {
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

				<li class="nav-item">
					<span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-app">
						<span>
							<span class="sidebar-icon">
								<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
									<path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
								</svg>
							</span>
							<span class="sidebar-text">Gerência</span>
						</span>
						<span class="link-arrow">
							<svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
								<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
							</svg>
						</span>
					</span>
					<div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
						<ul class="flex-column nav">
							<li class="nav-item ">
								<a class="nav-link" href="/archerx/public/wyntech/chamwynadm.php">
									<span class="sidebar-text">Painel Principal</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
						<ul class="flex-column nav">
							<li class="nav-item ">
								<a class="nav-link" href="/archerx/public/wyntech/usuarios.php">
									<span class="sidebar-text">Gerenciar Usuários</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
						<ul class="flex-column nav">
							<li class="nav-item ">
								<a class="nav-link" href="/archerx/public/wyntech/inserirtabela.php">
									<span class="sidebar-text">Consultar/Registrar</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
						<ul class="flex-column nav">
							<li class="nav-item ">
								<a class="nav-link" href="/archerx/public/wyntech/alterarregistros.php">
									<span class="sidebar-text">Gerenciar Registros</span>
								</a>
							</li>
							<li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
						</ul>
					</div>
				</li>

				<li class="nav-item">
					<a href="/archerx/public/wyntech/paineluser.php" class="nav-link">
						<span class="sidebar-icon">
							<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
								<path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
								<path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
							</svg>
						</span>
						<span class="sidebar-text">Painel Plansul</span>
					</a>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">
						<span class="sidebar-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mouse2" viewBox="0 0 16 16">
								<path d="M3 5.188C3 2.341 5.22 0 8 0s5 2.342 5 5.188v5.625C13 13.658 10.78 16 8 16s-5-2.342-5-5.188V5.189zm4.5-4.155C5.541 1.289 4 3.035 4 5.188V5.5h3.5V1.033zm1 0V5.5H12v-.313c0-2.152-1.541-3.898-3.5-4.154zM12 6.5H4v4.313C4 13.145 5.81 15 8 15s4-1.855 4-4.188V6.5z" />
							</svg>
						</span>
						<span class="sidebar-text">Solicitar Peças</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="/archerx/public/wyntech/chamadoff.php" class="nav-link">
						<span class="sidebar-icon">
							<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
								<path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
								<path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
								<path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
							</svg>
						</span>
						<span class="sidebar-text">Chamados Off</span>
					</a>
				</li>
				<li class="nav-item ">
					<a href="/archerx/public/wyntech/dashboard.php" class="nav-link">
						<span class="sidebar-icon">
							<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
								<path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
							</svg>
						</span>
						<span class="sidebar-text">Dashboard</span>
					</a>
				</li>
				<li class="nav-item active">
					<a href="/archerx/public/wyntech/relatorio.php" class="nav-link">
						<span class="sidebar-icon">
							<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
								<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
								<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z" />
							</svg>
						</span>
						<span class="sidebar-text">Relatórios</span>
					</a>
				</li>
				<li class="nav-item ">
					<a href="/archerx/public/wyntech/inventario.php" class="nav-link">
						<span class="sidebar-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
								<path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
							</svg>
						</span>
						<span class="sidebar-text">Inventário</span>
					</a>
				</li>
				<li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
				<br>
				<li class="nav-item">
					<span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
						<a href="#" class="logout-button"><img src="/archerx/public/wyntech/img/logo-removebg.png" style="width: 80%"></a>
					</span>
					</a>
				</li>
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
			</div>
		</div>

		<div class="container">
			<button onclick="goBack()" class="btn btn-gray-800 mt-2 animate-up-2">Voltar</button>
			<script>
				function goBack() {
					window.history.back();
				}
			</script>
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
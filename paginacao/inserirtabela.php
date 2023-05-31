<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];
// Check the user's type and restrict access to this page if necessary
if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'gerencia') {
	echo "<script language='javascript' type='text/javascript'>
alert('VOCÊ NÃO TEM ACESSO ADMIN PARA ESSA PÁGINA.');window.location
.href='home.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" sizes="18x18" href="img/favicon-16x16.png">
	<title>Consulta/Registros</title>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Icons -->
	<link href="css/font-awesome.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/style1.css" rel="stylesheet">
	<script>
		function copyToClipboard() {
			/* Pega as informações dos inputs */
			var input1 = document.getElementById("et");
			var input2 = document.getElementById("numserie");

			/* Formata as informações em uma string */
			var textToCopy = "" + input1.value + "\n" +
				"" + input2.value;

			/* Cria um elemento textarea para copiar o texto */
			var copyText = document.createElement("textarea");
			copyText.value = textToCopy;
			copyText.setAttribute("readonly", "");
			copyText.style.position = "absolute";
			copyText.style.left = "-9999px";
			document.body.appendChild(copyText);

			/* Seleciona e copia o texto */
			copyText.select();
			document.execCommand("copy");

			/* Remove o elemento textarea */
			document.body.removeChild(copyText);

			/* Exibe uma mensagem de sucesso */
			alert("Nome Lógico e Número de Série copiadas para a área de transferência!");
		}
	</script>
</head>

<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">

				<h1 class="site-title"><a href="inserirtabela.php">PROJETO-XAXIM</a></h1>
				<div class="dropdown-divider"></div>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-bar-chart"></em>
						Gerência
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="chamwynadm.php">Painel Principal</a>
							<a class="dropdown-item" href="usuarios.php">Gerenciar Usuários</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="inserirtabela.php">Consultar/Registros</a>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link" href="paineluser.php"><em class="fa fa-calendar-o"></em> Painel Plansul</a></li>
					<li class="nav-item"><a class="nav-link" href="chamadoff.php"><em class="fa fa-hand-o-up"></em> Chamados OFF</a></li>
					<li class="nav-item"><a class="nav-link" href="dashboard.php"><em class="fa fa-dashboard"></em>Dashboard</a></li>
					<li class="nav-item"><a class="nav-link" href="relatorio.php"><em class="fa fa-pencil-square-o"></em> Relatórios</a></li>
					<li class="nav-item"><a class="nav-link" href="inventario.php"><em class="fa fa-pencil-square-o"></em> Inventário</a></li>
				</ul>
				<a href="inserirtabela.php" class="logout-button"><img src="img/logoWT-1-300x75.png" style="width: 95%"></a>
			</nav>
			<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8">
						<h5 class="float-left text-center text-md-left">Consulta/Registros</h5>
					</div>
					<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="img/149071.png" alt="profile photo" class="circle float-left profile-photo" width="70" height="auto">
							<div class="username mt-1">
								<h4 class="mb-1">
									<?php
									echo "<h4> $logado </h4>"
									?>
								</h4>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="logoff.php"><em class="fa fa-power-off mr-1"></em> Logout</a>
						</div>
					</div>
					<div class="clear"></div>
				</header>
				<div class="shadow-lg p-3 mb-5 bg-white rounded">
					<h4> ATENÇÃO, ANTES DE REGISTRAR <mark>ET E NÚMERO DE SÉRIE</mark>, FAÇA UMA BUSCA PARA <mark>VERIFICAR</mark> SE JÁ POSSUI REGISTRO.</h4>
					<br> <br>
					<div class="col-sm-12">
						<section class="row">
							<div class="col-sm-12 col-md-6">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Verificar se há Registros ou Copiar.</h3>
										<h1>Estação:</h1>
										<input type="text" name="et" id="et" placeholder="Nome Lógico:" />
										<br>
										<h1>Número de Série:</h1>
										<input type="text" class="numserie" readonly="" name="numserie" id="numserie" placeholder="Numero de serie:" />
										<input type="button" onclick="pesquisarEt(document.getElementById('et').value)" value="Buscar" />
										<br> <br>
										<button type="button" onclick="copyToClipboard()">Copiar</button>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 ">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Gravar novo Registro.</h3>
										<form class="buscar" action="inserirconsulta.php" id="buscar" method="post">
											<h1>Estação / insira apenas o número sem o <mark>'PR6534ET'</mark></h1>
											<input type="entry" class="campo3" name="et1" id="et1" placeholder="Nome Lógico:" />
											<br>
											<h1>Número de Série:</h1>
											<input type="entry" class="campo4" name="numserie1" id="numserie1" placeholder="Número de Série:" />
											<br><br>
											>><input type="submit" value="Registrar">
											<< </form>

									</div>
								</div>
							</div>

					</div>
					</section>
				</div>
				</section>
			</main>
		</div>
	</div>
	</div>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="dist/js/bootstrap.min.js"></script>

	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom3.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

</body>

</html>
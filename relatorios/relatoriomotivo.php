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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="/archerx/public/wyntech/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="/archerx/public/wyntech/vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="/archerx/public/wyntech/css/volt.css" rel="stylesheet">

    <!-- Inclua essas bibliotecas no cabeçalho do seu arquivo HTML -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
                        <img src="/archerx/public/wyntech/img/avatar3.png" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
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
                <h5 class="site-title"><a href="#">PROJETO-XAXIM</a></h5>
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
                        <h1>Relatórios</h1>
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
                                    <img class="avatar rounded-circle" alt="Image placeholder" src="/archerx/public/wyntech/img/avatar3.png">
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
        <div class="container">
            <div class="card card-body border-0 shadow mb-4 mb-xl-0">

                <table id="minhaTabela">
                    <thead>
                        <tr>
                            <th>Nome Lógico</th>
                            <th>Num/Serie</th>
                            <th>usuario</th>
                            <th>motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>

        <!-- Adicione esse código JavaScript para inicializar o DataTables na tabela -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#minhaTabela').DataTable({
                    // idioma portugues BR
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
                    },
                    columns: [{
                            data: 'et'
                        },
                        {
                            data: 'numserie'
                        },
                        {
                            data: 'data'
                        },
                        {
                            data: 'usuario'
                        },
                        {
                            data: 'motivo'
                        }
                    ],
                    "pageLength": 15,
                    "lengthMenu": [15, 30, 50, 100],
                    "order": [
                        [0, 'desc']
                    ],
                    ajax: {
                        url: '/archerx/public/wyntech/funcoes/relatorio_motivo.php',
                        type: 'POST',
                        data: function(data) {
                            // Obter o motivo a partir de um elemento do formulário
                            var motivo = $('#motivo').val();

                            // Adicionar o motivo aos dados enviados pelo Ajax
                            data.motivo = motivo;
                        },
                        dataSrc: ''
                    },
                    rowId: 'id'
                });
            });
        </script>

        <div role="separator" class="dropdown-divider my-1"></div>
        <?php include '/archer/public/wyntech/footer.php'; ?>

    </main>

    <!-- Core -->
    <script src="vendor/@popperjs/core/dist/umd/popper.min.js"></script>
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

    <!-- scrip para puxar o numero de serie da maquina na informação do formulário-->
    <script src="/archerx/public/wyntech/js/custom3.js"></script>

</body>

</html>
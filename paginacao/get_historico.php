<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: login.html');
}
$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Histórico Inventário</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Inclua essas bibliotecas no cabeçalho do seu arquivo HTML -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Sweet Alert -->
    <link type="text/css" href="style/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- CSS -->
    <link type="text/css" href="css/volt.css" rel="stylesheet">

</head>

<body>
    <!--Menu hamburguer-->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!--menu lateral esquerda-->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4">
                        <img src="img/149071.png" class="card-img-top rounded-circle border-white" alt="Avatar">
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

                <!-- puxa o código padrao do navbar -->
                <?php include 'nav.php'; ?>
                <!-- puxa o código padrao do navbar -->

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                <br>
            </ul>
        </div>
    </nav>
    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Título da página -->
                        <h1>Histórico Inventário</h1>
                        <!-- Título da página -->
                    </div>
                    <div class="d-flex align-items-center">
                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        </li>
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder" src="img/149071.png">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-gray-900">
                                            <h5> <?php
                                                    echo $_SESSION['nome'];
                                                    ?>
                                        </span></h5>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                <a class="dropdown-item d-flex align-items-center" href="agenda.php">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                    </svg>
                                    Agenda Perfil
                                </a>
                                <div role="separator" class="dropdown-divider my-1"></div>
                                <a class="dropdown-item d-flex align-items-center" href="logoff.php">
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
            <div class="card card-body border-1 shadow mb-4">
                <h3>Histórico Xaxim</h3>
                <h6 style="color: #f46524">Histórico feito por data e ordem.</h6>
                <?php
                // Configurações de conexão com o banco de dados
                $servername = "#";
                $username = "#";
                $password = "#";
                $dbname = "#";

                // Criando a conexão
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificando a conexão
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                // Query SQL com JOIN para selecionar os dados necessários
                $sql = "SELECT b.baia, rb.ramal, h.hostname, h.serial, m.serie, f.nome, hg.data
                            FROM historico_gps hg
                            LEFT JOIN baia b ON hg.id_baia = b.id
                            LEFT JOIN ramal_baia rb ON hg.id_ramal_baia = rb.id
                            LEFT JOIN hosts h ON hg.id_hostname = h.id
                            LEFT JOIN monitores m ON hg.id_monitores = m.id
                            LEFT JOIN usuarios f ON hg.Id_funcionario = f.login
                            ORDER BY hg.data DESC";

                // Executando a query e armazenando o resultado na variável $result
                $result = $conn->query($sql);

                // Verificando se a query retornou algum resultado
                if ($result->num_rows > 0) {
                    // Criando a tabela para exibir os resultados

                    echo "<table class='TabelaChamados' id='minhaTabela'>
        <thead>
            <tr>
                <th>Baia</th>
                <th>Ramal Baia</th>
                <th>Estação</th>
                <th>Num/serie</th>
                <th>Monitores/Serial</th>
                <th>Funcionário</th>
                <th>Última Alteração</th>
            </tr>
        </thead>
        <tbody>";
                    // Percorrendo cada linha do resultado e exibindo na tabela
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
            <td>" . $row["baia"] . "</td>
            <td>" . $row["ramal"] . "</td>
            <td>" . $row["hostname"] . "</td>
            <td>" . $row["serial"] . "</td>
            <td>" . $row["serie"] . "</td>
            <td>" . $row["nome"] . "</td>
            <td>" . $row["data"] . "</td>
        </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "Nenhum resultado encontrado.";
                }
                // Fechando a conexão com o banco de dados
                $conn->close();
                ?>
            </div>
        </div>

        <!-- DataTables CSS -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('#minhaTabela').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
                    },
                    "pageLength": 15,
                    "lengthMenu": [15, 30, 50, 100],
                    "order": [
                        [6, 'desc']
                    ]
                });
            });
        </script>

        <?php include 'footer.php'; ?>

    </main>
    <!-- Core -->
    <script src="style/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="style/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- style JS -->
    <script src="style/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="style/nouislider/distribute/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="style/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="style/chartist/dist/chartist.min.js"></script>
    <script src="style/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="style/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="style/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="style/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="style/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="style/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="assets/js/volt.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
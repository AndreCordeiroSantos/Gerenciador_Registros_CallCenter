<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: login.html');
}
$logado = $_SESSION['login'];
// Check the user's type and restrict access to this page if necessary
if ($_SESSION['tipo'] != 'admin') {
    echo "<script language='javascript' type='text/javascript'>
      alert('VOCÊ NÃO TEM ACESSO ADMIN PARA ESSA PÁGINA.');window.location
      .href='paineluser.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Inclua essas bibliotecas no cabeçalho do seu arquivo HTML -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Sweet Alert -->
    <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="css/volt.css" rel="stylesheet">

    <script>
        function mostrarCampoAdicional() {
            var motivo = document.getElementById("motivo");
            var campoAdicional = document.getElementById("campo-adicional");
            if (motivo.value == "NAO LIGA" || motivo.value == "TELA AZUL" || motivo.value == "LENTIDAO") {
                campoAdicional.style.display = "block";
            } else {
                campoAdicional.style.display = "none";
            }
        }
    </script>
    <style>
        .my-form {
            display: none;
            opacity: 1;
            transition: opacity 2.9s ease;
            align-items: center;
        }

        .my-form.show {
            display: block;
            opacity: 1;
            align-items: center;
        }
    </style>
    <script>
        function toggleForms() {
            var forms = document.getElementsByClassName("my-form");
            for (var i = 0; i < forms.length; i++) {
                if (forms[i].style.display === "none") {
                    forms[i].style.display = "block"; /* Mostra o formulário */
                } else {
                    forms[i].style.display = "none"; /* Oculta o formulário */
                }
            }
        }
    </script>
    <style>
        .my-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>


</head>

<body>


    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="#">
            <img class="navbar-brand-dark" src="assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="assets/img/brand/dark.svg" alt="Volt logo" />
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

                <?php include 'nav.php'; ?>

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                <br>
                <li class="nav-item">
                    <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
                        <a href="#" class="logout-button"><img src="img/logo-removebg.png" style="width: 80%"></a>
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
                        <!-- Search form -->
                        <h1>Painel Principal</h1>
                        <!-- / Search form -->
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
                                        <span class="mb-0 font-small fw-bold text-gray-900"><?php
                                                                                            echo "<h4> $logado </h4>"
                                                                                            ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                    </svg>
                                    My Profile
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Settings
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                                        <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                                    </svg>
                                    Messages
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    Support
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
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link" href="chamwynadm.php">Registrar</a></li>
                    <li class="nav-item"><a class="nav-link active" href="inforegister.php">Registros</a></li>
                    <li class="nav-item"><a class="nav-link" href="p_wyntech.php">Peças</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="card card-body border-0 shadow mb-4 mb-xl-0">
                <h3 class="card-title">Últimos chamados registrados.</h3>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                <br>
                <?php
                // Conecte-se ao banco de dados
                $servername = "172.10.20.47";
                $usernameDB = "archer";
                $passwordDB = "B5n3Qz2vL7HAUs7z";
                $dbname = "archerx";

                $conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
                if (!$conn) {
                    die("Conexão falhou: " . mysqli_connect_error());
                }

                // Consulta à tabela
                $query = "SELECT * FROM dados_wyntech WHERE status = 'registrado' 
                ORDER BY ID DESC LIMIT $results_per_page OFFSET $offset";

                $result = mysqli_query($conn, $query);

                // Consulta à tabela com os termos de busca
                $query = "SELECT * FROM dados_wyntech WHERE status = 'registrado'";

                $result = mysqli_query($conn, $query);
                ?>
                <!-- Adicione um ID à sua tabela para poder selecioná-la com o jQuery -->
                <table id="minhaTabela">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome Lógico</th>
                            <th>data</th>
                            <th>suporte</th>
                            <th>Ocorrência</th>
                            <th>REQ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['et']; ?></td>
                                <td><?php echo $row['data']; ?></td>
                                <td><?php echo $row['usuario']; ?></td>
                                <td><?php echo $row['motivo']; ?></td>
                                <td><?php echo $row['req']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Adicione esse código JavaScript para inicializar o DataTables na sua tabela -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#minhaTabela').DataTable({
                            // Adicione a opção de idioma
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
                            },
                            // Opções de exibição de registros por página
                            "lengthMenu": [30, 50, 100, 300],
                        });
                    });
                </script>

                <br>
                <?php
                $query = "SELECT COUNT(*)
                    FROM dados_wyntech 
                    WHERE status = 'registrado'";

                // Executa a consulta
                $resultado = mysqli_query($conn, $query);

                // Verifica se ocorreu algum erro na execução da consulta
                if (!$resultado) {
                    die('Erro na consulta: ' . mysqli_error($conn));
                }

                // Recupera o valor retornado pela consulta
                $quantidade = mysqli_fetch_row($resultado)[0];

                // Exibe o valor
                echo '<br>';
                echo '<h4>Total: <mark>' . $quantidade;
                echo '</mark> Chamados registrados.';
                echo '</h4>';
                // Fecha a conexão com o banco de dados
                mysqli_close($conn);
                ?>
                <br>

            </div>
        </div>

        <?php include 'footer.php'; ?>
    </main>
    <!-- Core -->
    <script src="vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="vendor/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="vendor/nouislider/distribute/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="vendor/chartist/dist/chartist.min.js"></script>
    <script src="vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="assets/js/volt.js"></script>


    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-gray'
            },
            buttonsStyling: false
        });

        // SweetAlert 2
        document.getElementById('basicAlert').addEventListener('click', function() {
            swalWithBootstrapButtons.fire(
                'Basic alert',
                'You clicked the button!'
            )
        });

        document.getElementById('infoAlert').addEventListener('click', function() {
            swalWithBootstrapButtons.fire(
                'Info alert',
                'You clicked the button!',
                'info'
            )
        });

        document.getElementById('successAlert').addEventListener('click', function() {
            swalWithBootstrapButtons.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Chamado Lançado com sucesso',
                showConfirmButton: true,
                timer: 3500
            })
        });

        document.getElementById('warningAlert').addEventListener('click', function() {
            swalWithBootstrapButtons.fire(
                'Warning alert',
                'You clicked the button!',
                'warning'
            )
        });

        document.getElementById('dangerAlert').addEventListener('click', function() {
            swalWithBootstrapButtons.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        });

        document.getElementById('questionAlert').addEventListener('click', function() {
            swalWithBootstrapButtons.fire(
                'The Internet?',
                'That thing is still around?',
                'question'
            );
        });

        document.getElementById('notifyTopLeft').addEventListener('click', function() {
            const notyf = new Notyf({
                position: {
                    x: 'left',
                    y: 'top',
                },
                types: [{
                    type: 'info',
                    background: '#0948B3',
                    icon: {
                        className: 'fas fa-info-circle',
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }]
            });
            notyf.open({
                type: 'info',
                message: 'Send us <b>an email</b> to get support'
            });
        });

        document.getElementById('notifyTopRight').addEventListener('click', function() {
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [{
                    type: 'error',
                    background: '#FA5252',
                    icon: {
                        className: 'fas fa-times',
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }]
            });
            notyf.open({
                type: 'error',
                message: 'This action is not allowed.'
            });
        });

        document.getElementById('notifyBottomLeft').addEventListener('click', function() {
            const notyf = new Notyf({
                position: {
                    x: 'left',
                    y: 'bottom',
                },
                types: [{
                    type: 'warning',
                    background: '#F5B759',
                    icon: {
                        className: 'fas fa-exclamation-triangle',
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }]
            });
            notyf.open({
                type: 'warning',
                message: 'This might be dangerous.'
            });
        });

        document.getElementById('notifyBottomRight').addEventListener('click', function() {
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'bottom',
                },
                types: [{
                    type: 'info',
                    background: '#262B40',
                    icon: {
                        className: 'fas fa-comment-dots',
                        tagName: 'span',
                        color: '#fff'
                    },
                    dismissible: false
                }]
            });
            notyf.open({
                type: 'info',
                message: 'John Garreth: Are you ready for the presentation?'
            });
        });
    </script>

</body>

</html>
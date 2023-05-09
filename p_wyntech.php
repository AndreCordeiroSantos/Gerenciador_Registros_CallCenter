<!DOCTYPE html>
<html>

<head>
    <title>Gerenciar peças</title>
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

    <!-- Sweet Alert -->
    <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Sweet Alerts 2 -->
    <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: login.html');
}

header("Refresh: 1200"); // atualiza a página a cada 1200 segundos (20 minutos)

$logado = $_SESSION['login'];
// chekaro tipo do usuário
if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'suporte') {
    echo "<script>
  Swal.fire({
      title: 'Acesso Negado!',
      text: 'Você não tem acesso a esse menu.',
      icon: 'error'
  }).then((result) => {
      window.location.href = 'home.php';
  });
</script>";
}
?>

<head>

    <style>
        .custom-btn {
            border: 1px solid black;
            padding: 8px 16px;
            font-size: 16px;
            font-weight: bold;
            color: black;
            background-color: transparent;
            cursor: pointer;
            border-radius: 5px;
            margin-right: 10px;
        }

        .custom-btn:hover {
            background-color: #f2f2f2;
        }

        #minhaTabela td.status .status-circle {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: green;
            margin-right: 5px;
        }

        #minhaTabela td.status .status-circle.purple {
            background-color: purple;
            margin-right: 5px;
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        #minhaTabela td.status .status-circle.orange {
            background-color: orange;
            margin-right: 5px;
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        #minhaTabela td.status:contains('finalizado') {
            color: purple;
        }

        #minhaTabela td.status:contains('em andamento') {
            color: orange;
        }

        #minhaTabela td.status {
            color: green;
        }
    </style>

    <!-- Inclua as bibliotecas do jQuery e DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Sweet Alert -->
    <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="css/volt.css" rel="stylesheet">

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
                                <a class="nav-link" href="chamwynadm.php">
                                    <span class="sidebar-text">Painel Principal</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="usuarios.php">
                                    <span class="sidebar-text">Gerenciar Usuários</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="inserirtabela.php">
                                    <span class="sidebar-text">Consultar/Registrar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="alterarregistros.php">
                                    <span class="sidebar-text">Gerenciar Registros</span>
                                </a>
                            </li>
                            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                        </ul>
                    </div>
                </li>

                <?php include 'nav.php'; ?>

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
                        <!-- Titulo da página -->
                        <h1>Gerenciar Peças</h1>
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
                                    <img class="avatar rounded-circle" alt="Image placeholder" src="img/149071.png">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-gray-900">
                                            <?php
                                            echo "<h4> $logado </h4>"
                                            ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">

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


        <!-- Modal 1 -->
        <div class="modal fade" id="meu-modal1" tabindex="-1" aria-labelledby="meu-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="meu-modal-label">Aceite de Solicitação.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form form class="buscar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Id">ID</label>
                                    <input type="text" readonly="" class="borda-arredondadas" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <label for="peca">Peças</label>
                                    <input type="text" class="form-control" name="peca" id="peca" readonly="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="num-serie">REQ</label>
                                    <input type="text" class="form-control" name="req" id="req" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <label for="solicitante">Solicitante</label>
                                    <input type="text" class="form-control" name="solicitante" id="solicitante" readonly="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="num-serie">Situação</label>
                                    <input type="text" class="form-control" name="status" id="modalStatus" readonly="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="responsavel">Responsável</label>
                                <select class="form-select" name="responsavel" id="responsavel">
                                    <option value=""></option>
                                    <option value="Andre Santos">André Santos</option>
                                    <option value="Lucas Fabro">Lucas Fabro</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Aceitar Solicitação</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- Moda2 -->
        <div class="modal fade" id="meu-modal2" tabindex="-1" aria-labelledby="meu-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="meu-modal-label">Finalizar Solicitação.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form form class="buscar" action="finalizarpecas.php" method="post">
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <label for="num-serie">ID</label>
                                    <input type="text" class="form-control" name="id1" id="id1" readonly="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="num-serie">Descrição</label>
                                    <input type="text" class="form-control" name="descricao" id="descricao" readonly="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <label for="num-serie">Situação</label>
                                    <input type="text" class="form-control" name="status" id="status" readonly="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="responsavel">Finalizar Solicitação</label>
                                    <select class="form-select" name="status1" id="status1">
                                        <option value=""></option>
                                        <option value="finalizado">finalizar</option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Finalizar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div role="separator" class="dropdown-divider my-1"></div>
        <br>
        <div class="container">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link " href="chamwynadm.php">Registrar</a></li>
                    <li class="nav-item"><a class="nav-link" href="inforegister.php">Registros</a></li>
                    <li class="nav-item"><a class="nav-link active" href="p_wyntech.php">Peças</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="card card-body border-0 shadow mb-4">
                <h3 class="card-title">Gerenciar Solicitação de peças.</h3>
                <br>
                <div class="d-flex justify-content-start">


                </div>
                <br>
                <table id="minhaTabela">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Solicitante</th>
                            <th>Responsável</th>
                            <th>data</th>
                            <th>REQ</th>
                            <th>Status</th>
                            <th>Verificar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Configurações do banco de dados
                        $db_host = '172.10.20.47';
                        $db_user = 'archer';
                        $db_pass = 'B5n3Qz2vL7HAUs7z';
                        $db_name = 'archerx';

                        // Conecta ao banco de dados
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                        // Verifica se a conexão foi bem-sucedida
                        if (!$conn) {
                            die('Não foi possível conectar ao banco de dados: ' . mysqli_connect_error());
                        }

                        // Define a consulta SQL
                        $sql = "SELECT id, p_descricao, p_quantidade, p_solicitante, p_responsavel, p_data, p_req, p_status FROM p_wyntech ORDER BY id DESC";

                        // Executa a consulta SQL
                        $result = mysqli_query($conn, $sql);

                        // Verifica se a consulta foi bem-sucedida
                        if (!$result) {
                            die('Erro ao executar a consulta: ' . mysqli_error($conn));
                        }

                        // Percorre os resultados da consulta e exibe os dados na tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['p_descricao'] . '</td>';
                            echo '<td>' . $row['p_quantidade'] . '</td>';
                            echo '<td>' . $row['p_solicitante'] . '</td>';
                            echo '<td>' . $row['p_responsavel'] . '</td>';
                            echo '<td>' . $row['p_data'] . '</td>';
                            echo '<td>' . $row['p_req'] . '</td>';
                            if ($row['p_status'] == 'finalizado') {
                                echo "<td class='status' style='color: purple;'><span class='status-circle purple'></span> " . $row['p_status'] . "</td>";
                            } elseif ($row['status'] == 'aberto') {
                                echo "<td class='status'><span class='status-circle green'></span> " . $row['p_status'] . "</td>";
                            } elseif ($row['p_status'] == 'em andamento') {
                                echo "<td class='status' style='color: orange;'><span class='status-circle orange'></span> " . $row['p_status'] . "</td>";
                            } else {
                                echo "<td class='status'><span class='status-circle'></span> " . $row['p_status'] . "</td>";
                            }

                            echo "<td><a><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/> <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/> </svg></a></td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </main>
    <!-- Adicione esse código JavaScript para inicializar o DataTables na sua tabela -->
    <script>
        $(document).ready(function() {
            $('#minhaTabela').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
                },
                "pageLength": 15,
                "lengthMenu": [15, 30, 50, 100],
                "order": [
                    [0, 'desc']
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": "_all"
                }, {
                    "orderable": true,
                    "targets": [0]
                }]
            });
        });
    </script>

    <script>
        $('svg.bi-pencil-square').on('click', function() {
            // Obtenha a linha da tabela que contém o elemento SVG clicado
            var row = $(this).closest('tr');
            var status = row.find('td:eq(7)').text();

            if (status.trim() == 'finalizado' || $(this).closest('tr').find('.status:before').text().trim() == '● finalizado') {
                // Exiba uma mensagem de erro usando o SweetAlert2
                Swal.fire({
                    icon: 'warning',
                    title: 'Atenção!',
                    text: 'Essa solicitação já está finalizada',
                    showConfirmButton: false,
                    timer: 2000
                });
            } else if (status.trim() == 'em andamento' || $(this).closest('tr').find('.status:before').text().trim() == '● em andamento') {
                // Obtenha os valores das células da linha
                var id1 = row.find('td:eq(0)').text();
                var descricao = row.find('td:eq(1)').text();
                var status = row.find('td:eq(7)').text();

                // Atualize o conteúdo do modal com os valores das células
                $('#id1').val(id1);
                $('#descricao').val(descricao);
                $('#status').val(status);

                // Exiba o modal
                $('#meu-modal2').modal('show');
            } else if (status.trim() == 'aberto' || $(this).closest('tr').find('.status:before').text().trim() == '● aberto') {
                // Obtenha os valores das células da linha
                var id = row.find('td:eq(0)').text();
                var peca = row.find('td:eq(1)').text();
                var solicitante = row.find('td:eq(3)').text();
                var req = row.find('td:eq(6)').text();
                var status = row.find('td:eq(7)').text();

                // Atualize o conteúdo do modal com os valores das células
                $('#id').val(id);
                $('#peca').val(peca);
                $('#solicitante').val(solicitante);
                $('#req').val(req);
                $('#modalStatus').val(status);

                // Exiba o modal
                $('#meu-modal1').modal('show');
            }
        });
        // Botão de Fechar o Modal
        $('#closeButton').on('click', function() {
            // Feche o modal
            $('#myModal').modal('hide');
        });
    </script>

    <script>
        function contarCaracteres() {
            var descricao = document.getElementById("descricao");
            var contador = document.getElementById("contador");
            var limite = 255;
            var caracteresDigitados = descricao.value.length;
            contador.innerHTML = caracteresDigitados + "/" + limite;
            if (caracteresDigitados >= limite) {
                contador.style.color = "red";
            } else {
                contador.style.color = "black";
            }
        }
    </script>
    <script>
        const range = document.getElementById('myRange');
        const rangeValue = document.getElementById('rangeValue');

        // Define o valor inicial do span
        rangeValue.textContent = range.value;

        // Atualiza o valor do span sempre que o valor do input mudar
        range.addEventListener('input', () => {
            rangeValue.textContent = range.value;
        });
    </script>
    <script>
        const btnAtualizar = document.getElementById('btn-atualizar');
        btnAtualizar.addEventListener('click', function() {
            const spinner = this.querySelector('.spinner-border');
            spinner.classList.remove('d-none');
            location.reload();
        });

        window.addEventListener('load', function() {
            const spinner = btnAtualizar.querySelector('.spinner-border');
            spinner.classList.add('d-none');
        });
    </script>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Incluir a conexao com o banco de dados
        $servername = "172.10.20.47";
        $usernameDB = "archer";
        $passwordDB = "B5n3Qz2vL7HAUs7z";
        $dbname = "archerx";


        $con = new PDO("mysql:host=$servername;dbname=" . $dbname, $usernameDB, $passwordDB);
        if (!$con) {
            die("Conexão falhou: " . mysqli_connect_error());
        }


        $id = $_POST['id'];
        $responsavel = $_POST['responsavel'];


        //Preparar a query de update:
        $sql = "UPDATE p_wyntech SET p_status = 'em andamento', p_responsavel=:responsavel WHERE id=:id";
        $stmt = $con->prepare($sql);

        //Vincular os valores aos parâmetros da query:
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':responsavel', $responsavel);

        //tratativa de erros caso alguma informação do formulário esteja faltando

        if ($responsavel == "") {
            echo "<script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-gray'
                },
                buttonsStyling: false
            });
    
            swalWithBootstrapButtons.fire({
                title: 'Erro!',
                text: 'Erro ao aceitar solicitação, selecione um Responsável.',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'p_wyntech.php';
                }
            });
        </script>";
        } else {
            if ($stmt->execute()) {
                echo "<script>
                Swal.fire({
                  title: 'Sucesso!',
                  text: 'Solicitação aceito com sucesso.',
                  icon: 'success'
                }).then((result) => {
                  window.location.href = 'p_wyntech.php';
                });
              </script>";
            }
        }
    }
    ?>

    <!-- Core -->
    <script src="vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

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



</body>

</html>
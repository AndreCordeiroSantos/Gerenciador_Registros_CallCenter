<!DOCTYPE html>
<html>

<head>
    <title>Solicitar Peças</title>
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

        .status-aberto {
            color: green;
        }

        .status-aberto:before {
            content: '● ';
        }

        .status-em-andamento {
            color: orange;
        }

        .status-em-andamento:before {
            content: '● ';
        }

        .status-finalizado {
            color: purple;
        }

        .status-finalizado:before {
            content: '● ';
        }
    </style>

    <!-- Sweet Alert -->
    <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Sweet Alerts 2 -->
    <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

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
    <?php
    session_start();
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: login.html');
    }

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
                        <h1>Solicitar Peças</h1>
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
        <div role="separator" class="dropdown-divider my-1"></div>
        <br>
        <div class="container">
            <div class="card card-body border-0 shadow mb-4">
                <h3 class="card-title">Registros de solicitações.</h3>
                <br>
                <div class="d-flex justify-content-start">
                    <button class="custom-btn custom-btn-solicitar" id="btn-solicitar" type="button" data-bs-toggle="modal" data-bs-target="#meu-modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 3a.5.5 0 0 1 .5.5v3.5h3a.5.5 0 0 1 0 1h-3v3.5a.5.5 0 0 1-1 0V8H3.5a.5.5 0 0 1 0-1H7V3.5A.5.5 0 0 1 8 3z" />
                        </svg>
                        Solicitar
                    </button>

                    <button id="btn-atualizar" class="custom-btn custom-btn-atualizar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                        Atualizar
                        <div class="spinner-border spinner-border-sm text-primary d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="meu-modal" tabindex="-1" aria-labelledby="meu-modal-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="meu-modal-label">Solicitação de Peças</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center align-items-center">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group row">
                                            <div class="col-md-6 mb-3">
                                                <label for="peca">Peças*</label>
                                                <select class="form-select" name="peca" id="peca">
                                                    <option value=""></option>
                                                    <option value="Monitor">Monitor</option>
                                                    <option value="Mouse">Mouse</option>
                                                    <option value="Teclado">Teclado</option>
                                                    <option value="Cabo Força">Cabo Força</option>
                                                    <option value="Cabo VGA">Cabo VGA</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="num-serie">Num/Série</label>
                                                <input type="text" class="form-control" name="numserie" id="numserie" readonly="" value="1A6530F80">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 mb-3">
                                                <label for="solicitante">Solicitante*</label>
                                                <select class="form-select" name="solicitante" id="solicitante">
                                                    <option value=""></option>
                                                    <option value="Sandro">Sandro</option>
                                                    <option value="Geysebel">Geysebel</option>
                                                    <option value="Salmo">Salmo</option>
                                                    <option value="Kemily">Kemily</option>
                                                    <option value="Daniel">Daniel</option>
                                                    <option value="Mateus">Mateus</option>
                                                    <option value="Marcelo">Marcelo Nawa</option>
                                                    <option value="Juliano">Juliano</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="quantidade">Quantidade</label>
                                                <input type="range" min="1" max="10" class="form-control-range" name="quantidade" id="myRange" value="1" oninput="updateRangeValue()">
                                                <h6>Total: <span id="rangeValue">1</span></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="num-serie">REQ*</label>
                                            <input type="text" class="form-control" name="req" id="req">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="observacao">Observação*</label>
                                            <textarea class="form-control" id="descricao" name="descricao" rows="3" cols="50" maxlength="255" oninput="contarCaracteres()" rows="3"></textarea>
                                            <span id="contador"></span>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Solicitar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
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
                        $sql1 = "SELECT id, p_descricao, p_quantidade, p_solicitante, p_responsavel, p_data, p_req, p_status FROM p_wyntech ORDER BY id DESC";

                        // Executa a consulta SQL
                        $result = mysqli_query($conn, $sql1);

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
                            // Define a classe de estilo para o valor do status
                            if ($row['p_status'] == 'aberto') {
                                $class = 'status-aberto';
                            } elseif ($row['p_status'] == 'em andamento') {
                                $class = 'status-em-andamento';
                            } elseif ($row['p_status'] == 'finalizado') {
                                $class = 'status-finalizado';
                            } else {
                                $class = '';
                            }

                            // Exibe o valor do status com a classe de estilo aplicada
                            echo '<td class="' . $class . '">' . $row['p_status'] . '</td>';

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Conecte-se ao banco de dados
                $usuario_db = 'archer';
                $senha_db = 'B5n3Qz2vL7HAUs7z';
                $database_db = 'archerx';
                $host_db = '172.10.20.47';

                $conn = new mysqli($host_db, $usuario_db, $senha_db, $database_db);
                if (!$conn) {
                    die("Conexão falhou: " . mysqli_connect_error());
                }
                var_dump($sql);
                $peca = $_POST["peca"];
                $numserie = $_POST["numserie"];
                $solicitante = $_POST["solicitante"];
                $quantidade = $_POST["quantidade"];
                $req = $_POST["req"];
                $observacao = $_POST["descricao"];

                if (empty($peca) || empty($numserie) || empty($solicitante) || !preg_match('/^REQ/', $req) || empty($observacao)) {
                    // Exibe erro caso alguma informação esteja faltando
                    echo "<script>
                    Swal.fire({
                      title: 'Erro!',
                      text: 'Por favor, coloque todas as informações corretas',
                      icon: 'error',
                      timer: 2000, // tempo em milissegundos
                      showConfirmButton: false
                    }).then((result) => {
                      window.location.href = 'pecas_wyntech.php';
                    });
                </script>";
                } else {
                    // Verifica se a REQ já existe no banco de dados
                    $checkReq = $conn->prepare("SELECT * FROM p_wyntech WHERE p_req = ?");
                    $checkReq->bind_param("s", $req);
                    $checkReq->execute();
                    $result = $checkReq->get_result();

                    if ($result->num_rows > 0) {
                        // Exibe erro caso a REQ já exista no banco de dados
                        echo "<script>
                        Swal.fire({
                          title: 'Erro!',
                          text: 'Esta REQ já está registrada no sistema',
                          icon: 'error',
                          timer: 2000, // tempo em milissegundos
                          showConfirmButton: false
                        }).then((result) => {
                          window.location.href = 'pecas_wyntech.php';
                        });
                    </script>";
                    } else {
                        // Insere a nova linha na tabela
                        $sql = "INSERT INTO p_wyntech (p_descricao, p_numserie, p_solicitante, p_data, p_status, p_quantidade, p_req, p_observacao)
                    VALUES ('$peca', '$numserie', '$solicitante', now(), 'aberto', $quantidade, '$req', '$observacao')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script>
                            Swal.fire({
                              title: 'Sucesso!',
                              text: 'Chamado Registrado com sucesso.',
                              icon: 'success'
                            }).then((result) => {
                              window.location.href = 'pecas_wyntech.php';
                            });
                        </script>";
                        } else {
                            echo "<script>
                            Swal.fire({
                              title: 'Erro!',
                              text: 'Houve um erro ao registrar solicitação, tente novamente.',
                              icon: 'error',
                              
                              showConfirmButton: true
                            }).then((result) => {
                              window.location.href = 'pecas_wyntech.php';
                            });
                        </script>";
                        }
                    }
                }
            }
            ?>
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
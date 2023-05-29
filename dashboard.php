</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Sweet Alert -->
    <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Sweet Alerts 2 -->
    <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dashboard</title>

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

    <!-- Volt CSS -->
    <link type="text/css" href="css/volt.css" rel="stylesheet">

    <!-- Inclua as bibliotecas Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/lang/pt-BR.js"></script>

</head>

<body>

    <?php
    session_start();
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location: login.html');
    }

    header("Refresh: 300"); // atualiza a página a cada 300 segundos (5 minutos)

    $logado = $_SESSION['login'];
    // chekaro tipo do usuário
    if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'suporte' && $_SESSION['tipo'] != 'visitante' && $_SESSION['tipo'] != 'gerencia') {
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
            <img class="navbar-brand-dark" src="img/logo.png" alt="Volt logo" /> <img class="navbar-brand-light" src="assets/img/brand/dark.svg" alt="Volt logo" />
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

            </ul>
        </div>
    </nav>
    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Titulo da página -->
                        <h1>Dashboard</h1>
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

        <div class="card-container1">
            <div class="card1" id="card-dia">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Total do dia</h2>
                            <?php
                            $servername = "172.10.20.47";
                            $username = "archer";
                            $password = "B5n3Qz2vL7HAUs7z";
                            $dbname = "archerx";

                            // Criar conexão
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verificar conexão
                            if ($conn->connect_error) {
                                die("Falha na conexão: " . $conn->connect_error);
                            }

                            // Consulta SQL para obter o total do dia
                            $sql = "SELECT COUNT(*) AS total FROM dados_wyntech WHERE data = CURDATE()";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $totalDia = $row["total"];
                            } else {
                                $totalDia = 0;
                            }
                            $conn->close();

                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <?php echo "<h5 class='fw-extrabold mb-1'>Chamados do Dia:</h5><h1>" . $totalDia . "</h1>"; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card2" id="card-mes">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-calendar2-check-fill" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Total Mês</h2>
                            <?php
                            $servername = "172.10.20.47";
                            $username = "archer";
                            $password = "B5n3Qz2vL7HAUs7z";
                            $dbname = "archerx";

                            // Criar conexão
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verificar conexão
                            if ($conn->connect_error) {
                                die("Falha na conexão: " . $conn->connect_error);
                            }

                            // Consulta SQL para obter o total do dia
                            $sql = "SELECT COUNT(*) AS total FROM dados_wyntech WHERE DATE_FORMAT(data, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $totalMes = $row["total"];
                            } else {
                                $totalMes = 0;
                            }
                            $conn->close();

                            setlocale(LC_TIME, 'pt_BR'); // Define a localização para português brasileiro
                            $mesAtual = strftime('%B'); // Obtém o nome do mês atual
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <?php echo "<h5 class='fw-extrabold mb-1'>Total do mês de " . $mesAtual . ":</h3><h1>" . $totalMes . "</h1>"; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card3" id="card-tudo">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>
                        </div>
                        <div class="d-sm-none">

                            <?php
                            $servername = "172.10.20.47";
                            $username = "archer";
                            $password = "B5n3Qz2vL7HAUs7z";
                            $dbname = "archerx";

                            // Criar conexão
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verificar conexão
                            if ($conn->connect_error) {
                                die("Falha na conexão: " . $conn->connect_error);
                            }
                            $query = "SELECT COUNT(*) FROM dados_wyntech WHERE status='registrado'";


                            // Executa a consulta
                            $resultado = mysqli_query($conn, $query);

                            // Verifica se ocorreu algum erro na execução da consulta
                            if (!$resultado) {
                                die('Erro na consulta: ' . mysqli_error($conn));
                            }

                            // Recupera o valor retornado pela consulta
                            $quantidade = mysqli_fetch_row($resultado)[0];
                            $conn->close();
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <?php echo "<h5 class='fw-extrabold mb-1'>Chamados Registrados:</h5><h1>" . $quantidade . "</h1>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="grid-container">
            <div class="card-graficos d-sm-flex flex-row align-items-center flex-0">
                <div id="container" style="width: 100%; max-width: 100%; height: 50vh;"></div>
            </div>
            <div class="card-graficos d-sm-flex flex-row align-items-center flex-0">
                <div id="ct-chart" style="width: 100%; max-width: 100%; height: 50vh;"></div>
            </div>
        </div>
        <br>
        <div class="card bg-gray-50 border-1 shadow">
            <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div id="bar-chart" style="width: 100%; max-width: 100%; height: 60vh;"></div>
            </div>
        </div>


        <!--DIVISÃO DE GRÁFICOS-->
        <script>
            // Dados retornados da consulta SQL em PHP
            var dados = [
                <?php
                $servername = "172.10.20.47";
                $username = "archer";
                $password = "B5n3Qz2vL7HAUs7z";
                $dbname = "archerx";

                // Cria a conexão com o banco de dados
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
                }

                // Seleciona as informações da coluna "motivo"
                $sql = "SELECT motivo, COUNT(*) AS quantidade FROM dados_wyntech GROUP BY motivo";
                $result = $conn->query($sql);

                // Itera sobre o resultado e gera os dados para o gráfico
                if ($result->num_rows > 0) {
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[] = "['" . $row["motivo"] . "', " . $row["quantidade"] . "]";
                    }
                    echo implode(",", $data);
                }

                // Fecha a conexão com o banco de dados
                $conn->close();
                ?>
            ];

            // Configurações de tradução para o Português (Brasil)
            Highcharts.setOptions({
                lang: {
                    contextButtonTitle: "Menu de opções",
                    downloadJPEG: "Baixar imagem JPEG",
                    downloadPDF: "Baixar documento PDF",
                    downloadPNG: "Baixar imagem PNG",
                    downloadSVG: "Baixar vetor SVG",
                    printChart: "Imprimir gráfico",
                    viewFullscreen: "Ver em tela cheia"
                }
            });

            // Cria o gráfico de pizza em 3D com os dados dinâmicos
            Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0,
                        depth: 50,
                        viewDistance: 25
                    }
                },
                title: {
                    text: 'Gráfico de Ocorrências'
                },
                subtitle: {
                    text: 'Ocorrências'
                },
                credits: {
                    enabled: false
                },

                plotOptions: {
                    pie: {
                        innerSize: 90,
                        depth: 45
                    }
                },
                series: [{
                    name: 'Total',
                    data: dados
                }]
            });
        </script>

        <!--DIVISÃO DE GRÁFICOS-->

        <script>
            // Dados retornados da consulta SQL em PHP
            var dados = [
                <?php
                // Faz a conexão com o banco de dados
                $conn = mysqli_connect("172.10.20.47", "archer", "B5n3Qz2vL7HAUs7z", "archerx");
                // Executa a consulta SQL
                $query = "SELECT et, COUNT(*) AS count FROM dados_wyntech GROUP BY et ORDER BY count DESC LIMIT 20";
                $result = mysqli_query($conn, $query);

                // Itera sobre o resultado e gera os dados para o gráfico
                if ($result->num_rows > 0) {
                    $data1 = array();
                    while ($row = $result->fetch_assoc()) {
                        $data1[] = "['" . $row["et"] . "', " . $row["count"] . "]";
                    }
                    echo implode(",", $data1);
                }
                ?>
            ];

            // Cria o gráfico com os dados dinâmicos
            function createChart() {
                Highcharts.chart('bar-chart', {
                    chart: {
                        type: 'column',
                        options3d: {
                            enabled: true,
                            alpha: 50
                        }
                    },
                    title: {
                        text: 'Ocorrências por Estações'
                    },
                    subtitle: {
                        text: 'Nomes Lógicos'
                    },
                    plotOptions: {
                        column: {
                            depth: 25
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    xAxis: {
                        type: 'category', // Define o tipo de eixo como categoria
                        labels: {
                            rotation: -45, // Rotaciona os rótulos do eixo x para melhor exibição
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        title: {
                            text: ''
                        }
                    },
                    series: [{
                        name: 'Total',
                        data: dados,
                        color: '#202536'
                    }]
                });
            }

            // Chama a função para criar o gráfico quando a página estiver carregada
            document.addEventListener('DOMContentLoaded', createChart);
        </script>


        <!--DIVISÃO DE GRÁFICOS-->

        <script>
            // Configurações de tradução para o Português (Brasil)
            Highcharts.setOptions({
                lang: {
                    contextButtonTitle: "Menu de opções",
                    downloadJPEG: "Baixar imagem JPEG",
                    downloadPDF: "Baixar documento PDF",
                    downloadPNG: "Baixar imagem PNG",
                    downloadSVG: "Baixar vetor SVG",
                    printChart: "Imprimir gráfico",
                    viewFullscreen: "Ver em tela cheia"
                }
            });
            Highcharts.chart('ct-chart', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Quantidade de chamados por mês'
                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    categories: [
                        <?php
                        $servername = "172.10.20.47";
                        $username = "archer";
                        $password = "B5n3Qz2vL7HAUs7z";
                        $dbname = "archerx";

                        // Criar conexão
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verificar conexão
                        if ($conn->connect_error) {
                            die("Falha na conexão: " . $conn->connect_error);
                        }

                        // Consulta SQL para obter a contagem de registros por mês
                        $sql = "SELECT DATE_FORMAT(data, '%c') AS mes, COUNT(*) AS total FROM dados_wyntech GROUP BY DATE_FORMAT(data, '%Y-%m')";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $mes_numero = intval($row['mes']);
                                $mes_nome = '';
                                switch ($mes_numero) {
                                    case 1:
                                        $mes_nome = 'Janeiro';
                                        break;
                                    case 2:
                                        $mes_nome = 'Fevereiro';
                                        break;
                                    case 3:
                                        $mes_nome = 'Março';
                                        break;
                                    case 4:
                                        $mes_nome = 'Abril';
                                        break;
                                    case 5:
                                        $mes_nome = 'Maio';
                                        break;
                                    case 6:
                                        $mes_nome = 'Junho';
                                        break;
                                    case 7:
                                        $mes_nome = 'Julho';
                                        break;
                                    case 8:
                                        $mes_nome = 'Agosto';
                                        break;
                                    case 9:
                                        $mes_nome = 'Setembro';
                                        break;
                                    case 10:
                                        $mes_nome = 'Outubro';
                                        break;
                                    case 11:
                                        $mes_nome = 'Novembro';
                                        break;
                                    case 12:
                                        $mes_nome = 'Dezembro';
                                        break;
                                }
                                echo "'" . $mes_nome . "', ";
                            }
                        }

                        $conn->close();
                        ?>
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Contagem'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false,
                    }
                },

                series: [{
                    name: 'Registros recentes',
                    data: [
                        <?php
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Falha na conexão: " . $conn->connect_error);
                        }

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['total'] . ", ";
                            }
                        }

                        $conn->close();
                        ?>
                    ]
                }]
            });
        </script>


        <!--DIVISÃO DE GRÁFICOS-->

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


</body>

</html>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Sweet Alert -->
  <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Sweet Alerts 2 -->
  <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <style>
    #alert {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .alert-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
    }

    .alert-content p {
      margin: 0;
    }
  </style>
  <script>
    function showAlert() {
      document.getElementById("alert").style.display = "block";
    }

    function closeAlert() {
      document.getElementById("alert").style.display = "none";
    }
  </script>

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


  <!-- Sweet Alert -->
  <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="vendor/notyf/notyf.min.css" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="css/volt.css" rel="stylesheet">

  <script src="vendor/chartist/dist/chartist.min.js"></script>
  <script src="vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

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
    <div class="card bg-gray-50 border-1 shadow">
      <div class="card-header d-sm-flex flex-row align-items-center flex-0">
        <div class="bar-chart"></div>
      </div>
    </div>
    <br>
    <div class="grid-container">
      <div class="card bg-gray-50 border-1 shadow">
        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
          <div id="chart_1" style="width: 100%; max-width: 100%; height: 50vh;"></div>
        </div>
      </div>
      <div class="card bg-gray-50 border-1 shadow">
        <h6 style="text-align: center;">Total de Chamados por Mês.</h6>
        <div class="card-header d-sm-flex flex-row align-items-center flex-0">
          <div class="ct-chart"></div>
        </div>
      </div>
    </div>


    <!--DIVISÃO DE GRÁFICOS-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Motivo', 'Quantidade'],
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
            while ($row = $result->fetch_assoc()) {
              echo "['" . $row["motivo"] . "', " . $row["quantidade"] . "],";
            }
          }

          // Fecha a conexão com o banco de dados
          $conn->close();
          ?>
        ]);

        var options = {
          title: 'Gráfico do total de  - Ocorrência',
          is3D: true,
          backgroundColor: '#dfdfdf'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_1'));
        chart.draw(data, options);
        window.addEventListener('resize', function() {
          chart.draw(data, options);
        });
      }
    </script>

    <!--DIVISÃO DE GRÁFICOS-->

    <?php
    // Faz a conexão com o banco de dados
    $conn = mysqli_connect("172.10.20.47", "archer", "B5n3Qz2vL7HAUs7z", "archerx");
    // Executa a consulta SQL
    $query = "SELECT et, COUNT(*) AS count FROM dados_wyntech GROUP BY et ORDER BY count DESC LIMIT 12";
    $result = mysqli_query($conn, $query);

    // Cria dois arrays para armazenar os rótulos e os valores do gráfico
    $labels = [];
    $values = [];

    // Percorre os resultados da consulta e preenche os arrays
    while ($row = mysqli_fetch_assoc($result)) {
      $labels[] = $row["et"];
      $values[] = $row["count"];
    }
    ?>

    <script>
      Chartist.plugins = Chartist.plugins || {};
      Chartist.plugins.ctTitle = function(options) {
        return function(chart) {
          chart.on('created', function() {
            var title = new Chartist.Svg("text");
            title.addClass("ct-title");
            title.text(options.text);
            title.attr({
              x: options.x || chart.container.clientWidth / 2,
              y: options.y || 30,
              "text-anchor": "middle"
            });
            chart.svg.append(title, true);
          });
        }
      }

      new Chartist.Bar('.bar-chart', {
        labels: <?php echo json_encode($labels); ?>,
        series: [<?php echo json_encode($values); ?>]
      }, {
        low: 0,
        axisX: {
          position: 'end'
        },
        axisY: {
          showGrid: true,
          showLabel: true,
          offset: 0
        },
        plugins: [
          Chartist.plugins.tooltip(),
          Chartist.plugins.ctTitle({
            text: 'Total de ocorrências por Estações'
          })
        ]
      });
      chart.on('draw', function(data) {
        if (data.type === 'bar') {
          data.group.append(new Chartist.Svg('text', {
            x: data.x2 + 5,
            y: data.y2 + (data.y1 - data.y2) / 2,
            text: data.value.y
          }, 'ct-label'));
        }
      });
    </script>

    <!--DIVISÃO DE GRÁFICOS-->

    <?php
    // Conexão com o banco de dados
    $conn = new mysqli("172.10.20.47", "archer", "B5n3Qz2vL7HAUs7z", "archerx");
    if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
    }
    $query = "SELECT COUNT(*) AS total, DATE_FORMAT(data, '%Y-%m') AS mes FROM dados_wyntech GROUP BY mes ORDER BY mes";
    $result = $conn->query($query);
    $labels = [];
    $data = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $labels[] = $row['mes'];
        $data[] = $row['total'];
      }
    }
    ?>
    <script>
      new Chartist.Line('.ct-chart', {
        labels: <?php echo json_encode($labels); ?>,
        series: [
          <?php echo json_encode($data); ?>
        ]
      }, {
        low: 0,
        showArea: true,
        plugins: [
          Chartist.plugins.tooltip(),
        ]
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
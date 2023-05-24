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
  <title>Painel Principal</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Inclua essas bibliotecas no cabeçalho do seu arquivo HTML -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
            <h1>Painel Principal</h1>
            <!-- Titulo da página -->
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

        <!-- Adicione um ID à tabela para poder selecioná-la com o jQuery -->
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

          </tbody>
        </table>

        <!-- Adicione esse código JavaScript para inicializar o DataTables na tabela -->
        <script type="text/javascript">
          $(document).ready(function() {
            $('#minhaTabela').DataTable({
              // idioma portugues BR
              language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
              },
              columns: [{
                  data: 'id'
                },
                {
                  data: 'et'
                },
                {
                  data: 'data'
                },
                {
                  data: 'usuario'
                },
                {
                  data: 'motivo'
                },
                {
                  data: 'req'
                },

              ],
              "pageLength": 15,
              "lengthMenu": [15, 30, 50, 100],
              "order": [
                [0, 'desc']
              ],
              ajax: {
                url: '/archerx/public/wyntech/funcoes/get_register.php',
                dataSrc: ''
              },
              rowId: 'id'
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


  <!-- Volt JS -->
  <script src="assets/js/volt.js"></script>


</body>

</html>
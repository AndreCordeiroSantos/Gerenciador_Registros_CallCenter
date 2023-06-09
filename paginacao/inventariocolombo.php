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
  <title>Inventário Colombo</title>
  <!-- Inclua o CSS e o JavaScript do Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTables JS -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

  <!-- Biblioteca DataTables -->
  <script type="text/javascript" src="assets/dataTables/datatables.min.js"></script>
  <script src="assets/dataTables/Buttons-2.3.6/js/dataTables.buttons.min.js"></script>

  <!-- CSS Datatables -->
  <link rel="stylesheet" href="../../bibli/dataTables/Buttons-2.3.6/css/buttons.dataTables.min.css">
  <!--<link rel="stylesheet" type="text/css" href="../../bibli/dataTables/datatables.min.css" />-->

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


  <style>
    .red {
      color: rgb(255, 0, 0);
      /* vermelho */
    }

    .green {
      color: rgb(76, 175, 80);
      /* verde */
    }

    /* Adicione estilos para as células com as classes red e green */
    td.red {
      color: red;
    }

    td.green {
      color: green;
    }

    /* Estilos para o botão */
    div.dt-buttons .btn-export-csv {
      background-color: #141f2e;
      width: 150px;
      height: 28px;
      margin-left: 30px;
      line-height: 14px;
      cursor: pointer;
      color: white;
    }

    div.dt-buttons :hover.btn-export-csv {
      background-color: #243854;
    }

    div.dataTables_wrapper div.dataTables_filter input {
      line-height: 20px;
      height: 28px;
    }
  </style>
  <!-- Adicione os estilos do DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Sweet Alert -->
  <link type="text/css" href="style/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="style/notyf/notyf.min.css" rel="stylesheet">

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

        <?php include 'nav.php'; ?>

        <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
        <br>
        <li class="nav-item">
          <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
            <a href="#" class="logout-button"><img src="img/logoWT-1-300x75.png" style="width: 75%"></a>
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
            <h1>Inventário Colombo</h1>
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
    <div class="card card-body border-1 shadow mb-4 mb-xl-0">

      <br>
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item"><a class="nav-link" href="inventario.php">Xaxim</a></li>
          <li class="nav-item"><a class="nav-link active" href="inventariocolombo.php">Colombo</a></li>

        </ul>
      </div>
      <br>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Informações de Software</h5>
              <input type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
              <form id="myForm" method="POST">
                <input class="form-control" type="text" id="nameInput" readonly="" style="display: none">
                <br>
                <div id="result">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="submitButton">Gerar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php
      // Configuração do banco de dados
      $host = "#";
      $user = "#";
      $password = "#";
      $dbname = "#";

      // Conexão com o banco de dados
      $conn = new mysqli($host, $user, $password, $dbname);

      // Conectar ao segundo banco de dados
      $usuario_db1 = '#';
      $senha_db1 = '#';
      $database_db1 = '#';
      $host_db1 = '#';
      $conn1 = new mysqli($host_db1, $usuario_db1, $senha_db1, $database_db1);
      // Verificar se houve erro na conexão com o segundo banco de dados
      if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
      }

      // Verifica se houve erro na conexão
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT name, bios.ssn, userid, workgroup, processort, memory, ipsrc, lastdate, drives.total, drives.free,
        (drives.free / drives.total) * 100 AS percent_free
          FROM hardware 
          JOIN bios ON hardware.id = bios.hardware_id
          JOIN drives ON hardware.id = drives.hardware_id
          JOIN accountinfo ON hardware.id = accountinfo.hardware_id
        WHERE accountinfo.fields_3 = 'colombo' AND drives.total <> 0
        ORDER BY percent_free <= 15 DESC ";

      $result = $conn->query($sql);


      // Segunda consulta SQL para juntar informações dos dois bancos de dados
      $sql2 = "SELECT hosts.hostname, baia.baia
            FROM acs_uni
            INNER JOIN hosts ON acs_uni.id_hostname = hosts.id
            INNER JOIN baia ON acs_uni.id_baia = baia.id";
      // Executar a segunda consulta no segundo banco de dados
      $result2 = $conn1->query($sql2);

      // array associativo a partir dos resultados da segunda consulta
      $baia_por_hostname = array();
      if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
          $baia_por_hostname[$row["hostname"]] = $row["baia"];
        }
      }



      if ($result->num_rows > 0) {
        echo "<table id='minhatabela' class='display'>";
        echo "<thead><tr><th class='nome-logico'>Estação</th><th class='num-serie'>Num/Série</th><th>Baia</th><th class='userinv'>Usuário</th><th>Domínio</th><th>Processador</th><th>Memória</th><th>IP ATUAL</th><th>ùltimo Inventário</th><th>HD TOTAL</th><th>HD Livre</th><th>% Livre</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
          $percentual_livre = ($row["free"] / $row["total"]) * 100;
          $cell_class = ($percentual_livre <= 15) ? "red" : "green";

          // Obtenha o valor de baia correspondente ao valor de name usando o array associativo
          $baia = isset($baia_por_hostname[$row["name"]]) ? $baia_por_hostname[$row["name"]] : "";

          echo "<tr><td class='nome-logico'><a>" . $row["name"] . "</a></td><td class='num-serie'>" . $row["ssn"] . "</td><td>" . $baia . "</td><td class='userinv'>" . $row["userid"] . "</td><td>" . $row["workgroup"] . "</td>";
          // Use a função substr para exibir apenas os primeiros 20 caracteres do valor da coluna processort
          echo "<td>" . substr($row["processort"], 9, 28) . "</td>";
          echo "<td>" . $row["memory"] . "</td><td>" . $row["ipsrc"] . "</td><td>" . $row["lastdate"] . "</td><td>" . $row["total"] . "</td><td>" . $row["free"] . "</td><td class='" . $cell_class . "'>" . round($percentual_livre, 1) . "%</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
      } else {
        echo "Nenhum resultado encontrado.";
      }

      //contador de total de inventário do xaxim
      $query = "SELECT COUNT(*)
        FROM hardware 
        JOIN accountinfo ON hardware.id = accountinfo.hardware_id
        WHERE accountinfo.fields_3 = 'colombo'";

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
      echo '<h4>Total: ' . $quantidade;
      echo ' Estações inventariadas';
      echo '</h4>';

      $conn->close();
      ?>

      <br>
    </div>

    <?php include 'footer.php'; ?>

    <!-- Inicialize o DataTables com as opções desejadas -->
    <script>
      $(document).ready(function() {
        // Inicialize a tabela como DataTable
        var table = $('table.display').DataTable({
          "select": true,
          // Desative a ordenação inicial da tabela
          "order": [],
          //página aberta incial
          "pageLength": 30,
          // Opções de exibição de registros por página
          "lengthMenu": [30, 50, 70, 100, 200, 500],
          // Opção de paginação
          "paging": true,
          // Habilita a responsividade da tabela
          "responsive": true,
          // Adicione a opção de idioma
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
          },
          dom: 'lBfrtip',
          buttons: [{
            extend: 'csv',
            text: 'Exportar CSV',
            className: 'btn-export-csv',
            customize: function(csv) {
              // Formata o CSV em UTF-8
              csv = "\uFEFF" + csv;
              // Altera o separador para ";"
              csv = csv.replace(/,/g, ";");
              // Remove as aspas das strings
              csv = csv.replace(/"/g, "");
              return csv;
            }
          }],

          // Desative a ordenação para a decima coluna (coluna do percentual livre)
          columns: [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {
              orderable: false
            }
          ],
          // Adicione uma classe CSS personalizada às células da tabela
          "columnDefs": [{
            "className": "minha-classe-personalizada",
            "targets": "_all"
          }]
        });
      });
    </script>

  </main>
  <!--exiba o modal para consultar os softwares-->
  <script>
    $(document).ready(function() {
      function addClickEventToTable() {
        $('#minhatabela tbody tr td:first-child').on('click', function() {
          var name = $(this).text();
          $('#nameInput').val(name);
          $('#submitButton').trigger('click'); // Aciona o clique automático no botão "Gerar"
          $('#submitButton').hide(); // Esconde o botão "Gerar"
          $('#myModal').modal('show');
        });
      }
      // Adicione o evento de clique na tabela
      addClickEventToTable();

      $('#myModal').on('hidden.bs.modal', function() {
        $('#result').html('');
        $('#nameInput').val('');
        $('#submitButton').show(); // Mostra o botão "Gerar" quando o modal for fechado
      });
    });
  </script>

      <!--PEGAR O GERAR DO MODAL E ENVIAR PARA O PHP PARA OBERT OS VALORES-->
  <script>
    $(document).ready(function() {
      $('#myForm').submit(function(event) {
        event.preventDefault(); // previne o comportamento padrão do formulário de recarregar a página

        var name = $('#nameInput').val(); // obtém o valor do input do formulário

        $.ajax({
          url: 'get_data.php', // o arquivo PHP que receberá o valor
          method: 'POST',
          data: {
            name: name
          }, // o valor a ser enviado
          success: function(response) {
            $('#result').html(response); // exibe a resposta do PHP na div 'result'
          }
        });
      });
    });
  </script>

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


</body>

</html>
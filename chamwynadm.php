<!DOCTYPE html>
<html>

<head>
  <title>Painel Principal</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Sweet Alert -->
  <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Sweet Alerts 2 -->
  <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <?php
  session_start();
  if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: login.html');
  }

  header("Refresh: 1200"); // atualiza a página a cada 1200 segundos (20 minutos)

  $logado = $_SESSION['login'];
  // Check the user's type and restrict access to this page if necessary
  if ($_SESSION['tipo'] != 'admin') {
    echo "<script>
  Swal.fire({
      title: 'Acesso Negado!',
      text: 'Usuário não possui acesso Admin',
      icon: 'error'
  }).then((result) => {
      window.location.href = 'home.php';
  });
</script>";
  }

  ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Inclua o arquivo JavaScript do Clipboard.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

  <!-- Notyf -->
  <link type="text/css" href="vendor/notyf/notyf.min.css" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="css/volt.css" rel="stylesheet">

  <script>
    function mostrarCampoAdicional() {
      var motivo = document.getElementById("motivo");
      var campoAdicional = document.getElementById("campo-adicional");
      if (motivo.value == "NAO LIGA" || motivo.value == "TELA AZUL" || motivo.value == "LENTIDAO" || motivo.value == "BAIXA DE IMAGEM") {
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
          <li class="nav-item"><a class="nav-link active" href="chamwynadm.php">Registrar</a></li>
          <li class="nav-item"><a class="nav-link" href="inforegister.php">Registros</a></li>
          <li class="nav-item"><a class="nav-link" href="p_wyntech.php">Peças</a></li>
        </ul>
      </div>
    </div>
    <div class="container" style="padding: 0 10px;">
      <div class="card-block" style="display: inline-block; border-radius: 10px; width: 50%;">
        <div class="card shadow border-1 text-left p-3">
          <h3 class="card-title">Lançar Registros.</h3>

          <form class="minhaforma" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="buscar" method="post">
            <h5>Estação:</h5>
            <input class="borda-arredondadas" type="text" name="et" id="et" placeholder="Nome Lógico" data-toggle="tooltip" data-placement="top" title="Insira o nome Lógico para Registrar" />
            <input class="btn btn-primary" type="button" onclick="pesquisarEt(document.getElementById('et').value)" value="Buscar" />
            <br><br><br>
            <h5>Número de Série:</h5>
            <input class="form-control" type="text" class="numserie" readonly="" name="numserie" id="numserie" placeholder="Numero de serie" />
            <br>
            <h5>Ocorrência:</h5>
            <select class="form-select mb-0" name="motivo" id="motivo" onchange="mostrarCampoAdicional()">
              <option value=""></option>
              <option value="BAIXA DE IMAGEM">BAIXA DE IMAGEM</option>
              <option value="TELA AZUL">TELA AZUL</option>
              <option value="FORA DO DOMINIO">FORA DO DOMINIO</option>
              <option value="REPARO AUTOMÁTICO">REPARO AUTOMÁTICO</option>
              <option value="SUJEIRA / LIMPEZA">SUJEIRA / LIMPEZA</option>
              <option value="NAO LIGA">NÃO LIGA</option>
              <option value="LENTIDAO">LENTIDAO</option>
              <option value="PROBLEMAS INTERNOS">PROBLEMAS INTERNOS</option>
            </select>
            <br>
            <div id="campo-adicional" style="display:none;">
              <h5>Causa:</h5>
              <select class="form-select mb-0" name="causa" id="causa">
                <option value=""></option>
                <option value="MAL FUNCIONAMENTO">MAL FUNCIONAMENTO</option>
                <option value="FONTE QUEIMADA">FONTE QUEIMADA</option>
                <option value="PLACA MÃE / DEFEITO">PLACA MÃE / DEFEITO</option>
                <option value="MEMORIA / DEFEITO">MEMORIA / DEFEITO</option>
                <option value="HD / DEFEITO">HD / DEFEITO</option>
                <option value="DEFEITO CABO-SATA">DEFEITO CABO-SATA</option>
              </select>
              <br>
              <h5>Solução:</h5>
              <select class="form-select mb-0" name="solucao" id="solucao">
                <option value=""></option>
                <option value="TROCA / FONTE">TROCA / FONTE</option>
                <option value="TROCA / PLACA MÃE">TROCA PLACA MÃE</option>
                <option value="TROCA MEMORIA">TROCA MEMORIA</option>
                <option value="LIMPEZA MEMORIA">LIMPEZA MEMORIA</option>
                <option value="TROCA HD">TROCA HD</option>
                <option value="TROCA CABO-SATA">TROCA CABO-SATA</option>
                <option value="ATIVIDADE CONCLUIDA">ATIVIDADE CONCLUÍDA</option>
              </select>
              <br>
            </div>
            <label for="observacoes">Observações:</label>
            <br>
            <textarea id="descricao" name="descricao" rows="4" cols="45" maxlength="255" oninput="contarCaracteres()" style="border-radius: 10px; border: 1px solid #1e2021; padding: 10px; width: 100%; height: 25%;"></textarea>

            <span id="contador"></span>
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

            <h2></h2>
            <input class="btn btn-primary" type="submit" value="Lançar Registro">
            <br>
          </form>

          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //conectar ao banco de dados
            $usuario_db = 'archer';
            $senha_db = 'B5n3Qz2vL7HAUs7z';
            $database_db = 'archerx';
            $host_db = '172.10.20.47';

            $conn = new mysqli($host_db, $usuario_db, $senha_db, $database_db);

            // Receber informações do formulário HTML
            $et = $_POST["et"];
            $numserie = $_POST["numserie"];
            $motivo = $_POST["motivo"];
            $causa = $_POST['causa'];
            $solucao = $_POST['solucao'];
            $descricao = $_POST['descricao'];

            // Verificar se et corresponde a numserie na tabela consulta2
            $checkEtNumserie = "SELECT * FROM consulta2 WHERE et='$et' AND numserie='$numserie'";
            $resultEtNumserie = mysqli_query($conn, $checkEtNumserie);
            if (mysqli_num_rows($resultEtNumserie) == 0) {
              // et e numserie não correspondem na tabela consulta2
              echo "<script>
              Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'As informações, Nome Lógico, Num Série, não correspondem.',
                showConfirmButton: false,
                timer: 2000
              });
                      </script>";
            } else {
              // Inserir informações no banco de dados
              $sql = "INSERT INTO dados_wyntech (et, numserie, data, motivo, causa, solucao, status, descricao) 
              VALUES 
              ('PR6534ET$et', '$numserie', now(), '$motivo', '$causa', '$solucao', 'aberto', '$descricao')";

              //Verifica se todo o formulário foi preenchido
              if ($et == "") {
                echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Erro!',
                  text: 'Por favor , preencha o nome lógico.',
                  showConfirmButton: false,
                  timer: 2000
                });
            </script>";
              } else {
                if ($numserie == "") {
                  echo "<script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Por favor , preencha o número de série.',
                    showConfirmButton: false,
                    timer: 2000
                  });
                  </script>";
                } else {
                  if ($motivo == "") {
                    echo "<script>
                    Swal.fire({
                      icon: 'error',
                      title: 'Erro!',
                      text: 'Por favor , coloque a ocorrência do chamado.',
                      showConfirmButton: false,
                      timer: 2000
                    });
                        </script>";
                  } else {
                    if (mysqli_query($conn, $sql)) {
                      echo "<script>
                              Swal.fire({
                                  title: 'Sucesso!',
                                  text: 'Chamado Lançado com sucesso',
                                  icon: 'success'
                              }).then((result) => {
                                  window.location.href = 'chamwynadm.php';
                              });
                          </script>";
                    } else {
                      echo "Erro ao registrar informação: " . mysqli_error($conn);
                    }
                  }
                }
              }
            }
          }
          ?>
        </div>
      </div>

      <!--divisão da pagina-->

      <br><br>
      <div class="card-block2" style="display: inline-block; width: 50%;">
        <div class="card shadow border-1 text-left p-3">
          <h3 class="card-title">Chamados Abertos.</h3>

          <?php
          // Consulta à tabela
          $result = mysqli_query($conn, "SELECT * FROM dados_wyntech WHERE status='aberto' ORDER BY id DESC LIMIT 15");

          // Verifica se a consulta retornou algum resultado
          if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome Lógico</th>";
            echo "<th>Num/Serie</th>";
            echo "<th>Ocorrência</th>";
            echo "</tr>";

            // Exibe os resultados da consulta na tabela
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["et"] . "</td>";
              echo "<td>" . $row["numserie"] . "</td>";
              echo "<td>" . $row["motivo"] . "</td>";
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo "Não foram encontrados chamados abertos.";
          }
          ?>
          <br>

          <!--Contador de chamados-->
          <?php

          $query = "SELECT COUNT(*) FROM dados_wyntech WHERE status='aberto'";


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
          echo '<h5>Total: ' . $quantidade;
          echo ' Chamados abertos.';
          echo '</h5>';

          $conn->close();
          ?>
        </div>
      </div>
    </div>
    <script>
      // Obtém todas as linhas da tabela
      var rows = document.getElementsByTagName("tr");

      // Percorre todas as linhas, exceto o cabeçalho
      for (var i = 1; i < rows.length; i++) {
        // Adiciona um evento de clique a cada linha
        rows[i].addEventListener("click", function() {
          // Obtém os valores das colunas "Nome Lógico" e "Num/Serie"
          var nomeLogico = this.cells[1].innerHTML;
          var numSerie = this.cells[2].innerHTML;

          // Concatena os valores das colunas
          var textoCopiar = nomeLogico + " - " + numSerie;

          // Cria um elemento de botão temporário
          var tempButton = document.createElement("button");
          tempButton.setAttribute("data-clipboard-text", textoCopiar);

          // Inicializa o Clipboard.js com o botão temporário
          new ClipboardJS(tempButton);

          // Simula o clique no botão para copiar o texto
          tempButton.click();

          // Remove o botão temporário
          tempButton.remove();

          // Exibe o SweetAlert com a mensagem de confirmação
          Swal.fire({
            icon: 'success',
            title: "Copiado",
            text: textoCopiar,
            timer: 1000, // Tempo em milissegundos (2 segundos)
            showConfirmButton: false
          });
        });
      }
    </script>

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

  <!-- Volt JS -->
  <script src="assets/js/volt.js"></script>

  <script src="js/custom2.js"></script>

</body>

</html>
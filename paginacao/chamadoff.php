<!DOCTYPE html>
<html>

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

  <title>Chamados Offline</title>
  <!-- Sweet Alert -->
  <link type="text/css" href="style/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Sweet Alerts 2 -->
  <script src="style/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
  if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'suporte' && $_SESSION['tipo'] != 'gerencia') {
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
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Sweet Alert -->
  <link type="text/css" href="style/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="style/notyf/notyf.min.css" rel="stylesheet">
  <script src="style/notyf/notyf.min.js"></script>

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
      </ul>
    </div>
  </nav>
  <main class="content">

    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
      <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
          <div class="d-flex align-items-center">
            <!-- Titulo da página -->
            <h1>Chamados Off</h1>
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
    <div class="container">
      <div class="card card-body border-1 shadow mb-4">

        <h4>Campo para registrar <mark>chamados e REQ</mark>, enquanto a <mark>Wyntech</mark> estiver off.</h4>
        <h4>Atenção! Busque somente o número da ET, não precisa colocar (PR6534ET)</h4>
        <br><br>
        <form class="buscar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="buscar" method="post">
          <div class="col-md-6 mb-3">
            <div>
              <h4>Busque o</h4>
              <h5>Nome Lógico:</h5>
              <input class="borda-arredondadas" type="text" name="et" id="et" placeholder="Nome Lógico" />
              <input class="btn btn-primary" type="button" onclick="pesquisarEt(document.getElementById('et').value)" value="Buscar" />
            </div>
          </div>
          <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <h5>Número de Série:</h5>
                <input class="form-control" type="text" readonly="" name="numserie" id="numserie" placeholder="Numero de serie" />
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div>
                <h5>Ocorrência:</h5>
                <select class="form-select" name="motivo" id="motivo">
                  <option selected></option>
                  <option value="BAIXA DE IMAGEM">BAIXA DE IMAGEM</option>
                  <option value="TELA AZUL">TELA AZUL</option>
                  <option value="FORA DO DOMINIO">FORA DO DOMINIO</option>
                  <option value="REPARO AUTOMÁTICO">REPARO AUTOMÁTICO</option>
                  <option value="SUJEIRA / LIMPEZA">SUJEIRA / LIMPEZA</option>
                  <option value="NAO LIGA">NÃO LIGA</option>
                  <option value="LENTIDAO">LENTIDAO</option>
                  <option value="PROBLEMAS INTERNOS">PROBLEMAS INTERNOS</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-md-6 mb-3">
              <div>
                <h5>Registrar REQ :</h5>
                <input class="form-control" type="text" class="req" name="req" id="req" placeholder="Informe a REQ" />
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="observacoes">Observações:</label>
                <br>
                <textarea id="descricao" name="descricao" rows="3" cols="50" maxlength="255" oninput="contarCaracteres()" style="border-radius: 10px; border: 1px solid #1e2021; padding: 5px; width: 70%; height: 10%;"></textarea>

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
              </div>
            </div>
          </div>
          <div class="row">

          </div>
          <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
          <div class="mt-3">
            <input class="btn btn-primary" type="submit" value="Registrar" name="Inserir">
          </div>
        </form>



        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Conectar ao banco de dados
          $servername = "#";
          $usernameDB = "#";
          $passwordDB = "#";
          $dbname = "#";

          $conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
          if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
          }

          // Receber informações do formulário HTML
          $et = $_POST["et"];
          $numserie = $_POST["numserie"];
          $motivo = $_POST["motivo"];
          $data = $_POST['data'];
          $usuario = $_SESSION['login'];
          $req = $_POST['req'];
          $descricao = $_POST['descricao'];

          // Verificar se req já existe no banco de dados
          $checkReq = "SELECT * FROM sua_tabela WHERE req='$req'";
          $result = mysqli_query($conn, $checkReq);
          if (mysqli_num_rows($result) > 0) {
            // req já existe no banco de dados
            echo "<script>
            new Notyf().error({
              message: 'Essa Req, ja foi registrada.',
              position: {
                x: 'left',
                y: 'top',
            },
            });
            setTimeout(function(){
              window.location.href = 'chamwynadm.php';
            }, 2000);
            </script>";
          } else {
            // Verificar se et corresponde a numserie na tabela consulta2
            $checkEtNumserie = "SELECT * FROM sua_tabela WHERE et='$et' AND numserie='$numserie'";
            $resultEtNumserie = mysqli_query($conn, $checkEtNumserie);
            if (mysqli_num_rows($resultEtNumserie) == 0) {
              // et e numserie não correspondem na tabela consulta2
              echo "<script>
              new Notyf().error({
                message: 'As informações, Nome Lógico, Num Série, não correspondem.',
                position: {
                  x: 'left',
                  y: 'top',
              },
              });
              </script>";
            } else {
              // Inserir informações no banco de dados
              $sql = "INSERT INTO sua_tabela (et, numserie, data, usuario, motivo, status, req, descricao) 
        VALUES ('PR6534ET$et', '$numserie', now(), '$usuario', '$motivo', 'registrado', '$req', '$descricao')";

              // Verifica se todo o formulário foi preenchido corretamente, se estiver ok, ele executa
              if ($et == "") {
                echo "<script>
                new Notyf().error({
                  message: 'Campo Nome Lógico, nao preenchido.',
                  position: {
                    x: 'left',
                    y: 'top',
                },
                });
                </script>";
              } else {
                if ($numserie == "") {
                  echo "<script>
                  new Notyf().error({
                    message: 'Campo Número de Série, não preenchido.',
                    position: {
                      x: 'left',
                      y: 'top',
                  },
                  });
                  </script>";
                } else {
                  if ($motivo == "") {
                    echo "<script>
                    new Notyf().error({
                      message: 'Campo de ocorrência, não preenchido.',
                      position: {
                        x: 'left',
                        y: 'top',
                    },
                    });
                    </script>";
                  } else {
                    if ($usuario == "") {
                      echo "<script>
                      new Notyf().error({
                        message: 'Selecione um usuário.',
                        position: {
                          x: 'left',
                          y: 'top',
                      },
                      });
                      </script>";
                    } else {
                      if (substr($req, 0, 3) !== "REQ") {
                        $req = "REQ" . $req;
                        echo "<script>
                        new Notyf().error({
                          message: 'Insira a REQ, corretamente.',
                          position: {
                            x: 'left',
                            y: 'top',
                        },
                        });
                        </script>";
                      } else {
                        if ($descricao == "") {
                          echo "<script>
                          new Notyf().error({
                            message: 'Preencha uma observação.',
                            position: {
                              x: 'left',
                              y: 'top',
                          },
                          });
                          </script>";
                        } else {
                          if (mysqli_query($conn, $sql)) {
                            echo "<script>
                            new Notyf().success({
                              message: 'Chamado registrado com sucesso.',
                              position: {
                                x: 'right',
                                y: 'top',
                            },
                            });
                            setTimeout(function(){
                              window.location.href = 'chamadoff.php';
                            }, 2000);
                            </script>";
                          } else {
                            echo "<script>
                            new Notyf().error({
                              message: 'Erro ao registrar informação: " . mysqli_error($conn) . "',
                              position: {
                                x: 'left',
                                y: 'top',
                            },
                            });
                            </script>";
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
        ?>


      </div>
    </div>

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
  <script src="js/custom3.js"></script>

</body>

</html>
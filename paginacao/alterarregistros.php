<!DOCTYPE html>
<html>

<head>
    <!-- Inclua essas bibliotecas no cabeçalho do seu arquivo HTML -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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

    <title>Gerenciar Registros</title>
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
    // Check the user's type and restrict access to this page if necessary
    if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'gerencia') {
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
    <style>
        input,
        select {
            border-radius: 5px;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="style/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="style/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="css/volt.css" rel="stylesheet">

    <script>
        function pesquisarid(id) {
            // Crie um objeto FormData para enviar os dados para o servidor
            var data = new FormData();
            data.append('id', id);

            // Crie uma solicitação AJAX para enviar os dados para o servidor
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'buscar3.php', true);
            xhr.onload = function() {
                if (this.status == 200) {
                    // Os dados foram retornados com sucesso
                    // Aqui você pode manipular os dados retornados
                    var dados = JSON.parse(this.response);
                    document.getElementById('et').value = dados.et;
                    document.getElementById('usuario').value = dados.usuario;
                    document.getElementById('motivo').value = dados.motivo;
                    document.getElementById('causa').value = dados.causa;
                    document.getElementById('solucao').value = dados.solucao;
                    document.getElementById('descricao').value = dados.descricao;
                }
            };
            xhr.send(data);
        }
    </script>

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
                        <!-- Titulo da página -->
                        <h1>Gerenciar Registros</h1>
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
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Busque o chamado para Alterar</h2>
                <form action="atualizarregistros.php" method="post" onsubmit="return confirm('Tem certeza de que deseja atualizar o registro?')">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="id">ID</label>
                            <br>
                            <input class="borda-arredondadas" type="entry" class="campo0" name="id" id="id" placeholder="Buscar ID" data-toggle="tooltip" data-placement="top" title="Insira a ID para buscar corretamente." />
                            <!--<botão para fazer a busca no java script> -->
                            <input class="btn btn-primary" type="button" onclick="pesquisarid(document.getElementById('id').value)" value="Buscar" />
                        </div>
                    </div>
                    <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">Estação</label>
                                <input class="form-control" name="et" readonly="" id="et" type="text" placeholder="Nome Lógico">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Suporte</label>
                                <select class="form-select mb-0" id="usuario" name="usuario" aria-label="Gender select example">
                                    <option selected>Selecione o Suporte</option>
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
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Ocorrência</label>
                                <select class="form-select mb-0" id="motivo" name="motivo" aria-label="Gender select example">
                                    <option selected>Selecione a Ocorrência</option>
                                    <option value="BAIXA DE IMAGEM">BAIXA DE IMAGEM</option>
                                    <option value="TELA AZUL">TELA AZUL</option>
                                    <option value="FORA DO DOMINIO">FORA DO DOMINIO</option>
                                    <option value="REPARO AUTOMÁTICO">REPARO AUTOMÁTICO</option>
                                    <option value="SUJEIRA / LIMPEZA">SUJEIRA / LIMPEZA</option>
                                    <option value="MONITOR COM DEFEITO">MONITOR COM DEFEITO</option>
                                    <option value="NAO LIGA">NÃO LIGA</option>
                                    <option value="LENTIDAO">LENTIDAO</option>
                                    <option value="PROBLEMAS INTERNOS">PROBLEMAS INTERNOS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Causa</label>
                                <select class="form-select mb-0" id="causa" name="causa" aria-label="Gender select example">
                                    <option selected>Selecione a causa</option>
                                    <option value="MAL FUNCIONAMENTO">MAL FUNCIONAMENTO</option>
                                    <option value="FONTE QUEIMADA">FONTE QUEIMADA</option>
                                    <option value="PLACA MÃE / DEFEITO">PLACA MÃE / DEFEITO</option>
                                    <option value="MEMORIA / DEFEITO">MEMORIA / DEFEITO</option>
                                    <option value="HD / DEFEITO">HD / DEFEITO</option>
                                    <option value="DEFEITO CABO-SATA">DEFEITO CABO-SATA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Solução</label>
                                <select class="form-select mb-0" id="solucao" name="solucao" aria-label="Gender select example">
                                    <option selected>Selecione a solução</option>
                                    <option value="TROCA / FONTE">TROCA / FONTE</option>
                                    <option value="TROCA / PLACA MÃE">TROCA PLACA MÃE</option>
                                    <option value="TROCA MEMORIA">TROCA MEMORIA</option>
                                    <option value="LIMPEZA MEMORIA">LIMPEZA MEMORIA</option>
                                    <option value="TROCA HD">TROCA HD</option>
                                    <option value="TROCA CABO-SATA">TROCA CABO-SATA</option>
                                    <option value="ATIVIDADE CONCLUIDA">ATIVIDADE CONCLUÍDA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="phone">Observação:</label>
                                <br>
                                <textarea id="descricao" name="descricao" rows="3" cols="50" maxlength="255" oninput="contarCaracteres()" style="border-radius: 10px; border: 1px solid #1e2021; padding: 5px; width: 70%;"></textarea>

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
                    <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                    <div class="mt-3">
                        <button class="btn btn-info btn-gray-800 mt-2 animate-up-2" type="submit" id="notifyTopLeft" value="Atualizar">Alterar</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="container">
            <div class="card card-body border-0 shadow mb-4">
                <?php
                // Conecte-se ao banco de dados
                $db = new mysqli('#', '#', '#', '#');

                // Verifique se a conexão foi bem-sucedida
                if ($db->connect_error) {
                    die("Erro de conexão: " . $db->connect_error);
                }

                // Execute a consulta SQL
                $query = "SELECT id, et, usuario, motivo, causa, solucao  FROM sua_tabela ORDER BY id DESC";
                $result = $db->query($query);

                // Verifique se a consulta foi bem-sucedida
                if (!$result) {
                    die("Erro ao executar a consulta: " . $db->error);
                }

                // Feche a conexão com o banco de dados
                $db->close();
                ?>

                <!-- Adicione um ID à sua tabela para poder selecioná-la com o jQuery -->
                <table id="minhaTabela">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome/Lógico</th>
                            <th>Usuário</th>
                            <th>Ocorrência</th>
                            <th>Causa</th>
                            <th>Solução</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['et']; ?></td>
                                <td><?php echo $row['usuario']; ?></td>
                                <td><?php echo $row['motivo']; ?></td>
                                <td><?php echo $row['causa']; ?></td>
                                <td><?php echo $row['solucao']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Adicione esse código JavaScript para inicializar o DataTables na sua tabela -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#minhaTabela').DataTable({
                            "language": {
                                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
                            },
                            // Desative a ordenação inicial da tabela
                            "order": [],
                            "pageLength": 30,
                            "lengthMenu": [
                                [30, 50, 100, -1],
                                [30, 50, 100, "Todos"]
                            ]
                        });
                    });
                </script>
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

</body>

</html>
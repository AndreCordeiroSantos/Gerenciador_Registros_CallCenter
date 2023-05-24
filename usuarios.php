<!DOCTYPE html>
<html>

<head>
    <title>Minha página PHP</title>
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
    if ($_SESSION['tipo'] != 'admin') {
        echo "<script language='javascript' type='text/javascript'>
      alert('Estou invisível para não ver as senhas   :>');window.location
      .href='home.php';</script>";
    }

    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
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

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

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
                        <h1>Gerenciar usuários</h1>
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
        <div id="alert" style="display: none;">
            <div class="alert-content">
                <p>Usuário criado com sucesso!</p>
                <button onclick="closeAlert()">OK</button>
            </div>
        </div>
        <div class="container">
            <div class="card card-body border-0 shadow mb-4 mb-xl-0">
                <h4 class="card-title">Usuários Cadastrados.</h4>
                <?php
                //conectar ao banco de dados
                $servername = "172.10.20.47";
                $usernameDB = "archer";
                $passwordDB = "B5n3Qz2vL7HAUs7z";
                $dbname = "archerx";

                $conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
                if (!$conn) {
                    die("Conexão falhou: " . mysqli_connect_error());
                }
                // Consulta à tabela
                $result = mysqli_query($conn, "SELECT * FROM usuarios_wyntech");

                // Verifica se a consulta retornou algum resultado
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Login</th>";
                    echo "<th>Senha</th>";
                    echo "<th>Permissão</th>";
                    echo "</tr>";

                    // Exibe os resultados da consulta na tabela
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nome"] .   "</td>";
                        echo "<td>" . $row["login"] . "</td>";
                        echo "<td>" . $row["senha"] . "</td>";
                        echo "<td>" . $row["tipo"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Não foram encontrados resultados.";
                }
                ?>
                <br>
            </div>
        </div>

        <br>
        <div class="container">
            <div class="card card-body border-0 shadow mb-4">
                <h4>Inserir novo usuário</h4>
                <form action="adduser.php" method="post" style="display: flex; justify-content: center; align-items: center;">
                    <table>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Senha</th>
                            <th>Permissão</th>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name="newUserName" id="newUserName"></td>
                            <td><input class="form-control" type="text" name="newUserLogin" id="newUserLogin"></td>
                            <td><input class="form-control" type="text" name="newUserPassword" id="newUserPassword"></td>
                            <td>
                                <select class="form-select mb-0" name="newUserType" id="newUserType">
                                    <option value="admin">Admin</option>
                                    <option value="suporte">Suporte</option>
                                    <option value="visitante">Visitante</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <button class="btn btn-primary" type="submit" style="margin-left: 30px;">Inserir</button>
                </form>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="card card-body border-0 shadow mb-4">
                <h4 class="card-title">Buscar e/ou Alterar usuários.</h4>
                <label for="id">ID</label>
                <input class="form-control" type="text" id="userId">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" id="userName">
                <label for="login">Login</label>
                <input class="form-control" type="text" id="userLogin" readonly="">
                <label for="senha">Senha</label>
                <input class="form-control" type="text" id="userPassword">

                <label for="permissao">Permissões:
                    <select class="form-select mb-0" id="userType">
                        <option value=""></option>
                        <option value="admin">Admin</option>
                        <option value="suporte">Suporte</option>
                        <option value="visitante">Visitante</option>
                    </select>
                    <br>
                    <button class="btn btn-primary" id="searchButton">Buscar</button>
                    <br>
                    <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                    <br>
                    <button class="btn btn-primary" id="updateButton">Atualizar</button>


                    <script>
                        document.getElementById('searchButton').addEventListener('click', () => {
                            // Obtém o ID do usuário a partir do campo de entrada
                            const userId = document.getElementById('userId').value;

                            // Faz uma solicitação para o arquivo get_user.php com o ID do usuário como parâmetro
                            fetch(`get_user.php?userId=${userId}`)
                                .then(response => response.json())
                                .then(user => {
                                    // Preenche os campos de entrada com os dados do usuário
                                    document.getElementById('userName').value = user.nome;
                                    document.getElementById('userLogin').value = user.login;
                                    document.getElementById('userPassword').value = user.senha;
                                    document.getElementById('userType').value = user.tipo;
                                });
                        });
                    </script>
                    <script>
                        document.getElementById('updateButton').addEventListener('click', () => {
                            // Obtém os dados do usuário a partir dos campos de entrada
                            const userId = document.getElementById('userId').value;
                            const userName = document.getElementById('userName').value;
                            const userPassword = document.getElementById('userPassword').value;
                            const userType = document.getElementById('userType').value;

                            // Cria um objeto FormData com os dados do usuário
                            const formData = new FormData();
                            formData.append('userId', userId);
                            formData.append('userName', userName);
                            formData.append('userPassword', userPassword);
                            formData.append('userType', userType);


                            // Faz uma solicitação POST para o arquivo update_user.php com os dados do usuário
                            fetch('update_user.php', {
                                method: 'POST',
                                body: formData
                            });
                            Swal.fire({
                                title: 'Sucesso!',
                                text: 'USUÁRIO ALTERADO COM SUCESSO.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        });
                    </script>
                    <br>
            </div>
        </div>
        <br>

        <div class="container" style="display: flex; justify-content: center; align-items: center;">
            <div class="card card-body border-0 shadow mb-4 mb-xl-0" style="width: 100%;">
                <form action="delete_user.php" method="post" onsubmit="return confirm('Tem certeza de que deseja excluir este usuário?');">
                    <h4>Excluir usuário:</h4>
                    <label for="user_id">ID do usuário:</label>
                    <input class="form-control" type="text" id="user_id" name="user_id">
                    <br>
                    <input class="btn btn-primary" type="submit" value="Excluir usuário">
                </form>
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
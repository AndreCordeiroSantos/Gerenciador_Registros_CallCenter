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

    <title>Agenda</title>

    <!-- Sweet Alert -->
    <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Sweet Alerts 2 -->
    <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
    $user = $_SESSION['tipo'];
    $senha = $_SESSION['senha'];
    $nome = $_SESSION['nome'];
    $id = $_SESSION['id'];
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Inclua o CSS e o JavaScript do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Inclua essas bibliotecas no cabeçalho do seu arquivo HTML -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Sweet Alert -->
    <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="css/volt.css" rel="stylesheet">
    <style>
        /* Estilos para a animação de shake */
        .is-invalid {
            animation: shake 0.5s;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-10px);
            }

            40% {
                transform: translateX(10px);
            }

            60% {
                transform: translateX(-10px);
            }

            80% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0);
            }
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
                        <h1>Agenda</h1>
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

        <!-- Container da Agenda -->

        <div class="div-agenda border-2 shadow mb-4 mb-xl-0">
            <h3 class="card-title">Bem vindo a sua Agenda. </h3>
            <h5><?php echo $_SESSION['nome']; ?></h5>
            <hr>
            <br>
            <?php echo "<h4>Login: $logado </h4>" ?>
            <?php echo "<h6>Sua ID: " . $_SESSION['id'];
            "</h6>" ?>
            <?php echo "<h6>Permissão: $user </h6>" ?>
            <br>
            <hr>
            <h4>Alterar sua senha:</h4>
            <div>
                <input class="btn btn-primary" type="submit" value="Alterar" id="Alterar" name="Alterar">
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Altere sua senha</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAlterarSenha">
                            <div class="form-group">
                                <input type="hidden" id="idUsuario" value="<?php echo $id; ?>">
                                <label for="novaSenha">Nova senha</label>
                                <input type="password" class="form-control" id="novaSenha" placeholder="Digite a nova senha">
                            </div>
                            <div class="form-group">
                                <label for="repetirSenha">Repita a senha</label>
                                <input type="password" class="form-control" id="repetirSenha" placeholder="Repita a nova senha">
                            </div>
                            <div id="errorText" style="display: none; color: red;">As senhas não coincidem. Por favor, tente novamente.</div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnAlterar">Enviar Senha</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evento para abrir MODAL -->
        <script>
            // Evento de clique no botão "Alterar"
            document.getElementById("Alterar").addEventListener("click", function() {
                // Exibir o modal
                var myModal = new bootstrap.Modal(document.getElementById("myModal"));
                myModal.show();
                var novaSenhaInput = document.getElementById("novaSenha");
                var repetirSenhaInput = document.getElementById("repetirSenha");
                var errorText = document.getElementById("errorText");

                // Verificar compatibilidade das senhas
                if (novaSenhaInput.value !== repetirSenhaInput.value) {
                    // Adicionar classe para o efeito de shake
                    repetirSenhaInput.classList.add("is-invalid");
                    errorText.style.display = "block";
                } else {
                    // Remover classe e ocultar mensagem de erro
                    repetirSenhaInput.classList.remove("is-invalid");
                    errorText.style.display = "none";
                }
            });
        </script>

        <!-- Evento para mandar todas as informações do modal para script php -->
        <script>
            // Evento de clique no botão "Alterar"
            document.getElementById("btnAlterar").addEventListener("click", function() {
                var form = document.getElementById("formAlterarSenha");
                var novaSenhaInput = document.getElementById("novaSenha");
                var repetirSenhaInput = document.getElementById("repetirSenha");
                var errorText = document.getElementById("errorText");
                var idUsuarioInput = document.getElementById("idUsuario");

                // Verificar compatibilidade das senhas
                if (novaSenhaInput.value !== repetirSenhaInput.value) {
                    // Adicionar classe para o efeito de shake
                    repetirSenhaInput.classList.add("is-invalid");
                    errorText.style.display = "block";
                } else if (novaSenhaInput.value.length < 6 || novaSenhaInput.value.trim() === "") {
                    // Verificar se a senha tem menos de 6 caracteres ou está vazia
                    novaSenhaInput.classList.add("is-invalid");
                    errorText.innerText = "A senha deve ter no mínimo 6 caracteres.";
                    errorText.style.display = "block";
                } else {
                    // Remover classe e ocultar mensagem de erro
                    repetirSenhaInput.classList.remove("is-invalid");
                    novaSenhaInput.classList.remove("is-invalid");

                    // Obter a nova senha e o ID do usuário
                    var novaSenha = novaSenhaInput.value;
                    var idUsuario = idUsuarioInput.value;

                    // Realizar a atualização no banco de dados via requisição Ajax
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Verificar se a atualização foi bem-sucedida
                            // Verificar a resposta do servidor
                            if (this.responseText === "success") {
                                // Exibir mensagem de sucesso
                                const notyf = new Notyf();
                                notyf.success({
                                    position: {
                                        x: 'left',
                                        y: 'top',
                                    },
                                    message: "Senha atualizada com sucesso.",
                                    duration: 1000,
                                }).then(function() {
                                    // Recarregar a página
                                    window.location.reload();
                                });
                            } else {
                                // Exibir mensagem de erro
                                Swal.fire({
                                    title: "Erro!",
                                    text: "Ocorreu um erro ao atualizar a senha.",
                                    icon: "error",
                                    timer: 1000,
                                    showConfirmButton: false
                                });
                            }
                        }
                    };
                    xhttp.open("POST", "#", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send("novaSenha=" + novaSenha + "&idUsuario=" + idUsuario);
                }
            });
        </script>

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
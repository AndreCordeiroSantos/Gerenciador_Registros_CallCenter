<?php
session_start();

// Verifica se o usuário não está logado e redireciona para a página de login
if ((!isset($_SESSION['login']) || !isset($_SESSION['senha']))) {
    header('Location: login.html');
    exit;
}

// Verifica o tipo de usuário e oculta o menu se não for "admin"
if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'gerencia') {
    echo "
    <style>
        .menu-gerencia {
            display: none !important;
        }
    </style>
    ";
} elseif ($_SESSION['tipo'] == 'admin') {
    echo "
    <style>
        .menu-oculto {
            display: none !important;
        }
    </style>
    ";
} 
if ($_SESSION['tipo'] == 'visitante') {
    echo "
    <style>
        .menu-oculto2 {
            display: none !important;
        }
    </style>
    ";
}
if ($_SESSION['tipo'] == 'colombo') {
    echo "
    <style>
        .menu-oculto3 {
            display: none !important;
        }
    </style>
    ";
}

?>
<!--verifica se há chamados abertos, para mostrar na tela-->

<?php
// Configurações do banco de dados
$db_host = '#';
$db_user = '#';
$db_pass = '#';
$db_name = '#';

// Conecta ao banco de dados
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die('Não foi possível conectar ao banco de dados: ' . mysqli_connect_error());
}

// Define a consulta SQL para verificar se há chamados em aberto
$sql = "SELECT COUNT(*) as total FROM sua_tabela WHERE p_status IN ('aberto', 'em andamento')";


// Executa a consulta SQL
$result = mysqli_query($conn, $sql);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die('Erro ao executar a consulta: ' . mysqli_error($conn));
}

// Obtém o número total de chamados em aberto
$row = mysqli_fetch_assoc($result);
$total_chamados_abertos = $row['total'];

?>

<!--verifica se há chamados abertos para colocar notificação-->
<?php
// Configurações do banco de dados
$db_host = '#';
$db_user = '#';
$db_pass = '#';
$db_name = '#';

// Conecta ao banco de dados
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die('Não foi possível conectar ao banco de dados: ' . mysqli_connect_error());
}

// Define a consulta SQL para verificar se há chamados em aberto
$sql1 = "SELECT COUNT(*) as total FROM sua_tabela WHERE status = 'aberto'";

// Executa a consulta SQL
$result1 = mysqli_query($con, $sql1);

// Verifica se a consulta foi bem-sucedida
if (!$result1) {
    die('Erro ao executar a consulta: ' . mysqli_error($con));
}

// Obtém o número total de chamados em aberto
$row = mysqli_fetch_assoc($result1);
$total_chamados_abertos1 = $row['total'];

?>


</html>
<li class="nav-item <?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                        echo 'active';
                    } ?>">
    <a href="home.php" class="nav-link">
        <span class="sidebar-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-check-fill" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z" />
            </svg>
        </span>
        <span class="sidebar-text">Home</span>
    </a>
</li>
<li class="nav-item <?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                        echo 'active';
                    } ?>">
    <span class="nav-link collapsed d-flex justify-content-between align-items-center menu-gerencia" data-bs-toggle="collapse" data-bs-target="#submenu-app">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                    <span class="sidebar-text">Painel Principal</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
        <ul class="flex-column nav">
            <li class="nav-item ">
                <a class="nav-link" href="usuarios.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                    </svg>
                    <span class="sidebar-text">Usuários</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
        <ul class="flex-column nav">
            <li class="nav-item ">
                <a class="nav-link" href="inserirtabela.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-diff-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8 6a.5.5 0 0 1 .5.5V8H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V9H6a.5.5 0 0 1 0-1h1.5V6.5A.5.5 0 0 1 8 6zm-2.5 6.5A.5.5 0 0 1 6 12h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <span class="sidebar-text">Consulta</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
        <ul class="flex-column nav">
            <li class="nav-item ">
                <a class="nav-link" href="alterarregistros.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z" />
                    </svg>
                    <span class="sidebar-text">Alterar Registros</span>
                </a>
            </li>
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
        </ul>
    </div>
</li>

<li class="nav-item menu-oculto menu-oculto2 menu-oculto3<?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                        echo 'active';
                    } ?>">
    <a href="paineluser.php" class="nav-link">
        <span class="sidebar-icon menu-oculto">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
            </svg>
        </span>
        <span class="sidebar-text">Painel Plansul</span>
        <?php if ($total_chamados_abertos1 > 0) : ?>
            <span class="badge bg-danger"><?php echo $total_chamados_abertos1; ?></span>
        <?php endif; ?>
    </a>
</li>
<li class="nav-item menu-oculto menu-oculto2 menu-oculto3<?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                                echo 'active';
                            } ?>">
    <a href="pecas_wyntech.php" class="nav-link">
        <span class="sidebar-icon menu-oculto">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mouse2" viewBox="0 0 16 16">
                <path d="M3 5.188C3 2.341 5.22 0 8 0s5 2.342 5 5.188v5.625C13 13.658 10.78 16 8 16s-5-2.342-5-5.188V5.189zm4.5-4.155C5.541 1.289 4 3.035 4 5.188V5.5h3.5V1.033zm1 0V5.5H12v-.313c0-2.152-1.541-3.898-3.5-4.154zM12 6.5H4v4.313C4 13.145 5.81 15 8 15s4-1.855 4-4.188V6.5z" />
            </svg>
        </span>
        <span class="sidebar-text">Solicitar Material</span>
        <?php if ($total_chamados_abertos > 0) : ?>
            <span class="badge bg-danger"><?php echo $total_chamados_abertos; ?></span>
        <?php endif; ?>
    </a>
</li>
<li class="nav-item menu-oculto menu-oculto2 menu-oculto3<?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                        echo 'active';
                    } ?>">
    <a href="chamadoff.php" class="nav-link">
        <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
            </svg>
        </span>
        <span class="sidebar-text">Chamados Off</span>
    </a>
</li>
<li class="nav-item menu-oculto3<?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                        echo 'active';
                    } ?>">
    <a href="dashboard.php" class="nav-link">
        <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
            </svg>
        </span>
        <span class="sidebar-text">Dashboards</span>
    </a>
</li>
<li class="nav-item menu-oculto3<?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                        echo 'active';
                    } ?>">
    <a href="relatorio.php" class="nav-link">
        <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z" />
            </svg>
        </span>
        <span class="sidebar-text">Relatórios</span>
    </a>
</li>
<li class="nav-item <?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                        echo 'active';
                    } ?>">
    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-ap">
        <span>
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                </svg>
            </span>
            <span class="sidebar-text">Informações</span>
        </span>
        <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="#">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
        </span>
    </span>
    <div class="multi-level collapse " role="list" id="submenu-ap" aria-expanded="false">
        <ul class="flex-column nav">
            <li class="nav-item ">
                <a class="nav-link" href="inventario.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                    </svg>
                    <span class="sidebar-text">Inventário</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="multi-level collapse " role="list" id="submenu-ap" aria-expanded="false">
        <ul class="flex-column nav">
            <li class="nav-item ">
                <a class="nav-link" href="get_historico.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                    </svg>
                    <span class="sidebar-text">Histórico Xaxim</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<script>
    // Obtenha a URL da página atual
    var currentPageUrl = window.location.href;

    // Percorra cada link no menu de navegação
    var navLinks = document.querySelectorAll('.nav-item a');
    for (var i = 0; i < navLinks.length; i++) {
        var linkUrl = navLinks[i].href;

        // If the link URL matches the current page URL, add the "active" class to the parent list item
        if (currentPageUrl.indexOf(linkUrl) !== -1) {
            navLinks[i].parentNode.classList.add('active');
            break;
        }
    }
</script>
<?php
// Configurações do banco de dados
$db_host = '172.10.20.47';
$db_user = 'archer';
$db_pass = 'B5n3Qz2vL7HAUs7z';
$db_name = 'archerx';

// Conecta ao banco de dados
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die('Não foi possível conectar ao banco de dados: ' . mysqli_connect_error());
}

// Define a consulta SQL para verificar se há chamados em aberto
$sql = "SELECT COUNT(*) as total FROM p_wyntech WHERE p_status = 'aberto'";

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

<?php
// Configurações do banco de dados
$db_host = '172.10.20.47';
$db_user = 'archer';
$db_pass = 'B5n3Qz2vL7HAUs7z';
$db_name = 'archerx';

// Conecta ao banco de dados
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die('Não foi possível conectar ao banco de dados: ' . mysqli_connect_error());
}

// Define a consulta SQL para verificar se há chamados em aberto
$sql1 = "SELECT COUNT(*) as total FROM dados_wyntech WHERE status = 'aberto'";

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
    <a href="paineluser.php" class="nav-link">
        <span class="sidebar-icon">
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
<li class="nav-item acitve<?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
                                echo 'active';
                            } ?>">
    <a href="pecas_wyntech.php" class="nav-link">
        <span class="sidebar-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mouse2" viewBox="0 0 16 16">
                <path d="M3 5.188C3 2.341 5.22 0 8 0s5 2.342 5 5.188v5.625C13 13.658 10.78 16 8 16s-5-2.342-5-5.188V5.189zm4.5-4.155C5.541 1.289 4 3.035 4 5.188V5.5h3.5V1.033zm1 0V5.5H12v-.313c0-2.152-1.541-3.898-3.5-4.154zM12 6.5H4v4.313C4 13.145 5.81 15 8 15s4-1.855 4-4.188V6.5z" />
            </svg>
        </span>
        <span class="sidebar-text">Solicitar Peças</span>
        <?php if ($total_chamados_abertos > 0) : ?>
            <span class="badge bg-danger"><?php echo $total_chamados_abertos; ?></span>
        <?php endif; ?>
    </a>
</li>
<li class="nav-item <?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
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
<li class="nav-item <?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
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
<li class="nav-item <?php if ($_SERVER['PHP_SELF'] == '/pagina1.php') {
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
    <a href="inventario.php" class="nav-link">
        <span class="sidebar-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
            </svg>
        </span>
        <span class="sidebar-text">Inventário</span>
    </a>
</li>
<script>
    // Get the current page URL
    var currentPageUrl = window.location.href;

    // Loop through each link in the navigation menu
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
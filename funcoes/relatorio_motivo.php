<?php
// Conectar ao banco de dados
$servername = "172.10.20.47";
$usernameDB = "archer";
$passwordDB = "B5n3Qz2vL7HAUs7z";
$dbname = "archerx";

$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if (isset($_POST['motivo'])) {
    $motivo = $_POST['motivo'];

    // Executar a consulta SQL para buscar as informações
    $sql = "SELECT et, numserie, data, usuario, motivo FROM dados_wyntech WHERE motivo = '$motivo'";
    $result = mysqli_query($conn, $sql);

    // Exibir os resultados na tabela DataTable
    if (mysqli_num_rows($result) > 0) {
        echo '<table id="tabela_dados">';
        echo '<thead><tr><th>ET</th><th>Num/Serie</th><th>Data</th><th>Usuário</th><th>Ocorrência</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['et'] . '</td>';
            echo '<td>' . $row['numserie'] . '</td>';
            echo '<td>' . $row['data'] . '</td>';
            echo '<td>' . $row['usuario'] . '</td>';
            echo '<td>' . $row['motivo'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
}
?>
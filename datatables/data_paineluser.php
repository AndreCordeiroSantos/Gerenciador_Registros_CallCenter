<?php
// Incluir a conexao com o banco de dados
$servername = "172.10.20.47";
$usernameDB = "archer";
$passwordDB = "B5n3Qz2vL7HAUs7z";
$dbname = "archerx";

$con = new PDO("mysql:host=$servername;dbname=" . $dbname, $usernameDB, $passwordDB);
if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Prepare a consulta SQL para selecionar os chamados abertos
$sql = "SELECT id, et, numserie, motivo, usuario, status FROM dados_wyntech ORDER BY id DESC";
$stmt = $con->prepare($sql);

// Execute a consulta
$stmt->execute();

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $statusClass = '';
    if ($row['status'] == 'registrado') {
        $statusClass = 'purple';
    } elseif ($row['status'] == 'aberto') {
        $statusClass = 'green';
    }

    $data[] = array(
        'id' => $row['id'],
        'et' => $row['et'],
        'numserie' => $row['numserie'],
        'motivo' => $row['motivo'],
        'usuario' => $row['usuario'],
        'status' => '<span class="status-circle ' . $statusClass . '"></span> ' . $row['status'],
    );
}

echo json_encode($data);
?>

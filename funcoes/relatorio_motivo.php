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
    $sql = "SELECT et, numserie, data, usuario, motivo FROM dados_wyntech
            WHERE motivo = '$motivo'";
    $result = mysqli_query($conn, $sql);

    // Criar um array vazio para armazenar os resultados
    $data = array();

    // Verificar se a consulta retornou resultados
    if (mysqli_num_rows($result) > 0) {
        // Processar os resultados
        while ($row = mysqli_fetch_assoc($result)) {
            // Adicionar cada linha como um item no array de dados
            $data[] = $row;
        }
    }

    // Enviar os dados como resposta JSON
    echo json_encode($data);
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

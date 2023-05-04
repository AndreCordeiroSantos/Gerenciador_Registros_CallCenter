<?php
// Conexão com o banco de dados
//conectar ao banco de dados
$servername = "172.10.20.47";
$usernameDB = "archer";
$passwordDB = "B5n3Qz2vL7HAUs7z";
$dbname = "archerx";

$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


// Obter valores do formulário
$id = $_POST['id'];
$et = $_POST['et'];
$usuario = $_POST['usuario'];
$motivo = $_POST['motivo'];
$causa = $_POST['causa'];
$solucao = $_POST['solucao'];
$descricao = $_POST['descricao'];

// Consulta SQL para atualizar as colunas
$sql = "UPDATE dados_wyntech SET et='$et', usuario='$usuario', motivo='$motivo', causa='$causa', solucao='$solucao', descricao='$descricao' WHERE id='$id'";

if ($id == "") {
    echo "<script language='javascript' type='text/javascript'>
      alert('NÃO FOI INFORMADO A ID PARA ALTERAÇÃO.');window.location
      .href='alterarregistros.php';</script>";
} else {
    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        echo "<script language='javascript' type='text/javascript'>
    alert('Atualização de registros bem sucessido.');window.location
    .href='alterarregistros.php';</script>";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}
// Fechar conexão
$conn->close();

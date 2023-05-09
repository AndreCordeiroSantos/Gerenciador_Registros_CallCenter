<!DOCTYPE html>
<html>

<head>
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Sweet Alert -->
  <link type="text/css" href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- Sweet Alerts 2 -->
  <script src="vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>
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
    echo "<script> 
    Swal.fire({
        title: 'Erro!',
        text: 'NÃO FOI INFORMADO A ID PARA ALTERAÇÃO.',
        icon: 'error',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'alterarregistros.php';
        }
      })</script>";
} else {
    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        echo "<script>
        Swal.fire({
            title: 'Sucesso!',
            text: 'Atualização de registros bem sucedida.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'alterarregistros.php';
            }
        })
        </script>";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}
// Fechar conexão
$conn->close();
?>
</body>
</html>

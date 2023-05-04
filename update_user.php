<!DOCTYPE html>
<html>

<head>
  <title>Minha página PHP</title>
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
  // Connect to database
  $conn = new mysqli("172.10.20.47", "archer", "B5n3Qz2vL7HAUs7z", "archerx");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Obtém os dados do usuário a partir da solicitação
  $userId = $_POST['userId'];
  $userName = $_POST['userName'];
  $userLogin = $_POST['userLogin'];
  $userPassword = $_POST['userPassword'];
  $userType = $_POST['userType'];

  // Verificar se et corresponde a numserie na tabela consulta2
  $checkUser = "SELECT * FROM usuarios_wyntech WHERE userLogin='$userLogin' AND userId='$userId'";
  $resultUser = mysqli_query($conn, $checkUser);
  if (mysqli_num_rows($resultUser) == 0) {
    // et e numserie não correspondem na tabela consulta2
    echo "<script>
                            Swal.fire({
                                title: 'Erro!',
                                text: 'A Id esta diferente do usuario selecionado.',
                                icon: 'error'
                            }).then((result) => {
                                window.location.href = 'chamwynadm.php';
                            });
                        </script>";
  } else {
    // Prepara a consulta SQL
    $stmt = $conn->prepare('UPDATE usuarios_wyntech SET nome = ?, senha = ?, tipo = ? WHERE id = ?');
    $stmt->bind_param('sssi', $userName, $userPassword, $userType, $userId);

    // Executa a consulta
    $stmt->execute();
  }
  ?>
</body>

</html>
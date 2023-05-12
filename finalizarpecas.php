<!DOCTYPE html>
<html>

<head>
  <title>Painel Principal</title>
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
        //Incluir a conexao com o banco de dados
        $servername = "172.10.20.47";
        $usernameDB = "archer";
        $passwordDB = "B5n3Qz2vL7HAUs7z";
        $dbname = "archerx";


        $conn = new PDO("mysql:host=$servername;dbname=" . $dbname, $usernameDB, $passwordDB);
        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }
        //receber valor do formulário pelo metodo POST
        $id = $_POST['id1'];


        //Preparar a query de update:
        $sql = "UPDATE p_wyntech SET p_status = 'finalizado' WHERE id=:id1";
        $stmt1 = $conn->prepare($sql);

        //Vincular os valores aos parâmetros da query:
        $stmt1->bindParam(':id1', $id);


            if ($stmt1->execute()) {
                echo "<script>
                Swal.fire({
                  title: 'Sucesso!',
                  text: 'Solicitação finalizada com sucesso.',
                  icon: 'success'
                }).then((result) => {
                  window.location.href = 'p_wyntech.php';
                });
              </script>";
            }
            else{
                echo "erro ao finalizar solicitação";
            }
          
    ?>
</body>
</html>
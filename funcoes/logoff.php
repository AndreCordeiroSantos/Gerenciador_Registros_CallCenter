<!DOCTYPE html>
<html>
<head>
    <title>Minha página PHP</title>
    <!-- Sweet Alert -->
    <link type="text/css" href="style/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Sweet Alerts 2 -->
    <script src="style/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
  echo "<script>
  Swal.fire({
      title: 'Sucesso!',
      text: 'Desconectado com Sucesso',
      icon: 'success'
  }).then((result) => {
      window.location.href = 'login.html';
  });
</script>";
?>
</body>
</html>
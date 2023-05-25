<?php
//conectar ao banco de dados
$servername = "172.10.20.47";
$usernameDB = "archer";
$passwordDB = "B5n3Qz2vL7HAUs7z";
$dbname = "archerx";

$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Receber informações do formulário
$et = $_POST["et"];
$numserie = $_POST["numserie"];
$motivo = $_POST["motivo"];
$data = $_POST['data'];
$usuario = $_SESSION['login'];
$req = $_POST['req'];
$descricao = $_POST['descricao'];

// Verificar se req já existe no banco de dados
$checkReq = "SELECT * FROM dados_wyntech WHERE req='$req'";
$result = mysqli_query($conn, $checkReq);
if (mysqli_num_rows($result) > 0) {
    // req já existe no banco de dados
    echo "<script>
            Swal.fire({
                title: 'Erro!',
                text: 'Essa REQ já foi registrada, por favor, insira uma REQ válida.',
                icon: 'error'
            }).then((result) => {
                window.location.href = 'chamadoff.php';
            });
        </script>";
} else {
    // Verificar se et corresponde a numserie na tabela consulta2
    $checkEtNumserie = "SELECT * FROM consulta2 WHERE et='$et' AND numserie='$numserie'";
    $resultEtNumserie = mysqli_query($conn, $checkEtNumserie);
    if (mysqli_num_rows($resultEtNumserie) == 0) {
        // et e numserie não correspondem na tabela consulta2
        echo "<script>
              Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'As informações, Nome Lógico, Num Série, não correspondem.',
                showConfirmButton: false,
                timer: 2000
              });
                      </script>";
    } else {
        // Inserir informações no banco de dados
        $sql = "INSERT INTO dados_wyntech (et, numserie, data, usuario, motivo, status, req, descricao) 
                VALUES ('PR6534ET$et', '$numserie', now(), '$usuario', '$motivo', 'registrado', '$req', '$descricao')";

        //Verifica se todo o formulário foi preenchido corretamente, se estiver ok, ele executa
        if ($et == "") {
            echo "<script>
            Swal.fire({
                title: 'Erro!',
                text: 'Campo ET não preenchido.',
                icon: 'error'
            }).then((result) => {
                window.location.href = 'chamadoff.php';
            });
        </script>";
        } else {
            if ($numserie == "") {
                echo "<script>
                Swal.fire({
                    title: 'Erro!',
                    text: 'Campo Número de Série nao preenchido.',
                    icon: 'error'
                }).then((result) => {
                    window.location.href = 'chamadoff.php';
                });
            </script>";
            } else {
                if ($motivo == "") {
                    echo "<script>
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Campo de Ocorrência não preenchido.',
                        icon: 'error'
                    }).then((result) => {
                        window.location.href = 'chamadoff.php';
                    });
                </script>";
                } else {
                    if ($usuario == "") {
                        echo "<script>
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Por favor selecione o usuario, para registrar o chamado.',
                            icon: 'error'
                        }).then((result) => {
                            window.location.href = 'chamadoff.php';
                        });
                    </script>";
                    } else {
                        if (substr($req, 0, 3) !== "REQ") {
                            $req = "REQ" . $req;
                            echo "<script>
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Por favor, insira a REQ CORRETAMENTE',
                                icon: 'error'
                            }).then((result) => {
                                window.location.href = 'chamadoff.php';
                            });
                        </script>";
                        } else {
                            if ($descricao == "") {
                                echo "<script>
                                Swal.fire({
                                    title: 'Erro!',
                                    text: 'Obrigatório descrever uma descrição para o chamado.',
                                    icon: 'error'
                                }).then((result) => {
                                    window.location.href = 'chamadoff.php';
                                });
                            </script>";
                            } else {
                                if (mysqli_query($conn, $sql)) {
                                    echo "<script>
                                    Swal.fire({
                                        title: 'Sucesso!',
                                        text: 'Informação Registrada com sucesso.',
                                        icon: 'success'
                                    }).then((result) => {
                                        window.location.href = 'chamadoff.php';
                                    });
                                </script>";
                                } else {
                                    echo "Erro ao registrar informação: " . mysqli_error($conn);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

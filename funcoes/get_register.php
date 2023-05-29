                <?php
                // Conecte-se ao banco de dados
                $servername = "172.10.20.47";
                $usernameDB = "archer";
                $passwordDB = "B5n3Qz2vL7HAUs7z";
                $dbname = "archerx";

                $conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
                if (!$conn) {
                    die("Conexão falhou: " . mysqli_connect_error());
                }

                // Consulta à tabela
                $query = "SELECT id, et, data, usuario, motivo, req, causa, solucao, descricao FROM dados_wyntech WHERE status = 'registrado' 
                ";

                $result = mysqli_query($conn, $query);

                $data = array();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                }
                
                echo json_encode($data);

                ?>